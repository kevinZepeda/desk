<?php 
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Software: Regex The Speed Inproved PHP Login, 
// Website & User Management
// CopyRight: Litos Media - Carlos Santos de Azevedo
// Contact: info@litos.top
// 07-2017
#####################################################
if(!isset($_SESSION)) { session_start();}
include("../inc/db.php");
include("../inc/func.php");
include ("inc/admin_func.php");
include ("inc/admin_conf.php");
include ("inc/admin_login_required.php");
include ("header.php");

include( $THEME_FOLDER.'/'.$_GET['file']);
include ("sidebar.php");

include ("sidebar_right.php");
include ("footer.php");
?>
 