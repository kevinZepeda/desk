<?php 
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Software: Regex The Speed Inproved PHP Login, 
// Website & User Management
// CopyRight: Litos Media - Carlos Santos de Azevedo
// Contact: info@litos.top
// V.1, // 07-2017
#####################################################
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);
chmod("inc/db.php", 0777);
if($_POST['create_database'] =="1860d85912d901af3bb04c91a54297c9"){
$erro='0';	
	
// test connection 
$con =  mysqli_connect($_POST['db_host'], $_POST['db_username'], $_POST['db_pw'], $_POST['db_name']);
if (!$con) {
$msg= '<div class="text-center alert alert-danger" role="alert">The credentials are wrong or the Database do not exist.</div>';
		$erro='1';
} 
	
$el_prefixo='dbackupexpro_';
if(trim($_POST['db_prefix'])){$el_prefixo= $_POST['db_prefix'];}
	
if($erro=='0'){	
$str=file_get_contents('inc/db.php');
$str=str_replace("##DBPREFIX##",   $el_prefixo,$str);
$str=str_replace("##DBNAME##",     $_POST['db_name'],$str);
$str=str_replace("##DBUSERNAME##", $_POST['db_username'],$str);
$str=str_replace("##DBPW##",       $_POST['db_pw'],$str);
$str=str_replace("##DBHOST##",       $_POST['db_host'],$str);
file_put_contents('inc/db.php', $str);
 
 
 
$mysqlDatabaseName = $_POST["db_name"];
$mysqlUserName = $_POST["db_username"];
$mysqlPassword = $_POST["db_pw"];
$mysqlHostName = $_POST['db_host'];
$mysqlImportFilename = 'install.sql';

$command='mysql -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' < ' .$mysqlImportFilename;
$output=array();
exec($command,$output,$worked);
switch($worked){
    case 0:
         $msg= '<div class="text-center alert alert-success" role="alert">The Database was sucessfully installed!</div>';
        break;
    case 1:
        $msg= '<div class="text-center alert alert-success" role="alert">The Database was sucessfully installed!!</div>';
        break;
}


include ("inc/db.php");
if(trim($_POST['db_prefix'])){
//mudar prefixo
mysqli_query($con, "RENAME TABLE `dbackupexpro_users` TO `" . $_POST['db_prefix'] . "users`" );
mysqli_query($con, "RENAME TABLE `dbackupexpro_todo` TO `" . $_POST['db_prefix'] . "todo`" );
mysqli_query($con, "RENAME TABLE `dbackupexpro_site_options` TO `" . $_POST['db_prefix'] . "site_options`" );
mysqli_query($con, "RENAME TABLE `dbackupexpro_permalinks` TO `" . $_POST['db_prefix'] . "permalinks`" );
mysqli_query($con, "RENAME TABLE `dbackupexpro_litos_media` TO `" . $_POST['db_prefix'] . "litos_media`" );		
mysqli_query($con, "RENAME TABLE `dbackupexpro_languages` TO `" . $_POST['db_prefix'] . "languages`" );
mysqli_query($con, "RENAME TABLE `dbackupexpro_databases` TO `" . $_POST['db_prefix'] . "databases`" );
mysqli_query($con, "RENAME TABLE `dbackupexpro_ftp` TO `" . $_POST['db_prefix'] . "ftp`" );
}

echo '<script> setTimeout(function () { window.location.href = "install.php?weiter=1"; }, 10);</script>';

	
}//End if error=0
}//End if database create
/********************************* 
FIM Create database
*********************************/






/********************************* 
Create Admin account
*********************************/
if($_POST['create_user']=="f0025f4021d0ec23ee9462132091967"){
include_once ("inc/db.php");
include_once ("inc/func.php");

$user =new user();

$email=$_POST['email'];
$pw=$_POST['pw'];
$username= $_POST['username'];	

  
$ip= $user->get_user_ip();
$user->user_create('username','role','senha','email','register_token','user_ip','user_ip_last_login', 
						 $username,'super_admin',md5($PW_PREFIXO.$pw),$email,'activated',$ip,$ip);
	
 
$login_token = bin2hex(random_bytes(28)); 	
setcookie(md5($PW_PREFIXO."login_token"),$login_token,time()+(3600*get_website('login_life_time')), "/");
$user->update_user('login_token',$login_token,'email',$email); // criar o login token para fazer login
	
	
$msg=  ok_box(_('You sucessfully logged in.'));$user->welkome_user($email,$username);
	
	
 
if($user->email_is_admin($email)){$redirect_url= get_website('redirect_url_admin_after_login');} 
echo '<script> setTimeout(function () { window.location.href = "'.$redirect_url.'"; }, 500);</script>';// Redirect to my account after login
	

chmod("install.sql", 0777); 
chmod("install.php", 0777); 	
chmod("inc/db.php", 0655);
chmod("_admin_back/theme/tmp/crontab.txt", 0777);	
unlink('install.sql');
unlink('install.php');	
/********************************* 
END Create Admin
*********************************/	
}






/********************************* 
Check Server Requirements
*********************************/	
 /*Check that PHP version is at leat 7.0*/
