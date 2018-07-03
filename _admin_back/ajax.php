<?php 
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Software: Regex The Speed Inproved PHP Login, 
// Website & User Management
// CopyRight: Litos Media - Carlos Santos de Azevedo
// Contact: info@litos.top
// 07-2017
#####################################################
include_once ($_SERVER['DOCUMENT_ROOT']."/inc/db.php");
include_once ($_SERVER['DOCUMENT_ROOT']."/inc/func.php");
include_once ("inc/admin_func.php");
include_once ("inc/admin_conf.php");
include_once ("inc/admin_login_required.php");
 
 
 /*DEMO*/
if($demo_on == "1" && $_GET['show_permalinks']!='erg4sdsdfwefegr3494uu20384znv38409u3' && $_POST['edit_permalink'] !='erwfgergerg5et45t6z453t' && $_POST['create_new_backup'] != '45zzg568htzu' && $_GET['schow_all_backups']!='qwdwef6834r45z65g4wbackupsshow' && $_POST['del_backup'] != 'klar' && $_POST['send_backup'] != '684geg4545/6z565/943' && $_GET['show_default_language_options'] !='479dj36dhs7329skthd734jn6gd65wj' && $_POST['update_lang_on'] !='update_sdie86394085n' && $_POST['edit_language'] !='erwfg3485jt6z4ddw4r53t' && $_GET['show_languages'] !='387thrgergror93j4565h9dej4' && $_POST['apaga_language'] !='1ae0c6ab99a08e70a230f42653675203' && $_POST['set_default_language'] !='03e687346c048649854u8hr98fe8bee7f6dcb6e' && $_POST['send_language'] !='03e687346cd85590be5e8bee7f6dcb6e' && $_POST['change_multi_lang'] !='4957fh634537h4645d649854u8hr98fe8erng90384j58fjdhs6'){
die(_('<i class="fa fa-exclamation-triangle"></i>   This feature is deactivated on the demo.'));}

if(isset($_POST['apaga_language'])=='1ae0c6ab99a08e70a230f42653675203' && $demo_on =="1" && isset($_POST['id']) == '2' || isset($_POST['apaga_language'])=='1ae0c6ab99a08e70a230f42653675203' && $demo_on =="1" && isset($_POST['id']) == '3'){die(_('<i class="fa fa-exclamation-triangle"></i>   This feature is deactivated on the demo.'));}
/*END DEMO*/



  

 

	
 
 
 

