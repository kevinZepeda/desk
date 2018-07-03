<?php
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Website & User Management
// CopyRight: Carlos Santos de Azevedo
//#####################################################

$email_para= get_website("site_email"); 
$remetente=  get_website('name').' <'.get_website("site_email").'> ';
$reply_to=  $email;


/*Enviar email*/
if($firmaname){$firma= '('._('Company:').' '.$firmaname.')';}
if($tel){$telefone= 'Tel.: '.$tel;}
$subject = _('Website Kontakt').' '.('From:').' '.$name.' '.$firma. ' '.$telefone; 

$messagebody= nl2br ($msg);

if(!isset($message)) {$message='';}
	
$message .= vari_subject($subject,vari(get_website("mail_header"))); //vari_subject para que possa incluir  {SUBJECT} no header
$message .= $messagebody;
$message .= vari_subject($subject,vari(get_website("mail_footer"))); //vari_subject para que possa incluir  {SUBJECT} no footer
 
 


$headers = 'From: '.$remetente. "\r\n" .
'Reply-To: '.$reply_to. "\r\n" .
'Content-Type: text/html; charset=UTF-8' . "\r\n" .
'X-Mailer: PHP/' . phpversion();
 


mail($email_para, $subject, $message, $headers);

?>