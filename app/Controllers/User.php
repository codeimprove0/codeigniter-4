<?php namespace App\Controllers;
   
use  App\Models\UserModel;
use CodeIgniter\HTTP\Request;

class User extends BaseController
{
	// public $user;
	public $userModel;
	public function __construct()
	{
		$this->userModel = new UserModel();
		//$this->user = new \App\Models\UserModel();
	}
	public function index()
	{	 


		/* $query = $this->db->query("select * from user_info");
		$result = $query->getResult();

		echo "<pre>"; print_r($result); die; */
		$data  = [];	
		$data['name'] =  "Code Improve";
		$data['title'] =  "User Page";
		$data['list'] =   array('Code','Demo','Test');    
		echo view('user_page',$data); 
		
	}

	public function add()
	{   
		/* $users = model('\App\Models\UserModel');
		echo $users->record(); die; */
		 
		helper(['text','url','demo']);

		echo improve(); die;

		$test = word_limiter('Hello Test Data',1);

		$test2  = word_censor("Hello Test and Best",['Test','Best'],'...');
		echo $test2; die;
		$modelsUser =  new UserModel();

		//$detail  = $modelsUser->find(1);
		$user['name'] = 'ssss';
		$user['email_id'] = 'sss@gmail.com';
		$modelsUser->save($user);

		$data  = [];	
		$data['name'] =  "Add Form";
		$data['title'] =  "User Add Page";
		$data['list'] =   array('Code','Demo','Test');   
		echo view('user_add',$data);
		
	}
	public function form()
	{ 
		helper('form');
		$validation =  \Config\Services::validation();
		$validateError = '';
		if($this->request->getMethod() =='post'){
			//echo $this->request->getPost('firstname'); 	
			/*  $validateRule = $this->validate([
				'firstname' => 'required',
				'emailID' => 'required'
			]);   */
		$validateRule = $validation->setRules([
				'firstname' => 'required',
				'emailID' => 'required'
			],
			[   // Errors
				'username' => [
					'required' => 'All accounts must have usernames provided',
				],
				'emailID' => [
					'required' => 'Your password is too short. You want to get hacked?'
				]
			]
		);
			if (!$validateRule){ 
				 $validateError = $this->validator;
			}
		}
	//	$validation->listErrors(); 
		return view('form', [
			'validation' => $validateError
		]); 
	}

	public function code($row1,$row2)
	{
		echo '=='.$row1.'====='.$row2;

	}
	public function test($row1)
	{
		echo 'Test=='.$row1.'=====';

	}
	public function codeImprove()
	{
		echo 'codeImprove== ';

	}
	
 
 
	//--------------------------------------------------------------------

}
