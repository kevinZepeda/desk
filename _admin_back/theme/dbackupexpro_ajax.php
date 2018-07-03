<?php
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Software: DbackupeX Pro
// Mysql Database Backups Central
// CopyRight: Litos Media - Carlos Santos de Azevedo
// Contact: info@litos.top
#####################################################
include("../../inc/db.php");
include("../../inc/func.php");
include ("../inc/admin_func.php");
include ("../inc/admin_conf.php");
include ("../inc/admin_login_required.php");
include_once('inc/dbackupexpro_admin_func.php');


$DbackupeXPro= new DbackupeXPro();
 
 

//#####################################################
// Add new DB
#####################################################
if(isset($_POST['add_new_dbform_token'])){
if($add_new_db_token == $_POST['add_new_dbform_token']){
if($demo_on==1)die('<i class="fa fa-exclamation-triangle"></i> '._('This Feature ist disabled on the Demo for security reasons.'));	
	
$add = $DbackupeXPro-> add_new_db($_POST['title'],$_POST['host'],$_POST['name'],$_POST['user'],$_POST['pw']);
if ($add === true) {die(_('Your new database was sucessfully saved'));}else{die(_('<i class="fa fa-exclamation-triangle"></i> it was not possible to create a new Db.'));}
}else{die('<i class="fa fa-exclamation-triangle"></i> '._('The Session is expired. Please reload your Browser'));}
}




//#####################################################
// search
#####################################################
if(isset($_GET['procura_form_token'])){
if($procura_form_token == $_GET['procura_form_token']){ 
$DbackupeXPro->get_all_db(@$_GET['s']);
}else{die('<i class="fa fa-exclamation-triangle"></i> '._('The Session is expired. Please reload your Browser'));}
}

 


//#####################################################
// search FTP
#####################################################
if(isset($_GET['procura_ftp_form_token'])){
if($procura_ftp_form_token == $_GET['procura_ftp_form_token']){ 
$DbackupeXPro->get_all_ftp(@$_GET['s']);
}else{die('<i class="fa fa-exclamation-triangle"></i> '._('The Session is expired. Please reload your Browser'));}
}



 
//#####################################################
// Edit Database
#####################################################
if(isset($_POST['edit_dbform_token'])){
if($edit_dbform_token == $_POST['edit_dbform_token']){
if($demo_on==1)die('<i class="fa fa-exclamation-triangle"></i> '._('This Feature ist disabled on the Demo for security reasons.'));		
 
$id= $_POST['database_id'];
 
$edit = $DbackupeXPro->update_db($_POST['title'],$_POST['host'],$_POST['name'],$_POST['user'],$_POST['pw'],$id);
 
	
if ($edit === true) {die(_('Database sucessfully updated'));}else{die(_('<i class="fa fa-exclamation-triangle"></i> it was not possible to update.'));}
}else{die('<i class="fa fa-exclamation-triangle"></i> '._('The Session is expired. Please reload your Browser'));}
}




 


//######################################
//  Apagar DB
//###################################### 
if (isset($_POST['delete_dbform_token'])) {
if ($_POST['delete_dbform_token'] == $delete_dbform_token) {	
if($demo_on==1)die('<i class="fa fa-exclamation-triangle"></i> '._('This Feature ist disabled on the Demo for security reasons.'));		
 
$DbackupeXPro->dbackupexro_del($_POST['db_to_delete']); 
 
if(is_dir($BACKUPS_PATH.$_POST['db_to_delete'])) {die('<i class="fa fa-exclamation-triangle"></i> '._('The Database could not be deleted!'));} 
else {die(_('Database and Backups sucessfuly deleted.'));}
	
}
	else{die('<i class="fa fa-exclamation-triangle"></i> '._('The Session is expired. Please reload your Browser'));}		
}




 




//######################################
//  Resete Cronjob Token
//###################################### 
if (isset($_POST['resete_cron_token_dbform_token'])) {
if ($_POST['resete_cron_token_dbform_token'] == $resete_cron_token_dbform_token) {	
 
$new_cronjob_token= bin2hex(random_bytes(10));
$DbackupeXPro->update_db_single('cronjob_token',$new_cronjob_token, htmlspecialchars($_POST['id']));
echo $DbackupeXPro->dbackupexro_cronjob_url($_POST['id']);
}
	else{die('<i class="fa fa-exclamation-triangle"></i> '._('The Session is expired. Please reload your Browser'));}		
}

















 








