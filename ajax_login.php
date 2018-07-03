<?php
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Software: Regex The Speed Inproved PHP Login, 
// Website & User Management
// CopyRight: Litos Media - Carlos Santos de Azevedo
// Contact: info@litos.top
// 07-2017
#####################################################
include_once("inc/db.php");
include_once("inc/func.php");
include_once("_admin_back/inc/admin_func.php");

$reset_recaptcha= '<script type="text/javascript">
    function myFunction() {
      if($(".g-recaptcha").length) {grecaptcha.reset();}
    }
     myFunction();
    </script>';


//######################################
// Register
//######################################
if(isset($_POST['registar'])=='erivj98z343948fh23eww'){
	
$email=$_POST['email'];
$pw=$_POST['pw'];
$pw_confirm=$_POST['pw_confirm'];
$username= $_POST['username'];	

$erro=0;	
if (preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬]/', $username)){die($reset_recaptcha.erro_box(_('Your username can not contain special characters. Only _ and - are allowed')));}
if($pw_confirm != $pw){die(erro_box(_('The Password did not match')));}
 

$pw_min_length= get_website('pw_min_length');
if(strlen($pw) < $pw_min_length){die($reset_recaptcha.erro_box(sprintf(_('The Password must be at least %s characters'),$pw_min_length)));}




if(strlen($username) < 4){  die($reset_recaptcha.erro_box(_('The Username must be at least 4 characters')));}

$user= new user();

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {die($reset_recaptcha.erro_box(_('Your E-Mail is not valid.')));}
if ($user-> user_existe($email,'email')){die($reset_recaptcha.erro_box(_('Your E-Mail is already registered')));}


	
	
/********************* Recaptcha *********************/	
if (get_website('recaptcha_register')==1){
include ($_SERVER['DOCUMENT_ROOT']."/inc/recaptcha.php");
$resp= null;
$error= null;
$reCaptcha = new ReCaptcha(get_website('recaptcha_secret_key'));
if (isset($_POST["g-recaptcha-response"])) {
    $resp = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
 
} 
 if($resp->success != true){die($reset_recaptcha.erro_box(_('Recaptcha error. Please try again.')));}
}		
/********************* END Recaptcha *********************/				
	
	

if($erro==0){
//criar conta
$token = bin2hex(random_bytes(28)); //php7
$ip= $user->get_user_ip();
$user->user_create('username','role','senha','email','register_token','user_ip','user_ip_last_login', $username,get_website('default_user_role'),md5($PW_PREFIXO.$pw),$email,$token,$ip,$ip);


	
//enviar email
include ("inc/emails/email_register.php");
die($reset_recaptcha.ok_box(_('Your account was created sussefully! Please check your email to activate your account.')));
} 

}
//######################################
// END Register
//######################################


















//######################################
// Login
//###################################### 
if(isset($_POST['fazer_login'])=='ewef34t235756g23eww'){
$pw=$_POST['pw'];
$email=	$_POST['email'];

	
	
	
/********************* Recaptcha *********************/	
if (get_website('recaptcha_login')==1){
include ($_SERVER['DOCUMENT_ROOT']."/inc/recaptcha.php");
$resp= null;
$error= null;
$reCaptcha = new ReCaptcha(get_website('recaptcha_secret_key'));
if (isset($_POST["g-recaptcha-response"])) {
    $resp = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
 
} 
 if($resp->success != true){die($reset_recaptcha.erro_box(_('Recaptcha error. Please try again.')));}
  	
}		
/********************* END Recaptcha *********************/			
	
	
	
	
	
	
$user= new user();
$db_email= $user->get_user_by_email($email,'email');
$db_pw= $user->get_user_by_email($email,'senha');
$db_register_token= $user->get_user_by_email($email,'register_token');
 
	
if($user->get_user_by_email($email,'banned')=="1"){die(erro_box(_('Your Acount was banned!')));}
if($user->user_ip_is_banned($user->get_user_ip())){die(erro_box(_('Your Acount was banned!')));}

 	
	
	
if($db_email!=$email OR $db_pw!= md5($PW_PREFIXO.$pw) ){die($reset_recaptcha.erro_box(_('The login data do not match.')));}



// A conta ainda nao esta ativada? entao enviar email
if($db_register_token !='activated'){
$token= $db_register_token;
include ("inc/emails/email_register.php");
die(erro_box(_('Your Account is not activated yet. We sent you an Email with a activation link. Please click this link on your email to activate your account.')));
}
	
	


if($db_email==$email && $db_pw== md5($PW_PREFIXO.$pw)){

//fazer login
$login_token = bin2hex(random_bytes(28)); //php7 (ira ser criado sempre om novo login token cada vez que faz login)
$user->update_user('login_token',$login_token,'email',$db_email); // criar o login token para fazer login
$user->update_user('last_login',date('Y-m-d G:i:s'),'email',$db_email); // add last login date
$user->update_user('user_ip_last_login',$user->get_user_ip(),'email',$db_email); // add ip on last login
	
	
setcookie(md5($PW_PREFIXO."login_token"),$login_token,time()+(3600*get_website('login_life_time')));  
	
echo '<script>$(document).ready(function () {grecaptcha.reset();});</script>'.ok_box(_('You sucessfully logged in.'));


$user= new user();
if($user->email_is_admin($db_email)){$redirect_url= get_website('redirect_url_admin_after_login');}else {$redirect_url=get_website('redirect_url_after_login');}
echo '<script> setTimeout(function () { window.location.href = "'.$redirect_url.'"; }, 500);</script>';// Redirect to my account after login
	
}
	
}
//######################################
// END Login
//######################################

















 
//######################################
// PW Recover
//###################################### 
if(isset($_POST['pw_recover'])=='3464645b4vt4545654465gfh'){
$email= $_POST['email'];
$user= new user();
$db_email= $user->get_user_by_email($email,'email');
	
	
	
/********************* Recaptcha *********************/	
if (get_website('recaptcha_reset_pw')==1){
include ($_SERVER['DOCUMENT_ROOT']."/inc/recaptcha.php");
$resp= null;
$error= null;
$reCaptcha = new ReCaptcha(get_website('recaptcha_secret_key'));
if (isset($_POST["g-recaptcha-response"])) {
    $resp = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
 
} 
 if($resp->success != true){die($reset_recaptcha.erro_box(_('Recaptcha error. Please try again.')));}
 
}		
/********************* END Recaptcha *********************/			
	
	
	
if($db_email == $email){  
 
//a conta ja esta activada?
$db_register_token= $user->get_user_by_email($email,'register_token');
if($db_register_token !='activated'){
//enviar email
$token= $db_register_token;
include ("inc/emails/email_register.php");
die(ok_box(_('Your Account is not activated yet. We sent you an Email with a activation link. Please click this link on your email to activate your account')));
}



// Esta activada entao criar reset token
$reset_pw_token = bin2hex(random_bytes(28)); //php7
$user->update_user('reset_pw_token',$reset_pw_token,'email',$email);
$user->update_user('reset_pw_token_date',date('Y-m-d G:i:s'),'email',$email);


//enviar email
include ("inc/emails/email_recover_pw.php");
die($reset_recaptcha.ok_box(_('Please check your inbox. We sent you a link to reset your password')));




} else  die($reset_recaptcha.erro_box(_('This email is not registered.'))); 

}














