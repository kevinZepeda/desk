<?php 
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Software: Regex The Speed Inproved PHP Login, 
// Website & User Management
// CopyRight: Litos Media - Carlos Santos de Azevedo
// Contact: info@litos.top
// 07-2017
#####################################################
include($_SERVER['DOCUMENT_ROOT']."/inc/db.php");
include($_SERVER['DOCUMENT_ROOT']."/inc/func.php");
include ("inc/admin_func.php");
include ("inc/admin_conf.php");
include ("inc/admin_login_required.php");
include ("header.php");
$client= new client();
include ("sidebar.php");
?>
 


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content container-fluid">
 
 
 
  

<!-- ==================== User Data  ==================== -->         
 
                 
<div class="col-xs-12 col-sm-12 col-md-6 top30" >  
<div class="box">    
 <div class="box-header">
 <h3 class="box-title"><i class="fa fa-user-plus"></i> <?php echo _('Add User');?> <small><?php echo _('Manage your users!');?></small></h3></div>
 


      
    
              
                
       <div class="box-body" >
                  <form class="form-horizontal ajax_new_user" style="padding-left:10px; padding-right:10px;">
                    <div class="form-group">
                      <label for="input1" class="col-sm-12"><?php echo _('Name');?></label>
                      <div class="col-sm-12">
                     
                        <input required id="input1" type="text" class="form-control" name="username" >
                         
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="input3" class="col-sm-12"><?php echo _('Email');?></label>
                      <div class="col-sm-12">
                        <input required type="email" class="form-control" name="email" >
                      </div>
                    </div>

			
					  
					   <div class="form-group">
                      <label for="input3" class="col-sm-12"><?php echo _('User Password');?></label>
                      <div class="col-sm-12">
                        <input required type="password" class="form-control" name="pw" >
                      </div>
                    </div>
					  
					     <div class="form-group">
                      <label for="input3" class="col-sm-12"><?php echo _('Re-type password');?></label>
                      <div class="col-sm-12">
                        <input required type="password" class="form-control" name="pw_confirm" >
                      </div>
                    </div>
					  
					  
				 
  
					   <div class="form-group">
                      <label class="col-sm-12"><?php echo _('Location');?></label>
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="location" >
                      </div>
                    </div>
					  
					  
					  
                    <hr>
                    
                      <div class="form-group">
                      <label class="col-sm-12"><?php echo _('User Role');?></label>
                      <div class="col-sm-12">
                      <select name="role" class="form-control" >
         
                      <option value="admin" ><?php echo $client->print_role('admin');?></option>
                      
                  
                      
                      
                      
                      
                      </select>
                      </div>
                    </div>
					  
                    

                    <div class="form-group">
                    <label class="col-sm-12"><?php echo _('Profile Headline');?></label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control"  name="profile_headline"  > 
                    </div>
                    </div>

                   
 
                    <div class="form-group">
                      <label for="input6" class="col-sm-12"><?php echo _('Profile Description');?></label>
                      <div class="col-sm-12">
                        <textarea class="form-control" rows="4" id="input6" name="profile_description"> </textarea> 
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-10 col-sm-offset-1 ">
                        <input type="hidden" name="admin_create_user" value="er34tf8fh23egeghrh34g45t43w">
                        <button class="btn btn-default  btn-sm btn-block bg-color-active " type="submit"><?php echo _('Create a new user');?></button>
                      </div>
                    </div>

                  </form>
                </div>         
                
     
             
        
 
        
   </div>          
    
 </div>              
<!-- ==================== END User Data  ==================== -->



 
 
 
 
           
       
       
       
       
       
       
     
 
 
  
 
  

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  
 
<?php include ("sidebar_right.php");?>
<?php include ("footer.php");?>
<script src="../assets/js/ajaxForm.js"></script>
<script src="assets/js/admin_users.js"></script>