//######################################
//  Activate main(SERVER) cronjob for db
//###################################### 
if (isset($_POST['activate_main_cron_job_for_db_token'])) {
if ($_POST['activate_main_cron_job_for_db_token'] == $activate_main_cron_job_for_db_token) {	
if($demo_on==1)die('<i class="fa fa-exclamation-triangle"></i> '._('This Feature ist disabled on the Demo for security reasons.'));		

 
if(empty($_POST['main_cronjob_active'])){$main_cronjob_active='0';} elseif($_POST['main_cronjob_active'] ==1){$main_cronjob_active=1;}
	
$DbackupeXPro->Dbackupex_set_server_cronjob($_POST['db_id'],$_POST['main_cronjob_interval'],$main_cronjob_active);
	
echo _('The changes have been saved.');
}
	else{die('<i class="fa fa-exclamation-triangle"></i> '._('The Session is expired. Please reload your Browser'));}		
}
























//######################################
//  Chnage the nr. Files to retain local
//###################################### 
if (isset($_POST['set_max_files_to_keep_dbform_token'])) {
if ($_POST['set_max_files_to_keep_dbform_token'] == $set_max_files_to_keep_dbform_token) {	
global $BACKUPS_PATH; 
$db_id= htmlspecialchars($_POST['db_id']);
$novo_nr= htmlspecialchars($_POST['num_files_option']);
$backups_dir= $BACKUPS_PATH.$db_id.'/';
	
if(isset($_POST['num_files_option'])){
$DbackupeXPro->update_db_single('max_files_to_retain',$novo_nr,$db_id);	
$DbackupeXPro->limpar_backups_nr_limite($backups_dir,$novo_nr);
die(_('Option Sucessfully Saved!'));
	
}else{ die('<i class="fa fa-exclamation-triangle"></i> '._('You must set a least 1 Backup to keep'));}
 

}
	else{die('<i class="fa fa-exclamation-triangle"></i> '._('The Session is expired. Please reload your Browser'));}		
}




//##########################################
//  Chnage the nr. Files to retain in ftp
//##########################################
if (isset($_POST['set_max_files_to_keep_ftp_dbform_token'])) {
if ($_POST['set_max_files_to_keep_ftp_dbform_token'] == $set_max_files_to_keep_ftp_dbform_token) {	

$db_id= htmlspecialchars($_POST['db_id']);
$novo_nr= htmlspecialchars($_POST['num_files_option_ftp']);
	
if(isset($_POST['num_files_option_ftp'])){
$DbackupeXPro->update_db_single('max_files_to_retain_on_ftp',$novo_nr,$db_id);	
die(_('Option Sucessfully Saved!'));
	
}else{ die('<i class="fa fa-exclamation-triangle"></i> '._('You must set a least 1 Backup to keep'));}
 

}
	else{die('<i class="fa fa-exclamation-triangle"></i> '._('The Session is expired. Please reload your Browser'));}		
}






//######################################
//  Show single Backups list
//###################################### 
if (isset($_GET['show_single_backups_list_dbform_token'])) {
if ($_GET['show_single_backups_list_dbform_token'] == $show_single_backups_list_dbform_token) {	
	
if(isset($_GET['pagina'])){$pagina=$_GET['pagina'];}else $pagina= NULL;
 
$DbackupeXPro->dbackupexro_get_backup_list($_GET['db_id'],$pagina);
}
	else{die('<i class="fa fa-exclamation-triangle"></i> '._('The Session is expired. Please reload your Browser'));}		
}

	


//######################################
// Create new Backup
//###################################### 
if (isset($_POST['create_new_backup_dbform_token'])) {
if ($_POST['create_new_backup_dbform_token'] == $create_new_backup_dbform_token) {	
$DbackupeXPro->dbackupexro_new_backup(htmlspecialchars($_POST[('db_id')]));
}
	else{die('<i class="fa fa-exclamation-triangle"></i> '._('The Session is expired. Please reload your Browser'));}		
}





 
//#####################################################
// Del Backup
//#####################################################		
if (isset($_POST['del_backup_dbform_token'])) {
if ($_POST['del_backup_dbform_token'] == $del_backup_dbform_token) {	
$DbackupeXPro->dbackupexro_del_backup( htmlspecialchars($_POST[('db_id')]) , htmlspecialchars($_POST['file']) );
}
	else{die('<i class="fa fa-exclamation-triangle"></i> '._('The Session is expired. Please reload your Browser'));}		
}





 


