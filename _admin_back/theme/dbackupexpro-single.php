<?php
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Software: DbackupeX Pro
// Mysql Database Backups Central
// CopyRight: Litos Media - Carlos Santos de Azevedo
// Contact: info@litos.top
#####################################################
include_once('theme/inc/dbackupexpro_admin_func.php');
include ("theme/dbackupexpro_header.php");
$DbackupeXPro= new DbackupeXPro();

if(isset($_POST['db_id'])){$db_id= htmlspecialchars($_POST['db_id']);} 
// else {header("Location: dbackupexpro-my-databases.php");die();}
 else {$db_id="";}
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Main content -->
<section class="content container-fluid">

 			
		
<!-- Content -->		
	
 
	
<!--#####################################################
// Database Backcups
#####################################################-->
<div class="col-xs-12 top30" id="list_result_box">
 <div class="box ">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-database"></i><sup> <i class="fa fa-cogs"></i> </sup> <?php echo _('Database Options');?> <span class="color-skin-dark"><?php echo _('ID:').$db_id.' - '.$DbackupeXPro->get_db($db_id,'title');?></span></h3>
</div> <!-- /.box-header -->           
           
 
      
<div class="box-body">               
           
         
	

 
	
		 	 
	
	
<!-- Left Column-->
<div class="col-md-6 col-sm-12 bottom20 ">
	
	
	
	
<!--   Drop down to select FTP Server-->
<div class="cabecalho-alert">	
<h3 class="box-title"><sup><i class="fa fa-cloud-upload"></i></sup> <i class="fa fa fa-server"></i> <?php echo _('Ftp Server');?></h3>
<form id="ftp_select_form_list">
<div class="input-group input-group-md">   
<select class="form-control col-sm-12"  id="selected_ftp" name="ftp_id">
<?php echo $DbackupeXPro->show_dropdown_ftp_list(htmlspecialchars($_POST['db_id']));?>
</select>
<div class="input-group-btn">
<button type="submit" class="btn btn-default btn-md bg-color-active"><i class="fa fa fa-server"></i><sup> <i class="fa fa-level-up"></i> </sup></button>
</div>
</div>
<input type="hidden" name="db_id" value="<?php echo htmlspecialchars($_POST['db_id']);?>">	
<input type="hidden" name="change_ftp_token" value="<?php echo $change_ftp_token;?>">
</form>
</div>
<div class="clearfix"></div>	
<!-- END Drop down --> 
	
	
	
 
	
<!-- Options -->                   
<div class=" col-sm-12 options-container nav-tabs-custom cabecalho-alert">

 
 
 <ul class="nav nav-tabs bar_tabs top20">
<li  class="active"><a href="#main-cronjob-options" data-toggle="tab"><i class="fa fa-clock-o"></i> <?php echo _('Auto Backups Options');?></a></li>	 
<li><a href="#backups_to_keep_options" data-toggle="tab"><i class="fa fa-hdd-o"></i> <sup><i class="fa fa-cog" ></i></sup> <?php echo _('Nr. of Backups to keep');?></a></li>
<li><a href="#onlythisdb" data-toggle="tab"><i class="fa fa-external-link"></i> <?php echo _('CronJob Link for external Cronjob Server');?></a>
</ul>	
	

<div class="tab-content ">

	

 
 
	
	
<!--  main-cronjob-options -->	
<div class="tab-pane active bottom30 " id="main-cronjob-options" > 
<form id="activate_main_cron_job_for_db" class="top20">	
<!--Checkbox -->
 <div class="col-xs-12 col-sm-12 top20">
<input type='checkbox' class="slide-check" value="1" name="main_cronjob_active" id="main_cronjob_active" <?php if($DbackupeXPro->get_db($db_id,'main_cronjob_active')==1){echo 'checked';}?> >
<label for="main_cronjob_active"><?php echo _('Server Auto Backups');?> <small><?php echo _('Activated/deactivated. Let the Server create backups of this database on the intervals you set!');?></small></label>
</div>	

	
<select class="form-control col-sm-3 left15 top10"  id="main_cronjob_interval" name="main_cronjob_interval">
<?php  echo $DbackupeXPro->show_main_cronjob_interval_list($db_id);?>	
</select>	
 
<input type="hidden" name="activate_main_cron_job_for_db_token" value="<?php echo $activate_main_cron_job_for_db_token;?>">
<input type="hidden" name="db_id" value="<?php echo $db_id;?>">	
</form>
 <div class="clearfix"></div>
