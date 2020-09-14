<?php namespace App\Models;

use CodeIgniter\Model;
   
class UserModel extends Model
{
	protected $table = 'user_info'; 
	protected $allowedFields = ['name' ];
	protected $useTimestamps = false;
	protected $DBGroup = 'default';
	protected $validationRules = [];
	protected $validationMessages = [];

	 public function record(){
		 return "yes";
	 }
 
 
	//--------------------------------------------------------------------

}