//#####################################################
// Save que tables serao feitas backup se usar partial  
//#####################################################		
if (isset($_POST['change_partional_backup_token'])) {
if ($_POST['change_partional_backup_token'] == $change_partional_backup_token) {	
	
if(empty($_POST['parcial_tables_activated'])){$_POST['parcial_tables_activated'] = 0;}
	
	
//desativar pela certa caso nao tenha escolhido tabelas
if($_POST['parcial_tables_activated']==1 && empty($_POST['tables'])){$DbackupeXPro->update_db_single('parcial_tables_activated',0,$_POST['db_id']);}	
	
if(empty($_POST['tables']) && $_POST['parcial_tables_activated'] ==1){die('<i class="fa fa-exclamation-triangle"></i> '._('Please choose a least one Table to use Parcial Backups!'));}

	
$DbackupeXPro->update_db_single('parcial_tables_activated',$_POST['parcial_tables_activated'],$_POST['db_id']);		
	
// se enviou tables, update db
if(!empty($_POST['tables'])){
$tables = implode(" " , $_POST['tables']);	
$DbackupeXPro->update_db_single('parcial_tables',$tables,$_POST['db_id']);
}	

	 
	
	
 die(_('Tables for partial backups Sucessfuly saved.')); 	
}
	else{die('<i class="fa fa-exclamation-triangle"></i> '._('The Session is expired. Please reload your Browser'));}		
}








//#####################################################
// Upload Backup
//#####################################################	
if (isset($_POST['upload_backup_dbform_token'])) {
if ($_POST['upload_backup_dbform_token'] == $upload_backup_dbform_token) {	
if($demo_on==1)die('<i class="fa fa-exclamation-triangle"></i> '._('This Feature ist disabled on the Demo for security reasons.'));	
	
global $BACKUPS_PATH; 
$db_id= htmlspecialchars($_POST['db_id']);
$backups_dir= $BACKUPS_PATH.$db_id.'/';
	
if (!empty($_FILES)) {

         $finename = $_FILES['file']['name'];
         if (substr($finename, -7) != '.sql.gz') {
             die('<i class="fa fa-exclamation-triangle"></i> '._('This file is not permited. Please upload only .sql.gz files.'));
         }
         $arr = explode(".", $finename);
         $extension = strtolower(array_pop($arr));   
         $filename_sem_ext = array_shift($arr);
		 
         $newFileName = date("YmdHis").'-DbackupexPro-'._('Self-Uploaded').'-'.$filename_sem_ext.'.sql.gz';
         $tempFile = $_FILES['file']['tmp_name'];
         $targetFile = $backups_dir.$newFileName;

         if (move_uploaded_file($tempFile, $targetFile)) {
             die(_('Backup sucessfuly uploaded.'));
         } else {
             die('<i class="fa fa-exclamation-triangle"></i> '._('Something went wrong uploading your file. Please try again'));
         }

     } else die('<i class="fa fa-exclamation-triangle"></i> '._('Please select a .gz File to upload.'));

	
 
	
	
}
	else{die('<i class="fa fa-exclamation-triangle"></i> '._('The Session is expired. Please reload your Browser'));}		
}

	
	
     


 






//#####################################################
// Restore DB
//#####################################################	
if (isset($_POST['restore_backup_dbform_token'])) {
if ($_POST['restore_backup_dbform_token'] == $restore_backup_dbform_token) {	
if($demo_on==1)die('<i class="fa fa-exclamation-triangle"></i> '._('This Feature ist disabled on the Demo for security reasons.'));	
	 
	
if(!empty($_POST['restoreparcial'])){ //restore parcial
if(empty($_POST['tables'])){die('<i class="fa fa-exclamation-triangle"></i> '._('You need to select at least one Table!'));}	

 
$DbackupeXPro->dbackupexro_restore_backup(htmlspecialchars($_POST['db_id']), htmlspecialchars($_POST['restorefile']), $_POST['tables']);
 
  
} else{ // restore compeltamente
$DbackupeXPro->dbackupexro_restore_backup(htmlspecialchars($_POST['db_id']), htmlspecialchars($_POST['file']));
}		
	 

}elseif($_POST['restore_backup_dbform_token'] == $restore_backup_dbform_token && $demo_on='1') { 
die('<i class="fa fa-exclamation-triangle"></i> '._('This Feature ist disabled on the Demo for security reasons.'));
 }
else{die('<i class="fa fa-exclamation-triangle"></i> '._('The Session is expired. Please reload your Browser'));}		
}







