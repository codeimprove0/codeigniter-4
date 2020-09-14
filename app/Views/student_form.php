 <?= $this->extend('template/main'); ?>

 <?= $this->section('content'); ?>

 <?= $this->include('template/topbar'); ?>
 <div class="container">

     <h2>Add Form</h2>
     <?php      
      echo session('name');
     if(session()->has('username')){
         echo "yes";
     }
     echo session('username');
            /* if($validation){ 
                echo $validation->listErrors('my_list');
             }  */  
             ?>
     <div class="row">
         <div class="col-md-2"></div>
         <div class="col-md-8">
            
             <?php
            if($pageType =='Add'){
                $formType = 'student/add';
            }else{
                $formType = 'student/edit/'.$editInfo['id'];
            }
             echo form_open($formType,['name'=>'studentForm']); ?>

             <div class="form-group row">
                 <div class="col-sm-1"> </div>
                 <?php echo form_label('First Name', 'firstname', ['class' => 'col-sm-3']); ?>
                 <div class="col-sm-4">
                     <?php
                        $data = [
                            'type'  => 'text',
                            'name'  => 'firstname',
                            'id'    => 'firstname',
                            'value' => (isset($editInfo))? $editInfo['name']: set_value('firstname'),
                            'class' => 'form-control',
                            'placeholder' => 'Enter First Name'
                        ];
                        echo form_input($data);
                        ?>
                 </div> 
             </div>  
             <?php
            if($validation){ 
                 if($validation->hasError('firstname')){
                     echo $validation->showError('firstname','my_single');
                 }
             }   
             ?>
             <div class="form-group row">
                 <div class="col-sm-1"> </div>
                 <?php echo form_label('Email ID', 'emailID', ['class' => 'col-sm-3']); ?>
                 <div class="col-sm-4">
                     <?php
                        $data = [
                            'type'  => 'text',
                            'name'  => 'emailID',
                            'id'    => 'emailID',
                            'value' => (isset($editInfo))? $editInfo['email_id']: set_value('emailID'), 
                            'class' => 'form-control',
                            'placeholder' => 'Enter Email ID'
                        ];
                        echo form_input($data);
                        ?>
                 </div>
             </div>
             <?php
            if($validation){ 
                 if($validation->hasError('emailID')){
                     echo $validation->showError('emailID','my_single');
                 }
             }   
             ?>
             <div class="form-group row">
                 <div class="col-sm-1"> </div>
                 <?php echo form_label('Phone No', 'phoneNo', ['class' => 'col-sm-3']); ?>
                 <div class="col-sm-4">
                     <?php
                        $data = [
                            'type'  => 'text',
                            'name'  => 'phoneNo', 
                            'value' => set_value('phoneNo'),
                            'value' => (isset($editInfo))? $editInfo['phone_no']: set_value('phoneNo'),
                            'class' => 'form-control',
                            'placeholder' => 'Enter Phone No'
                        ];
                        echo form_input($data);
                        ?>
                 </div>
             </div>

             <div class="form-group row">
                 <div class="col-sm-4"> </div>
                 <div class="col-sm-4">
                     <?php echo form_submit('submit', $pageType, ['class' => 'btn btn-primary']); ?>
                     <a href="<?php echo base_url().'/student/'; ?>"><?php echo form_button('name', 'Back', ['class' => 'btn btn-danger']); ?> </a>
                 </div>
             </div>

             <?php echo form_close(); ?>
         </div>
     </div>

 </div>

 <?= $this->endSection(); ?>