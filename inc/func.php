<?php 
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Software: Regex The Speed Inproved PHP Login, 
// Website & User Management
// CopyRight: Litos Media - Carlos Santos de Azevedo
// 07-2017
#####################################################
 define('DEBUG', false);



 

if(get_website('use_ssl')=="1"){$http_https='https';}else {$http_https='http';}
$SITE_URL= $http_https."://" . $_SERVER['SERVER_NAME'].'/';
$AVATAR_PATH= "user_images/avatar/";
$LOGO_PATH= "assets/img/";
$FAVICON_PATH= "assets/img/";

 
 
 
//######################################
// Site options
//######################################
function get_website($o_que) { 
global $con;
global $prefixo; 
$sql= mysqli_query($con, 'SELECT '.$o_que.' FROM '.$prefixo.'site_options') or mysqli_error($con);
if($sql){while($row = mysqli_fetch_object($sql)) {	
return $row->$o_que; }}
}


function get_favicon() { 
global $SITE_URL;
global $FAVICON_PATH; 
$fav_url=  $SITE_URL.$FAVICON_PATH.get_website('favicon'); 
return '<link rel="apple-touch-icon" href="'.$fav_url.'">
    <link rel="icon" href="'.$fav_url.'">';
}


function get_logo() { 
global $SITE_URL;
global $LOGO_PATH; 
$logo_url=  $SITE_URL.$LOGO_PATH.get_website('logo'); 
return '<img src="'.$logo_url.'" alt="logo" class="img-responsive">';
}



 
 

 




// get first letter of each word
function initials($str) {
    $ret = '';
    foreach (explode(' ', $str) as $word)
        $ret .= strtoupper($word[0]);
    return $ret;
}


 



//######################################
// Replace Variaveis
//######################################
function vari($string) { 
$variaveis = array(
    '{CURRENT-YEAR}' => date("Y"),
    '{WEBSITE_NAME}' => get_website('name'),
	'{WEBSITE_DESCRIPTION}' => get_website('description'),
    '{SITE_EMAIL}' => get_website('site_email'),
	'{SIGNATURE}' => get_website('assinatura'),
	'{DOMAIN}' => get_website('domain'),
	'{COPYRIGHT}' => get_website('copyright'),
);
return strtr($string, $variaveis);
}



function vari_confirm_link($confirmation_link,$string) { 
$variaveis = array(
    '{CONFIRMATION_LINK}' => $confirmation_link,
);
return strtr($string, $variaveis);
}



function vari_subject($subject,$string) { 
$variaveis = array(
    '{SUBJECT}' =>  $subject,
);
return strtr($string, $variaveis);
}



function vari_last_user($string) { 
global $con;
global $prefixo;
$sql= mysqli_query($con, 'SELECT * FROM '.$prefixo.'users ORDER BY id DESC LIMIT 1');
while($row = mysqli_fetch_object($sql)) {
										$last_user_email= $row->email;
										$last_user_name= $row->username;
										$last_user_login_form= $row->social_login_plataforma; if($row->social_login_plataforma == ""){$last_user_login_form= _('Website');}
										} 
	
	
$variaveis = array(
    '{USER_EMAIL}' =>  $last_user_email,
	'{USER_NAME}' =>   $last_user_name,
	'{USER_SOCIAL_LOGIN_OR_WEBSITE}' =>  $last_user_login_form,
);
	
	
return strtr($string, $variaveis);
}







 

//######################################
// Login
//######################################
$PW_PREFIXO= "LosRab__Litos_Media_49385345f6g8h4566578544grt356sa21!"; // nome da cookie de login: md5($PW_PREFIXO."login_token")
if(isset($_COOKIE[md5($PW_PREFIXO."login_token")])){$log_cokkie= $_COOKIE[md5($PW_PREFIXO."login_token")];}


function user_is_logged_in() {
global $log_cokkie;
global $con;
global $prefixo;
$sql= mysqli_query($con, 'SELECT login_token FROM '.$prefixo.'users where login_token="'.$log_cokkie.'" AND banned="0"') or mysqli_error($con);
while($row = mysqli_fetch_object($sql)) {return $row->login_token; }
}









//######################################
// User Infos
//######################################

