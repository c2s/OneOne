<?php namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function getIndex( Request $request )
	{
		$this->data['online_users'] = \DB::table('users')->orderBy('last_activity','desc')->limit(10)->get();
		$this->data['active'] = '';
		return view('dashboard.index',$this->data);
	}	


}