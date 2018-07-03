<?php 
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Software: Regex The Speed Inproved PHP Login, 
// Website & User Management
// CopyRight: Litos Media - Carlos Santos de Azevedo
// Contact: info@litos.top
// 08-2017
//#####################################################

include($_SERVER['DOCUMENT_ROOT']."/inc/db.php");
include($_SERVER['DOCUMENT_ROOT']."/inc/func.php");
include ("inc/admin_func.php");
include ("inc/admin_conf.php");
include ("inc/admin_login_required.php");
 



include ("header.php");
$update_db_link_active="active";
 
 
?>
 

<?php include ("sidebar.php");?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
 

    <!-- Main content -->
    <section class="content container-fluid">
 
 
 
 
 
 
 

 
 
                 
<div class="col-xs-12 col-sm-12 col-md-6 top30">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><i class="fa Database"></i> <?php echo _('Update The Regex Login Script');?> <small><?php echo _('This is just needed to run 1 time after you update the Script to the Last version');?></small></h3></div>

        <div class="box-body">
           
           
           
<?php
add_new_version($REGEX_VERSION);
/*$col_name_to_add,$table,$db_column_type*/	
add_column('use_ssl','site_options',' INT(1) NOT NULL DEFAULT "0" AFTER description');
add_column('recaptcha_support_site','site_options',' INT(1) NOT NULL DEFAULT "0" AFTER recaptcha_reset_pw'); 
add_column('recaptcha_contact_site','site_options',' INT(1) NOT NULL DEFAULT "0" AFTER recaptcha_reset_pw');
add_column('multilanguage_active','site_options',' INT(1) NOT NULL DEFAULT "0" AFTER lang_min');
add_column('site_support_email','site_options',' VARCHAR(255) NOT NULL AFTER site_email');
			
add_table('languages'); /*Ao adicionar tabelas nao esquecer atualizar o install.php*/
add_column('language_name','languages',' varchar(255) NOT NULL'); 
add_column('language_code','languages',' varchar(255) NOT NULL'); 
add_column('language_code_ini','languages',' varchar(255) NOT NULL');
add_column('lang_on','languages',' varchar(1) NOT NULL DEFAULT "0"');			
					
add_column('language','users',' varchar(50) NOT NULL DEFAULT "0" AFTER email');
drop_column('lang_min','site_options'); // colname, table 

			
echo ok_box(_('The Script was successful updated!'));
?>
               
               
               
               
               
                <style>
                    .alert.alert-danger {
                        display: none;
                    }
                </style>
        </div>

    </div>
</div>              



 
 
 
 
           
 
 
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  
 
<?php include ("sidebar_right.php");?>
<?php include ("footer.php");?>
<script src="../assets/js/ajaxForm.js"></script>
<script src="assets/js/admin_users.js"></script>