//######################################
// SET new PW   (Recovery)
//###################################### 
if(isset($_POST['fazer_nova_senha'])=='rg65fve9vhn0r483ß9u0mvb45756'){

$pw=$_POST['pw'];
$pw_confirm=$_POST['pw_confirm'];
$m=$_POST['m'];


if($pw_confirm != $pw){die(erro_box(_('The Password did not match')));}
$pw_min_length= get_website('pw_min_length');
if(strlen($pw) < $pw_min_length){die(erro_box(sprintf(_('The Password must be at least %s characters'),$pw_min_length)));}




//ceck the token and email
$m= encriptar( $m, 'd' );
$token=$_POST['token'];

 

$user= new user();
$db_token= $user->get_user_by_email($m,'reset_pw_token');
$db_email= $user->get_user_by_email($m,'email');
$db_token_date= strtotime($user->get_user_by_email($m,'reset_pw_token_date'));


/* se o token passar da validade abortar*/
if ($db_token_date <= strtotime('-'.get_website('token_reset_pw_life_time').' hours')){ 
$user->update_user('reset_pw_token','','email',$db_email);  
die(erro_box(_('Your reset password link is not valid anymore.')));
}





if($db_token==$token && $db_email==$m){

//criar login e add new pw
$login_token = bin2hex(random_bytes(28)); //php7 (ira ser criado sempre om novo login token cada vez que faz login)
$user->update_user('login_token',$login_token,'reset_pw_token',$db_token); // criar o login token para fazer login
$user->update_user('senha',md5($PW_PREFIXO.$pw),'reset_pw_token',$db_token); // add new pw
$user->update_user('last_login',date('Y-m-d G:i:s'),'email',$db_email); // add last login date
$user->update_user('reset_pw_token','reseted','email',$db_email); // reset pw_recovery_token
setcookie(md5($PW_PREFIXO."login_token"),$login_token,time()+(3600*get_website('login_life_time'))); 



echo '<script> setTimeout(function () { window.location.href = "'.get_website('redirect_url_after_pw_recovery').'"; }, 500);</script>';// Redirect to my account after login
die(ok_box(_('Your password was changed sussefully!')));


}else die(erro_box(_('Your link is not valid anymore! Please contact us or submit your email again to reset your password.'))); 

}



 





//######################################
// My Account change Password
//######################################
if(isset($_POST['minha_conta_change_pw'])=='z6j8t68j46/jz467/*7u/67'){

 
$new_pw= $_POST['new_pw'];
$pw_confirm= $_POST['pw_confirm'];	

$user= new user();

if($user->get_dados_user('senha','login_token', $_COOKIE[md5($PW_PREFIXO."login_token")]) != md5($PW_PREFIXO.$_POST['current_pw'])){die(erro_box(_('Your Current password is wrong'))); }
if($pw_confirm != $new_pw){die(erro_box(_('The Password did not match'))); }
$pw_min_length= get_website('pw_min_length');
if(strlen($new_pw) < $pw_min_length){die(erro_box(sprintf(_('The Password must be at least %s characters'),$pw_min_length)));}
 
 
 
if($pw_confirm == $new_pw && $user->get_dados_user('senha','login_token', $_COOKIE[md5($PW_PREFIXO."login_token")]) == md5($PW_PREFIXO.$_POST['current_pw'])){
//change pw and mage login
$login_token = bin2hex(random_bytes(28)); 
$user->update_user('login_token',$login_token,'login_token',$_COOKIE[md5($PW_PREFIXO."login_token")]); // criar o login token para fazer login
$user->update_user('senha',md5($PW_PREFIXO.$new_pw),'login_token',$login_token); // add new pw
setcookie(md5($PW_PREFIXO."login_token"),$login_token,time()+(3600*get_website('login_life_time')));
die(ok_box(_('Your password was changed sucessfully')));
}else{die(erro_box(_('Something goes wrong. Please contact the website owner.'))); }

 
}


?>