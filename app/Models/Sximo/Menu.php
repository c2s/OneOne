<?php namespace App\Models\Sximo;

use App\Models\HsCms;
use Illuminate\Database\Eloquent\Model;

class Menu extends HsCms {

	protected $table 		= 'tb_menu';
	protected $primaryKey 	= 'menu_id';

	public function __construct() {
		parent::__construct();
	
			
				
	} 

}