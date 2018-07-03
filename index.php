<?php 
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Software: Regex The Speed Inproved PHP Login, 
// Website & User Management
// CopyRight: Litos Media - Carlos Santos de Azevedo
// Contact: info@litos.top
// 07-2017
#####################################################
if(!isset($_SESSION)) {session_start();}
if(file_exists('install.php')){
     header('Location: '.$SITE_URL.'install.php');die();
}

include("inc/db.php");
include("inc/func.php");
include("_admin_back/inc/admin_func.php");
 
$parts = explode("/", strtok($_SERVER["REQUEST_URI"],'?'));
$permalink= new permalink();
 
//inicio
if($_SERVER['REQUEST_URI']=='/'){
if(file_exists(dirname(__FILE__).'/theme/header.php')){include(dirname(__FILE__).'/theme/header.php');}else {include(dirname(__FILE__).'/header.php');}
echo '<!-- Scripts-->
      <script src="/assets/js/app.min.js"></script>
      <script src="/assets/js/custom.js"></script>';
	
if(file_exists(dirname(__FILE__).'/theme/'.'home.php')){include(dirname(__FILE__).'/theme/'.'home.php');}else {include(dirname(__FILE__).'/'.'home.php');}
	
if(file_exists(dirname(__FILE__).'/theme/footer.php')){include(dirname(__FILE__).'/theme/footer.php');}else {include(dirname(__FILE__).'/footer.php');}
die();
}


//pagina com slug
elseif ($parts[1]==  $permalink->get_slug($parts)){
     
    if(file_exists(dirname(__FILE__).'/theme/header.php')){include(dirname(__FILE__).'/theme/header.php');}else {include(dirname(__FILE__).'/header.php');}
    
	 echo '<!-- Scripts-->
      <script src="/assets/js/app.min.js"></script>
      <script src="/assets/js/custom.js"></script>';
	
	if(file_exists(dirname(__FILE__).'/theme/'.$permalink->get_file($parts))){include(dirname(__FILE__).'/theme/'.$permalink->get_file($parts));}else {include(dirname(__FILE__).'/'.$permalink->get_file($parts));}
  
    if(file_exists(dirname(__FILE__).'/theme/footer.php')){include(dirname(__FILE__).'/theme/footer.php');}else {include(dirname(__FILE__).'/footer.php');}
    die();
}


 
//pagina php sem slug
elseif (substr($parts[1], -4) ==  '.php' && file_exists($parts[1]) || substr($parts[1], -4) ==  '.php' && file_exists(dirname(__FILE__).'/theme/'.$parts[1] ) ){	
 
 
    if(file_exists(dirname(__FILE__).'/theme/header.php')){include(dirname(__FILE__).'/theme/header.php');}else {include(dirname(__FILE__).'/header.php');}
	 
	echo '<!-- Scripts-->
      <script src="/assets/js/app.min.js"></script>
      <script src="/assets/js/custom.js"></script>';
	 
	
 
	
	
    if(file_exists(dirname(__FILE__).'/theme/'.$parts[1])){include(dirname(__FILE__).'/theme/'.$parts[1]);}else {include(dirname(__FILE__).'/'.$parts[1]);}
	
	
	
 
    if(file_exists(dirname(__FILE__).'/theme/footer.php')){include(dirname(__FILE__).'/theme/footer.php');}else {include(dirname(__FILE__).'/footer.php');}
    die();
}

//pagina nao encontrada? 
else{
if(file_exists(dirname(__FILE__).'/theme/header.php')){include(dirname(__FILE__).'/theme/header.php');}else {include(dirname(__FILE__).'/header.php');}
echo '<!-- Scripts-->
      <script src="/assets/js/app.min.js"></script>
      <script src="/assets/js/custom.js"></script>';	
	
if(file_exists(dirname(__FILE__).'/theme/'.'404.php')){include(dirname(__FILE__).'/theme/'.'404.php');}else {include(dirname(__FILE__).'/'.'404.php');}	
	
	
if(file_exists(dirname(__FILE__).'/theme/footer.php')){include(dirname(__FILE__).'/theme/footer.php');}else {include(dirname(__FILE__).'/footer.php');}	
die();
}
?>