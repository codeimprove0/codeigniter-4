 <?= $this->extend('template/main'); ?>

 <?= $this->section('content'); ?>

 <?= $this->include('template/topbar'); ?>
 <div class="container">

     <h2>Add Form</h2>

     <div class="row">
         <div class="col-md-2"></div>
         <div class="col-md-8">
         
             <?php echo form_open('user/form',['name'=>'studentForm' ]); ?>

             <div class="form-group row">
                 <div class="col-sm-1"> </div>
                 <?php echo form_label('First Name', 'firstname', ['class' => 'col-sm-3']); ?>
                 <div class="col-sm-4">
                     <?php
                        $data = [
                            'type'  => 'text',
                            'name'  => 'firstname',
                            'id'    => 'firstname',
                            'value' => '',
                            'class' => 'form-control',
                            'placeholder' => 'Enter First Name'
                        ];
                        echo form_input($data);
                        ?>
                 </div>
             </div>

             <div class="form-group row">
                 <div class="col-sm-1"> </div>
                 <?php echo form_label('Email ID', 'emailID', ['class' => 'col-sm-3']); ?>
                 <div class="col-sm-4">
                     <?php
                        $data = [
                            'type'  => 'text',
                            'name'  => 'emailID',
                            'id'    => 'emailID',
                            'value' => '',
                            'class' => 'form-control',
                            'placeholder' => 'Enter Email ID'
                        ];
                        echo form_input($data);
                        ?>
                 </div>
             </div>

             <div class="form-group row">
                 <div class="col-sm-1"> </div>
                 <?php echo form_label('Phone No', 'phoneNo', ['class' => 'col-sm-3']); ?>
                 <div class="col-sm-4">
                     <?php
                        $data = [
                            'type'  => 'text',
                            'name'  => 'phoneNo',
                            'id'    => 'phoneNo',
                            'value' => '',
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
                     <?php echo form_submit('submit', 'Submit', ['class' => 'btn btn-primary']); ?>
                     <?php echo form_button('name', 'Back', ['class' => 'btn btn-danger']); ?>
                 </div>
             </div>

             <?php echo form_close(); ?>
         </div>
     </div>

 </div>

 <?= $this->endSection(); ?>