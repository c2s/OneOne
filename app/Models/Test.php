<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class test extends HsCms  {
	
	protected $table = 'employee';
	protected $primaryKey = 'EmployeeId';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT employee.* FROM employee  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE employee.EmployeeId IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