class user{
	

public function get_user($o_que) { 
global $con;
global $prefixo;
global $log_cokkie;
$sql= mysqli_query($con, 'SELECT '.$o_que.' FROM '.$prefixo.'users where login_token="'.$log_cokkie.'" ') or mysqli_error($con);
while($row = mysqli_fetch_object($sql)) {return $row->$o_que; } 
}
	
	
	
public function get_user_by_email($mail,$o_que) { 
global $con;
global $prefixo;
$sql= mysqli_query($con, 'SELECT '.$o_que.' FROM '.$prefixo.'users where email="'.$mail.'"  ') or mysqli_error($con);
while($row = mysqli_fetch_object($sql)) {return $row->$o_que; } 
}

	

 

public function get_dados_user($tabela_select,$where_tabela,$valor) { 
global $con;
global $prefixo;
$sql= mysqli_query($con, 'SELECT '.$tabela_select.' FROM '.$prefixo.'users where '.$where_tabela.'="'.$valor.'"  ') or mysqli_error($con);
while($row = mysqli_fetch_object($sql)) {return $row->$tabela_select; } 
}


public function user_existe($o_que,$tabela) { 
global $con;
global $prefixo;
$sql= mysqli_query($con, 'SELECT * FROM '.$prefixo.'users where '.$tabela.'="'.$o_que.'"  ') or mysqli_error($con);
while($row = mysqli_fetch_object($sql)) {return $row->$tabela; } 
}

	
	

	
	


public function user_create($tabela1,$tabela2,$tabela3,$tabela4,$tabela5,$tabela6,$tabela7, $o_que1,$o_que2,$o_que3,$o_que4,$o_que5,$o_que6,$o_que7) { 
global $con;
global $prefixo;
$query= mysqli_query ($con, 'INSERT INTO '.$prefixo.'users ('.$tabela1.', '.$tabela2.','.$tabela3.','.$tabela4.','.$tabela5.','.$tabela6.','.$tabela7.') VALUES ( 
"'.mysqli_real_escape_string($con,$o_que1).'",
"'.mysqli_real_escape_string($con,$o_que2).'", 
"'.mysqli_real_escape_string($con,$o_que3).'",
"'.mysqli_real_escape_string($con,$o_que4).'",
"'.mysqli_real_escape_string($con,$o_que5).'",
"'.mysqli_real_escape_string($con,$o_que6).'",
"'.mysqli_real_escape_string($con,$o_que7).'"
) ');}
	
	
	
	
	
	
public function create_user_from_social($tabela1,
										 $tabela2,
										 $tabela3,
										 $tabela4,
										 $tabela5,
										 $tabela6,
										 $tabela7,
										 $tabela8,
										 $tabela9,
										 $tabela10,
										 $tabela11,

										 $o_que1,
										 $o_que2,
										 $o_que3,
										 $o_que4,
										 $o_que5,
										 $o_que6,
										 $o_que7,
										 $o_que8,
										 $o_que9,
										 $o_que10,
										 $o_que11
										) { 
global $con;
global $prefixo;
$query= mysqli_query ($con, 'INSERT INTO '.$prefixo.'users ('.$tabela1.', 
															'.$tabela2.',
															'.$tabela3.',
															'.$tabela4.',
															'.$tabela5.',
															'.$tabela6.',
															'.$tabela7.',
															'.$tabela8.',
															'.$tabela9.',
															'.$tabela10.',
															'.$tabela11.'
															) VALUES ( 
"'.mysqli_real_escape_string($con,$o_que1).'",
"'.mysqli_real_escape_string($con,$o_que2).'", 
"'.mysqli_real_escape_string($con,$o_que3).'",
"'.mysqli_real_escape_string($con,$o_que4).'",
"'.mysqli_real_escape_string($con,$o_que5).'",
"'.mysqli_real_escape_string($con,$o_que6).'",
"'.mysqli_real_escape_string($con,$o_que7).'",
"'.mysqli_real_escape_string($con,$o_que8).'",
"'.mysqli_real_escape_string($con,$o_que9).'",
"'.mysqli_real_escape_string($con,$o_que10).'",
"'.mysqli_real_escape_string($con,$o_que11).'"
) ');}	
	
	 
	
	
	


public function update_user($set_tabela,$valor_to_update,$where_tabela,$where_valor) { 
global $con;
global $prefixo;
$sql= mysqli_query($con, 'UPDATE '.$prefixo.'users SET '.$set_tabela.'="'.mysqli_real_escape_string($con,$valor_to_update).'" WHERE '.$where_tabela.'="'.$where_valor.'" ') or die(mysqli_error($con)); 
}


	
	
	
	
	
 
public function social_login_update_user(
								  
								   $social_email,
								   $tab1,
								   $tab2,
								   $tab3,
								   $tab4,
								   $tab5,
								   $tab6,
								   $tab7,
								   $tab8,
								   
								   $valor1,
								   $valor2,
								   $valor3,
								   $valor4,
								   $valor5,
								   $valor6,
								   $valor7,
								   $valor8
								    
								   ) { 
global $con;
global $prefixo;
global $log_cokkie;
$sql= mysqli_query($con, 'UPDATE '.$prefixo.'users SET 
'.$tab1.'="'.mysqli_real_escape_string($con,$valor1).'",
'.$tab2.'="'.mysqli_real_escape_string($con,$valor2).'",
'.$tab3.'="'.mysqli_real_escape_string($con,$valor3).'",
'.$tab4.'="'.mysqli_real_escape_string($con,$valor4).'",
'.$tab5.'="'.mysqli_real_escape_string($con,$valor5).'",
'.$tab6.'="'.mysqli_real_escape_string($con,$valor6).'",
'.$tab7.'="'.mysqli_real_escape_string($con,$valor7).'",
'.$tab8.'="'.mysqli_real_escape_string($con,$valor8).'"

where email="'.$social_email.'"


 '); 
}
	

	
 
public function update_logged_user($set_tabela,$valor_to_update) { 
global $con;
global $prefixo;
global $log_cokkie;
$sql= mysqli_query($con, 'UPDATE '.$prefixo.'users SET '.$set_tabela.'="'.mysqli_real_escape_string($con,$valor_to_update).'" WHERE login_token="'.$log_cokkie.'" ') or die(mysqli_error($con)); 
}


public function get_logged_user($tabela) { 
global $con;
global $prefixo;
global $log_cokkie;
$sql= mysqli_query($con, 'SELECT '.$tabela.' FROM '.$prefixo.'users WHERE login_token="'.$log_cokkie.'"  ') or mysqli_error($con);
while($row = mysqli_fetch_object($sql)) {return $row->$tabela; }  
}

	
	

//////////////////////////////////////////////////////////////////////////////////////////////////
public function permited_roles($accepted_roles,$rediret_url_for_other_roles){ 
global $con;
global $prefixo;
global $log_cokkie;
$logged_in_role= $this->get_logged_user('role'); 
$accepted_roles=explode(',',$accepted_roles);
if(!in_array($logged_in_role,$accepted_roles) && $logged_in_role !='super_admin'){
ob_start();	
header('Location: '.$rediret_url_for_other_roles);
die();
}
  

	
}	
	


public function user_profile_img(){ 
global $con;
global $prefixo; 
global $log_cokkie; 
global $AVATAR_PATH;
global $SITE_URL;
$result= $SITE_URL.$AVATAR_PATH.get_website("default_avatar");
if($log_cokkie){	
$sql= mysqli_query($con, 'SELECT avatar FROM '.$prefixo.'users WHERE login_token="'.$log_cokkie.'"  ') or mysqli_error($con);
while($row = mysqli_fetch_object($sql)) {
if(strlen($row->avatar) > 2){ $result=  $SITE_URL.$AVATAR_PATH.$row->avatar;}
}
} 
return $result;
}        
public function welkome_user($email,$name) {
global $SITE_URL;
$email_para= get_website("site_email"); 
$remetente=  get_website('name').' <'.get_website("site_email").'> ';
$reply_to=  get_website("site_email");
$subject= 'Welkome to Regex. 
Thank you for installing our Script at '.$SITE_URL;
$message .= vari_subject($subject,vari(get_website("mail_header")));	
$message .= 'Hi '.$name.',
Thank you for installing our Script at '.$SITE_URL.'
The Email that you registered is: '.$email;
$message .= vari_subject($subject,vari(get_website("mail_footer")));
	
$headers = 'From: '.$remetente. "\r\n" .
'Reply-To: '.$reply_to. "\r\n" .
'Content-Type: text/html; charset=UTF-8' . "\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($email_para, $subject, htmlentities($message), $headers);
}	

 



public function is_admin(){ 
global $con;
global $prefixo;
global $log_cokkie;
$sql= mysqli_query($con, 'SELECT role FROM '.$prefixo.'users WHERE login_token="'.$log_cokkie.'"  ') or mysqli_error($con);
while($row = mysqli_fetch_object($sql)) {
if ($row->role== 'admin' || $row->role=='super_admin'){return true;}else return false;
}  
}


	
	
	


public function email_is_admin($email){ 
global $con;
global $prefixo;
$sql= mysqli_query($con, 'SELECT role FROM '.$prefixo.'users WHERE email="'.$email.'"  ') or mysqli_error($con);
while($row = mysqli_fetch_object($sql)) {
if ($row->role== 'admin' || $row->role=='super_admin'){return true;}else return false;
}  
}





public function get_user_ip(){

if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } elseif (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } elseif (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }
    return $ipaddress;
}

	
	
	
public function user_ip_is_banned() { 
global $con;
global $prefixo;
$user_ip= $this->get_user_ip();
global $user_ip;
$sql= mysqli_query($con, 'SELECT * FROM '.$prefixo.'users where banned="1" AND user_ip_last_login="'.$user_ip.'" ') or mysqli_error($con);
while($row = mysqli_fetch_object($sql)) {return $row->banned; } 
}
	
 
 

}/// USER Class end













//######################################
// Encript option
//######################################
function encriptar( $string, $action = 'e' ) {
 
    $secret_key = 'we348rlitosmedia3434tub3uf';
    $secret_iv = 'we3qwd48rlitosmedia3434tub3qwduf';
 
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
 
    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }
 
    return $output;
}





//######################################
//  Confirm linkt to activate new account
//######################################
function check_activation_link_new_account($email_token,$m) { 
global $con;
global $prefixo;
global $PW_PREFIXO;
global $COOKIE_LIFE_TIME;	
$user= new user();
$email_com_este_token= $user->get_dados_user('email','register_token',$email_token);
if($email_com_este_token == $m){$mensagem= ok_box(_('Your account was activated sussefully!')); 

$user->update_user('register_token','activated','register_token',$email_token); // Tirar o token ao ativar a conta

$login_token = bin2hex(random_bytes(28)); //php7 (ira ser criado sempre om novo login token cada vez que faz login)
$user->update_user('login_token',$login_token,'email',$m); // criar o login token para fazer login
//fazer login
setcookie(md5($PW_PREFIXO."login_token"),$login_token,time()+(3600*$COOKIE_LIFE_TIME));  

} else 
{$mensagem= erro_box(_('Your link is not valid anymore! Please contact us.'));}

return $mensagem;
}




//######################################
// Clean Not Activated Users Accounts
//######################################
function clean_not_activated_users() { 
global $con;
global $prefixo;
$token_confirm_new_account_life_time= get_website('token_confirm_new_account_life_time');
$sql= mysqli_query($con, 'DELETE FROM '.$prefixo.'users WHERE register_token!="activated" AND reg_date < DATE_SUB(NOW(), INTERVAL '.$token_confirm_new_account_life_time.' DAY)') or mysqli_error($con);
 
}



//######################################
//  images
//######################################

class imagem{
	
	
function is_image($path)
{
    $a = getimagesize($path);
    $image_type = $a[2];
     
    if(in_array($image_type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP)))
    {
        return true;
    }
    return false;
} 




function resize($newWidth, $targetFile, $originalFile) {
 


	
    $info = getimagesize($originalFile);
    $mime = $info['mime'];

    switch ($mime) {
            case 'image/jpeg':
                    $image_create_func = 'imagecreatefromjpeg';
                    $image_save_func = 'imagejpeg';
                    $new_image_ext = 'jpg';
                    break;
			
			  case 'image/jpg':
                    $image_create_func = 'imagecreatefromjpeg';
                    $image_save_func = 'imagejpeg';
                    $new_image_ext = 'jpg';
                    break;
			
			 case 'image/pjpeg':
                    $image_create_func = 'imagecreatefromjpeg';
                    $image_save_func = 'imagejpeg';
                    $new_image_ext = 'jpg';
                    break;
 
			
			 case 'image/x-png':
                    $image_create_func = 'imagecreatefrompng';
                    $image_save_func = 'imagepng';
                    $new_image_ext = 'png';
					 
                    break;
			
			
			

            case 'image/png':
                    $image_create_func = 'imagecreatefrompng';
                    $image_save_func = 'imagepng';
                    $new_image_ext = 'png';
					 break;
					
					
                    

            case 'image/gif':
                    $image_create_func = 'imagecreatefromgif';
                    $image_save_func = 'imagegif';
                    $new_image_ext = 'gif';
                    break;

            default: 
                    throw new Exception('Unknown image type.');
    }

 
		
	
	
	
    $img = $image_create_func($originalFile);
    list($width, $height) = getimagesize($originalFile);

    $newHeight = ($height / $width) * $newWidth;
    $tmp = imagecreatetruecolor($newWidth, $newHeight);
	
	
	 /* Para que o bg fique da mesma cor*/
    $background = imagecolorallocate($tmp, 0, 0, 0);
    imagecolortransparent($tmp, $background);
    imagealphablending($tmp, false);
    imagesavealpha($tmp, true);
	/* Para que o bg fique da mesma cor*/
	
    imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    if (file_exists($targetFile)) {
            unlink($targetFile);
    }
    $image_save_func($tmp, "$targetFile.$new_image_ext");
}

	
	
	
	
	
	
	

	
	
	
function get_image_ext($originalFile) {
 
 
    $info = getimagesize($originalFile);
    $mime = $info['mime'];

    switch ($mime) {
            case 'image/jpeg':
                    $image_create_func = 'imagecreatefromjpeg';
                    $image_save_func = 'imagejpeg';
                    $new_image_ext = 'jpg';
                    break;
			
			  case 'image/jpg':
                    $image_create_func = 'imagecreatefromjpeg';
                    $image_save_func = 'imagejpeg';
                    $new_image_ext = 'jpg';
                    break;
			
			 case 'image/pjpeg':
                    $image_create_func = 'imagecreatefromjpeg';
                    $image_save_func = 'imagejpeg';
                    $new_image_ext = 'jpg';
                    break;
 
			
			 case 'image/x-png':
                    $image_create_func = 'imagecreatefrompng';
                    $image_save_func = 'imagepng';
                    $new_image_ext = 'png';
					 
                    break;
			
			
			

            case 'image/png':
                    $image_create_func = 'imagecreatefrompng';
                    $image_save_func = 'imagepng';
                    $new_image_ext = 'png';
					 break;
					
					
                    

            case 'image/gif':
                    $image_create_func = 'imagecreatefromgif';
                    $image_save_func = 'imagegif';
                    $new_image_ext = 'gif';
                    break;

            default: 
                    throw new Exception('Unknown image type.');
    }

 
return '.'.$new_image_ext;
}	







	
	
	
function rotateImage($sourceFile,$destImageName,$degreeOfRotation)
{
  $imageinfo=getimagesize($sourceFile);
  switch($imageinfo['mime'])
  {
  
  //create the image according to the content type
   case "image/jpg":
   case "image/jpeg":
   case "image/pjpeg": //for IE
  
  $src_img=imagecreatefromjpeg("$sourceFile");
  $image_save_func = 'imagejpeg';
                break;
    
	
	case "image/gif":
        $src_img = imagecreatefromgif("$sourceFile");
		$image_save_func = 'imagegif';
                break;
    
	case "image/png":
    case "image/x-png": //for IE
        $src_img = imagecreatefrompng("$sourceFile");
		$image_save_func = 'imagepng';
                break;
  }
  
  
  
  /* Para que o bg fique da mesma cor*/
    $background = imagecolorallocate($src_img, 0, 0, 0);
    imagecolortransparent($src_img, $background);
    imagealphablending($src_img, false);
    imagesavealpha($src_img, true);
	/* Para que o bg fique da mesma cor*/
  
  
  //rotate the image according to the spcified degree
  $src_img = imagerotate($src_img, $degreeOfRotation, 0);
	
	
  //output the image to a file
  $image_save_func ($src_img,$destImageName);
}





}// END class imagem






