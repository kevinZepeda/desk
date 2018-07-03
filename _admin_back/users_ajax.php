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
 
 
 



//######################################
// Procura, listar de ususarios
//######################################
if(isset($_GET['busca_users'])=='e4t0whwe8cr0nz347tnwe68h44wqwt65tbw444b5ebw8485e4btz3z64b3zv656'){
$busca_users= $_GET['busca_users'];

if(isset($_GET['s'])){$s= $_GET['s'];}
	
if(!isset($s_query)){$s_query="";}	
if (isset($s)){ $s_query= "WHERE username LIKE '%". mysqli_real_escape_string($con,$s) ."%' OR  
                            email LIKE '%". mysqli_real_escape_string($con,$s) ."%' OR  
							role LIKE '%". mysqli_real_escape_string($con,$s) ."%'";} else $s="";
  

/*============  Paginacao em cima ==============*/
$start=0;
$limit=10;
if(isset($_GET['pagina'])){$pagina=$_GET['pagina'];$start=($pagina-1)*$limit;}else{$pagina=1;}
/*============  Paginacao em cima ==============*/



 
$client= new client();

$sql= mysqli_query($con, 'SELECT  *  FROM '.$prefixo.'users '.$s_query.' order by id DESC LIMIT '.$start.', '.$limit.'') ;
while($row = mysqli_fetch_object($sql)) {
 
if($row->banned=='1'){
$banned_bg='style="background-color:#ffd7d7;background-image: url(assets/img/Banned.png);background-repeat: no-repeat;"';
$icon_ban="ti-lock";
$text_ban="Unban this user?";
}else{$banned_bg='';$icon_ban="ti-unlock"; $text_ban="Ban this user?";}
	
	
if(!isset($tabela_inside)){$tabela_inside="";}	
$tabela_inside .= ' 
<tr id="row_'.$row->id.'" '.$banned_bg.'>
<td>'.$row->id.'</td>
<td><div class="user_list_avatar_container"><div class="user_list_avatar_img" style="background-image: url('.$client->get_client_avatar($row->id).')"></div></div></td>
<td>'.$row->username.'</td>
<td><span class="label label-default">'.$client->print_user_role($row->id).'</span></td>
<td>'.$row->email.'</td>
<td>'.$row->reg_date.'</td>
<td>'.$row->last_login.'</td>
<td> 
<div class="btn-group">
<a href="'.$SEO_URL_USERS_EDIT.'?id='.$row->id.'" class="btn btn-xs btn-default" ><i class="ti-marker"></i></a>
<a data-toggle="confirm" data-title="'._('Delete this user?').'" id="'.$row->id.'" data-btn-ok-label="'._('Yes').'"  data-btn-cancel-label="'._('No!').'"  class="btn btn-xs btn-default apaga_user" ><i class="ti-trash"></i></a>
<a data-toggle="confirm" data-title="'._($text_ban).'" id="'.$row->id.'" data-btn-ok-label="'._('Yes').'"  data-btn-cancel-label="'._('No!').'"  class="btn btn-xs btn-default ban_user" ><i class="'.$icon_ban.'"></i></a>
</div>
</td>
</tr>
';
}
    
 
echo $tabela_header= '<table class="table table-hover">
                  <tr> 
				  <th>'._('ID').'</th>
				  <th>'._('Avatar').'</th>
                  <th>'._('Username').'</th>
                  <th>'._('User Role').'</th>
                  <th>'._('Email').'</th>
                  <th>'._('Register Date').'</th>
                  <th>'._('Last login').'</th>
                  <th>'._('Option').'</th>
                  </tr>';
				
				  
if(!isset($tabela_inside)){$tabela_inside="";}				          
echo  $tabela_inside.'</table>';


/*============  Paginacao em baixo ==============*/
//contar os resultados da base de dados
$rows=mysqli_num_rows(mysqli_query($con,'SELECT  *  FROM '.$prefixo.'users '.$s_query.' '));
 if($rows=='0') echo '<div  style="color:#BFBFBF; text-align:center"><h1><br>'._('No results found!').'</h1></div>';
$total=ceil($rows/$limit);//Calcular o numero de paginas

if(!isset($link_pagina)){$link_pagina="";}	
	
echo'<div class="row"></div><br><ul class="paginacao">'; 
if($pagina>1){
echo '<li><a href="'.$_SERVER['PHP_SELF'].'?'.$link_pagina.'&pagina='.($pagina-1).'&s='.$s.'&busca_users='.$busca_users.'">&laquo;</a></li>';} // recuar uma pagina

//Mostar as paginas todas.  
for($i=1;$i<=$total;$i++){
	
if($i==$pagina) { echo '<li><a href="'.$_SERVER['PHP_SELF'].'?'.$link_pagina.'&pagina='.$pagina.'&s='.$s.'&busca_users='.$busca_users.'" class="active">'.$i.'</a></li>'; } /*pagina activa*/

else { echo '<li><a href="'.$_SERVER['PHP_SELF'].'?'.$link_pagina.'&pagina='.$i.'&s='.$s.'&busca_users='.$busca_users.'">'.$i.'</a></li>';}
}

if($pagina!=$total){echo '<li><a href="'.$_SERVER['PHP_SELF'].'?'.$link_pagina.'&pagina='.($pagina+1).'&s='.$s.'&busca_users='.$busca_users.'">&raquo;</a></li>';} // avancar uma pagina 
echo '</ul>';
/*============ FIM Paginacao em baixo ==============*/ 
 
echo '<script src="assets/js/bootstrap-confirmation.min.js"></script>';
 
echo '<script src="assets/js/notificacoes.js"></script></script>';
}
 
 
  

/*DEMO*/
if($demo_on == "1" && $_GET['busca_users']!='e4t0whwe8cr0nz347tnwe68h44wqwt65tbw444b5ebw8485e4btz3z64b3zv656')die(_('<i class="fa fa-exclamation-triangle"></i>   This feature is deactivated on the demo.'));
 







//######################################
// Apagar Usuario
//######################################
if(isset($_POST['wef3wef34gh4'])== 'e4twegfggw444b5ebw8485erg656'){
 
$client= new client();

if($client->get_client('role',$_POST['id'])=="super_admin"){die('<i class="fa fa-exclamation-triangle"></i>  '.sprintf(_('Users with the role %s can not be deleted.'),$client->print_role('super_admin')));}

 
if($client->get_client('role',$_POST['id'])!="super_admin"){
$avartar_path = '../'.$AVATAR_PATH.$client->get_client('avatar',$_POST['id']); 
if($avartar_path){ unlink($avartar_path);}
$client->delete_client($_POST['id']);
 
die(_('This user was sucessfully deleted.'));
}

}







 
//######################################
// Ban & Unban User
//######################################
if(isset($_POST['g4g34fg4545gg54g'])== 'e4twe4545t45t'){
 
$client= new client();

if($client->get_client('role',$_POST['id'])=="super_admin"){die('<i class="fa fa-exclamation-triangle"></i>  '.sprintf(_('Users with the role %s can not be banned.'),$client->print_role('super_admin')));}

 
if($client->get_client('role',$_POST['id'])!="super_admin"){
$client->ban_unban_client($_POST['id']);
 
die(_('Changes sucessfully done.'));
}

}

 
 





//######################################
// Update user profil data
//###################################### 
if(isset($_POST['update_user_info'])=='er34tf8fh23eww'){


if(strlen($_POST['email']) < 1){  die('<i class="fa fa-exclamation-triangle"></i> '._('You must set a Email.'));}	
if ($_POST['email']){
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {die('<i class="fa fa-exclamation-triangle"></i> '._('Your E-Mail is not valid.'));}
}

if(strlen($_POST['username']) < 4){  die('<i class="fa fa-exclamation-triangle"></i> '._('The Username must be at least 4 characters'));}
if (preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬]/', $_POST['username'])){die('<i class="fa fa-exclamation-triangle"></i> '._('Your username can not contain special characters. Only _ and - are allowed'));}
 
 
$client= new client(); 

$client->update_client($_POST['id'],'username',$_POST['username']);
$client->update_client($_POST['id'],'email',$_POST['email']);
if(isset($_POST['user_language'])){$client->update_client($_POST['id'],'language',$_POST['user_language']);}
$client->update_client($_POST['id'],'profile_headline',$_POST['profile_headline']);
$client->update_client($_POST['id'],'location',$_POST['location']);
$client->update_client($_POST['id'],'profile_description',$_POST['profile_description']);
if($client->get_client('role',$_POST['id'])!="super_admin"){$client->update_client($_POST['id'],'role',$_POST['role']);}

 

die(_('Your information was sucessfully updated'));


}
 

 




//######################################
// Change Client Password
//######################################
if(isset($_POST['minha_conta_change_pw'])=='z6j8t68j46/jz467/*7u/67'){ 
$new_pw= $_POST['new_pw'];
$pw_confirm= $_POST['pw_confirm'];	

$user= new user();

 
if($pw_confirm != $new_pw){die('<i class="fa fa-exclamation-triangle"></i> '._('The Password did not match')); }
 
$pw_min_length= get_website('pw_min_length');
if(strlen($new_pw) < $pw_min_length){die('<i class="fa fa-exclamation-triangle"></i> '.sprintf(_('The Password must be at least %s characters'),$pw_min_length));}
 
 
 
//change pw and set new login token to kik the logged in users
$login_token = bin2hex(random_bytes(28)); 

$client= new client(); 
$client->update_client($_POST['id'],'login_token',$login_token);
$client->update_client($_POST['id'],'senha',md5($PW_PREFIXO.$new_pw));
 
 
die(_('Your password was changed sucessfully'));
} 






//######################################
// Update user avatar
//###################################### 
if(isset($_POST['send_avatar'])=='684geg4545/6z565/943'){
 
 
//Ficheiro recebido?
if (!empty($_FILES)) {
	
	
	
//Criar classes usadas 
$client= new client();
$imagem= new imagem();

//Criar variaveis necessarias para o nome do ficheiro
$user_id= $_POST['id'];
$newFileName= $user_id.'-avatar-'.time();

 
//Onde guardar
$ds = DIRECTORY_SEPARATOR;
 
	
	
	
// Dados do ficheiro	
$tempFile = $_FILES['file']['tmp_name'];           
$targetPath =  $_SERVER['DOCUMENT_ROOT'] . $ds . $AVATAR_PATH;   
$targetFile= $targetPath.$newFileName;
 
 
 
 
//Check if is image
if(!$imagem->is_image($tempFile)){die('<i class="fa fa-exclamation-triangle"></i> '._('This file is not permited. Please upload only images.'));} 

 
 
 
 
  
//Check Image size
$maxFileSize = get_website('avatar_upload_max_size') * 1024 * 1024; 
if ($_FILES['file']['size'] > $maxFileSize ){die('<i class="fa fa-exclamation-triangle"></i> '._('This file is to big. The max. image size is:').' '.get_website('avatar_upload_max_size').'MB');}
 
  
 
 
  
	
//Delete old avatar
$old_avatar= $client->get_client('avatar',$user_id);
if($old_avatar){unlink($targetPath.$old_avatar);}	
$client->update_client($user_id,'avatar','');
 

 
 

	
	
//Resize image and send to upload folder
$imagem->resize(  get_website('avatar_max_width'), $targetFile, $tempFile);







//get file extension
$ext= $imagem->get_image_ext($tempFile);
$nome_imagem_db= $newFileName.$ext;



//add new avatar
$client->update_client($user_id,'avatar',$nome_imagem_db);  
die(_('The Avatar was sucessfully changed.'));



 


}else die('<i class="fa fa-exclamation-triangle"></i> '._('Please select a image for your profile.'));


}
//######################################
// Update user avatar
//######################################













//######################################
// Rotate avatar left
//######################################
if(isset($_POST['rotate_left'])=='asd0348f93ehr8hg4'){
//abrir classes 
$client= new client();
$imagem= new imagem();

$ds = DIRECTORY_SEPARATOR;          
$avatarPath = $_SERVER['DOCUMENT_ROOT'] . $ds. $AVATAR_PATH;  
   
$old_avatar= $avatarPath.$client->get_client('avatar',$_POST['id']);

//rotate
$imagem->rotateImage($old_avatar,$old_avatar,90);

//mudar o nome para nao fazer cache
$ext= $imagem->get_image_ext($old_avatar);
$newFileName= $_POST['id'].'-avatar-'.time().$ext;
rename($old_avatar, $avatarPath.$newFileName);
$client->update_client($_POST['id'],'avatar',$newFileName);
echo '../'.$AVATAR_PATH.$newFileName;// Returne new name to refressch the image preview src
}


//######################################
// Rotate avatar Right
//######################################
if(isset($_POST['rotate_right'])=='asd0348f93ehr8hg4'){
//abrir classes 
$client= new client();
$imagem= new imagem();

$ds = DIRECTORY_SEPARATOR;          
$avatarPath = $_SERVER['DOCUMENT_ROOT'] . $ds. $AVATAR_PATH;  
   
$old_avatar= $avatarPath.$client->get_client('avatar',$_POST['id']);

//rotate
$imagem->rotateImage($old_avatar,$old_avatar,-90);


//mudar o nome para nao fazer cache
$ext= $imagem->get_image_ext($old_avatar);
$newFileName= $_POST['id'].'-avatar-'.time().$ext;
rename($old_avatar, $avatarPath.$newFileName);
$client->update_client($_POST['id'],'avatar',$newFileName);
echo '../'.$AVATAR_PATH.$newFileName;// Returne new name to refressch the image preview src
}



 





//######################################
// APAGAR AVATAR
//######################################
if(isset($_POST['apagar_avatar'])=='asd0348f93ehrwefefergrthehrth'){

$ds = DIRECTORY_SEPARATOR;          
$avatarPath = $_SERVER['DOCUMENT_ROOT'] . $ds. $AVATAR_PATH;
$client= new client();
$old_avatar= $avatarPath.$client->get_client('avatar',$_POST['id']);

unlink($old_avatar);
$client->update_client($_POST['id'],'avatar','');
if (!file_exists($old_avatar)) {die(_('Your Avatar was deleted sucessfully.'));} else {die('<i class="fa fa-exclamation-triangle"></i> '._('Your Avatar could not be deleted.'));}
}


 
 

 

//######################################
// Create new user
//######################################
if(isset($_POST['admin_create_user'])=='er34tf8fh23egeghrh34g45t43w'){
 
$client= new client();
$user= new user();

$email=$_POST['email'];
$pw=$_POST['pw'];
$pw_confirm=$_POST['pw_confirm'];
$username= $_POST['username'];
$role= $_POST['role'];
$location=$_POST['location'];
$profile_headline=$_POST['profile_headline'];
$profile_description=$_POST['profile_description'];
	
	
	
	
 
if (preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬]/', $username)){die('<i class="fa fa-exclamation-triangle"></i> '._('Your username can not contain special characters. Only _ and - are allowed'));}
if($pw_confirm != $pw){die('<i class="fa fa-exclamation-triangle"></i> '._('The Password did not match'));}
$pw_min_length= get_website('pw_min_length');
if(strlen($pw) < $pw_min_length){die('<i class="fa fa-exclamation-triangle"></i> '.sprintf(_('The Password must be at least %s characters'),$pw_min_length));}
if(strlen($username) < 4){die('<i class="fa fa-exclamation-triangle"></i> '._('The Username must be at least 4 characters'));}

 

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {die('<i class="fa fa-exclamation-triangle"></i> '._('Your E-Mail is not valid.'));}
if ($user->user_existe($email,'email')){die('<i class="fa fa-exclamation-triangle"></i> '._('This E-Mail is already registered'));}

	
//Insert user
$client->create_client('role','username','senha','email','profile_headline','profile_description','location','register_token',    $role,$username,md5($PW_PREFIXO.$pw),$email,$profile_headline,$profile_description,$location,'activated');
	

$link_upload_avatar=''.$SEO_URL_USERS_EDIT.'?id='.$con->insert_id;
	

 die(sprintf(_('<a href="%s">New User sucessfully created. Click here for Avatar upload.</a>'),$link_upload_avatar)); 
	
	
}
 