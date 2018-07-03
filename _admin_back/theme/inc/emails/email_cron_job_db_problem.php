<?php
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Website & User Management
// CopyRight: Carlos Santos de Azevedo
//#####################################################

$email_para= get_website("site_email"); 
$remetente=  get_website('name').' <'.get_website("site_email").'> ';
$reply_to=  $email_para;


/*Enviar email*/
 
 
$subject = _('There was a problem with your Database Credentials').' '.('DB-ID:').' '.$db_id; 

$messagebody= nl2br ('Hello,

there was a Backup for the Database: <strong>'.$db_id.' - '.$this->get_db($db_id,'title').'</strong> that could not be done. 
Please check the credentials of this Database.

');

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