//######################################
// Update Site options
//###################################### 
if(isset($_POST['edit_site_options'])=='erwefer89fg4945g495g45t43w'){
$website= new website();
 
if ($_POST['site_email']){if (!filter_var($_POST['site_email'], FILTER_VALIDATE_EMAIL)) {die('<i class="fa fa-exclamation-triangle"></i> '._('Your E-Mail is not valid.'));}}

if(strlen($_POST['domain']) < 1){  die('<i class="fa fa-exclamation-triangle"></i> '._('You must set the Website Domain.'));}	
if(strlen($_POST['name']) < 1){  die('<i class="fa fa-exclamation-triangle"></i> '._('You must set the Website Name.'));}
if(strlen($_POST['site_email']) < 1){  die('<i class="fa fa-exclamation-triangle"></i> '._('You must set a Email.'));}	
if(strlen($_POST['login_life_time']) < 1){  die('<i class="fa fa-exclamation-triangle"></i> '._('You must set the Login Life Time'));}
if(strlen($_POST['token_reset_pw_life_time']) < 1){  die('<i class="fa fa-exclamation-triangle"></i> '._('You must set the Account Register Confim Link Life Time'));}
if(strlen($_POST['avatar_max_width']) < 1){  die('<i class="fa fa-exclamation-triangle"></i> '._('You must set the Avatar Max. width'));}
if(strlen($_POST['avatar_upload_max_size']) < 1){  die('<i class="fa fa-exclamation-triangle"></i> '._('You must set the Avatar Upload Max. size'));}
if(strlen($_POST['logo_max_width']) < 1){  die('<i class="fa fa-exclamation-triangle"></i> '._('You must set the Logo Max. width'));}
if(strlen($_POST['logo_upload_max_size']) < 1){  die('<i class="fa fa-exclamation-triangle"></i> '._('You must set the Logo Upload Max. size'));}
if(strlen($_POST['pw_min_length']) < 1){  die('<i class="fa fa-exclamation-triangle"></i> '._('You must set the Password min. length'));}

 

if(!ctype_digit($_POST['login_life_time'])){  die('<i class="fa fa-exclamation-triangle"></i> '._('Only numbers are allowed on Login Life Time.'));}
if(!ctype_digit($_POST['token_reset_pw_life_time'])){  die('<i class="fa fa-exclamation-triangle"></i> '._('Only numbers are allowed on Account Register Confim Link Life Time.'));}
if(!ctype_digit($_POST['avatar_max_width'])){  die('<i class="fa fa-exclamation-triangle"></i> '._('Only numbers are allowed on Avatar Max. width.'));}
if(!ctype_digit($_POST['avatar_upload_max_size'])){  die('<i class="fa fa-exclamation-triangle"></i> '._('Only numbers are allowed on Avatar Upload Max. size'));}
 
 

	
	
	
 @ $website->update_all_options('domain',
					'name',
					'description',
					'site_email',
					'assinatura',
					'copyright',
					'default_user_role',
					'login_life_time',
					'token_reset_pw_life_time',
					'token_confirm_new_account_life_time',
					'avatar_max_width',
					'avatar_upload_max_size',
					'notification_sound',
					'logo_max_width',
					'logo_upload_max_size',
					'pw_min_length',
					'redirect_url_after_login',
					'redirect_url_after_logout',
					'redirect_url_after_pw_recovery',
					'redirect_url_not_logged_in',
					'redirect_url_admin_after_login',
					'recaptcha_login',
					'recaptcha_register',
					'recaptcha_reset_pw',
					'recaptcha_site_key',
					'recaptcha_secret_key',
					'new_account_mail_subject',
					'new_account_mail_body',		 
					'admin_new_account_mail_subject',
					'admin_new_account_mail_body',
					'pw_reset_mail_subject',
					'pw_reset_mail_body',
					'mail_header',
					'mail_footer',
					'email_to_admin_new_user',
					'skin',
					'skin_color',
					'facebook_login',
					'twitter_login',
					'facebook_site_key',
					'facebook_secret_key',
					'twitter_site_key',
					'twitter_secret_key',
					'use_ssl',
					'recaptcha_contact_site',
					'recaptcha_support_site',
					'site_support_email',		 
		 						 
							 
					$_POST['domain'],
					$_POST['name'],
					$_POST['description'],
					$_POST['site_email'],
					$_POST['assinatura'],
					$_POST['copyright'],
					$_POST['default_user_role'],
					$_POST['login_life_time'],
					$_POST['token_reset_pw_life_time'],
					$_POST['token_confirm_new_account_life_time'],
					$_POST['avatar_max_width'],
					$_POST['avatar_upload_max_size'],
					$_POST['notification_sound'],
					$_POST['logo_max_width'],
					$_POST['logo_upload_max_size'],
					$_POST['pw_min_length'],
					$_POST['redirect_url_after_login'],
					$_POST['redirect_url_after_logout'],
					$_POST['redirect_url_after_pw_recovery'],
					$_POST['redirect_url_not_logged_in'],
					$_POST['redirect_url_admin_after_login'],
					$_POST['recaptcha_login'],
					$_POST['recaptcha_register'],
					$_POST['recaptcha_reset_pw'],		 
					$_POST['recaptcha_site_key'],
					$_POST['recaptcha_secret_key'],
					$_POST['new_account_mail_subject'],
					$_POST['new_account_mail_body'],
					$_POST['admin_new_account_mail_subject'],
					$_POST['admin_new_account_mail_body'],
					$_POST['pw_reset_mail_subject'],
					$_POST['pw_reset_mail_body'],
					$_POST['mail_header'],
					$_POST['mail_footer'],
					$_POST['email_to_admin_new_user'],
					$_POST['skin'],
					$_POST['skin_color'],
					$_POST['facebook_login'],
					$_POST['twitter_login'],
				    $_POST['facebook_site_key'],
					$_POST['facebook_secret_key'],
					$_POST['twitter_site_key'],
					$_POST['twitter_secret_key'],
					$_POST['use_ssl'],
					$_POST['recaptcha_contact_site'],
					$_POST['recaptcha_support_site'],
					$_POST['site_support_email']		 
					 	 
							 
					);

  


die(_('Website options sucessfully updated'));


}

 


 

 





