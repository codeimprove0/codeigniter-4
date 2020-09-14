<?php namespace App\Models;

use CodeIgniter\Model;
   
class StudentModel extends Model
{
	protected $table = 'student'; 
	protected $allowedFields = ['name','email_id','phone_no'];
	protected $useTimestamps = false;
	protected $DBGroup = 'default';
	protected $validationRules = [];
	protected $validationMessages = [];

	 public function record(){
		 return "yes";
	 }
 
 
	//--------------------------------------------------------------------

}