<br>
<hr>      	
</div>
<!-- END main-cronjob-options -->	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
<!--  backups_to_keep_options -->
 <div class="tab-pane" id="backups_to_keep_options"> 
 
	<div class=" col-md-12 col-xs-12 col-sm-12 col-lg-6 top20 ">
		<h5><?php echo _('Nr. of Backups to keep Local');?> <br><small><?php echo _('Number of Backups that you want to keep on this Server.');?></small> </h5>
     <!--LOCAL-->
    <form id="set_backup_option">
        <div class="input-group input-group-lg top10 cabecalho-alert ">
            
            
  <input type="text" name="num_files_option" value="<?php echo $DbackupeXPro->get_db($db_id,'max_files_to_retain');?>" class="set_backup_option_input" required><a href="#" class="btn btn-xs btn-default" data-toggle="confirm" data-title="<?php echo _(" Please note that the oldest remaining Backups will be deleted. Save anyway? ");?>" data-btn-ok-label="<?php echo _(" Yes ");?>" data-btn-cancel-label="<?php echo _(" No! ");?>" show_single_backups_list_dbform_token="<?php echo $show_single_backups_list_dbform_token;?>" db_id="<?php echo $db_id;?>"><i class="fa fa-floppy-o"></i> <?php echo _('Save');?></a>
        </div>
        <input type="hidden" name="set_max_files_to_keep_dbform_token" value="<?php echo $set_max_files_to_keep_dbform_token;?>">
        <input type="hidden" name="db_id" value="<?php echo $db_id;?>">
    </form>
	 </div>
 
	
	 
		<div class=" col-md-12 col-xs-12 col-sm-12 col-lg-6 top20   ">
		 
		       
     <h5><?php echo _('Nr. of Backups to keep on the FTP Server');?><br><small><?php echo _('Number of Backups that you want to keep on the FTP Server.');?></small></h5>
               
		
		
                     	
    <form id="set_backup_option_ftp">
        <div class="input-group input-group-lg top10  cabecalho-alert" >
 
                <input type="text" name="num_files_option_ftp" value="<?php echo $DbackupeXPro->get_db($db_id,'max_files_to_retain_on_ftp');?>" class="set_backup_option_input" required><a href="#" class="btn btn-xs btn-default" data-toggle="confirm" data-title="<?php echo _(" Please note that the oldest remaining Backups will be deleted. Save anyway? ");?>" data-btn-ok-label="<?php echo _(" Yes ");?>" data-btn-cancel-label="<?php echo _(" No! ");?>" db_id="<?php echo $db_id;?>"><i class="fa fa-floppy-o"></i> <?php echo _('Save');?></a>
			
        </div>
        <input type="hidden" name="set_max_files_to_keep_ftp_dbform_token" value="<?php echo $set_max_files_to_keep_ftp_dbform_token;?>">
        <input type="hidden" name="db_id" value="<?php echo $db_id;?>">
    </form>
       </div>
	
	
	
<div class="clearfix"></div>
</div> 
<!-- END backups_to_keep_options -->	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
<!--  TAB Cronjob only this db--> 
<div class="tab-pane" id="onlythisdb">
	<div style="position: relative; margin-top: 60px" id="cron_link_container">
   		<h3 class="box-title"><i class="fa fa-magic"></i> <?php echo _('CronJob Link only for this Database');?> </h3>
		
   		<button class="btn btn-default btn-xs resete-tocken-button" db_id="<?php echo $db_id;?>" resete_cron_token_dbform_token="<?php echo $resete_cron_token_dbform_token;?>">
	   	<i class="fa fa-refresh" aria-hidden="true"></i>
   		<?php echo _('Resete Token');?>
   		</button>
		
   <span class="copied"><?php echo _('Copied!');?></span>
  		 <button class="btn btn-default  btn-xs copy-clip" data-clipboard-text="<?php echo $DbackupeXPro->dbackupexro_cronjob_url($db_id);?>"><i class="fa fa-clipboard"> </i>
  		 <?php echo _('Copy');?>
  		 </button>
		
   <code> <?php echo $DbackupeXPro->dbackupexro_cronjob_url($db_id);?></code>
		
</div>

	
	
<div class="cabecalho-alert info">	
<i class="fa fa-info-circle"></i> 
<?php echo _('If your Server or if your Hosting have no rights to access the crontab, use this link to make Backups by other server or by a Website for cronjobs.');?> 	
</div>
	
	
	
</div>
<!-- END TAB Cronjob only this db-->  	
	
	
	
	
</div> <!--Edn tab content -->
</div> <!-- END Options container-->
 <!--
