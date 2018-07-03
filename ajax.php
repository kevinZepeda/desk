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
// Contact form
//######################################
if(isset($_POST['fazer_contacto'])=='ewef34t235756g23eww'){
	
$name=$_POST['name'];
$firmaname=$_POST['firmaname'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$msg=$_POST['msg'];
 
 
   
if(strlen($name) < 3 || strlen($email)<3 || strlen($msg)<3){die($reset_recaptcha.erro_box(_('Please fill in this form. The fields marked with an asterisk are mandatory fields.')));}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {die($reset_recaptcha.erro_box(_('Your email is invalid.')));}
 
 
/********************* Recaptcha *********************/
if (get_website('recaptcha_contact_site')==1){
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
 
	
//enviar email
include ("inc/emails/email_contact.php");
die($reset_recaptcha.ok_box(_('Your message has been sent')));
 

}
//######################################
// END Contact form
//######################################









//######################################
// Contact form Support
//######################################
if(isset($_POST['fazer_contacto_support'])=='4545z65656h56h56zh56h'){
	
$name=$_POST['name'];
$firmaname=$_POST['firmaname'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$msg=$_POST['msg'];
$subject_selected = $_POST['subject_selected'];
 
  
 
	
if(strlen($name) < 3 || strlen($email)<3 || strlen($msg)<3){die($reset_recaptcha.erro_box(_('Please fill in this form. The fields marked with an asterisk are mandatory fields.')));}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {die($reset_recaptcha.erro_box(_('Your email is invalid.')));}
 


	
	
/********************* Recaptcha *********************/
if (get_website('recaptcha_support_site')=='1'){
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
	
	
	
	 
	
//enviar email
include ("inc/emails/email_contact_support.php");
die($reset_recaptcha.ok_box(_('Your message has been sent')));
 

}
//######################################
// END Contact form Support
//######################################


















 
//######################################
// Update user profil data
//###################################### 
if(isset($_POST['update_user_info'])=='er34tf8fh23eww'){


if(strlen($_POST['email']) < 1){  die(erro_box(_('You must set a Email.')));}	
if ($_POST['email']){
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {die(erro_box(_('Your E-Mail is not valid.')));}
}

if(strlen($_POST['username']) < 4){  die(erro_box(_('The Username must be at least 4 characters')));}
if (preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬]/', $_POST['username'])){die(erro_box(_('Your username can not contain special characters. Only _ and - are allowed')));}
 
  
	
$user= new user(); 
$user->update_logged_user('username',$_POST['username']);  
$user->update_logged_user('email',$_POST['email']);
if(isset($_POST['user_language'])) {$user->update_logged_user('language',$_POST['user_language']);}
$user->update_logged_user('profile_headline',$_POST['profile_headline']);
$user->update_logged_user('location',$_POST['location']);
$user->update_logged_user('profile_description',$_POST['profile_description']);
die(ok_box(_('Your information was sucessfully updated')));


}
//######################################
// Update user data
//######################################











//######################################
// Update user avatar
//###################################### 
if(isset($_POST['send_avatar'])=='684geg4545/6z565/943'){
 
 
 
if (!empty($_FILES)) {
 
$user= new user();
$imagem= new imagem();

/*Criar variaveis necessarias para o nome do ficheiro*/
$user_id= $user->get_logged_user('id');
$newFileName= $user_id.'-avatar-'.time();

 
/* Onde guardar*/
$ds = DIRECTORY_SEPARATOR;
 
	
	
	
// Dados do ficheiro	
$tempFile = $_FILES['file']['tmp_name'];           
$targetPath = dirname( __FILE__ ) . $ds. $AVATAR_PATH;   
$targetFile= $targetPath.$newFileName;
 

 

/* Check if is image*/
if(!$imagem->is_image($tempFile)){die(erro_box(_('This file is not permited. Please upload only images.')));} 

 
 
 
 
  
/*Check Image size*/
$maxFileSize = get_website('avatar_upload_max_size') * 1024 * 1024; 
if ($_FILES['file']['size'] > $maxFileSize ){die(erro_box(_('This file is to big. The max. image size is:').' '.get_website('avatar_upload_max_size').'MB'));}
 
  
  
  
  
	
/*Delete old avatar*/
$old_avatar= $user->get_logged_user('avatar');
unlink($targetPath.$old_avatar);
$user->update_logged_user('avatar','');
 

 
 
 

/*Resize image and send to upload folder*/
$imagem->resize(get_website('avatar_max_width'), $targetFile, $tempFile);







/*get file extension*/
$ext= $imagem->get_image_ext($tempFile);
$nome_imagem_db= $newFileName.$ext;



/*add new avatar*/ 
$user->update_logged_user('avatar',$nome_imagem_db);  
die(ok_box(_('Your Avatar was sucessfully changed.')));



 


}else die(erro_box(_('Please select a image for your profile.')));


}
//######################################
// Update user avatar
//######################################









//######################################
// Rotate avatar left
//######################################
if(isset($_POST['rotate_left'])=='asd0348f93ehr8hg4'){
/*abrir classes */
$user= new user();
$imagem= new imagem();

$ds = DIRECTORY_SEPARATOR;          
$avatarPath = dirname( __FILE__ ) . $ds. $AVATAR_PATH;  
   
$old_avatar= $avatarPath.$user->get_logged_user('avatar');

/*rotate*/
$imagem->rotateImage($old_avatar,$old_avatar,90);

/*mudar o nome para nao fazer cache*/
$ext= $imagem->get_image_ext($old_avatar);
	
$newFileName= $user->get_logged_user('id').'-avatar-'.time().$ext;
rename($old_avatar, $avatarPath.$newFileName);
$user->update_logged_user('avatar',$newFileName);
echo $AVATAR_PATH.$newFileName;// Returne new name to refressch the image preview src
}

//######################################
// Rotate avatar Right
//######################################
if(isset($_POST['rotate_right'])=='asd0348f93ehr8hg4'){
/*abrir classes */
$user= new user();
$imagem= new imagem();

$ds = DIRECTORY_SEPARATOR;          
$avatarPath = dirname( __FILE__ ) . $ds. $AVATAR_PATH;  
   
$old_avatar= $avatarPath.$user->get_logged_user('avatar');

/*rotate*/
$imagem->rotateImage($old_avatar,$old_avatar, -90);


/*mudar o nome para nao fazer cache*/
$ext= $imagem->get_image_ext($old_avatar);
$newFileName= $user->get_logged_user('id').'-avatar-'.time().$ext;
rename($old_avatar, $avatarPath.$newFileName);
$user->update_logged_user('avatar',$newFileName);
echo $AVATAR_PATH.$newFileName;// Returne new name to refressch the image preview src

}








//######################################
// Del AVATAR
//######################################
if(isset($_POST['apagar_avatar'])=='asd0348f93ehrwefefergrthehrth'){
$ds = DIRECTORY_SEPARATOR;          
$avatarPath = dirname( __FILE__ ) . $ds. $AVATAR_PATH;
$user= new user();
$old_avatar= $avatarPath.$user->get_logged_user('avatar');

unlink($old_avatar);
$user->update_logged_user('avatar','');
if (!file_exists($old_avatar)) {die(ok_box(_('Your Avatar was deleted sucessfully.')));} else {die(ok_box(_('Your Avatar could not be deleted.')));}
}

 