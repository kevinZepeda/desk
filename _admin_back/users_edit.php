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
$users_link_active="active";
$client= new client();
$lang= new lang();
include ("sidebar.php");
?>
 



<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content container-fluid ">
 
 
 
 
 
 
 

<!-- ==================== User Data  ==================== -->         
 
                 
<div class="col-xs-12 col-sm-12 col-md-6 " > 
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user ">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-color-active">
              <h3 class="widget-user-username"><?php echo $client->get_client('username',$_GET['id']);?></h3>
              <h5 class="widget-user-desc"><?php echo  $client->print_user_role($_GET['id']);?></h5>
            </div>
            <div class="widget-user-image"> 
              <div class="edit_user_avatar_container"><div class="edit_user_avatar_img" style="background-image: url(<?php echo $client->get_client_avatar($_GET['id']);?>)"></div></div>
            </div>
            <div class="box-footer">
              <div class="row">
      
    
                
                
       <div class="box-body" >
                  <form class="form-horizontal account_ajax_send" style="padding-left:10px; padding-right:10px;">
                    <div class="form-group">
                      <label for="input1" class="col-sm-12"><?php echo _('Name');?></label>
                      <div class="col-sm-12">
                     
                        <input required id="input1" type="text" class="form-control" name="username"  value="<?php echo $client->get_client('username',$_GET['id']);?>">
                         
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="input3" class="col-sm-12"><?php echo _('Email');?></label>
                      <div class="col-sm-12">
                        <input required type="email" class="form-control" name="email"  value="<?php echo $client->get_client('email',$_GET['id']);?>">
                      </div>
                    </div>

                    <hr>
                    
                      <div class="form-group">
                      <label class="col-sm-12"><?php echo _('User Role');?></label>
                      <div class="col-sm-12">
                      <select name="role" class="form-control" >
                      
                      
                      <?php if($client->get_client('role',$_GET['id'])=="super_admin"){ ?>
                      <option disabled value="super_admin" selected><?php echo _('Master Administrator');?></option>
                      <?php }else{ ?>
                      
                      
                      <option value="admin" <?php if($client->get_client('role',$_GET['id'])=="admin"){echo "selected";};?>><?php echo _('Administrator');?></option>
                      
                      
                      <?php } ?>
                      </select>
                      </div>
                    </div>
                    
                    
                    
                    <?php if (get_website('multilanguage_active') =='1'): ?>
                    <div class="form-group">
                    <label class="col-sm-12"><?php echo _('Language');?></label>
                    <div class="col-sm-12">
                    <select class="form-control col-sm-12" name="user_language">
                    <?php echo $lang->get_lang_drop_down_for_users($_GET['id'], $client->get_client('language',$_GET['id']));?>	
                    </select>
                    </div>
                    </div>
                    <?php endif; ?>
                   

                    <div class="form-group">
                    <label class="col-sm-12"><?php echo _('Profile Headline');?></label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control"  name="profile_headline" value="<?php echo $client->get_client('profile_headline',$_GET['id']);?>">
                    </div>
                    </div>

                   
                   
                   
                    <div class="form-group">
                      <label class="col-sm-12"><?php echo _('Location');?></label>
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="location" value="<?php echo $client->get_client('location',$_GET['id']);?>">
                      </div>
                    </div>
 
                    <div class="form-group">
                      <label for="input6" class="col-sm-12"><?php echo _('Profile Description');?></label>
                      <div class="col-sm-12">
                        <textarea class="form-control" rows="4" id="input6" name="profile_description"><?php echo $client->get_client('profile_description',$_GET['id']);?></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-1 col-sm-10">
                        <input type="hidden" name="update_user_info" value="er34tf8fh23eww">
                        <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                        <button class="btn btn-default btn-block  btn-sm bg-color-active " type="submit"><?php echo _('Save changes');?></button>
                      </div>
                    </div>

                  </form>
                </div>         
                
     
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        
             
    
 </div>              
<!-- ==================== END User Data  ==================== -->



 
 
 
 
 
 
 
 <div class="row">
<!-- ==================== AVATAR  ==================== -->
<div class="col-xs-12 col-sm-12 col-md-4 ">
<div class="info-box">
<span class="info-box-icon bg-color-active"><i class="ti-image"></i></span>
<div class="info-box-content">
<span class="info-box-text"><?php echo _('User Avatar');?></span>
 <br>  
<form method="post" action="users_ajax.php" class="send_avatar" enctype="multipart/form-data">
<input type="file" name="file" class="dropify" data-default-file="<?php echo $client->get_client_avatar($_GET['id']);?>" data-max-height="6000" data-max-width="6000" data-max-file-size="<?php echo get_website('avatar_upload_max_size');?>M" >
<br>
<input type="hidden" name="send_avatar" value="684geg4545/6z565/943">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">



<a user_id="<?php echo $_GET['id'];?>" id="rotate_left" class="btn btn-default btn-xs bg-color-active" href="#">
<i class="fa fa-undo"></i> <?php echo _('Rotate');?></a>


<a user_id="<?php echo $_GET['id'];?>" id="rotate_right" class="btn btn-default btn-xs bg-color-active" href="#"><i class="fa fa-repeat" aria-hidden="true"></i> <?php echo _('Rotate');?></a> 



<br>
<button style=" visibility:hidden" class="btn  btn-default btn-sm" id="save_avatar" type="submit"> <?php echo _('Save avatar');?></button>
</form>  
</div><!-- /.info-box-content -->
            
</div>
</div>         
<!-- ==================== END AVATAR  ==================== -->              
       
       
       
       
       
       
       
       
       
       
       
       
<!-- ==================== Password ==================== -->       
<div class="col-xs-12 col-sm-12 col-md-4 ">
<div class="info-box">
<span class="info-box-icon bg-color-active"><i class="ti-lock"></i></span>
<div class="info-box-content">
<span class="info-box-text"><?php echo _('User Password');?></span>
<br>    
<form class="form-horizontal ajax_send">
                 
                 
 
                    <div class="form-group">
                      <label for="input2" class="col-sm-8"><?php echo _('New password');?></label>
                      <div class="col-sm-12">
                        <input type="password" class="form-control" id="input2" name="new_pw">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="input3" class="col-sm-8"><?php echo _('Re-type new password');?></label>
                      <div class="col-sm-12">
                        <input type="password" class="form-control" id="input3" name="pw_confirm">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-1 col-sm-10">
                        <input type="hidden" value="z6j8t68j46/jz467/*7u/67" name="minha_conta_change_pw">
                        <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                        <button class="btn btn-default btn-block btn-sm bg-color-active" type="submit"><?php echo _('Save changes');?></button>
                      </div>
                    </div>
                  </form>      
       
              
</div><!-- /.info-box-content -->
            
</div>
</div>   
<!-- ==================== END Password ==================== --> 
</div><!--//end row-->
      
 
 
 
 
    
 













 

 
 
  
 
 

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  
 
<?php include ("sidebar_right.php");?>
<?php include ("footer.php");?>
<script src="../assets/js/ajaxForm.js"></script>
<script src="assets/js/admin_users.js"></script>