if (defined('PHP_MAJOR_VERSION') && PHP_MAJOR_VERSION >= 7) 
{
  $phpversion= '7';
} 
else 
{
  $msg=  '<div class="text-center alert alert-danger" role="alert">Please install or activate PHP7 on your server before the installation.</div>';
}


/*Check that inc/db.php is writable*/
if (is_writable('inc/db.php')) {
    $db_php= 'ok';
} else {
   $msg= '<div class="text-center alert alert-danger" role="alert">Please set the chmod of <strong>inc/db.php to 777</strong>. After a successful installation you can set the chmod back.</div>';
}


/*Check that _admin_back/theme/tmp/crontab.txt is writable*/
if (is_writable('_admin_back/theme/tmp/crontab.txt')) {
    $cron_tab_writable= 'ok';
} else {
   $msg= '<div class="text-center alert alert-danger" role="alert">Please set the chmod of <strong>_admin_back/theme/tmp/crontab.txt to 777</strong>.</div>';
}


 
/*Check if MySQLi extension is enabled*/
if(function_exists('mysqli_connect')) {
$MySQLi_extension='ok';} 
else $msg= '<div class="text-center alert alert-danger" role="alert">You need the MySQLi extension enabled on your server in order to use this script.</div>';



/*Check EXEC*/
if(exec('echo EXEC') == 'EXEC'){
	$EXEC_function='ok';}
else $msg= '<div class="text-center alert alert-danger" role="alert">You need the EXEC Function enabled on your server in order to the Intall Wizard.</div>';





/********************************* 
END Check Server Requirements
*********************************/	


if($_GET['weiter']==1){$dispay_db_options= "display:none";$dispay_add_user= "";}else {$dispay_db_options= "";$dispay_add_user= "display:none";}


?>
  <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=" ">
    <meta name="keywords" content="">

    <title>Dbackupex Pro Install</title>

    <!-- Styles -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/custom.css?a=<?php echo time();?>" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Favicons -->
    <link rel="icon" href="">
  
  </head>

<!-- Main container -->
    <main>
      <section class="no-border-bottom section-sm">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
              <div class="card">
                <div class="card-header" id="card-header">
                  <h6><?php echo _('DbackupexPro Installation');?></h6>
                </div>
                
                <div class="card-block">
				  <?php echo $msg;?> 
                 <?php if($phpversion !='7' OR $MySQLi_extension !='ok' OR $db_php !='ok' OR $cron_tab_writable !='ok' OR $EXEC_function !='ok'){die;}?>
                  <br>
                  <form action="install.php" method="post" style="<?php echo $dispay_db_options;?>">
 
                    <div class="form-group top15">
  <input autocomplete="off" class="form-control input-lg" type="text" name="db_prefix" placeholder="Database Prefix (Optional)" pattern="[a-z]{1,15}[_]" value="<?php echo @$_POST['db_prefix'];?>">
                    </div>
                    <br>

  
                    
                    <div class="form-group">
                      <input autocomplete="off" required class="form-control input-lg" type="text" name="db_host" placeholder="DB Host (ex.: localhost)" value="<?php echo @$_POST['db_host']; if(!$_POST['db_host']){echo 'localhost';}?>">
                    </div>
                    <div class="form-group">
                      <input autocomplete="off" required class="form-control input-lg" type="text" name="db_name" placeholder="DB Name" value="<?php echo @$_POST['db_name'];?>">
                    </div>
                     <div class="form-group">
                      <input autocomplete="off" required class="form-control input-lg" type="text" name="db_username" placeholder="DB Username" value="<?php echo @$_POST['db_username'];?>">
                    </div>
                     <div class="form-group">
                      <input autocomplete="off" required class="form-control input-lg" type="password" name="db_pw" placeholder="DB Password" value="<?php echo @$_POST['db_pw'];?>">
                    </div>
                    
 
 
                    
                    <input type="hidden" value="1860d85912d901af3bb04c91a54297c9" name="create_database">
                    
                    <button class="btn btn-primary btn-block" type="submit"> <?php echo _('Install now');?></button> 
   
                  </form>
                  
                  
                  
  
                 
                 
                 
                 
                 
                  
<form action="install.php?weiter=1" method="post" style="<?php echo $dispay_add_user;?>">
    <h3><small>Create Master Administrator Account</small></h3>
    <div class="form-group">
        <input autocomplete="off" class="form-control input-lg" type="text" name="username" required placeholder="<?php echo _('Name');?>">
    </div>

    <div class="form-group">
        <input autocomplete="off" class="form-control input-lg" type="email" name="email" required placeholder="<?php echo _('Email address');?>">
    </div>

    <div class="form-group">
        <input autocomplete="off" class="form-control input-lg" type="password" name="pw" required placeholder="<?php echo _('Password');?>" required>
        <br>

    </div>

    <input type="hidden" value="f0025f4021d0ec23ee9462132091967" name="create_user">

    <button class="btn btn-primary btn-block" type="submit">
        <?php echo _('Create Admin Account');?>
    </button>

</form>          
 
                  <br>
                </div>

     

              </div>

 
            </div>
          </div>
        </div>
      </section>

    </main>
    <!-- END Main container -->
	
 
 
</html>