//#####################################################
// ADD new FTP
//#####################################################	
if (isset($_POST['add_new_ftp_dbform_token'])) {
if ($_POST['add_new_ftp_dbform_token'] == $add_new_ftp_dbform_token) {
if($demo_on==1)die('<i class="fa fa-exclamation-triangle"></i> '._('This Feature ist disabled on the Demo for security reasons.'));		
	
	
if(empty($_POST['use_ssl_connection'])){$_POST['use_ssl_connection']=0;}		
	
$add_ftp = $DbackupeXPro->add_new_ftp($_POST['ftp_title'],$_POST['ftp_server'],$_POST['ftp_subfolder'],$_POST['ftp_username'],$_POST['ftp_pw'], $_POST['use_ssl_connection']);
if ($add_ftp === true) {
	die(_('Your new FTP was sucessfully added'));}else{die(_('<i class="fa fa-exclamation-triangle"></i> It was not possible to create a new FTP.'));}
	
}else{
	die('<i class="fa fa-exclamation-triangle"></i> '._('The Session is expired. Please reload your Browser'));}
}


 

//#####################################################
// Edit FTP
#####################################################
if(isset($_POST['edit_ftpform_token'])){
if($edit_ftpform_token == $_POST['edit_ftpform_token']){
if($demo_on==1)die('<i class="fa fa-exclamation-triangle"></i> '._('This Feature ist disabled on the Demo for security reasons.'));		
 
$id= $_POST['ftp_id']; 
	
 if(empty($_POST['use_ssl_connection'])){$_POST['use_ssl_connection']=0;}	
 
$edit = $DbackupeXPro->update_ftp($_POST['ftp_title'],$_POST['ftp_server'],$_POST['ftp_subfolder'],$_POST['ftp_username'],$_POST['ftp_pw'],$_POST['use_ssl_connection'],$id);
                                   
	
if ($edit === true) {die(_('Database sucessfully updated'));}else{die(_('<i class="fa fa-exclamation-triangle"></i> it was not possible to update.'));}
}else{die('<i class="fa fa-exclamation-triangle"></i> '._('The Session is expired. Please reload your Browser'));}
}















//#####################################################
// Enviar singel ficheiro por FTP
//#####################################################	
if (isset($_POST['enviar_single_file_ftp_token'])) {
if ($_POST['enviar_single_file_ftp_token'] == $enviar_single_file_ftp_token) {
if($demo_on==1)die('<i class="fa fa-exclamation-triangle"></i> '._('This Feature ist disabled on the Demo for security reasons.'));		

$DbackupeXPro->dbackupexro_send_single_file_to_ftp(htmlspecialchars($_POST['db_id']),htmlspecialchars($_POST['filename']));
 
}else{
	die('<i class="fa fa-exclamation-triangle"></i> '._('The Session is expired. Please reload your Browser'));}
}
 





 


 


//#####################################################
// Del FTP
//#####################################################		
if (isset($_POST['delete_ftpform_token'])) {
if ($_POST['delete_ftpform_token'] == $delete_ftpform_token) {
if($demo_on==1)die('<i class="fa fa-exclamation-triangle"></i> '._('This Feature ist disabled on the Demo for security reasons.'));		
	
$del_ftp = $DbackupeXPro->dbackupexro_del_ftp( htmlspecialchars($_POST[('ftp_id')]));
	
if ($del_ftp === true) {
die(_('This FTP was sucessfully deleted'));}else{die(_('<i class="fa fa-exclamation-triangle"></i> It was not possible to delete this FTP.'));
}
	
} else{die('<i class="fa fa-exclamation-triangle"></i> '._('The Session is expired. Please reload your Browser'));}		
}






//#####################################################
// Add FTP to a Database
//#####################################################		
if (isset($_POST['change_ftp_token'])) {
if ($_POST['change_ftp_token'] == $change_ftp_token) {
if($demo_on==1)die('<i class="fa fa-exclamation-triangle"></i> '._('This Feature ist disabled on the Demo for security reasons.'));		
 
$update_db_ftp= $DbackupeXPro->update_geral('databases','use_ftp_id',$_POST['ftp_id'],'id',$_POST['db_id']);
	
if ($update_db_ftp === true) {
die(_('FTP options sucessfully saved'));}else{die(_('<i class="fa fa-exclamation-triangle"></i> It was not possible to save the FTP options.'));
}
	
} else{die('<i class="fa fa-exclamation-triangle"></i> '._('The Session is expired. Please reload your Browser'));}		
}


 

die();
?>