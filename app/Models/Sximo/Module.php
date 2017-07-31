<?php namespace App\Models\Sximo;

use App\Models\HsCms;
use Illuminate\Database\Eloquent\Model;

class Module extends HsCms {

	protected $table 		= 'tb_module';
	protected $primaryKey 	= 'module_id';

	public function __construct() {
		parent::__construct();
	
			
				
	} 

}