//######################################
// Set Default avatar
//###################################### 
if(isset($_POST['send_default_avatar'])=='684geerferferferf653456546563'){ 
 
$imagem= new imagem();
$website= new website();
$newFileName= 'defautl-avatar-'.time();

/* Onde guardar*/
$ds = DIRECTORY_SEPARATOR;
 
// Dados do ficheiro	
$tempFile = $_FILES['file']['tmp_name'];           
$targetPath =  $_SERVER['DOCUMENT_ROOT'] . $ds . $AVATAR_PATH;   
$targetFile= $targetPath.$newFileName;
 

if (!empty($_FILES)) {
/* Check if is image*/
if(!$imagem->is_image($tempFile)){die('<i class="fa fa-exclamation-triangle"></i> '._('This file is not permited. Please upload only images.'));} 

/*Check Image size*/
$maxFileSize = get_website('avatar_upload_max_size') * 1024 * 1024; 
if ($_FILES['file']['size'] > $maxFileSize ){die('<i class="fa fa-exclamation-triangle"></i> '._('This file is to big. The max. image size is:').' '.get_website('avatar_upload_max_size').'MB');}


 
 
/*Delete old avatar*/
$old_avatar= get_website('default_avatar');
unlink($targetPath.$old_avatar);
$website->update_option('default_avatar','');
 
 
	
/*Resize image and send to upload folder*/
$imagem->resize(  get_website('avatar_max_width'), $targetFile, $tempFile);

 
/*get file extension*/ 
$ext= $imagem->get_image_ext($tempFile);
$nome_imagem_db= $newFileName.$ext;



/*add new Default avatar*/ 
$website->update_option('default_avatar',$nome_imagem_db);
die(_('The Avatar was sucessfully changed.'));

 
}else die('<i class="fa fa-exclamation-triangle"></i> '._('Please select a image as default avatar.'));


}






 



//######################################
// Set Logo
//###################################### 
if(isset($_POST['send_logo'])=='wefwef34tt56zg454rg'){
$imagem= new imagem();
$website= new website();
$newFileName= 'logo-'.time();

/* Onde guardar*/
$ds = DIRECTORY_SEPARATOR;
 
// Dados do ficheiro	
$tempFile = $_FILES['file']['tmp_name'];           
$targetPath =  $_SERVER['DOCUMENT_ROOT'] . $ds . $LOGO_PATH;   
$targetFile= $targetPath.$newFileName;


 

if (!empty($_FILES)) {
/* Check if is image*/
if(!$imagem->is_image($tempFile)){die('<i class="fa fa-exclamation-triangle"></i> '._('This file is not permited. Please upload only images.'));} 

/*Check Image size*/
$maxFileSize = get_website('avatar_upload_max_size') * 1024 * 1024; 
if ($_FILES['file']['size'] > $maxFileSize ){die('<i class="fa fa-exclamation-triangle"></i> '._('This file is to big. The max. image size is:').' '.get_website('logo_upload_max_size').'MB');}


 
 
/*Delete old avatar*/
$old_avatar= get_website('logo');
unlink($targetPath.$old_avatar);
$website->update_option('logo','');
 
 
	
/*Resize image and send to upload folder*/
$imagem->resize(  get_website('logo_max_width'), $targetFile, $tempFile);

 
/*get file extension*/ 
$ext= $imagem->get_image_ext($tempFile);
$nome_imagem_db= $newFileName.$ext;



/*add new Default avatar*/ 
$website->update_option('logo',$nome_imagem_db);
die(_('The Logo was sucessfully changed.'));

 
}else die('<i class="fa fa-exclamation-triangle"></i> '._('Please select a image as logo.'));
}	
 

 
//######################################
// Set Favicon
//###################################### 
if(isset($_POST['send_favicon'])=='erg45z46jh5453h5v3'){
$imagem= new imagem();
$website= new website();
$newFileName= 'favicon-'.time();

/* Onde guardar*/
$ds = DIRECTORY_SEPARATOR;
 
// Dados do ficheiro	
$tempFile = $_FILES['file']['tmp_name'];           
$targetPath =  $_SERVER['DOCUMENT_ROOT'] . $ds . $FAVICON_PATH;   
$targetFile= $targetPath.$newFileName;


 

if (!empty($_FILES)) {
/* Check if is image*/
if(!$imagem->is_image($tempFile)){die('<i class="fa fa-exclamation-triangle"></i> '._('This file is not permited. Please upload only images.'));} 

/*Check Image size*/
$maxFileSize = get_website('avatar_upload_max_size') * 1024 * 1024; 
if ($_FILES['file']['size'] > $maxFileSize ){die('<i class="fa fa-exclamation-triangle"></i> '._('This file is to big. The max. image size is:').' '.get_website('logo_upload_max_size').'MB');}


 
 
/*Delete old favicon*/
$old_avatar= get_website('favicon');
unlink($targetPath.$old_avatar);
$website->update_option('favicon','');
 
 
	
/*Resize image and send to upload folder*/
$imagem->resize( 32, $targetFile, $tempFile); //32px

 
/*get file extension*/ 
$ext= $imagem->get_image_ext($tempFile);
$nome_imagem_db= $newFileName.$ext;



/*add new Default avatar*/ 
$website->update_option('favicon',$nome_imagem_db);
die(_('The Favicon was sucessfully changed.'));

 
}else die('<i class="fa fa-exclamation-triangle"></i> '._('Please select a image as favicon.'));
}


  







