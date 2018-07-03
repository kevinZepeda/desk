<?php 
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Software: Regex The Speed Inproved PHP Login, 
// Website & User Management
// CopyRight: Litos Media - Carlos Santos de Azevedo
// Contact: info@litos.top
// 07-2017
#####################################################
 
$ADMIN_FOLDER="_admin_back";
$ADMIN_URL= $SITE_URL.$ADMIN_FOLDER."/";
$ADMIN_FULL_PATH= $_SERVER['DOCUMENT_ROOT']."/".$ADMIN_FOLDER."/";
$SITE_FULL_PATH= $_SERVER['DOCUMENT_ROOT']."/";


$THEME_FOLDER="theme"; // Atention if you change this, it must be also changed on the .htacess
$THEME_URL= $SITE_URL.$ADMIN_FOLDER.'/'.$THEME_FOLDER.'/';
$THEME_PATH= $_SERVER['DOCUMENT_ROOT']."/".$ADMIN_FOLDER."/".$THEME_FOLDER.'/';


 
 

$SEO_URL_USERS="users.php";
$SEO_URL_USERS_EDIT="users_edit.php";
$SEO_URL_ADD_USER= "users_add.php";
$SEO_URL_SITE_OPTIONS= "site_options.php";
$SEO_URL_PERMALINKS_OPTIONS= "permalinks_options.php";
$SEO_URL_UPGRADE_DB= "upgrade_db.php";
$SEO_URL_BACKUP_DB= "DbackupeX/dbackupex.php";
$SEO_URL_MEDIA_LIBRARY= "ImageX/imagex.php";
$SEO_URL_LANGUAGES= "languages.php";

?>