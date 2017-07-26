<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Validator, Input, Redirect ;
use DB;

class HomeController extends Controller {

	public function __construct()
	{
		parent::__construct();

		\App::setLocale(CNF_LANG);
		if (defined('CNF_MULTILANG') && CNF_MULTILANG == '1') {

			$lang = (\Session::get('lang') != "" ? \Session::get('lang') : CNF_LANG);
			\App::setLocale($lang);
		}

		$this->data['pageLang'] = 'en';
		if(\Session::get('lang') != '')
		{
			$this->data['pageLang'] = \Session::get('lang');
		}
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index( Request $request )
	{
		
		if(CNF_FRONT =='false' && $request->segment(1) =='' ) :
			return Redirect::to('dashboard');
		endif;

		$page = $request->segment(1);
		if($page !='') :
			$content = \DB::table('pages')->where('alias','=',$page)->where('status','=','enable')->get();

			if(count($content) >=1)
			{

				$row = $content[0];
				$this->data['pageTitle'] = $row->title;
				$this->data['pageNote'] = $row->note;
				$this->data['pageMetakey'] = ($row->metakey !='' ? $row->metakey : CNF_METAKEY) ;
				$this->data['pageMetadesc'] = ($row->metadesc !='' ? $row->metadesc : CNF_METADESC) ;

				$this->data['breadcrumb'] = 'active';

				if($row->access !='')
				{
					$access = json_decode($row->access,true)	;
				} else {
					$access = array();
				}

				// If guest not allowed
				if($row->allow_guest !=1)
				{
					$group_id = \Session::get('gid');
					$isValid =  (isset($access[$group_id]) && $access[$group_id] == 1 ? 1 : 0 );
					if($isValid ==0)
					{
						return Redirect::to('')
							->with('message', \SiteHelpers::alert('error',Lang::get('core.note_restric')));
					}
				}
				if($row->template =='backend')
				{
					 $page = 'pages.'.$row->filename;
				} else {
					$page = 'layouts.'.CNF_THEME.'.index';
				}
				//print_r($this->data);exit;

				$filename = base_path() ."/resources/views/pages/".$row->filename.".blade.php";
				if(file_exists($filename))
				{
					$this->data['pages'] = 'pages.'.$row->filename;
					$this->data['filename'] = $row->filename;

					return view($page,$this->data);
				} else {
					return Redirect::to('')
						->with('message', \SiteHelpers::alert('error',\Lang::get('core.note_noexists')));
				}

			} else {
				return Redirect::to('')
					->with('message', \SiteHelpers::alert('error',\Lang::get('core.note_noexists')));
			}


		else :

			$sql = DB::table('pages')->where('default', '1')->get();
			if(count($sql)>=1)
			{
				$row = $sql[0];

				$this->data['pageTitle'] 	= $row->title;
				$this->data['pageNote'] 	=  $row->note;
				$this->data['breadcrumb'] 	= 'inactive';
				$this->data['pageMetakey'] 	=   $row->metakey ;
				$this->data['pageMetadesc'] =  $row->metadesc ;
				$this->data['filename'] 	=  $row->filename;


				$this->data['pages'] = 'pages.'.$row->filename;
				$page = 'layouts.'.CNF_THEME.'.index';
				return view($page,$this->data);

			} else {

				return ' No Default page set up !';
			}

		endif;


	}

	public function  getLang($lang='en')
	{
		\Session::put('lang', $lang);
		return  Redirect::back();
	}

	public function  getSkin($skin='sximo')
	{
		\Session::put('themes', $skin);
		return  Redirect::back();
	}

	public  function  postContact( Request $request)
	{

		$this->beforeFilter('csrf', array('on'=>'post'));
		$rules = array(
				'name'		=>'required',
				'subject'	=>'required',
				'message'	=>'required|min:20',
				'sender'	=>'required|email'
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->passes())
		{

			$data = array('name'=>$request->input('name'),'sender'=>$request->input('sender'),'subject'=>$request->input('subject'),'notes'=>$request->input('message'));
			$message = view('emails.contact', $data);
			$data['to'] = CNF_EMAIL;
			if(defined('CNF_MAIL') && CNF_MAIL =='swift')
			{
				Mail::send('user.emails.contact', $data, function ($message) use ($data) {
		    		$message->to($data['to'])->subject($data['subject']);
		    	});

			}  else {

				$headers  	= 'MIME-Version: 1.0' . "\r\n";
				$headers 	.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers 	.= 'From: '.$request->input('name').' <'.$request->input('sender').'>' . "\r\n";
					//mail($data['to'],$data['subject'], $message, $headers);
			}




			return Redirect::to($request->input('redirect'))->with('message', \SiteHelpers::alert('success','Thank You , Your message has been sent !'));

		} else {
			return Redirect::to($request->input('redirect'))->with('message', \SiteHelpers::alert('error','The following errors occurred'))
			->withErrors($validator)->withInput();
		}
	}

}