//######################################
// Set Permalink
//###################################### 
if(isset($_POST['send_permalink'])=='erg4sdsdfwef34tf3434f34f3'){

$permalink= new permalink();	
$slug= $permalink->format_slug($_POST['slug']);


if($permalink->ja_existe($_POST['file'],$slug)){die('<i class="fa fa-exclamation-triangle"></i> '._('You already set a slug to this file or this slug is already in use.'));}

if($slug && $_POST['file']){
$permalink->add_permalink($_POST['file'],$slug);
die(_('Permalink sucessfully Added.'));
 }else die('<i class="fa fa-exclamation-triangle"></i> '._('Please select a file and type a slug.'));

}







//######################################
// Update Permalink
//###################################### 
if(isset($_POST['edit_permalink'])=='erwfgergerg5et45t6z453t'){
$permalink= new permalink();	
$slug= $permalink->format_slug($_POST['slug']);


if($permalink->ja_existe($i,$slug)){die('<i class="fa fa-exclamation-triangle"></i> '._('This slug is already in use.'));}
	

if($slug){
$permalink->update_permalink($_POST['permalink_id'],$slug);
die(_('Permalink sucessfully Changed.'));
 }else die('<i class="fa fa-exclamation-triangle"></i> '._('Please type a slug.'));
}

 
 









//######################################
// Delete Permalink
//###################################### 
if(isset($_POST['apaga_permalink'])=='e4twegwergergfggw444b5ebw8485erg656'){
$id= $_POST['id'];
$sql= mysqli_query($con, 'DELETE FROM '.$prefixo.'permalinks WHERE id="'.$id.'"');
if($sql){die(_('Permalink sucessfully Deleted.'));}else die('<i class="fa fa-exclamation-triangle"></i> '._('Was not possible to delete the permalink.'));
}













//######################################
// Get Permalinks
//###################################### 
if(isset($_GET['show_permalinks'])=='erg4sdsdfwefegr3494uu20384znv38409u3'){
$sql= mysqli_query($con, 'SELECT * FROM '.$prefixo.'permalinks') ;
if(mysqli_num_rows($sql)==0){ return '<div  style="color:#BFBFBF; text-align:center"><h1><br>'._('No results found!').'</h1></div>';}
while($row = mysqli_fetch_object($sql)) {
if(!isset($tabela_inside)){$tabela_inside="";}
$tabela_inside .='
<tr id="row_'.$row->id.'">
<td>'.$row->id.'</td>
<td>'.$row->file.'</td>
<td>'.$row->slug.' <small><a href="'.$SITE_URL.$row->slug.'" target="_blank"><i class="ti-link"></i> '._('Test it').'</a></small></td>

<td><div class="btn-group">
<span data-toggle="modal" data-target="#modal-edit-perma-'.$row->id.'" perma-id="'.$row->id.'" class="btn btn-xs btn-default editar_permalink" ><i class="ti-marker"></i></span>
<span data-toggle="confirm" data-title="'._('Are you sure?').'" id="'.$row->id.'" data-btn-ok-label="'._('Yes').'"  data-btn-cancel-label="'._('No!').'"  class="btn btn-xs btn-default apaga_permalink" ><i class="ti-trash"></i></td></span>
</div></td>
</tr>
';
?>
<!--  modal -->
<div class="modal modal-default fade" id="modal-edit-perma-<?php echo $row->id;?>" style="display: none;">
<form   class="form-horizontal change_permalink" role="form" >
 <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?php echo _('Change the slug of:').' '.$row->file;?></h4>
              </div>
              <div class="modal-body">
			 
                <input class="form-control" placeholder="Type the desired slug..." type="text" name="slug" value="<?php echo $row->slug;?>">
			    <input type="hidden" name="permalink_id" value="<?php echo $row->id;?> ">
				<input type="hidden" name="edit_permalink" value="erwfgergerg5et45t6z453t">
                
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><?php echo _('Cancel');?></button>
              <button type="submit" class="btn btn-default"  ><?php echo _('Save changes');?></button> 
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
    <!-- /.modal-dialog -->
	</form>
</div>


 <!-- END  modal -->
<?php	
	
	
	
	
}// END schleife 
	
	
echo $tabela_header= '<table class="table table-hover">
                  <tr> 
				  <th>'._('ID').'</th>
				  <th>'._('File').'</th>
                  <th>'._('Slug').'</th>
				  <th>'._('Options').'</th>
                  </tr>';
 
echo  $tabela_inside.'</table>';
echo '<script src="assets/js/bootstrap-confirmation.min.js"></script>';
echo '<script src="assets/js/permalinks_options.js"></script>';
 
}
 
