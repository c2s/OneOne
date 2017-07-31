<?php namespace App\Models\Core;

use App\Models\HsCms;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Groups extends HsCms  {
	
	protected $table = 'groups';
	protected $primaryKey = 'group_id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return " SELECT  
	tb_groups.group_id,
	tb_groups.name,
	tb_groups.description,
	tb_groups.level


FROM tb_groups  ";
	}
	public static function queryWhere(  ){
		
		return "  WHERE tb_groups.group_id IS NOT NULL    ";
	}
	
	public static function queryGroup(){
		return "    ";
	}
	

}
