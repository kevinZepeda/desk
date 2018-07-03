<?php
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Software: Regex The Speed Inproved PHP Login, 
// Website & User Management
// CopyRight: Litos Media - Carlos Santos de Azevedo
// Contact: info@litos.top
// 07-2017
#####################################################

//######################################
// Email to admin
//######################################
$email_para2= get_website("site_email"); 
$remetente2=  get_website('name').' <'.get_website("site_email").'> ';
$reply_to2=  get_website("site_email");

/*Enviar email*/
$subject2 = vari_last_user(vari(get_website("admin_new_account_mail_subject")));




$messagebody2= vari(get_website("admin_new_account_mail_body")); 
 
if(!isset($message2)) {$message2='';}
	
$message2 .= vari_subject($subject2,vari(get_website("mail_header"))); //vari_subject para que possa incluir  {SUBJECT} no header
$message2 .= vari_last_user($messagebody2); // Variaveis do user registado
$message2 .= vari_subject($subject2,vari(get_website("mail_footer"))); //vari_subject para que possa incluir  {SUBJECT} no footer
 
 


$headers2 = 'From: '.$remetente2. "\r\n" .
'Reply-To: '.$reply_to2. "\r\n" .
'Content-Type: text/html; charset=UTF-8' . "\r\n" .
'X-Mailer: PHP/' . phpversion();
 


mail($email_para2, $subject2, $message2, $headers2);

?>