//######################################
// Error box
//######################################
function erro_box ($msg){
$erro_box='<div class="text-center alert alert-danger" role="alert"><strong>'._('Error!').'</strong> '.$msg.'</div>';
return $erro_box;
}

 
 
//######################################
// ok box
//######################################
function ok_box ($msg){
$erro_box='<div class="text-center alert alert-success" role="alert">'.$msg.'</div>';
 
return $erro_box;
}



//######################################
// Litos Media
//######################################
function get_litos_media($o_que) { 
global $con;
global $prefixo;
$sql= mysqli_query($con, 'SELECT * FROM '.$prefixo.'litos_media');
while($row = mysqli_fetch_object($sql)) {return $row->$o_que; }
}
	


















/*######################################
// Languages
//#####################################*/

class lang{
 
function get_lang($id,$o_que) { 
global $con;
global $prefixo; 
$sql= mysqli_query($con, 'SELECT '.$o_que.' FROM '.$prefixo.'languages WHERE id="'.$id.'"') or mysqli_error($con);
while($row = mysqli_fetch_object($sql)) {	
return $row->$o_que; }
}	
	
public function update_lang($set_tabela,$valor_to_update,$where_id) { 
global $con;
global $prefixo;
$sql= mysqli_query($con, 'UPDATE '.$prefixo.'languages SET '.$set_tabela.'="'.mysqli_real_escape_string($con,$valor_to_update).'" WHERE id="'.$where_id.'"'); 
}	
	
	
	
	
public function get_lang_drop_down() { 
global $con;
global $prefixo;
$sql= mysqli_query($con, 'SELECT * FROM '.$prefixo.'languages WHERE lang_on="1"') ;
if(mysqli_num_rows($sql)==0){ return '<option>'._('You need to add and activate a Language!').'</option>';die();}
echo '<option disabled="disabled" selected>'._('-- Please select a Language --').'</option>';
while($row = mysqli_fetch_object($sql)) {
$lang= new lang();		
if(get_website('language') == $row->id){$selected='selected';}else {$selected='';}	
	
echo '<option value="'.$row->id.'" '.$selected.'>'.$row->language_name.'</option>';
}	
}//	
	
	
	

public function get_lang_drop_down_for_users($user_id, $user_choosed_lang) { 
global $con;
global $prefixo;
$sql= mysqli_query($con, 'SELECT * FROM '.$prefixo.'languages WHERE lang_on="1"') ;
if(mysqli_num_rows($sql)==0){ return '<option>'._('There are no Languages to choose!').'</option>';die();}
echo '<option disabled="disabled" selected>'._('-- Please select a Language --').'</option>';
while($row = mysqli_fetch_object($sql)) {
$lang= new lang();		
if($user_choosed_lang == $row->id){$selected='selected';}else {$selected='';}	
	
echo '<option value="'.$row->id.'" '.$selected.'>'.$row->language_name.'</option>';
}	
}//		
	
 
	
	
public function get_all_lang(){ 
global $con;
global $prefixo; 
$sql= mysqli_query($con, 'SELECT * FROM '.$prefixo.'languages') ;
if(mysqli_num_rows($sql)==0){ return '<div  style="color:#BFBFBF; text-align:center"><h1><br>'._('No results found!').'</h1></div>';}
while($row = mysqli_fetch_object($sql)) {
$lang= new lang();	
	
	
if($lang->get_lang($row->id,'lang_on')==1){$checked='checked';}else {$checked='';}

if(!isset($tabela_inside)){$tabela_inside="";}	
$tabela_inside .='
<tr id="row_'.$row->id.'">
<td>'.$row->language_name.'</td>
<td>'.$row->language_code.'</td>
<td>'.$row->language_code_ini.'</td>

 
<td>
<!--Checkbox -->
<form class="update_lang_on">
<input type="checkbox" class="slide-check" value="1" name="lang_on" id="lang_on" '.$checked.'>
<input type="hidden" name="lang_id" value="'.$row->id.'" >
<input type="hidden" name="update_lang_on" value="update_sdie86394085n">
</form>
</td>

<td><div class="btn-group">
<span data-toggle="modal" data-target="#modal-edit-lang-'.$row->id.'" lang-id="'.$row->id.'" class="btn btn-xs btn-default editar_lang" ><i class="ti-marker"></i></span>
<span data-toggle="confirm" data-title="'._('Are you sure?').'" id="'.$row->id.'" data-btn-ok-label="'._('Yes').'"  data-btn-cancel-label="'._('No!').'"  class="btn btn-xs btn-default apaga_language" ><i class="ti-trash"></i></span>
</div>
</td>
</tr>
';
?>
<!--  modal -->
<div class="modal modal-default fade" id="modal-edit-lang-<?php echo $row->id;?>" style="display: none;">
<form   class="form-horizontal change_language" role="form" >
 <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?php echo _('Change ').' '.$row->language_name;?></h4>
              </div>
              <div class="modal-body">
			 
                 
                <input type="text" name="language_name" class="form-control" placeholder="Type the Language name ex. German" value="<?php echo $row->language_name;?>">
				<input type="text" name="language_code" class="form-control" placeholder="Language Code Reference ex. de_DE" value="<?php echo $row->language_code;?>">
				<input type="text" name="language_code_ini" class="form-control" placeholder="Language Code ini. ex. de " value="<?php echo $row->language_code_ini;?>">
                
			    <input type="hidden" name="lang_id" value="<?php echo $row->id;?> ">
				<input type="hidden" name="edit_language" value="erwfg3485jt6z4ddw4r53t">
                
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><?php echo _('Cancel');?></button>
              <button type="submit" class="btn btn-default" ><?php echo _('Save changes');?></button> 
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
				  <th>'._('Language Name').'</th>
				  <th>'._('Language Code').'</th>
                  <th>'._('Language Initals').'</th>
				  <th>'._('Activated?').'</th>
				  <th>'._('Options').'</th>
                  </tr>';
 
echo  $tabela_inside.'</table>';
echo '<script src="assets/js/bootstrap-confirmation.min.js"></script>';
 
	 
}
//
	
	
	

public function update_language($id,$language_name,$language_code,$language_code_ini) { 
global $con;
global $prefixo;
$sql= mysqli_query($con, 'UPDATE '.$prefixo.'languages SET 
language_name="'.$language_name.'", language_code="'.$language_code.'", language_code_ini="'.$language_code_ini.'" 
WHERE id="'.$id.'" ');
}
	
	
	
	
public function add_language($language_name,$language_code,$language_code_ini) { 
global $con;
global $prefixo;
mysqli_query ($con, 'INSERT INTO '.$prefixo.'languages (language_name,language_code,language_code_ini) VALUES ( 
"'.mysqli_real_escape_string($con,$language_name).'",
"'.mysqli_real_escape_string($con,$language_code).'",
"'.mysqli_real_escape_string($con,$language_code_ini).'"
) ');
}
	
	
 
public function del_language($id) { 
global $con;
global $prefixo;
$sql= mysqli_query($con, 'DELETE FROM '.$prefixo.'languages WHERE id="'.$id.'"');
}
 
	
}// End class Languages



















//######################################
// Permalinks slugs
//######################################
function get_permalink($file){ 
global $con;
global $prefixo; 
$sql= mysqli_query($con, 'SELECT * FROM '.$prefixo.'permalinks WHERE file="'.$file.'" ') ;
while($row = mysqli_fetch_object($sql)) {return $row->slug;}
}

$SEO_URL_ADMIN_DASCHBOARD='_admin_back/index.php';




$SEO_URL_LOGIN='login.php'; 
if(get_permalink('login.php')){$SEO_URL_LOGIN=get_permalink('login.php');}

$SEO_URL_LOGOUT='logout.php'; 
if(get_permalink('logout.php')){$SEO_URL_LOGOUT=get_permalink('logout.php');}

$SEO_URL_REGISTER='registar.php';  
if(get_permalink('registar.php')){$SEO_URL_REGISTER=get_permalink('registar.php');}

$SEO_URL_CONFIRM_ACCOUNT='confirm_account.php';
if(get_permalink('confirm_account.php')){$SEO_URL_CONFIRM_ACCOUNT=get_permalink('confirm_account.php');}

$SEO_URL_TERMS_CONDITIONS='terms_conditions.php';
if(get_permalink('terms_conditions.php')){$SEO_URL_TERMS_CONDITIONS=get_permalink('terms_conditions.php');}

$SEO_URL_PRIVACY_POLICE='terms_policy.php';
if(get_permalink('terms_policy.php')){$SEO_URL_PRIVACY_POLICE=get_permalink('terms_policy.php');}

$SEO_URL_MY_ACCOUNT='my_account.php';
if(get_permalink('my_account.php')){$SEO_URL_MY_ACCOUNT=get_permalink('my_account.php');}

$SEO_URL_USER_PW_RECOVERY= 'user-pw-recovery.php';
if(get_permalink('user-pw-recovery.php')){$SEO_URL_USER_PW_RECOVERY=get_permalink('user-pw-recovery.php');}

$SEO_URL_NEW_PW='user-set-new-pw.php';
if(get_permalink('user-set-new-pw.php')){$SEO_URL_NEW_PW=get_permalink('user-set-new-pw.php');}

$SEO_URL_MY_ACCOUNT_CHANGE_PW='my_account-change-pw.php';
if(get_permalink('my_account-change-pw.php')){$SEO_URL_MY_ACCOUNT_CHANGE_PW=get_permalink('my_account-change-pw.php');}


$SEO_URL_CONTACT_PAGE='contact.php';
if(get_permalink('contact.php')){$SEO_URL_CONTACT_PAGE=get_permalink('contact.php');}


$SEO_URL_SUPPORT_PAGE='support.php';
if(get_permalink('support.php')){$SEO_URL_SUPPORT_PAGE=get_permalink('support.php');}













//######################################
// DB Update
//######################################
function add_column($col_name,$table,$db_column_type) { 
global $con;
global $prefixo; 
$col = mysqli_query($con, 'SELECT '.$col_name.' FROM '.$prefixo.$table.' ');
if (!$col){ $insert_col = mysqli_query($con, 'ALTER TABLE '.$prefixo.$table.' ADD '.$col_name.' '.$db_column_type.'');}
 }


function drop_column($col_name,$table) { 
global $con;
global $prefixo; 
$col = mysqli_query($con, 'SELECT '.$col_name.' FROM '.$prefixo.$table.' ');
if ($col){ $drop_col = mysqli_query($con, 'ALTER TABLE '.$prefixo.$table.' DROP '.$col_name.' ');}
 }



function add_table($table_name) { 
global $con;
global $prefixo;
$tbl = mysqli_query($con, 'SELECT * FROM '.$prefixo.$table_name.' ');
if(!$tbl) { mysqli_query($con, 'CREATE TABLE '.$prefixo.$table_name.' (id int(20) AUTO_INCREMENT,PRIMARY KEY (id)) ');}
}




function add_new_version($version) { 
global $con;
global $prefixo; 
 $insert_col = mysqli_query($con, 'UPDATE '.$prefixo.'litos_media SET version="'.$version.'"');
 }





//######################################
// Config
//######################################
$REGEX_VERSION="2.6";
 
$LANGUAGE_TO_USE='en_EN';
$lang= new lang();
$user= new user();
if (get_website('language')){$LANGUAGE_TO_USE= $lang->get_lang(get_website('language'),'language_code');}//Default Language
if ($user->get_logged_user('language') && get_website('multilanguage_active') =='1'){$LANGUAGE_TO_USE= $lang->get_lang($user->get_logged_user('language'),'language_code');}// user language



@date_default_timezone_set("Europe/Berlin");
setlocale (LC_ALL, $LANGUAGE_TO_USE);
header('Content-Type: text/html; charset=utf-8');

  
 
/******************************************************/
$lingua_a_usar= $LANGUAGE_TO_USE; //de_DE 
$locale = $LANGUAGE_TO_USE; // setzt die gewält Sprache  
$domain = $LANGUAGE_TO_USE;// nome do ficheiro traduzido (.mo datei) 
$encoding = 'UTF-8'; // setzt die Zeichenkodierung
// teilt gettext die Sprache mit
setlocale(LC_MESSAGES, 'language');
// teilt gettext mit, wo es die Übersetzungen suchen soll
bindtextdomain($domain, $_SERVER['DOCUMENT_ROOT']."/language/");
// teilt gettext die zu verwendene Zeichenkodierung mit
bind_textdomain_codeset($domain, $encoding);
// weist gettext an, die definierte Domäne zu verwenden
textdomain($domain);
// gettext erwartet die Übersetzung nun in
// ./locale/de_DE/LC_MESSAGES/myApplication.mo
/*********/////////////////////////////////////////////////
/// debug
if(DEBUG == true){
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
}else{
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);
}
//######################################
// END Config
//######################################
?>