//######################################
// END GET Permalinks
//###################################### 



















 



//######################################
// Get Languages
//###################################### 
if(isset($_GET['show_languages'])=='387thrgergror93j4565h9dej4'){
$lang= new lang(); $lang->get_all_lang();
}
 

		 

//######################################
// Update Language
//###################################### 
if(isset($_POST['edit_language'])=='erwfg3485jt6z4ddw4r53t'){
$lang= new lang();
$lang_id= $_POST['lang_id'];
$language_name=$_POST['language_name'];
$language_code=$_POST['language_code'];
$language_code_ini=$_POST['language_code_ini'];
	
if($lang_id && $language_name && $language_code && $language_code_ini){
$lang->update_language($lang_id,$language_name,$language_code,$language_code_ini);	
die(_('Language sucessfully Changed.'));
 }else die('<i class="fa fa-exclamation-triangle"></i> '._('Please fill all fields.'));
}



//######################################
// Add Language
//###################################### 
if(isset($_POST['send_language'])=='03e687346cd85590be5e8bee7f6dcb6e'){
$lang= new lang();
	
$language_name=$_POST['language_name'];
$language_code=$_POST['language_code'];
$language_code_ini=$_POST['language_code_ini'];


if($language_name && $language_code && $language_code_ini){	
$lang->add_language($language_name,$language_code,$language_code_ini);		
die(_('Language sucessfully Added.'));
 }else die('<i class="fa fa-exclamation-triangle"></i> '._('Please fill all fields.'));

}





//######################################
// Delete Language
//###################################### 
if(isset($_POST['apaga_language'])=='1ae0c6ab99a08e70a230f42653675203'){
$id= $_POST['id'];
$lang= new lang();
if($id){
    $lang->del_language($id);	
	die(_('Language sucessfully Deleted.'));}else 
	die('<i class="fa fa-exclamation-triangle"></i> '._('Was not possible to delete this language.'));
}


//######################################
// Activate - Deactivate language
//######################################
if(isset($_POST['update_lang_on'])=='update_sdie86394085n'){
$id= $_POST['lang_id'];
$valor= @ $_POST['lang_on'];	
$lang= new lang();
if($id){
    $lang->update_lang('lang_on',$valor,$id);	
	die(_('Language Status sucessfully Updated.'));}else 
	die('<i class="fa fa-exclamation-triangle"></i> '._('Was not possible to change the Status of this language.'));
}



 //######################################
// Show drop down Default language list 
//######################################
if(isset($_GET['show_default_language_options'])=='479dj36dhs7329skthd734jn6gd65wj'){
$lang= new lang();
	echo $lang->get_lang_drop_down();
}




//######################################
// Set the Default Language
//######################################
if(isset($_POST['set_default_language'])=='03e687346c048649854u8hr98fe8bee7f6dcb6e'){
$lang_id= $_POST['default_lang'];
$website= new website();	
if($lang_id){
    $website->update_option('language',$lang_id);	
	die(_('Default Language sucessfully Updated.'));}else 
	die('<i class="fa fa-exclamation-triangle"></i> '._('Was not possible to change the default language.'));
}



//######################################
// Change multi language
//######################################
if(isset($_POST['change_multi_lang'])=='4957fh634537h4645d649854u8hr98fe8erng90384j58fjdhs6'){
$multilanguage= @ $_POST['multilanguage_active'];
$website= new website();	

    $website->update_option('multilanguage_active',$multilanguage);	
	die(_('Multi Language sucessfully Updated.'));
}
 

 

?>