#############################
END Cronjob tabs
############################
-->		
	
	
 
	
 <div class="clearfix"></div>	
 </div><!--END Left Column-->

 

	
	
	
	
<div class="col-md-6 col-sm-12 upload-container">
<!-- Upload -->	
<form method="post" action="dbackupexpro_ajax.php" class="upload_new_backup" enctype="multipart/form-data">
<input type="file" name="file" class="dropify" data-default-file="" data-max-height="" data-max-width="" data-max-file-size="" data-allowed-file-extensions="gz">
<br>
<input type="hidden" name="upload_backup_dbform_token" value="<?php echo $upload_backup_dbform_token;?>">
<input type="hidden" name="db_id" value="<?php echo $db_id;?>">
</form>
<!-- END Upload -->
	
	
<!-- add new-->                    
<a href="#" id="create_new_backup" class=" big_create_new_backup btn btn-default  btn-lg  bg-color-active top40" db_id="<?php echo $db_id;?>" create_new_backup_dbform_token="<?php echo $create_new_backup_dbform_token; ?>" show_single_backups_list_dbform_token="<?php echo $show_single_backups_list_dbform_token;?>" > <?php echo _('Create a new Backup now');?> <i class="fa fa-database"></i><sup style="margin-left: 5px;"><i class="fa fa-plus"></i></sup></a>                        
<!-- END add new-->   
	
	
</div>
<div class="clearfix"></div>	
                      
                  
               
                                     
                  
	
	
	
	
	
	
	
	
	
	
	
<!-- Parcial backups -->
<div class="col-md-12 col-sm-12 partial-backup-options-container">
<div class="cabecalho-alert info">	
<h3 class="box-title"><i class="fa fa-database"></i> <i class="fa fa-ellipsis-v"></i> <?php echo _('Partial Database Backup');?> 
<sup class="balao" title="<?php echo _('If activated, only the selected tables will be on all future backups for this database. If deactivated a Full Database Dump backup will be made. (Please note that you are able to restore just some tables also from a Full Database Dump backup, but it is recommended to use parcial backups if you just need some tables!)');?>"><i class="fa fa-info-circle"></i></sup></h3>
<form id="backup_partial_form">
    

	
<!--Checkbox -->
 <div class="col-xs-12 col-sm-12 top20">
<input type='checkbox' class="slide-check" value="1" name="parcial_tables_activated" id="parcial_tables_activated" <?php if($DbackupeXPro->get_db($db_id,'parcial_tables_activated')==1){echo 'checked';}?> > 
<label for="parcial_tables_activated" style="margin-top: -5px"><?php echo _('Activate / Deativate Parcial Backups');?> <br> <small><?php echo _('Select the tables that will be on all backups for this Database');?></small>
</label>
</div>


	


	
<div  id="tables_checkbox_container" class="col-xs-12 col-sm-12 top20">
<?php echo $DbackupeXPro->dbackupexro_get_checkbox_backup_parcial_tables(htmlspecialchars($db_id));?>	


	
<hr>	
<button type="submit"  class="btn btn-md btn-default"><?php echo _('Save the Partial backup options');?></button> 	
</div>
	
	
	
	
<div class="clearfix"></div>
<input type="hidden" name="db_id" value="<?php echo htmlspecialchars($db_id);?>">	
<input type="hidden" name="change_partional_backup_token" value="<?php echo $change_partional_backup_token;?>">
</form>
</div>
</div> 
<div class="clearfix"></div>	
<!-- END Parcial backups -->
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
                                      
<!-- List -->      
	
<div class="box-header top30"><h3 class="box-title"><i class="fa fa-hdd-o"></i> <?php echo _('Local Backup List');?> </h3></div>
<div class="col-sm-12 " id="backup_list_container">	
<?php $DbackupeXPro->dbackupexro_get_backup_list($db_id);?>	
</div>
	
	
	
	
	
	
	
 
	
	
	
	
	
             
 
</div><!-- end box body //-->    
</div><!-- end box //-->    
</div><!-- end col-xs-12 //-->
<!--#####################################################
// END Database Backcups
#####################################################-->
	
	
	
	
	 
	
	
	
	
	
	
	
	
 
	
	
	
	
	
	
	
	
	
	
	
<!-- END Content -->	
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

 <?php 
include ("theme/dbackupexpro_footer.php");
?>
 
<script>$("#backup_partial_form .form-check-input:checkbox").butoes();</script>';