<?php
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Software: Regex The Speed Inproved PHP Login, 
// Website & User Management
// CopyRight: Litos Media - Carlos Santos de Azevedo
// Contact: info@litos.top
// 07-2017
#####################################################


$email_para= $email; 
$remetente=  get_website('name').' <'.get_website("site_email").'> ';
$reply_to=  get_website("site_email");

/*Enviar email*/
$subject = vari(get_website("new_account_mail_subject"));


/*data para o link de activar a conta*/
$mail_encriptado = encriptar( $email, 'e' );
$confirmation_link= $SITE_URL.$SEO_URL_CONFIRM_ACCOUNT.'?token='.$token.'&m='.$mail_encriptado;


 

$messagebody= vari_confirm_link($confirmation_link,vari(get_website("new_account_mail_body"))); //vari_confirm_link para que possa incluir  {CONFIRMATION_LINK} no email
 
 if(!isset($message)) {$message='';}
	
$message .= vari_subject($subject,vari(get_website("mail_header"))); //vari_subject para que possa incluir  {SUBJECT} no header
$message .= $messagebody;
$message .= vari_subject($subject,vari(get_website("mail_footer"))); //vari_subject para que possa incluir  {SUBJECT} no footer
 
 


$headers = 'From: '.$remetente. "\r\n" .
'Reply-To: '.$reply_to. "\r\n" .
'Content-Type: text/html; charset=UTF-8' . "\r\n" .
'X-Mailer: PHP/' . phpversion();
 


mail($email_para, $subject, $message, $headers);






/*Enviar ao admin se activado*/
if(get_website("email_to_admin_new_user")=="1"){include ($_SERVER['DOCUMENT_ROOT']."/inc/emails/email_to_admin_new_user.php");}

?>