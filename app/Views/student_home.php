 <?= $this->extend('template/main'); ?>

 <?= $this->section('content'); ?>

 <?= $this->include('template/topbar'); ?>
 <div class="container">

     <h2>Home Page</h2>

     <?php
        echo session()->getFlashdata('addMsj'); ?>

     <div class="row">
         <div class="col-md-2"></div>
         <div class="col-md-8">
             <table class="table table-bordered">
                 <thead>
                     <tr>
                         <th>Name</th>
                         <th>Email</th>
                         <th>Phone</th>
                         <th>Action</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php foreach ($record as $val) { ?>
                         <tr>
                             <td><?php echo $val['name']; ?></td>
                             <td><?php echo $val['email_id'];?></td>
                             <td><?php echo $val['phone_no'];?></td>
                             <td>
                                <a href="<?php echo base_url().'/student/edit/'.$val['id']; ?>"><button class="btn btn-primary">Edit</button></a>
                                <a href="<?php echo base_url().'/student/delete/'.$val['id']; ?>"><button class="btn btn-danger">Delete</button></a>
                            </td>
                         </tr>
                     <?php }  ?>
                 </tbody>
             </table>
             <div>
             <?php echo $pager->links('default','full_pagination');
             //echo $pager->simpleLinks();
             ?>
             <div>
         </div>
     </div>
 </div>

 </div>

 <?= $this->endSection(); ?>