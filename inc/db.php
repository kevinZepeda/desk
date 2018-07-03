<?php 
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Software: Regex The Speed Inproved PHP Login, 
// Website & User Management
// CopyRight: Litos Media - Carlos Santos de Azevedo
// 07-2017
#####################################################
$dbhost = '##DBHOST##';
$dbuser = '##DBUSERNAME##';
$dbpass = '##DBPW##';
$dbname = '##DBNAME##';
$prefixo= '##DBPREFIX##';
$con =  mysqli_connect($dbhost, $dbuser,$dbpass, $dbname);
if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
} 

if (!mysqli_set_charset($con, "utf8")) {
      mysqli_error($con);
    exit();
}else {
     mysqli_character_set_name($con);
}
?>