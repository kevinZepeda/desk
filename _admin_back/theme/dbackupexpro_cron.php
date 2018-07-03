<?php 
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Software: Dbackupex Pro
// Ajax Mysql Database Backup & Restore 
// CopyRight: Litos Media - Carlos Santos de Azevedo
// Contact: info@litos.top
// 11-2017
#####################################################
include("../../inc/db.php");
include("../../inc/func.php");
include ("../inc/admin_func.php");
include ("../inc/admin_conf.php");
include ("../inc/admin_login_required.php");
include_once('inc/dbackupexpro_admin_func.php');

if (empty($_GET['t']) && empty($_GET['c']) ){die();}
 
if (isset($_GET['t'])){
$DbackupeXPro_cron_token= htmlspecialchars($_GET['t']);	
if(strlen($DbackupeXPro_cron_token)===20 && ctype_alnum($DbackupeXPro_cron_token) ){
$DbackupeXPro= new DbackupeXPro();
$DbackupeXPro->dbackupexro_new_Cron_Job_backup($DbackupeXPro_cron_token);
} else die();
} //else die();


//own
if (isset($_GET['c'])){
$DbackupeXPro= new DbackupeXPro();	
$DbackupeXPro_cron_token=  $DbackupeXPro->get_db(htmlspecialchars($_GET['c']),'cronjob_token');	
if(strlen($DbackupeXPro_cron_token)===20 && ctype_alnum($DbackupeXPro_cron_token) ){
$DbackupeXPro->dbackupexro_new_Cron_Job_backup($DbackupeXPro_cron_token);
} else die();
} //else die();
?>