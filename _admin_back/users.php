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
include ("sidebar.php");
?>
 

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Main content -->
    <section class="content container-fluid">
 
 
 
 
 
 <div class="col-xs-12 top30">
 <div class="box ">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-users" ></i> <?php echo _('Users');?> <small>- <?php echo _('Manage your users!');?></small></h3>
				 
            

<div class="box-tools">
                <div class="input-group input-group-sm" style="width: 250px;">
                  <input type="text" name="s" id="s" class="form-control pull-right" placeholder="<?php echo _('Search');?>">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    
                  </div>
                </div>
          </div>
           
 
</div> <!-- /.box-header -->           
           
 
           
<div class="box-body">             
           
 

            
                
                
<div  id="users_result" style="overflow:auto;"> </div>
             
             







 







</div><!-- end box body //-->    
</div><!-- end box //-->    
</div><!-- end col-xs-12 //-->

 
 
  
 
 

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  
 
<?php include ("sidebar_right.php");?>
<?php include ("footer.php");?>

 

<script src="assets/js/admin_users.js"></script>

 