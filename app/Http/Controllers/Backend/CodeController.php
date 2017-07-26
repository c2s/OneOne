<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\controller;
use Illuminate\Http\Request;
use Validator, Input, Redirect; 



class CodeController extends Controller {

    public function __construct()
    {
        parent::__construct();
        $driver             = config('database.default');
        $database           = config('database.connections');
       
        $this->db           = $database[$driver]['database'];
        $this->dbuser       = $database[$driver]['username'];
        $this->dbpass       = $database[$driver]['password'];
        $this->dbhost       = $database[$driver]['host'];       
    }

    function getIndex()
    {
        return view('sximo.code.index');
    }


    function postSource(Request $request)
    {

        $_POST['dir'] = urldecode($_POST['dir']);
        $root = base_path();
        $res = '';
       

        if( file_exists($root . $_POST['dir']) ) {
            $files = scandir($root . $_POST['dir']);
            natcasesort($files);
            if( count($files) > 2 ) { /* The 2 accounts for . and .. */
                $res .=  "<ul class=\"jqueryFileTree\" style=\"display: none;\">";
                // All dirs
                foreach( $files as $file ) {
                    if( file_exists($root . $_POST['dir'] . $file) && $file != '.' && $file != '..' && is_dir($root . $_POST['dir'] . $file) ) {
                         $res .=  "<li class=\"directory collapsed\"><a href=\"#\" rel=\"" . htmlentities($_POST['dir'] . $file) . "/\">" . htmlentities($file) . "</a></li>";
                    }
                }
                // All files
                foreach( $files as $file ) {
                    if( file_exists($root . $_POST['dir'] . $file) && $file != '.' && $file != '..' && !is_dir($root . $_POST['dir'] . $file) ) {
                        $ext = preg_replace('/^.*\./', '', $file);
                         $res .=  "<li class=\"file ext_$ext\"><a href=\"#\" rel=\"" . htmlentities($_POST['dir'] . $file) . "\">" . htmlentities($file) . "</a></li>";
                    }
                }
                 $res .=  "</ul>";   
            }

            return $res;
        } else {

            return 'Folder is not exists';
        }

       

    }

    function getEdit( Request $request)
    {
        $path = $request->input('path');
        $file = base_path().'/'.$path;
        if(file_exists($file)) {
            return array(
                    'path'  =>  $path ,
                    'content'   => file_get_contents($file)
                );
           
        } else {
            return 'error';
        }
       
    }  

    function postSave( Request $request )
    {
        $content = $request->input('content_html');
        $filename = base_path().'/'. $request->input('path');
        if(file_exists($filename))
        {
           $fp=fopen($filename,"w+"); 
            fwrite($fp,$content); 
            fclose($fp); 
            return response()->json(['status' => 'success' ,'message'=>  \SiteHelpers::alert('success','File has been changed')]);
       // Return return json_encode(array());
        } else {
           return response()->json(['status' => 'error' ,'message'=>  \SiteHelpers::alert('success','Error while saving changes')]);  
        }
       

    }  

}