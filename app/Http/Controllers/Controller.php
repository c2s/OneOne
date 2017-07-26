<?php 

namespace App\Http\Controllers;

use Mail;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Validator, Input, Redirect ;


abstract class Controller extends BaseController {

    use DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('ipBlocked');
        
        $driver             = config('database.default');
        $database           = config('database.connections');

        $this->db           = $database[$driver]['database'];
        $this->dbuser       = $database[$driver]['username'];
        $this->dbpass       = $database[$driver]['password'];
        $this->dbhost       = $database[$driver]['host'];
        $this->prefix       = $database[$driver]['prefix'];


        if(\Auth::check() == true)
        {

            if(!\Session::get('gid'))
            {

                \Session::put('uid', \Auth::user()->id);
                \Session::put('gid', \Auth::user()->group_id);
                \Session::put('eid', \Auth::user()->email);
                \Session::put('ll', \Auth::user()->last_login);
                \Session::put('fid', \Auth::user()->first_name.' '. \Auth::user()->last_name);
                \Session::put('themes', 'sximo-light-blue');
            }
        }

        if(!\Session::get('themes'))
        {
            \Session::put('themes', 'sximo');
        }

        \App::setLocale(CNF_LANG);
        if (defined('CNF_MULTILANG') && CNF_MULTILANG == '1') {

            $lang = (\Session::get('lang') != "" ? \Session::get('lang') : CNF_LANG);
            \App::setLocale($lang);
        }
        $data = array(
            'last_activity'=> strtotime(Carbon::now())
        );
        \DB::table('users')->where('id',\Session::get('uid'))->update($data);
    }


    function getComboselect( Request $request)
    {


        if($request->ajax() == true && \Auth::check() == true)
        {
            $param = explode(':',$request->input('filter'));
            $parent = (!is_null($request->input('parent')) ? $request->input('parent') : null);
            $limit = (!is_null($request->get('limit')) ? $request->get('limit') : null);
            $rows = $this->model->getComboselect($param,$limit,$parent);
            $items = array();

            $fields = explode("|",$param[2]);

            foreach($rows as $row)
            {
                $value = "";
                foreach($fields as $item=>$val)
                {
                    if($val != "") $value .= $row->{$val}." ";
                }
                $items[] = array($row->{$param['1']}, $value);

            }

            return json_encode($items);
        } else {
            return json_encode(array('OMG'=>" Ops .. Cant access the page !"));
        }
    }

    public function getCombotable( Request $request)
    {
        if(Request::ajax() == true && Auth::check() == true)
        {
            $rows = $this->model->getTableList($this->db);
            $items = array();
            foreach($rows as $row) $items[] = array($row , $row);
            return json_encode($items);
        } else {
            return json_encode(array('OMG'=>"  Ops .. Cant access the page !"));
        }
    }

    public function getCombotablefield( Request $request)
    {
        if($request->input('table') =='') return json_encode(array());
        if(Request::ajax() == true && Auth::check() == true)
        {


            $items = array();
            $table = $request->input('table');
            if($table !='')
            {
                $rows = $this->model->getTableField($request->input('table'));
                foreach($rows as $row)
                    $items[] = array($row , $row);
            }
            return json_encode($items);
        } else {
            return json_encode(array('OMG'=>"  Ops .. Cant access the page !"));
        }
    }

    function postMultisearch( Request $request)
    {
        $post = $_POST;
        $items ='';
        foreach($post as $item=>$val):
            if($_POST[$item] !='' and $item !='_token' and $item !='md' && $item !='id'):
                $items .= $item.':'.trim($val).'|';
            endif;

        endforeach;

        return Redirect::to($this->module.'?search='.substr($items,0,strlen($items)-1).'&md='.Input::get('md'));
    }

    function buildSearch( $map = false, $condition = null)
    {

        $keywords = ''; $fields = '';	$param ='';
        $allowsearch = $this->info['config']['forms'];
        foreach($allowsearch as $as) $arr[$as['field']] = $as ;
        $mapping = '';
        if($condition !='')
        {
            $type = explode("|",$condition );
            if(count($type) >= 1)
            {
                foreach($type as $t)
                {
                    $keys = explode(":",$t);
                    if(in_array($keys[0],array_keys($arr))):
                        if($arr[$keys[0]]['type'] == 'select' || $arr[$keys[0]]['type'] == 'radio' )
                        {
                            $param .= " AND ".$arr[$keys[0]]['alias'].".".$keys[0]." ".self::searchOperation($keys[1])." '".$keys[2]."' ";
                            $mapping .= $keys[0].' '.self::searchOperation($keys[1]).' '.$keys[2]. '<br />';

                        } else {
                            $operate = self::searchOperation($keys[1]);
                            if($operate == 'like')
                            {
                                $param .= " AND ".$arr[$keys[0]]['alias'].".".$keys[0]." LIKE '%".$keys[2]."%%' ";
                                $mapping .= $keys[0].' LIKE '.$keys[2]. '<br />';
                            } else if( $operate =='is_null') {
                                $param .= " AND ".$arr[$keys[0]]['alias'].".".$keys[0]." IS NULL ";
                                $mapping .= $keys[0].' IS NULL <br />';

                            } else if( $operate =='not_null') {
                                $param .= " AND ".$arr[$keys[0]]['alias'].".".$keys[0]." IS NOT NULL ";
                                $mapping .= $keys[0].' IS NOT NULL <br />';

                            } else if( $operate =='between') {
                                $param .= " AND (".$arr[$keys[0]]['alias'].".".$keys[0]." BETWEEN '".$keys[2]."' AND '".$keys[3]."' ) ";
                                $mapping .= $keys[0].' BETWEEN '.$keys[2]. ' - '. $keys[3] .'<br />';
                            } else {
                                $param .= " AND ".$arr[$keys[0]]['alias'].".".$keys[0]." ".self::searchOperation($keys[1])." '".$keys[2]."' ";
                                $mapping .= $keys[0].' '.self::searchOperation($keys[1]).' '.$keys[2]. '<br />';
                            }
                        }
                    endif;
                }
            }
        }

        if($map == true)
        {
            return $param = array(
                'param'	=> $param,
                'maps'	=> '',
            );

        } else {
            return $param;
        }


    }

    function searchOperation( $operate)
    {
        $val = '';
        switch ($operate) {
            case 'equal':
                $val = '=' ;
                break;
            case 'bigger_equal':
                $val = '>=' ;
                break;
            case 'smaller_equal':
                $val = '<=' ;
                break;
            case 'smaller':
                $val = '<' ;
                break;
            case 'bigger':
                $val = '>' ;
                break;
            case 'not_null':
                $val = 'not_null' ;
                break;

            case 'is_null':
                $val = 'is_null' ;
                break;

            case 'like':
                $val = 'like' ;
                break;

            case 'between':
                $val = 'between' ;
                break;

            default:
                $val = '=' ;
                break;
        }
        return $val;
    }

    function inputLogs(Request $request, $note = NULL)
    {
        $data = array(
            'module'	=> $request->segment(1),
            'task'		=> $request->segment(2),
            'user_id'	=> Session::get('uid'),
            'ipaddress'	=> $request->getClientIp(),
            'note'		=> $note
        );
        \DB::table( $this->prefix.'logs')->insert($data);		;

    }

    function validateForm()
    {
        $forms = $this->info['config']['forms'];
        $rules = array();
        foreach($forms as $form)
        {
            if($form['required']== '' || $form['required'] !='0')
            {
                $rules[$form['field']] = 'required';
            } elseif ($form['required'] == 'alpa'){
                $rules[$form['field']] = 'required|alpa';
            } elseif ($form['required'] == 'alpa_num'){
                $rules[$form['field']] = 'required|alpa_num';
            } elseif ($form['required'] == 'alpa_dash'){
                $rules[$form['field']]='required|alpa_dash';
            } elseif ($form['required'] == 'email'){
                $rules[$form['field']] ='required|email';
            } elseif ($form['required'] == 'numeric'){
                $rules[$form['field']] = 'required|numeric';
            } elseif ($form['required'] == 'date'){
                $rules[$form['field']]='required|date';
            } else if($form['required'] == 'url'){
                $rules[$form['field']] = 'required|active_url';
            } else {

                if( $form['type'] =='file')
                {
                    if(!is_null(Input::file($form['field'])))
                    {

                        if($form['option']['upload_type'] =='image')
                        {
                            $rules[$form['field']] = 'mimes:jpg,jpeg,png,gif,bmp';
                        } else {
                            if($form['option']['image_multiple'] != '1')
                            {
                                $rules[$form['field']] = 'mimes:zip,csv,xls,doc,docx,xlsx';
                            }

                        }
                    }

                }

            }
        }
        return $rules ;
    }

    function validatePost(  $table )
    {
        $request = new Request;
        ///	return json_encode($_POST);	
        $str = $this->info['config']['forms'];
        //echo '<pre>';print_r($_POST);echo '</pre>'; exit;
        $data = array();
        foreach($str as $f){
            $field = $f['field'];
            if($f['view'] ==1)
            {
                if($f['type'] =='textarea_editor' || $f['type'] =='textarea')
                {
                    // Handle Text Editor 
                    $content = (isset($_POST[$field]) ? $_POST[$field] : '');
                    $data[$field] = $content;
                } else {
                    // Handle text Input
                    if(isset($_POST[$field]))
                    {
                        $data[$field] = $_POST[$field];
                    }
                    // Handle FILE OR IMAGE Upload 
                    if($f['type'] =='file')
                    {
                        $files ='';
                        if($f['option']['upload_type'] =='file')
                        {

                            if(isset($f['option']['image_multiple']) && $f['option']['image_multiple'] ==1)
                            {
                                if(isset($_POST['curr'.$field]))
                                {
                                    $curr =  '';
                                    for($i=0; $i<count($_POST['curr'.$field]);$i++)
                                    {
                                        $files .= $_POST['curr'.$field][$i].',';
                                    }
                                }

                                if(!is_null(Input::file($field)))
                                {

                                    $destinationPath = '.'. $f['option']['path_to_upload'];
                                    foreach($_FILES[$field]['tmp_name'] as $key => $tmp_name ){
                                        $file_name = $_FILES[$field]['name'][$key];
                                        $file_tmp =$_FILES[$field]['tmp_name'][$key];
                                        if($file_name !='')
                                        {
                                            move_uploaded_file($file_tmp,$destinationPath.'/'.$file_name);
                                            $files .= $file_name.',';

                                        }

                                    }

                                    if($files !='')	$files = substr($files,0,strlen($files)-1);
                                }
                                $data[$field] = $files;

                            } else {

                                $file = Input::file($field);
                                $destinationPath = '.'. $f['option']['path_to_upload'];
                                $filename = $file->getClientOriginalName();
                                $extension =$file->getClientOriginalExtension(); //if you need extension of the file
                                $rand = rand(1000,100000000);
                                $newfilename = strtotime(date('Y-m-d H:i:s')).'-'.$rand.'.'.$extension;
                                $uploadSuccess = $file->move($destinationPath, $newfilename);
                                if( $uploadSuccess ) {
                                    $data[$field] = $newfilename;
                                }
                            }

                        } else {

                            if(!is_null(Input::file($field)))
                            {

                                $file = Input::file($field);
                                $destinationPath = '.'. $f['option']['path_to_upload'];
                                $filename = $file->getClientOriginalName();
                                $extension =$file->getClientOriginalExtension(); //if you need extension of the file
                                $rand = rand(1000,100000000);
                                $newfilename = strtotime(date('Y-m-d H:i:s')).'-'.$rand.'.'.$extension;


                                $uploadSuccess = $file->move($destinationPath, $newfilename);


                                if($f['option']['resize_width'] != '0' && $f['option']['resize_width'] !='')
                                {
                                    if( $f['option']['resize_height'] ==0 )
                                    {
                                        $f['option']['resize_height']	= $f['option']['resize_width'];
                                    }
                                    $orgFile = $destinationPath.'/'.$newfilename;
                                    \SiteHelpers::cropImage($f['option']['resize_width'] , $f['option']['resize_height'] , $orgFile ,  $extension,	 $orgFile)	;
                                }

                                if( $uploadSuccess ) {
                                    $data[$field] = $newfilename;
                                }


                            } else {
                                unset($data[$field]);
                            }

                        }

                    }

                    // Handle Checkbox input 
                    if($f['type'] =='checkbox')
                    {
                        if(isset($_POST[$field]))
                        {
                            $data[$field] = implode(",",$_POST[$field]);
                        } else {
                            $data[$field] = '0';
                        }
                    }
                    // Handle Date 				
                    if($f['type'] =='date')
                    {
                        $data[$field] = date("Y-m-d",strtotime($request->input($field)));
                    }

                    // Handle Date 				
                    if($f['type'] =='date_time')
                    {
                        $data[$field] = date("Y-m-d H:i:s",strtotime($request->input($field)));
                    }


                    // if post is seelct multiple						
                    if($f['type'] =='select')
                    {
                        if( isset($f['option']['select_multiple']) &&  $f['option']['select_multiple'] ==1 )
                        {
                            $multival = (is_array($_POST[$field]) ? implode(",",$_POST[$field]) :  $_POST[$field]);
                            $data[$field] = $multival;
                        } else {
                            $data[$field] = $_POST[$field];
                        }
                    }

                }

            }
        }
        $global	= (isset($this->access['is_global']) ? $this->access['is_global'] : 0 );

        if($global == 0 )
            $data['entry_by'] = \Session::get('uid');

        /* Added for Compatibility laravel 5.2 */
        $values = array();
        foreach($data as $key=>$val)
        {
            if($val !='') $values[$key] = $val;
        }
        return $values;
    }

    function postFilter( Request $request)
    {
        $module = $this->module;
        $sort 	= (!is_null($request->input('sort')) ? $request->input('sort') : '');
        $order 	= (!is_null($request->input('order')) ? $request->input('order') : '');
        $rows 	= (!is_null($request->input('rows')) ? $request->input('rows') : '');
        $md 	= (!is_null($request->input('md')) ? $request->input('md') : '');

        $filter = '?';
        if($sort!='') $filter .= '&sort='.$sort;
        if($order!='') $filter .= '&order='.$order;
        if($rows!='') $filter .= '&rows='.$rows;
        if($md !='') $filter .= '&md='.$md;



        return Redirect::to($this->data['pageModule'] . $filter);

    }

    function injectPaginate()
    {

        $sort 	= (isset($_GET['sort']) 	? $_GET['sort'] : '');
        $order 	= (isset($_GET['order']) 	? $_GET['order'] : '');
        $rows 	= (isset($_GET['rows']) 	? $_GET['rows'] : '');
        $search 	= (isset($_GET['search']) ? $_GET['search'] : '');

        $appends = array();
        if($sort!='') 	$appends['sort'] = $sort;
        if($order!='') 	$appends['order'] = $order;
        if($rows!='') 	$appends['rows'] = $rows;
        if($search!='') $appends['search'] = $search;

        return $appends;

    }

    function returnUrl()
    {
        $pages 	= (isset($_GET['page']) ? $_GET['page'] : '');
        $sort 	= (isset($_GET['sort']) ? $_GET['sort'] : '');
        $order 	= (isset($_GET['order']) ? $_GET['order'] : '');
        $rows 	= (isset($_GET['rows']) ? $_GET['rows'] : '');
        $search 	= (isset($_GET['search']) ? $_GET['search'] : '');

        $appends = array();
        if($pages!='') 	$appends['page'] = $pages;
        if($sort!='') 	$appends['sort'] = $sort;
        if($order!='') 	$appends['order'] = $order;
        if($rows!='') 	$appends['rows'] = $rows;
        if($search!='') $appends['search'] = $search;

        $url = "";
        foreach($appends as $key=>$val)
        {
            $url .= "&$key=$val";
        }
        return $url;

    }

    public function getRemovefiles( Request $request)
    {
        $files = '.'.$request->input('file');
        if(file_exists($files) && $files !='')
        {
            unlink( $files);
        }
    }

    public function getRemovecurrentfiles( Request $request)
    {
        $id 	= $request->input('id');
        $field 	= $request->input('field');
        $file 	= $request->input('file');
        if(file_exists('./'.$file) && $file !='')
        {
            if(unlink('.'.$file))
            {
                \DB::table($this->info['table'])->where($this->info['key'],$id)->update(array($field=>''));
            }
            return Response::json(array('status'=>'success'));
        } else {
            return Response::json(array('status'=>'error'));
        }
    }

    public function getSearch()
    {

        $this->data['tableForm'] 	= $this->info['config']['forms'];
        $this->data['tableGrid'] 	= $this->info['config']['grid'];

        $this->data['pageUrl']		= url($this->module);
        return view('sximo.module.utility.search',$this->data);

    }

    function getDownload( Request $request)
    {

        if($this->access['is_excel'] ==0)
            return Redirect::to('')->with('messagetext',\Lang::get('core.note_restric'))->with('msgstatus','error');

        $info = $this->model->makeInfo( $this->module);
        // Take param master detail if any
        $filter = (!is_null($request->input('search')) ? $this->buildSearch() : '');
        $params = array(
            'params'	=> $filter,
            'global'	=> (isset($this->access['is_global']) ? $this->access['is_global'] : 0 )
        );

        $results 	= $this->model->getRows( $params );
        $fields		= $info['config']['grid'];
        $rows		= $results['rows'];

        $content = $this->data['pageTitle'];
        $content .= '<table border="1">';
        $content .= '<tr>';
        foreach($fields as $f )
        {
            if($f['download'] =='1')
            {
                $limited = isset($field['limited']) ? $field['limited'] :'';
                if(\SiteHelpers::filterColumn($limited ))
                {
                    $content .= '<th style="background:#f9f9f9;">'. $f['label'] . '</th>';

                }
            }
        }
        $content .= '</tr>';

        foreach ($rows as $row)
        {
            $content .= '<tr>';
            foreach($fields as $f )
            {

                if($f['download'] =='1')
                {
                    $limited = isset($field['limited']) ? $field['limited'] :'';
                    if(\SiteHelpers::filterColumn($limited ))
                    {
                        $content .= '<td> '. \SiteHelpers::formatRows($row->{$f['field']},$f,$row) . '</td>';
                    }
                }

            }
            $content .= '</tr>';
        }
        $content .= '</table>';

        @header('Content-Type: application/ms-excel');
        @header('Content-Length: '.strlen($content));
        @header('Content-disposition: inline; filename="'.$title.' '.date("d/m/Y").'.xls"');

        echo $content;
        exit;

    }

    function getLookup( Request $request, $id)
    {
        $args = explode("-",$id);
        if(count($args)>=2)
        {

            $model = '\\App\\Models\\'.ucwords($args['3']);
            $model = new $model();
            $info = $model->makeInfo( $args['3'] );
            $params = array(
                'params'	=> " And ".$args['4'].".".$args['5']." ='". $args['6'] ."'",
                //'global'	=> (isset($this->access['is_global']) ? $this->access['is_global'] : 0 )
            );
            $results = $model->getRows( $params );
            $data['access']		=$model->validAccess($info['id']);
            $data['rowData']		= $results['rows'];
            $data['tableGrid'] 	= $info['config']['grid'];
            $data['tableForm'] 	= $info['config']['forms'];
            return view('sximo.module.utility.masterdetail',$data);

        } else {
            return 'Invalid Argument';
        }
    }


    function detailview( $model , $detail , $id )
    {

        $info = $model->makeInfo( $detail['module'] );
        $params = array(
            'params'	=> " And `".$detail['key']."` ='". $id ."'",
            'global'	=> (isset($this->access['is_global']) ? $this->access['is_global'] : 0 )
        );
        $results = $model->getRows( $params );
        $data['rowData']		= $results['rows'];
        $data['tableGrid'] 		= $info['config']['grid'];
        $data['tableForm'] 		= $info['config']['forms'];

        return $data;



    }


    function detailviewsave( $model ,$request , $detail , $id )
    {
        \DB::table($detail['table'])->where($detail['key'],$request[$detail['key']])->delete();

        $info = $model->makeInfo( $detail['module'] );

        $access = $model->validAccess($info['id']);

        $str = $info['config']['forms'];

        $data = array($detail['master_key'] => $id );
        $global	= (isset($access['is_global']) ? $access['is_global'] : 0 );

        $total = count($request['counter']);

        for($i=0; $i<$total;$i++)
        {
            foreach($str as $f){
                $field = $f['field'];
                if($f['view'] ==1)
                {
                    if(isset($request['bulk_'.$field][$i]) && $request['bulk_'.$field][$i] !='')

                    {
                        $data[$f['field']] = $request['bulk_'.$field][$i];
                    }
                }
            }
            if($global == 0 )
                $data['entry_by'] = \Session::get('uid');

            //print_r($data); exit;
            \DB::table($detail['table'])->insert($data);

        }

    }

    function formatTag($data)
    {
        $data = str_replace(["{"], "", $data);
        $result = array_filter(explode("}", $data));
        return $result;
    }


}

