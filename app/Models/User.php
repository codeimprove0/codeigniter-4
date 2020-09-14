<?php namespace App\Models;

use CodeIgniter\Model; 

class User extends Model
{
	 
 public function  record(){
	 
	/* $builder = $this->db->table('user_info');
	$builder->select('name');
	$result = $builder->get()->getResult();
	echo $this->db->getLastQuery();   */

	// INSERT 
	/* $builder = $this->db->table('user_info');

	$data = [
		'name' => 'jerrry',
		'email_id'  => 'jerrry@gmail.com',
		'admission_no'  => 'J112122',
		'phone_no' =>'7800098009'
	];

	$get = $builder->insert($data);
	echo $this->db->InsertID(); */


	// INSERT BATCH 
	/* $builder = $this->db->table('user_info');
	$data = [
		[
			'name' => 'jerrry',
			'email_id'  => 'jerrry@gmail.com',
			'admission_no'  => 'J112122',
			'phone_no' =>'7800098009'
		],
		[
			'name' => 'tom',
			'email_id'  => 'tom@gmail.com',
			'admission_no'  => 'T312122',
			'phone_no' =>'7832098009'
		],
	
	];
	
	$builder->insertBatch($data); */

	// Update 

	/* $builder = $this->db->table('user_info');

	$data = [
		'name' => 'jerrry2',
		'email_id'  => 'jerrry2@gmail.com', 
	];

	$builder->where('id','23');
	$get = $builder->update($data); */



	// update batch 
	/* $builder = $this->db->table('user_info');  
	$data = [
			 [
				'id' =>'23',
				'name' => 'Vishnu22',
				'email_id'  => 'vishnu121@gmail.com', 
			], [
				'id' => '24',
				'name' => 'Tailss',
				'email_id'  => 'tails2@gmail.com', 
			]
		];
	$builder->updateBatch($data, 'id'); */

	// delete 
/* 	$builder = $this->db->table('user_info');  

	$builder->delete(['id'=>24]); */
 
	// truncate 
	/* $builder = $this->db->table('subject'); 
	$builder->truncate();  */


/* 	$builder = $this->db->table('user_info');
	$builder->select(['user_login.id','name']);
	$builder->join('user_login','user_login.id=user_info.id');
	

	$builder->where(['name'=>'test','user_login.id'=>3]);
	$builder->orwhere(['name'=>'test2']);

	$builder->like('name','test');  // before, after, both

	// IN 
	$names = ['Frank', 'Todd', 'James'];
	$builder->whereIn('name', $names);

	$names = ['Frank', 'Todd', 'James'];
	$builder->whereNotIn('name', $names);
	 
	$builder->orwhereNotIn('name', $names);


	// group by 
	$builder->groupBy(['name','user_login.id']);
	$builder->having('name','test');

	$builder->orderBy('name','ASC');
	$builder->orderBy('user_login.id','DESC');

	$builder->limit(10,12);

	$result  = $builder->get()->getResult(); */


	$builder = $this->db->table('user_info'); 
	/* $builder->select('*')
        ->groupStart()
                ->where('name', 'a')
                ->orGroupStart()
                        ->where('email_id', 'test@gmail.com')
                        ->where('phone_no', '8989000098')
                ->groupEnd()
        ->groupEnd()
        ->where('id', '3')
->get(); */

// method chaining 

$query = $builder->select('name')
                 ->where('id', 2)
                 ->limit(10, 20)
                 ->get();

	echo $this->db->getLastQuery(); 



	return '';
 }
 
	//--------------------------------------------------------------------

}
