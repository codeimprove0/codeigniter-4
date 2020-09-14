<?php namespace App\Controllers;
    
use CodeIgniter\HTTP\Request;
use  App\Models\StudentModel;
class Student extends BaseController
{ 
	public $studentModel;
	public function __construct()
	{ 
		$this->studentModel = new StudentModel();
	}
	public function index()
	{	   
		$data = ['name'=>'Test','username'=>'Code Improve Site'];
		$this->session->set($data);
		$this->session->setFlashdata('item', 'value'); 
	//	$record = $this->studentModel->findAll();
		//$record = $this->studentModel->findAll(3,2); 
		$responseArray = [];
		$responseArray['link'] = 'home';
		$responseArray['record'] = $this->studentModel->join('user_info','user_info.id=student.id')->whereIn('student.id',[1,2,3,4,5,6,7,8])->orderBy('student.name','DESC')->paginate();  
	//	echo $this->db->getLastQuery();
		$responseArray['pager'] =  $this->studentModel->pager;
		return view('student_home', $responseArray);
	}

	public function remove()
	{	   
		$this->session->remove('username');
		//$this->session->destroy();
	}

 
	public function add()
	{     
		//echo  $this->request->uri; 
		$responseArray = [];
		 if($this->uri->getSegment(3)){
			 $responseArray['pageType'] = 'Update'; 
			 $editId = $this->uri->getSegment(3);
			 $responseArray['editInfo'] = $this->studentModel->find($editId);   
		 }else{
			$responseArray['pageType'] = 'Add'; 
		 }
		$validations = [];	
		//echo $this->session->getFlashdata('item');  
	///	echo $this->session->get('username');
	
		if($this->request->getMethod()=='post'){

			$validation = \Config\Services::validation();

			  $validations = $this->validate([
				'firstname' => [
					'rules'  => 'required',
					'errors' => [
						'required' => 'You must choose a Firstname.'
					]
				],
				'emailID'    => [
					'rules'  => 'required|valid_email',
					'errors' => [
						'valid_email' => 'Please check the Email field. It does not appear to be valid.',
						'required'=>"Email ID Must be filled"
					]
				],
			]);  
			
			if(!$validations){ 
					 $validations = $this->validator;
			}else{ 

				 $data['name']  = $this->request->getPost('firstname');
				 $data['email_id']  = $this->request->getPost('emailID');
				 $data['phone_no']  = $this->request->getPost('phoneNo');
				 if($responseArray['pageType']=='Add'){
					$response  = $this->studentModel->save($data);
					$this->session->setFlashdata('addMsj', 'Record added successfully.');
				 }else{
					$this->session->setFlashdata('addMsj', 'Record updated successfully.');
					$response  = $this->studentModel->update($editId,$data);
				 }
				 
				 if(!$response){
					$this->session->setFlashdata('addMsj', 'something went wrong!');
				 } 
				return redirect()->to('/student'); 
			} 

		}
		$responseArray['validation'] = $validations;
		$responseArray['link'] = $this->uri->getSegment(2);
		return view('student_form',$responseArray); 
	}
 
	 public function deleteRecord($id){
		$response = 	$this->studentModel->delete($id);
		if($response){
			$this->session->setFlashdata('addMsj', 'Record deleted successfully.');
		}else{
			$this->session->setFlashdata('addMsj', 'something went wrong!');
		}
		return redirect()->to('/student');  
	 }
 
 
	//--------------------------------------------------------------------

}
