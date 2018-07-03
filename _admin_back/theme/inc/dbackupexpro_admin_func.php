<?php 
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Software: DbackupeXPro
// Mysql Database Backups Central
// CopyRight: Litos Media - Carlos Santos de Azevedo
// Contact: info@litos.top
#####################################################
$BACKUPS_FOLDER='/_admin_back/theme/DbackupexPro_Backups/';
$BACKUPS_PATH= $_SERVER['DOCUMENT_ROOT'].$BACKUPS_FOLDER;



function is_https() {
    return isset($_SERVER['HTTPS']) ||
        ($visitor = json_decode($_SERVER['HTTP_CF_VISITOR'])) &&
            $visitor->scheme == 'https';
}



 

class DbackupeXPro {
	
 
//######################################
// Procura, listar de Databases
//######################################
public function get_all_db($s){ 	
global $con;
global $prefixo;	
global $procura_form_token;	 
global $edit_dbform_token;
global $delete_dbform_token;
global $create_new_backup_dbform_token;	
global $show_single_backups_list_dbform_token;	
	
if(isset($_GET['procura_form_token'])){$get_procura_form_token= $_GET['procura_form_token'];}else $get_procura_form_token= $procura_form_token;

 
if(!isset($s_query)){$s_query="";}	
if (isset($s)){ $s_query= " WHERE title LIKE '%". mysqli_real_escape_string($con,$s) ."%' OR  
							id LIKE '%". mysqli_real_escape_string($con,$s) ."%' OR  
                            name LIKE '%". mysqli_real_escape_string($con,$s) ."%' OR  
							user LIKE '%". mysqli_real_escape_string($con,$s) ."%' OR  
							host LIKE '%". mysqli_real_escape_string($con,$s) ."%'  ";} else $s="";
  

/*============  Paginacao em cima ==============*/
$start=0;
$limit=10;
if(isset($_GET['pagina'])){$pagina=$_GET['pagina'];$start=($pagina-1)*$limit;}else{$pagina=1;}
/*============  Paginacao em cima ==============*/


 

$sql= mysqli_query($con, 'SELECT  *  FROM '.$prefixo.'databases '.$s_query.' order by id DESC LIMIT '.$start.', '.$limit.'') ;
while($row = mysqli_fetch_object($sql)) {
 
$db_user= $this->decrypt_db_user($row->id, $row->user);
$db_name= $this->decrypt_db_name($row->id, $row->name);
$max_back_retain=  $row->max_files_to_retain;	
$max_back_retain_ftp=  $row->max_files_to_retain_on_ftp;		
 

//Ftp a usar	
if($row->use_ftp_id == 0){
	$ftp_a_usar= _('No FTP set');$last_backup_time_to_ftp="";
}
	else {
		$ftp_a_usar= $this->get_ftp($row->use_ftp_id,'ftp_title');
		
		
		if($row->last_backup_time_to_ftp !='' || $row->last_backup_time_to_ftp != NULL){ 
			
			$data_lst_up= date("d/m/y, H:i:s", strtotime($row->last_backup_time_to_ftp));
			$data_lst_up_c_icons=  "<i class='fa fa-calendar-o'></i> ".date("d/m/y", strtotime($row->last_backup_time_to_ftp))." &nbsp;&nbsp;<i class='fa fa-clock-o'></i> ".date("H:i:s", strtotime($row->last_backup_time_to_ftp));
			 
			 
			$last_backup_time_to_ftp= '<div class="balao" data-html="true" title="'._('Last upload to FTP Server').' <br> ' .$data_lst_up_c_icons.'"><small><i class="fa fa-cloud-upload"></i><sup><i class="fa fa-clock-o"></i></sup> '.$data_lst_up.'</small></div>';}else $last_backup_time_to_ftp="";
		
		 } 
	 

//Data do ultimo backup		
if($row->last_backup_time != NULL){$last_backup_time = date("d/m/y, H:i:s", strtotime($row->last_backup_time));}	else {$last_backup_time= _('No backups yet');}

	
/* Server Cronjob Selected*/	
if($row->main_cronjob_interval== "*/1 * * * *"){$main_cronjob_interval_output= _('Every Minute');}
if($row->main_cronjob_interval== "*/5 * * * *"){$main_cronjob_interval_output= _('Every 5 Minutes');}	
if($row->main_cronjob_interval== "*/10 * * * *"){$main_cronjob_interval_output= _('Every 10 Minutes');}
if($row->main_cronjob_interval== "*/30 * * * *"){$main_cronjob_interval_output= _('Every 30 Minutes');}
if($row->main_cronjob_interval== "*/60 * * * *"){$main_cronjob_interval_output= _('Every Hour');}
if($row->main_cronjob_interval== "0 */2 * * *"){$main_cronjob_interval_output= _('Every 2 Hours');}
if($row->main_cronjob_interval== "0 */3 * * *"){$main_cronjob_interval_output= _('Every 3 Hours');}
if($row->main_cronjob_interval== "0 */4 * * *"){$main_cronjob_interval_output= _('Every 4 Hours');}
if($row->main_cronjob_interval== "0 */5 * * *"){$main_cronjob_interval_output= _('Every 5 Hours');}
if($row->main_cronjob_interval== "0 */6 * * *"){$main_cronjob_interval_output= _('Every 6 Hours');}
if($row->main_cronjob_interval== "0 */7 * * *"){$main_cronjob_interval_output= _('Every 7 Hours');}
if($row->main_cronjob_interval== "0 */8 * * *"){$main_cronjob_interval_output= _('Every 8 Hours');}	
if($row->main_cronjob_interval== "0 */24 * * *"){$main_cronjob_interval_output= _('Once a Day');}	
if($row->main_cronjob_interval== "0 0 */2 * *"){$main_cronjob_interval_output= _('Every 2 Days');}	
if($row->main_cronjob_interval== "0 0 */3 * *"){$main_cronjob_interval_output= _('Every 3 Days');}	
if($row->main_cronjob_interval== "0 0 */4 * *"){$main_cronjob_interval_output= _('Every 4 Days');}	
if($row->main_cronjob_interval== "0 0 */7 * *"){$main_cronjob_interval_output= _('Once a Week');}	
if($row->main_cronjob_interval== "0 0 */14 * *"){$main_cronjob_interval_output= _('Every 2 Weeks');}	
if($row->main_cronjob_interval== "0 0 */30 * *"){$main_cronjob_interval_output= _('Once a Month');}	
if($row->main_cronjob_interval== "0 0 * */2 *"){$main_cronjob_interval_output= _('Every 2 Months');}	
if($row->main_cronjob_interval== "0 0 * */3 *"){$main_cronjob_interval_output= _('Every 3 Months');}
if($row->main_cronjob_interval== "0 0 * */4 *"){$main_cronjob_interval_output= _('Every 4 Months');}
if($row->main_cronjob_interval== "0 0 * */5 *"){$main_cronjob_interval_output= _('Every 5 Months');}
if($row->main_cronjob_interval== "0 0 * */7 *"){$main_cronjob_interval_output= _('Every 6 Months');}	
if($row->main_cronjob_interval== "0 0 * */12 *"){$main_cronjob_interval_output= _('Once a Year');}	

 
	
if($row->main_cronjob_active ==0){$main_cronjob_interval_output= _('inactive');}
	
 
if($row->main_cronjob_active ==1){$main_cronjob_active_output= '<span class="cor_verde"><i class="fa fa-check"></i> '. _('active').'</span>';}
else {$main_cronjob_active_output=  '<i class="fa fa-times"></i> '._('inactive');}
	
if($row->parcial_tables_activated ==1){$parcial_tables_activated_output= '<span class="cor_vermelha"><i class="fa fa-check"></i> '. _('active').'</span>';}
else {$parcial_tables_activated_output= _('inactive');}
		
	
	
  	
if(!isset($tabela_inside)){$tabela_inside="";}	
$tabela_inside .= ' 
<tr id="row_'.$row->id.'">
<td>'.$row->id.'</td>
<td><strong>'.$row->title.'</strong></td>
<td>'.$main_cronjob_active_output.'</td>
<td>'.@$main_cronjob_interval_output.'</td>
<td >'.$parcial_tables_activated_output.'</td>
<td>'.$max_back_retain.'</td>
<td>'.$max_back_retain_ftp.'</td>
<td>'.$ftp_a_usar.@$last_backup_time_to_ftp.'</td>
<td>'.$last_backup_time.'</td>

 
<td> 
<div class="btn-group">
<a href="#" data-toggle="modal" data-target="#modal-edit-database-'.$row->id.'" database-id="'.$row->id.'" class="btn btn-xs btn-default balao" title="'._('Edit Database').'"><i class="ti-marker"></i></a>

<form action="dbackupexpro-single.php" method="post" style="display:inline"><input type="hidden" name="db_id" value="'.$row->id.'">
<button type="submit" class="btn btn-xs btn-default  balao" title="'._('Database Options').'"><i class="fa fa-cogs"></i></button></form> 

 <!-- create new-->                    
<a href="#" id="create_new_backup" title="'._('Create New Backup now').'" class="btn btn-xs btn-default balao" db_id="'.$row->id.'" create_new_backup_dbform_token="'.$create_new_backup_dbform_token.'" show_single_backups_list_dbform_token="'.$show_single_backups_list_dbform_token.'" style="width: auto; min-height: auto; font-size: auto" > <i class="fa fa-database"></i><sup style="margin-left: 5px;"><i class="fa fa-plus"></i></sup></a>    

</div>
</td> 

<td> 
<a data-toggle="confirm" delete_dbform_token="'.$delete_dbform_token.'" data-title="'._('Delete this Database and all local Backups from it?').'" id="'.$row->id.'" data-btn-ok-label="'._('Yes').'"  data-btn-cancel-label="'._('No!').'"  class="btn btn-xs btn-default delete-db" ><i class="ti-trash"></i></a>
</td> 

</tr> 
';
	
?> 
<!--  modal -->
<div class="modal modal-default fade" id="modal-edit-database-<?php echo $row->id;?>" >
<form id="<?php echo $row->id;?>"  class="form-horizontal update_database_form" role="form" >
 <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?php echo _('Edit ').' '.$row->title;?></h4>
              </div>
              <div class="modal-body">
			 
                <div class="box-header"><h3 class="box-title"> <?php echo _('Credentials');?></h3> </div> 
<form class="edit_database_form">
<div class="form-group">
    <label class="col-sm-12">
        <?php echo _('DB Title');?> <small><?php echo _('Information to let you identify this Database');?></small>
    </label>
    <div class="col-sm-12">
        <input type="text" class="form-control" name="title" value="<?php echo $row->title;?>">
    </div>
</div>
	<div class="clearfix"></div> 
<div class="form-group top10">
    <label class="col-sm-12">
        <?php echo _('Host');?> 
    </label>
    <div class="col-sm-12">
        <input type="text" class="form-control" name="host" value="<?php echo $row->host;?>">
    </div>
</div><div class="clearfix"></div>
<div class="form-group top20">
    <label class="col-sm-12">
        <?php echo _('DB Name');?>  
    </label>
    <div class="col-sm-12">
        <input type="text" class="form-control" name="name" value="<?php echo $db_name;?>">
    </div>
</div><div class="clearfix"></div> 
  
 <div class="form-group top20">
    <label class="col-sm-12">
        <?php echo _('DB User');?>  
    </label>
    <div class="col-sm-12">
        <input type="text" class="form-control" name="user" value="<?php echo $db_user;?>">
    </div>
</div><div class="clearfix"></div>
 

<div class="form-group top20">
    <label class="col-sm-12">
        <?php echo _('DB Password');?> <small><?php echo _('Leave blank to not chnage the password');?></small>
    </label>
    <div class="col-sm-12">
        <input type="password" class="form-control" name="pw">
    </div>
</div><div class="clearfix"></div>
<input type="hidden" name="database_id" value="<?php echo $row->id;?>">
<input type="hidden" name="edit_dbform_token"  value="<?php echo $edit_dbform_token;?>">
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
}
   
	
	
 
echo $tabela_header= '<table class="table table-hover">
                  <tr>
				  <th>'._('Id').'</th>
				  <th>'._('DB Title').'</th>
				  <th>'._('Auto Backup').'</th>
                  <th>'._('Schedule').'</th> 
				  <th>'._('Partial Backups').'</th>
				  <th>'._('Qty keep local').'</th> 
				  <th>'._('Qty keep on FTP').'</th> 
				  <th>'._('FTP').'</th>
				  <th>'._('Last Local Backup').'</th>
                  <th class="text-center" style="max-width:160px">'._('Options').'</th>
				  <th style="max-width:90px">'._('Delete').'</th>
                  </tr>';
				
				  
if(!isset($tabela_inside)){$tabela_inside="";}				          
echo  $tabela_inside.'</table>';


/*============  Paginacao em baixo ==============*/
//contar os resultados da base de dados
$rows=mysqli_num_rows(mysqli_query($con,'SELECT  *  FROM '.$prefixo.'databases '.$s_query.' '));
 if($rows=='0') echo '<div  style="color:#BFBFBF; text-align:center"><h1><br>'._('No results found!').'</h1></div>';
$total=ceil($rows/$limit);//Calcular o numero de paginas

$ajax_file='dbackupexpro_ajax.php';	
	
if(!isset($link_pagina)){$link_pagina="";}	
	
echo'<div class="row"></div><br><ul class="paginacao">'; 
if($pagina>1){
echo '<li><a href="'.$ajax_file.'?'.$link_pagina.'&pagina='.($pagina-1).'&s='.$s.'&procura_form_token='.$get_procura_form_token.'">&laquo;</a></li>';} // recuar uma pagina

//Mostar as paginas todas.  
for($i=1;$i<=$total;$i++){
	
if($i==$pagina) { echo '<li><a href="'.$ajax_file.'?'.$link_pagina.'&pagina='.$pagina.'&s='.$s.'&procura_form_token='.$get_procura_form_token.'" class="active">'.$i.'</a></li>'; } /*pagina activa*/

else { echo '<li><a href="'.$ajax_file.'?'.$link_pagina.'&pagina='.$i.'&s='.$s.'&procura_form_token='.$get_procura_form_token.'">'.$i.'</a></li>';}
}

if($pagina!=$total){echo '<li><a href="'.$ajax_file.'?'.$link_pagina.'&pagina='.($pagina+1).'&s='.$s.'&procura_form_token='.$get_procura_form_token.'">&raquo;</a></li>';} // avancar uma pagina 
echo '</ul>';
/*============ FIM Paginacao em baixo ==============*/ 
 
echo '<script src="../assets/js/bootstrap-confirmation.min.js"></script>';
echo '<script src="../assets/js/notificacoes.js"></script>';
}// END Lista databases	
	
	
	
 	
	
	 
	
					
//#####################################################
// Add new DB
//#####################################################
public function add_new_db($title,$host,$name,$user,$pw){ 
global $con;
global $prefixo;
global $BACKUPS_PATH;	
 
  
$test_con = @mysqli_connect($host, $user, $pw, $name);
if (!$test_con) {die('<i class="fa fa-exclamation-triangle"></i> '._('Failed to connect to MySQL:').' '.mysqli_connect_error());} 	
mysqli_close($test_con);
	
 

$cronjob_token= bin2hex(random_bytes(10));
$pw_security_token= bin2hex(random_bytes(16));	
$user_security_token= bin2hex(random_bytes(16));
$name_security_token= bin2hex(random_bytes(16));
$senha_enc= $this->encrypt_db_pw($pw,$pw_security_token);	
$user_enc= $this->encrypt_db_user($user,$user_security_token);
$name_enc= $this->encrypt_db_name($name,$name_security_token);
	
 
 
	
$sql= mysqli_query ($con, 'INSERT INTO '.$prefixo.'databases (cronjob_token,title,host,name,user,pw,pw_security_token,db_name_security_token,db_user_security_token) 
VALUES (
"'.mysqli_real_escape_string($con,$cronjob_token).'",
"'.mysqli_real_escape_string($con,$title).'",
"'.mysqli_real_escape_string($con,$host).'", 
"'.mysqli_real_escape_string($con,$name_enc).'",
"'.mysqli_real_escape_string($con,$user_enc).'",
"'.mysqli_real_escape_string($con,$senha_enc).'",
"'.mysqli_real_escape_string($con,$pw_security_token).'",
"'.mysqli_real_escape_string($con,$name_security_token).'",
"'.mysqli_real_escape_string($con,$user_security_token).'"
) ');
	
if (!$sql) { die("Error: " . mysqli_error($con));} 
	else{ 
		//Criar subpasta para os os backups
        $subfolder= mysqli_insert_id($con); 
        $subfolder_path= $BACKUPS_PATH.$subfolder.'/';
        if (!file_exists($subfolder_path)) {
        mkdir($subfolder_path, 0755, true);
}
	 
		return(true);
	}	
	
	
	
	
	
	
mysqli_close($con);	
}
//	END add_DB
	
	
	


	

	
	
	
//#####################################################
// Get DB Infos
//#####################################################
public function get_db($id,$o_que) { 
global $con;
global $prefixo; 
$sql= mysqli_query($con, 'SELECT '.$o_que.' FROM '.$prefixo.'databases WHERE id="'.$id.'"');
if (!$sql) { die("Error: " . mysqli_error($con));}else
{while($row = mysqli_fetch_object($sql)) {	
return $row->$o_que; }}
mysqli_close($con);
}	
	
public function get_ftp($id,$o_que) { 
global $con;
global $prefixo; 
$sql= mysqli_query($con, 'SELECT '.$o_que.' FROM '.$prefixo.'ftp WHERE id="'.$id.'"');
if (!$sql) { die("Error: " . mysqli_error($con));}else
{while($row = mysqli_fetch_object($sql)) {	
return $row->$o_que; }}
mysqli_close($con);
}	
	
	
	
	
	
	 
//#####################################################
//   DB  
public function encrypt_db_pw($pw,$pw_security_token){
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($pw, 'AES-256-CBC', 'DbackupeXPro-%7Litos-2!52!'.$pw_security_token, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}
	
public function encrypt_db_name($db_name,$db_name_security_token){
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($db_name, 'AES-256-CBC', 'DbacKupeXPro-%6CaRloS-9!26!'.$db_name_security_token, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}	
	

public function encrypt_db_user($db_user,$db_user_security_token){
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($db_user, 'AES-256-CBC', 'Dback/peXPro-%1Litos-7=18%='.$db_user_security_token, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}		
	
	
	
	
	
	
	
 
public function decrypt_pw($db_id, $pw){
$pw_security_token= $this->get_db($db_id, 'pw_security_token');	
list($encrypted_data, $iv) = explode('::', base64_decode($pw), 2);
return openssl_decrypt($encrypted_data, 'AES-256-CBC', 'DbackupeXPro-%7Litos-2!52!'.$pw_security_token, 0, $iv);
}
	
public function decrypt_db_name($db_id,$db_name){
$db_name_security_token= $this->get_db($db_id, 'db_name_security_token');	
list($encrypted_data, $iv) = explode('::', base64_decode($db_name), 2);
return openssl_decrypt($encrypted_data, 'AES-256-CBC', 'DbacKupeXPro-%6CaRloS-9!26!'.$db_name_security_token, 0, $iv);
return openssl_decrypt($encrypted_data, 'AES-256-CBC', 'DbacKupeXPro-%6CaRloS-9!26!'.$db_name_security_token, 0, $iv);
} 
 
	
public function decrypt_db_user($db_id,$db_user){
$db_user_security_token= $this->get_db($db_id, 'db_user_security_token');	
list($encrypted_data, $iv) = explode('::', base64_decode($db_user), 2);
return openssl_decrypt($encrypted_data, 'AES-256-CBC', 'Dback/peXPro-%1Litos-7=18%='.$db_user_security_token, 0, $iv);
} 
 
 
 

	
	
	
//#####################################################
//  FTP
	
 
public function encrypt_ftp_server($ftp_server,$ftp_server_token){
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($ftp_server, 'AES-256-CBC', 'Dback@peXPro-%4Lito!-2=24%8'.$ftp_server_token, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}
	
public function encrypt_ftp_user($ftp_user,$ftp_user_token){
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($ftp_user, 'AES-256-CBC', 'Dbac0upeXPro--6Aze$do-o!55!'.$ftp_user_token, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}	
	
public function encrypt_ftp_pw($ftp_pw,$ftp_pw_token){
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($ftp_pw, 'AES-256-CBC', 'DbackupeXPro!L!t@MeN(te45'.$ftp_pw_token, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}
	

 
	
	
	
	
public function decrypt_ftp_server($ftp_id, $servername){ 
$ftp_security_token= $this->get_ftp($ftp_id, 'ftp_server_token');
list($encrypted_data, $iv) = explode('::', base64_decode($servername), 2);
return openssl_decrypt($encrypted_data, 'AES-256-CBC', 'Dback@peXPro-%4Lito!-2=24%8'.$ftp_security_token, 0, $iv);
} 
	
public function decrypt_ftp_user($ftp_id, $user){ 
$ftp_security_token= $this->get_ftp($ftp_id, 'ftp_user_token');
list($encrypted_data, $iv) = explode('::', base64_decode($user), 2);
return openssl_decrypt($encrypted_data, 'AES-256-CBC', 'Dbac0upeXPro--6Aze$do-o!55!'.$ftp_security_token, 0, $iv);
} 
	
public function decrypt_ftp_pw($ftp_id, $pw){ 
$ftp_security_token= $this->get_ftp($ftp_id, 'ftp_pw_token');
list($encrypted_data, $iv) = explode('::', base64_decode($pw), 2);
return openssl_decrypt($encrypted_data, 'AES-256-CBC', 'DbackupeXPro!L!t@MeN(te45'.$ftp_security_token, 0, $iv);
} 	
	

	
 
	
	

 
	
	
	
	
//#####################################################
// Update Geral
//#####################################################	
public function update_geral($tabela,$set_row,$set_valor,$where_row,$where_valor){  
global $con;
global $prefixo;
 
$sql=mysqli_query($con, 'UPDATE '.$prefixo.$tabela.' SET '.$set_row.'="'.mysqli_real_escape_string($con,$set_valor).'" WHERE '.$where_row.'="'.$where_valor.'"'); 
if (!$sql) { die("Error: " . mysqli_error($con));} else return(true);
mysqli_close($con);	
}
	
	
	
	
	
//#####################################################
// Update DB PW
//#####################################################	
public function update_db_pw($pw,$pw_security_token,$id){  
global $con;
global $prefixo;
 
$sql=mysqli_query($con, 'UPDATE '.$prefixo.'databases SET pw="'.mysqli_real_escape_string($con,$pw).'", pw_security_token="'.$pw_security_token.'" WHERE id="'.$id.'"'); 
if (!$sql) { die("Error: " . mysqli_error($con));} else return(true);
mysqli_close($con);	
}
	
	
	
	
//#####################################################
// Update FTP PW
//#####################################################	
public function update_ftp_pw($pw,$ftp_pw_token,$id){  
global $con;
global $prefixo;
 
$sql=mysqli_query($con, 'UPDATE '.$prefixo.'ftp SET ftp_pw="'.mysqli_real_escape_string($con,$pw).'", ftp_pw_token="'.$ftp_pw_token.'" WHERE id="'.$id.'"'); 
if (!$sql) { die("Error: " . mysqli_error($con));} else return(true);
mysqli_close($con);	
}
	
	
	
	
	
//#####################################################
// Update DB single
//#####################################################	
public function update_db_single($o_que,$valor,$id){  
global $con;
global $prefixo;
$sql=mysqli_query($con, 'UPDATE '.$prefixo.'databases SET '.$o_que.'="'.mysqli_real_escape_string($con,$valor).'" WHERE id="'.$id.'"'); 
if (!$sql) { die("Error: " . mysqli_error($con));} else return(true);
mysqli_close($con);	
}
	
	
	
//#####################################################
// Update ftp single
//#####################################################	
public function update_ftp_single($o_que,$valor,$id){  
global $con;
global $prefixo;
$sql=mysqli_query($con, 'UPDATE '.$prefixo.'ftp SET '.$o_que.'="'.mysqli_real_escape_string($con,$valor).'" WHERE id="'.$id.'"'); 
if (!$sql) { die("Error: " . mysqli_error($con));} else return(true);
mysqli_close($con);	
}
	
	
	
	
	
	
//#####################################################
// Update DB
//#####################################################	
public function update_db($title,$host,$name,$user,$pw= NULL,$id){  
global $con;
global $prefixo;
 
	
// new pw?
if(isset($pw) && strlen(trim($pw))>1){

//test new password	
$test_con = @mysqli_connect($host, $user, $pw, $name);
if (!$test_con) {die('<i class="fa fa-exclamation-triangle"></i> '._('The password is wrong. No connection to Database.'));} 	

//update	
$pw_security_token= bin2hex(random_bytes(16));
$senha= $this->encrypt_db_pw($pw,$pw_security_token);
$this->update_db_pw($senha,$pw_security_token,$id);
	
mysqli_close($test_con);	
}
	
 
	
//test new credentials
$pw_antiga= $this->decrypt_pw($id,$this->get_db($id,'pw'));
$test_con = @mysqli_connect($host, $user, $pw_antiga, $name);
if (!$test_con) {die('<i class="fa fa-exclamation-triangle"></i> '._('The credentials are wrong or the Database do not exist.'));} 	
mysqli_close($test_con);
	

	
$user_security_token= bin2hex(random_bytes(16));
$name_security_token= bin2hex(random_bytes(16));	
$user_enc= $this->encrypt_db_user($user,$user_security_token);
$name_enc= $this->encrypt_db_name($name,$name_security_token);
	
 
$sql=mysqli_query($con, 'UPDATE '.$prefixo.'databases SET 
title="'.mysqli_real_escape_string($con,$title).'", 
host="'.mysqli_real_escape_string($con,$host).'", 
name="'.mysqli_real_escape_string($con,$name_enc).'", 
user="'.mysqli_real_escape_string($con,$user_enc).'",
db_name_security_token="'.mysqli_real_escape_string($con,$name_security_token).'",
db_user_security_token="'.mysqli_real_escape_string($con,$user_security_token).'"
WHERE id="'.$id.'"
'); 
if (!$sql) { die("Error: " . mysqli_error($con));} else return(true);
mysqli_close($con);	
}		
		
 
	
	
	
	
	
	
 
	
//#####################################################
// Update FTP
//#####################################################	
public function update_ftp($ftp_title,$ftp_server,$ftp_subfolder,$ftp_username,$ftp_pw= NULL,$use_ssl_connection,$id){  
global $con;
global $prefixo;
 
	
$use_ssl= $use_ssl_connection;		
if ($use_ssl == 1){$conection= @ftp_ssl_connect($ftp_server)or die('<i class="fa fa-exclamation-triangle"></i> '._("Unable to connect to host"));}else {$conection= @ftp_connect($ftp_server)or die('<i class="fa fa-exclamation-triangle"></i> '._("Unable to connect to host"));}
	
	
// new pw?
if(isset($ftp_pw) && strlen(trim($ftp_pw))>1){

$login =  ftp_login($conection, $ftp_username, $ftp_pw); if(!$login)die('<i class="fa fa-exclamation-triangle"></i> '._('The credentials are not correct or the connection was rejected by the server.'));
ftp_close($conection);
//update	
$ftp_pw_token= bin2hex(random_bytes(16));
$senha_enc= $this->encrypt_ftp_pw($ftp_pw,$ftp_pw_token);
$this->update_ftp_pw($senha_enc,$ftp_pw_token,$id);	
}
	
 
	
	
	
// Test new credentials
$senha= $this->get_ftp($id, 'ftp_pw');	
$senha_actual= $this->decrypt_ftp_pw($id, $senha);	
$use_ssl= $use_ssl_connection;		
if ($use_ssl == 1){$conection= @ftp_ssl_connect($ftp_server)or die('<i class="fa fa-exclamation-triangle"></i> '._("Unable to connect to host"));}else {$conection= @ftp_connect($ftp_server)or die('<i class="fa fa-exclamation-triangle"></i> '._("Unable to connect to host"));}
$login =  ftp_login($conection, $ftp_username, $senha_actual); if(!$login)die('<i class="fa fa-exclamation-triangle"></i> '.'<i class="fa fa-exclamation-triangle"></i> '._('The credentials are not correct or the connection was rejected by the server.'));
ftp_close($conection);
	
	
	
	
	 
/// update
$ftp_user_token= bin2hex(random_bytes(16));
$ftp_server_token= bin2hex(random_bytes(16));
$user_enc= $this->encrypt_ftp_user($ftp_username,$ftp_user_token);
$server_enc= $this->encrypt_ftp_server($ftp_server,$ftp_server_token);
	
	
	
$sql=mysqli_query($con, 'UPDATE '.$prefixo.'ftp SET 
ftp_title="'.mysqli_real_escape_string($con,$ftp_title).'", 
ftp_server="'.mysqli_real_escape_string($con,$server_enc).'", 
ftp_subfolder="'.mysqli_real_escape_string($con,$ftp_subfolder).'", 
ftp_username="'.mysqli_real_escape_string($con,$user_enc).'",
ftp_server_token="'.mysqli_real_escape_string($con,$ftp_server_token).'",
ftp_user_token="'.mysqli_real_escape_string($con,$ftp_user_token).'",
use_ssl_connection="'.mysqli_real_escape_string($con,$use_ssl_connection).'"
WHERE id="'.$id.'"
'); 
if (!$sql) { die("Error: " . mysqli_error($con));} else return(true);
mysqli_close($con);	
}		
		
	
 
	
 
public  function dbackupexro_clean_nome( $string, $separator = '-' )
{
    $accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
    $special_cases = array( '&' => 'and', "'" => '');
    $string = mb_strtolower( trim( $string ), 'UTF-8' );
    $string = str_replace( array_keys($special_cases), array_values( $special_cases), $string );
    $string = preg_replace( $accents_regex, '$1', htmlentities( $string, ENT_QUOTES, 'UTF-8' ) );
    $string = preg_replace("/[^a-z0-9]/u", "$separator", $string);
    $string = preg_replace("/[$separator]+/u", "$separator", $string);
    return $string;
}
	
	
	
	
	
	
	
//#####################################################
// Del DB 
//#####################################################		
public  function dbackupexro_del($id) {
global $con;
global $prefixo;
global $BACKUPS_PATH;
$dir= $BACKUPS_PATH.$id.'/';
	
	
/*Remover do crontab caso tenha cronjob la*/	
$db_id=$id;
$output = shell_exec('crontab -l');
$cron_file = dirname(dirname(__FILE__))."/tmp/crontab.txt";	
$job_antigo= $this->get_db($db_id,'cronjob_job');
$remove_cron = str_replace($job_antigo."\n", "", $output);
file_put_contents($cron_file, $remove_cron); // retirar do temp file
exec("crontab $cron_file"); //remover do crontab 	
	
	
	
	
$sql=mysqli_query($con, 'DELETE FROM '.$prefixo.'databases WHERE id="'.$id.'"'); 
if (!$sql) { die("Error: " . mysqli_error($con));} else{

 
   //Apagar a pasta e ficheiros	 
   if (is_dir($dir)) { 
     $objects = scandir(htmlspecialchars($dir)); 
     foreach ($objects as $object) { 
       if ($object != "." && $object != "..") { 
         if (is_dir($dir."/".$object))
            rmdir($dir."/".$object);
         else
           unlink($dir."/".$object); 
       } 
     }
     rmdir($dir); 
   } // fim Apagar a pasta e ficheiros	 
	
return(true);
}
mysqli_close($con);
 }
	
	
	
 
	
	
//#####################################################
// Del FTP
//#####################################################		
public function  dbackupexro_del_ftp($ftp_id){	
global $con;
global $prefixo;	
 	
$sql=mysqli_query($con, 'DELETE FROM '.$prefixo.'ftp WHERE id="'.$ftp_id.'"'); 
if (!$sql) { die("Error: " . mysqli_error($con));} else{
$this->update_geral('databases','use_ftp_id','0','use_ftp_id',$ftp_id);// Por as databases a zero caso estejam a usar este ftp	
return(true);
}
mysqli_close($con);
}
	 
	
	
	
	
	
	
	

	
//#####################################################
// Get the Tabelas para fazer backup parcial
//#####################################################		
public function  dbackupexro_get_checkbox_backup_parcial_tables($db_id){	
global $con;
global $prefixo;	
 	

	
$dbackupexpro_host= $this->get_db($db_id,'host');	
$db_name= $this->get_db($db_id,'name');
$db_user= $this->get_db($db_id,'user');
$db_pw= $this->get_db($db_id,'pw');	
$dbackupexpro_name= $this->decrypt_db_name($db_id, $db_name);	
$dbackupexpro_user=  $this->decrypt_db_user($db_id, $db_user);
$dbackupexpro_pw= $this->decrypt_pw($db_id,$db_pw);	
 
$dbackupex_con_this =  mysqli_connect($dbackupexpro_host, $dbackupexpro_user, $dbackupexpro_pw, $dbackupexpro_name);
// ir buscar o nome das tabelas para parcial restore	

$old_tables= $this->get_db($db_id,'parcial_tables');
$old_tables_arr = explode(" ", $old_tables);		
	
$result = mysqli_query($dbackupex_con_this, "show tables");	
while($table = mysqli_fetch_array($result)) { 
	
 
if (in_array($table[0], $old_tables_arr)){$checked='checked="checked"';}else {$checked='';}
	
	
	
@$parcial_db_list .= '
<label class="form-check-label">
<input class="form-check-input  " type="checkbox" name="tables[]" id="'.$table[0].'" value="'.$table[0].'" '.$checked.'>
</label>
';   
}	
	
	
	
return($parcial_db_list);	
	
	
	
mysqli_close($con);	
}

 
 
	
	

	
	
	
	
	
	
	
	
	
	
 
	
//#####################################################
// Get database Backup list from sinle DB (Read files)
//#####################################################	
public  function dbackupexro_get_backup_list($db_id, $pagina=NULL){
global $demo_on;	 
global $show_single_backups_list_dbform_token;	
global $del_backup_dbform_token;
global $restore_backup_dbform_token;
global $enviar_single_file_ftp_token;	
global $BACKUPS_PATH;

	
/* Ir bustar os nomes das tabelas */
	
$dbackupexpro_host= $this->get_db($db_id,'host');	
$db_name= $this->get_db($db_id,'name');
$db_user= $this->get_db($db_id,'user');
$db_pw= $this->get_db($db_id,'pw');	
$dbackupexpro_name= $this->decrypt_db_name($db_id, $db_name);	
$dbackupexpro_user=  $this->decrypt_db_user($db_id, $db_user);
$dbackupexpro_pw= $this->decrypt_pw($db_id,$db_pw);	
 
$dbackupex_test_con =  mysqli_connect($dbackupexpro_host, $dbackupexpro_user, $dbackupexpro_pw, $dbackupexpro_name);
if (!$dbackupex_test_con) {echo '<i class="fa fa-exclamation-triangle"></i> '._('It was not possible to Connect to the Database. Please check the Credentials'); return false;} 
	 	
	


	
	
// ir buscar o nome das tabelas para parcial restore	
$result = mysqli_query($dbackupex_test_con, "show tables"); 
while($table = mysqli_fetch_array($result)) { 
@$parcial_db_list .= ' 
<label class="form-check-label">
<input class="form-check-input" type="checkbox"  checked="checked" name="tables[]" id="restore_'.$table[0].'" value="'.$table[0].'">
</label>
';   
}
 

	
	
	
	
$BACKUPS_DIR= $BACKUPS_PATH.$db_id.'/';	 
if(isset( $_GET['s'])){$s= $_GET['s'];}else {$s="";}

 
/*============  Paginacao em cima ==============*/
$start=0;
$limit=8;
if(isset($pagina)){$pagina=$pagina;$start=($pagina-1)*$limit;}else{$pagina=1;}
/*============  Paginacao em cima ==============*/

 
$offset = (isset($start)) ? $start : 0;
$file =  preg_grep('~\.(gz)$~', scandir($BACKUPS_DIR,1));
$ficheiro_nr=0;
	
	
$num_results = 0;	
/*============  loop ==============*/
for ($i = $offset; $i < $offset+$limit; $i++) {

if(isset($file[$i])){$file_name= $file[$i];}else {$file_name= null;}

	
if (@ file_exists($BACKUPS_DIR.$file)) {$file_date= date('F d Y H:i:s',filemtime($BACKUPS_DIR.$file));}
	
	
 
/*============  content ==============*/
 
if($s)$procura= $file_name != "" && $s && strpos($file_name, $s); //With search
if(!$s)$procura= $file_name != "";//Without search
	
if ($procura):  
//output
	
if($demo_on == '1'){$download_link= "<a onClick='alert(&quot; This Feature ist disabled on the Demo for security reasons. &quot;);' href='#' class='btn btn-xs btn-default'><i class='fa fa-cloud-download'></i></a>";}else{$download_link= '<a href="'.$this->dbackupexpro_download_url($file_name,$db_id).'" class="btn btn-xs btn-default balao" title="'._("Download").'" download><i class="fa fa-cloud-download"></i></a>';}		
	
if(!isset($file_list)){$file_list="";}
$file_list .='
<tr id="row_'.$i.'">
    <td>'.$file_name.'</td>
    <td>'.date('d F Y H:i:s',filemtime($BACKUPS_DIR.$file_name)).'</td>
    <td>
	
	
	<a href="#" db_id='.$db_id.' restorefile="'.$file_name.'" restore_backup_dbform_token="'.$restore_backup_dbform_token.'" class="restore-db btn btn-xs btn-default" data-toggle="confirm" data-title="'._("Restore Database with this Backup? Warning: please note that this can not be undone. Please make a Database backup before making this!").'" data-btn-ok-label="'._("Yes").'" data-btn-cancel-label="'._("No!").'" title="'._('Restore Database with this Backup?').'"><i class="fa fa-undo"></i> </a>
	
	
	<a href="#" data-toggle="modal" data-target="#modal-parcial-restore-'.$i.'" database-id="'.$db_id.'" class="btn btn-xs btn-default balao" title="'._('Restore Only Some Tables of This Database').'"><i class="fa fa-undo"></i> <i class="fa fa-ellipsis-v"></i></a>
	
	<a href="#" database-id="'.$db_id.'" filename="'.$file_name.'" enviar_single_file_ftp_token="'.$enviar_single_file_ftp_token.'" class="send-single-file-ftp btn btn-xs btn-default balao" title="'._('Send this File to the selected FTP Server?').'"><i class="fa fa fa-server"></i><sup> <i class="fa fa-level-up"></i> </sup> </a>
 
		
     '.$download_link.'
   
	   <a href="#" id="'.$file_name.'" row="'.$i.'"  db_id='.$db_id.' del_backup_dbform_token="'.$del_backup_dbform_token.'" class=" del-db-backup btn btn-xs btn-default balao" data-toggle="confirm" data-title="'._("Delete this Backup?").'" data-btn-ok-label="'._("Yes").'" data-btn-cancel-label="'._("No!").'"><i class="fa fa-times"></i></a>
	 
	 
    </td>
</tr>
';
	
	
	
	
?>	
<!--  modal -->
<div class="modal modal-default fade" id="modal-parcial-restore-<?php echo $i;?>" >
<form class="restore-db-parcial">	
 <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?php echo _('Parcial Restore Database').' '.$this->get_db($db_id, 'title');?></h4>
              </div>
              <div class="modal-body">


<div class="cabecalho-alert info">	
<i class="fa fa-info-circle"></i> 
<?php echo _('With a parcial restore, you are able to restore just the selected tables even using a Full Backup dump File. The tables that you see above, are the tables of this Database at momment. Be sure that the backup Dump file have the data for the tables that you will select above. <strong>Warning:</strong> please note that this can not be undone. Please make a Database backup before making this!');?> 	
</div>			  
 			  
<?php echo $parcial_db_list;?>
 
				  
<input type="hidden" name="restoreparcial" value="1">				  
<input type="hidden" name="restorefile" value="<?php echo $file_name; ?>">
<input type="hidden" name="restore_backup_dbform_token" value="<?php echo $restore_backup_dbform_token; ?>">
<input type="hidden" name="db_id" value="<?php echo $db_id;?>">				  
 			  
</div>
<div class="clearfix"></div>
 
 
 
			 <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><?php echo _('Cancel');?></button>
              <button type="submit" class="btn btn-default"  data-toggle="confirm" data-title="<?php echo _("Restore Database with this Backup tables? Warning: please note that this can not be undone. Please make a Database backup before making this!");?>" data-btn-ok-label="<?php echo _("Yes");?>" data-btn-cancel-label="<?php echo _("No!");?>"><?php echo _('Restore this Tables now!');?></button> 
              </div>
 
            </div>
            <!-- /.modal-content -->
          </div>
    <!-- /.modal-dialog -->
	</form>
</div>
 <!-- END  modal -->
<?php	
	
	
	
	
	
	
$num_results++;
endif;// END if ($procura)
	
 
/*============  End content ==============*/
 

}// ENd loop
 	

 
echo $tabela_header= '<table class="table table-hover">
                  <tr> 
				  <th>'._('File').'</th>
				  <th>'._('Created').'</th>
				  <th>'._('Options').'</th>
                  </tr>';	
if (isset($file_list)){ echo $file_list;}	
echo '</table>';	
echo '<script src="../assets/js/bootstrap-confirmation.min.js"></script>';	
echo '<script src="assets/butoes/jquery-butoes.js?a=2"></script>';
echo '<script>$("#backup_list_container .form-check-input:checkbox").butoes();</script>';
	
	
	
 
	
	
	
	
 
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
 
/*============  Paginacao em baixo ==============*/
//contar os resultados da base de dados
$rows= count(scandir($BACKUPS_DIR))-2;
if($s){$rows= $num_results;}	
	
	
	
if($rows=='0') echo '<div  style="color:#BFBFBF; text-align:center"><h1><br>'._('No results found!').'</h1></div>';
$total=ceil($rows/$limit);//Calcular o numero de paginas

	
$ajax_file='dbackupexpro_ajax.php';
	 
echo'<div class="row"></div><br><ul class="paginacao">'; 
if($pagina>1){
	
echo '<li><a href="'.$ajax_file.'?pagina='.($pagina-1).'&s='.$s.'&show_single_backups_list_dbform_token='.$show_single_backups_list_dbform_token.'&db_id='.$db_id.'">&laquo;</a></li>';} // recuar uma pagina

//Mostar as paginas todas.  
for($i=1;$i<=$total;$i++){
	
if($i==$pagina) { echo '<li><a href="'.$ajax_file.'?pagina='.$pagina.'&s='.$s.'&show_single_backups_list_dbform_token='.$show_single_backups_list_dbform_token.'&db_id='.$db_id.'" class="active">'.$i.'</a></li>'; } /*pagina activa*/

else { echo '<li><a href="'.$ajax_file.'?pagina='.$i.'&s='.$s.'&show_single_backups_list_dbform_token='.$show_single_backups_list_dbform_token.'&db_id='.$db_id.'">'.$i.'</a></li>';}
}

if($pagina!=$total){echo '<li><a href="'.$ajax_file.'?pagina='.($pagina+1).'&s='.$s.'&show_single_backups_list_dbform_token='.$show_single_backups_list_dbform_token.'&db_id='.$db_id.'">&raquo;</a></li>';} // avancar uma pagina 
echo '</ul>';
/*============ FIM Paginacao em baixo ==============*/ 
echo '<script src="../assets/js/bootstrap-confirmation.min.js"></script>';
echo '<script src="../assets/js/notificacoes.js"></script></script>';
 }
	
	
	
	
	
	
	
 
	
 	
	
//#####################################################
// Cronjob url Einzeln extern link
//#####################################################	
public  function dbackupexro_cronjob_url($db_id){	
$cron_token= $this->get_db($db_id,'cronjob_token');
$CRONJOB_URL= (is_https()=='1' ? "https" : "http") ."://". $_SERVER['SERVER_NAME'] .'/DbackupexProCron?t='.$cron_token;	
return($CRONJOB_URL);
}
	
	
	

//#####################################################
// Cronjob url own (For server cronjob) cronjob
//#####################################################	
public  function dbackupexro_cronjob_url_own($db_id){
$CRONJOB_URL= (is_https()=='1' ? "https" : "http") ."://". $_SERVER['SERVER_NAME'] .'/DbackupexProCron?c='.$db_id;	
return($CRONJOB_URL);
}	
	
	
	
	
//#####################################################
// Download url
//#####################################################	
public  function dbackupexpro_download_url($file, $db_id){
global $BACKUPS_FOLDER;	
$down_url= (is_https()=='1' ? "https" : "http") ."://". $_SERVER['SERVER_NAME'] .$BACKUPS_FOLDER.$db_id.'/'.$file;	
return($down_url);
}
	
	
	
//#####################################################
// Clean string
//#####################################################		
public  function dbackupexpro_clean( $string, $separator = '-' )
{
    $accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
    $special_cases = array( '&' => 'and', "'" => '');
    $string = mb_strtolower( trim( $string ), 'UTF-8' );
    $string = str_replace( array_keys($special_cases), array_values( $special_cases), $string );
    $string = preg_replace( $accents_regex, '$1', htmlentities( $string, ENT_QUOTES, 'UTF-8' ) );
    $string = preg_replace("/[^a-z0-9]/u", "$separator", $string);
    $string = preg_replace("/[$separator]+/u", "$separator", $string);
    return $string;
}
	
	
	
//#####################################################
// Limpar e apagar nr limite
//#####################################################		
public function limpar_backups_velhos($ficheiro,$idade_limite_em_dias){
  $agora= time();
    if (is_file($ficheiro)) {
      if ($agora - filemtime($ficheiro) >= 60 * 60 * 24 * $idade_limite_em_dias) {
		  if(file_exists($ficheiro))unlink($ficheiro);
	  }
    }
}
public function limpar_backups_nr_limite($pasta_a_ler,$nr_de_ficheiros_a_nao_apagar){
   $pasta = opendir($pasta_a_ler);
   $files = array();
    while (false !== ($file = readdir($pasta))) 
    {
        if (!is_dir($file))
        {
            $files[$file] = filemtime($pasta_a_ler.$file);
        }
    }
    asort($files, SORT_NUMERIC);
    $files = array_keys($files);
    for ($i = 0; $i < (count($files) - $nr_de_ficheiros_a_nao_apagar); $i++)
    { 
        if(file_exists($pasta_a_ler.$files[$i])){unlink($pasta_a_ler.$files[$i]);}
    }
	 
}	
	
	
	
	
	
	
	
	
//#####################################################
// FTP drop down list
//#####################################################		
function show_dropdown_ftp_list($db_id){
global $con;
global $prefixo; 	
 
$ftp_selected= $this->get_db($db_id,'use_ftp_id');
	
$sql= mysqli_query($con, 'SELECT * FROM '.$prefixo.'ftp');if (!$sql) { die();}
while($row = mysqli_fetch_object($sql)){	
 
if($row->id == $ftp_selected){$selected='selected';}else{$selected='';}
if($ftp_selected==0){$selected_ohne='selected';}else {$selected_ohne='';}	
$ftp_list.= '<option value="'.$row->id.'" '.$selected.'> '. _('Send new Backups to FTP').' '.$row->ftp_title.'</option>';	
}
	
	
$ftp_list2= '<option value="0" '.$selected_ohne.'>'._('Do not send new backups to FTP server').'</option>';	
	
return($ftp_list2.$ftp_list);
mysqli_close($con);
}
	
	
  
 
	
	
	
	
	
	
	
 
 
//#####################################################
// Main (Server) Cronjob Interval Drop down list
//#####################################################		
function show_main_cronjob_interval_list($db_id){

$interval_selected=  $this->get_db($db_id,'main_cronjob_interval');
	

	
	
	
if($interval_selected== '*/1 * * * *'){$selected_00_01='selected="selected"';}else {$selected_00_01='';}
if($interval_selected== '*/5 * * * *'){$selected_00_05='selected="selected"';}else {$selected_00_05='';}	
if($interval_selected== '*/10 * * * *'){$selected_00_10='selected="selected"';}else {$selected_00_10='';}	
if($interval_selected== '*/30 * * * *'){$selected_00_30='selected="selected"';}else {$selected_00_30='';}
if($interval_selected== '*/60 * * * *'){$selected_01_00='selected="selected"';}else {$selected_01_00='';}	
if($interval_selected== '0 */2 * * *'){$selected_02_00='selected="selected"';}else {$selected_02_00='';}
if($interval_selected== '0 */3 * * *'){$selected_03_00='selected="selected"';}else {$selected_03_00='';}	
if($interval_selected== '0 */4 * * *'){$selected_04_00='selected="selected"';}else {$selected_04_00='';}
if($interval_selected== '0 */5 * * *'){$selected_05_00='selected="selected"';}else {$selected_05_00='';}
if($interval_selected== '0 */6 * * *'){$selected_06_00='selected="selected"';}else {$selected_06_00='';}
if($interval_selected== '0 */7 * * *'){$selected_07_00='selected="selected"';}else {$selected_07_00='';}
if($interval_selected== '0 */8 * * *'){$selected_08_00='selected="selected"';}else {$selected_08_00='';}
if($interval_selected== '0 */24 * * *'){$selected_24_00='selected="selected"';}else {$selected_24_00='';}
if($interval_selected== '0 0 */2 * *'){$selected_48_00='selected="selected"';}else {$selected_48_00='';}
if($interval_selected== '0 0 */3 * *'){$selected_72_00='selected="selected"';}else {$selected_72_00='';}
if($interval_selected== '0 0 */4 * *'){$selected_102_00='selected="selected"';}else {$selected_102_00='';}
if($interval_selected== '0 0 */7 * *'){$selected_168_00='selected="selected"';}else {$selected_168_00='';}
if($interval_selected== '0 0 */14 * *'){$selected_336_00='selected="selected"';}else {$selected_336_00='';}
if($interval_selected== '0 0 */30 * *'){$selected_672_00='selected="selected"';}else {$selected_672_00='';}
if($interval_selected== '0 0 * */2 *'){$selected_2_meses='selected="selected"';}else {$selected_2_meses='';}
if($interval_selected== '0 0 * */3 *'){$selected_3_meses='selected="selected"';}else {$selected_3_meses='';}	
if($interval_selected== '0 0 * */4 *'){$selected_4_meses='selected="selected"';}else {$selected_4_meses='';}
if($interval_selected== '0 0 * */5 *'){$selected_5_meses='selected="selected"';}else {$selected_5_meses='';}
if($interval_selected== '0 0 * */6 *'){$selected_6_meses='selected="selected"';}else {$selected_6_meses='';}
if($interval_selected== '0 0 * */12 *'){$selected_1_ano='selected="selected"';}else {$selected_1_ano='';}	
	
$interval_list= '
<option value="*/1 * * * *" '.$selected_00_01.'> '._('Every Minute (Should not be used on Big Databases)').'</option>
<option value="*/5 * * * *" '.$selected_00_05.'> '._('Every 5 Minutes').'</option>
<option value="*/10 * * * *" '.$selected_00_10.'> '._('Every 10 Minutes').'</option>
<option value="*/30 * * * *" '.$selected_00_30.'> '._('Every 30 Minutes').'</option>
<option value="*/60 * * * *" '.$selected_01_00.'> '. _('Every Hour').'</option>
<option value="0 */2 * * *" '.$selected_02_00.'> '. _('Every 2 Hours').'</option>
<option value="0 */3 * * *" '.$selected_03_00.'> '. _('Every 3 Hours').'</option>
<option value="0 */4 * * *" '.$selected_04_00.'> '. _('Every 4 Hours').'</option>
<option value="0 */5 * * *" '.$selected_05_00.'> '. _('Every 5 Hours').'</option>
<option value="0 */6 * * *" '.$selected_06_00.'> '. _('Every 6 Hours').'</option>
<option value="0 */7 * * *" '.$selected_07_00.'> '. _('Every 7 Hours').'</option>
<option value="0 */8 * * *" '.$selected_08_00.'> '. _('Every 8 Hours').'</option>
<option value="0 */24 * * *" '.$selected_24_00.'> '. _('Once a Day').'</option>
<option value="0 0 */2 * *" '.$selected_48_00.'> '. _('Every 2 Days').'</option>
<option value="0 0 */3 * *" '.$selected_72_00.'> '. _('Every 3 Days').'</option>
<option value="0 0 */4 * *" '.$selected_102_00.'> '. _('Every 4 Days').'</option>
<option value="0 0 */7 * *" '.$selected_168_00.'> '. _('Once a Week').'</option>
<option value="0 0 */14 * *" '.$selected_336_00.'> '. _('Every 2 Weeks').'</option>
<option value="0 0 */30 * *" '.$selected_672_00.'> '. _('Once a Month').'</option>
<option value="0 0 * */2 *" '.$selected_2_meses.'> '. _('Every 2 Months').'</option>
<option value="0 0 * */3 *" '.$selected_3_meses.'> '. _('Every 3 Months').'</option>
<option value="0 0 * */4 *" '.$selected_4_meses.'> '. _('Every 4 Months').'</option>
<option value="0 0 * */5 *" '.$selected_5_meses.'> '. _('Every 5 Months').'</option>
<option value="0 0 * */6 *" '.$selected_6_meses.'> '. _('Every 6 Months').'</option>
<option value="0 0 * */12 *" '.$selected_1_ano.'> '. _('Once a Year').'</option>
';	

return($interval_list.$interval_selected);
 
}	
 
	
	
	
	
	
	
	
	
	
//#####################################################
// Activate Main(Server) Cronjob  for dbs
//#####################################################	
function Dbackupex_set_server_cronjob($db_id,$main_cronjob_interval,$main_cronjob_active){
	
$output = shell_exec('crontab -l');
$cron_file = dirname(dirname(__FILE__))."/tmp/crontab.txt";	
 		


$job_novo= ''.$main_cronjob_interval.' wget -qO- '.$this->dbackupexro_cronjob_url_own($db_id).' &> /dev/null';	
	
 /*
// Remove all cron jobs -->
if(isset($_POST['remove_all_cron'])) {
echo exec("crontab -r");
} else {
echo exec("crontab $cron_file");
}
*/
 
$this->update_db_single('main_cronjob_active',htmlspecialchars(@$main_cronjob_active), $db_id);

//remover o cronjob	se estiver a desativar
if(empty($_POST['main_cronjob_active'])){
	
$job_antigo= $this->get_db($db_id,'cronjob_job');
$remove_cron = str_replace($job_antigo."\n", "", $output);
file_put_contents($cron_file, $remove_cron); // retirar do temp file
exec("crontab $cron_file"); //remover do crontab

	
//retirar da db mas deixar o interval que assim fica sempre marcado
$this->update_db_single('cronjob_job', 'NULL', $db_id);	
	 
	
}else{

 
//se activar ou modificar o cronjob retirar o antigo e adicionar o novo cronjob	
$job_antigo= $this->get_db($db_id,'cronjob_job');
$remove_velho_cron = str_replace($job_antigo.PHP_EOL, "", $output); // apagar o antigo
$novo_cron= $job_novo.PHP_EOL;
file_put_contents($cron_file, $remove_velho_cron.$novo_cron ); // retirar do temp file
exec("crontab $cron_file");	
	
	
  
//Adicionar o novo na DB
$this->update_db_single('main_cronjob_interval',$main_cronjob_interval, $db_id); // update db interval
$this->update_db_single('cronjob_job', $job_novo, $db_id); // update db job	
}	
	
	
	
	
	
}	
	
		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
//#####################################################
// Create new Backup
//#####################################################	
public function dbackupexro_new_backup($db_id, $cronjob=NULL){	
global $con;
global $prefixo;
global $BACKUPS_PATH;
$dir= $BACKUPS_PATH.$db_id.'/';

$dbackupexpro_host= $this->get_db($db_id,'host');	
$db_name= $this->get_db($db_id,'name');
$db_user= $this->get_db($db_id,'user');
$db_pw= $this->get_db($db_id,'pw');	
$max_files_to_retain_on_ftp= $this->get_db($db_id,'max_files_to_retain_on_ftp');
	
$dbackupexpro_name= $this->decrypt_db_name($db_id, $db_name);	
$dbackupexpro_user=  $this->decrypt_db_user($db_id, $db_user);
$dbackupexpro_pw= $this->decrypt_pw($db_id,$db_pw);	
 


	
  $title= $this->dbackupexpro_clean($this->get_db($db_id,'title'));

   $dbackupex_test_con =  mysqli_connect($dbackupexpro_host, $dbackupexpro_user, $dbackupexpro_pw, $dbackupexpro_name);
   if (!$dbackupex_test_con) {
	   
	 if($cronjob != NULL){include('inc/emails/email_cron_job_db_problem.php');}// se for cronjob enviar email!  
	echo '<i class="fa fa-exclamation-triangle"></i> '._('It was not possible to Connect to the Database. Please check the Credentials'); return false;} 
	 
	
	
    if($cronjob == NULL){
		$filename = date("YmdHis").'-DbackupeXPro-'.$dbackupexpro_name.'.sql.gz';
		$sucess_msg= _('Backup Sucessfully Created.');
		$error_msg= '<i class="fa fa-exclamation-triangle"></i> '._('The Backup cold not be saved. Please check if the the Credentials are correct and you have the EXEC function activated on your server.');
	} 
	else{
	//se for cronjob silencio	
	$filename = date("YmdHis").'-DbackupeXPro-CronJob-'.$dbackupexpro_name.'.sql.gz';
	$sucess_msg="";	
	$error_msg="";	
	}
	
	 
	
	// Se for para fazer somente backup de algumas tabelas
   if($this->get_db($db_id,'parcial_tables_activated') ==1 && !empty($this->get_db($db_id,'parcial_tables'))){
	   
	$tabelas= $this->get_db($db_id,'parcial_tables');   
	$filename = date("YmdHis").'-DbackupeXPro-Partial-'.$dbackupexpro_name.'.sql.gz';
	$cmd1 = "mysqldump --hex-blob --routines --skip-lock-tables --log-error=mysqldump_error.log --host='".$dbackupexpro_host."' --user='".$dbackupexpro_user."' --password='".$dbackupexpro_pw."' {$dbackupexpro_name} ".$tabelas." | gzip > {$dir}{$filename}";
    exec($cmd1);
		
		
	 }else{ // Fazer dump da base de dados completa
    $cmd = "mysqldump --hex-blob --routines --skip-lock-tables --log-error=mysqldump_error.log --host='".$dbackupexpro_host."' --user='".$dbackupexpro_user."' --password='".$dbackupexpro_pw."' {$dbackupexpro_name} | gzip > {$dir}{$filename}";
    exec($cmd);
	}
	 
	
	
	
	
	//actualizar data do ultimo backup
	$this->update_db_single('last_backup_time',date("Y-m-d H:i:s"),$db_id);
	
	
	//Quer enviar para o ftp?
	if($this->get_db($db_id,'use_ftp_id') !=0){
	$ftp_id= $this->get_db($db_id,'use_ftp_id');
	$enviar_ftp= $this->enviar_ftp($ftp_id, $dir.$filename, $filename, $max_files_to_retain_on_ftp, $dbackupexpro_name); //10 numero de ficheiros to keep
	//actualizar data do ultimo backup	enviado para o ftp
	if(!$enviar_ftp){/*enviar email*/ include('inc/emails/email_cron_job_ftp_problem.php');}
	if($enviar_ftp){$this->update_db_single('last_backup_time_to_ftp',date("Y-m-d H:i:s"),$db_id);}
	}
	
	
	//Limpar por nr de ficheiros local?
    $this->limpar_backups_nr_limite($dir, $this->get_db($db_id,'max_files_to_retain'));
	
	 
    

	
	
   if(file_exists($dir.$filename) || @$return_var == 0){ echo $sucess_msg;}else {echo($error_msg);}
 	
}
	
	
 
	
//#####################################################
// Cronjob Backup
//#####################################################		
public function dbackupexro_new_Cron_Job_backup($cron_new_backup_token){	
global $con;
global $prefixo;
$sql= mysqli_query($con, 'SELECT id FROM '.$prefixo.'databases WHERE cronjob_token="'.$cron_new_backup_token.'"');
if (!$sql) { die();}else
{while($row = mysqli_fetch_object($sql)) {	
$db_id= $row->id; }}
$this->dbackupexro_new_backup($db_id, $cronjob=1);
mysqli_close($con);

}
	
	
	
	
	
 
//#####################################################
// Del Backup
//#####################################################		
public function  dbackupexro_del_backup($db_id, $file){	
global $BACKUPS_PATH;
$dir= $BACKUPS_PATH.$db_id.'/';

    if (is_writable($dir.$file)) {
        unlink($dir.$file);
        die(_('Backup Sucessfully Deleted.'));
    } else {
        die('<i class="fa fa-exclamation-triangle"></i> '._('The file could not be deleted. please check if the folder and files are s_writable'));
    }	 
	 
}	
	
	
	
	

 

	
	
	
	
	
	
//#####################################################
// Restore Backup
//#####################################################		
public function  dbackupexro_restore_backup($db_id, $file, $parcial_tables=NULL){	
global $BACKUPS_PATH;
$dir= $BACKUPS_PATH.$db_id.'/';
	
$dbackupexpro_host= $this->get_db($db_id,'host');	
$db_name= $this->get_db($db_id,'name');
$db_user= $this->get_db($db_id,'user');
$db_pw= $this->get_db($db_id,'pw');	
$dbackupexpro_name= $this->decrypt_db_name($db_id, $db_name);	
$dbackupexpro_user=  $this->decrypt_db_user($db_id, $db_user);
$dbackupexpro_pw= $this->decrypt_pw($db_id,$db_pw);	
 
	
 
     $file_name = $dir.$file;

     $buffer_size = 8096;
     $out_file_name = str_replace('.gz', '', $file_name);

     
     $file = gzopen($file_name, 'rb');
     $out_file = fopen($out_file_name, 'wb');

     
     while (!gzeof($file)) {
         fwrite($out_file, gzread($file, $buffer_size));
     }

    
     fclose($out_file);
     gzclose($file);

	
	
	
     $file_unconpressed = substr($file_name, 0, -3);
	
	
	
	
	
	
	
	
	
if($parcial_tables){ // if somente algumas tabelas para restaurar
foreach($parcial_tables as $table_to_restore){
      
$cmd1 = "sed -n -e '/DROP TABLE IF EXISTS.*`'".$table_to_restore."'`/,/UNLOCK TABLES/p' $file_unconpressed > '".$table_to_restore."'.sql "; //criar um dump so da tabela que vai restaurar (Retira do dump a partir de DROP TABLE IF EXISTS ate UNLOCK TABLES)
exec($cmd1, $output, $result); 	
			
		//correr o dump da tabela que foi criado	
		$cmd = "mysql --host='".$dbackupexpro_host."' --user='".$dbackupexpro_user."' --password='".$dbackupexpro_pw."' {$dbackupexpro_name} < '".$table_to_restore."'.sql 2>&1";
		 exec($cmd, $output, $result); 
         if(@$result > 0)  {die('<i class="fa fa-exclamation-triangle"></i> '._('Error').' '.json_encode($output));}	
			
		 if(file_exists($table_to_restore.'.sql')){  unlink($table_to_restore.'.sql');} ///remover  o dump so da tabela que foi criado
			
		}
 		
	 
	
	
	
	}else{// if database na integra 1:1 e nao somente algumas tabelas
		 $cmd = "mysql --host='".$dbackupexpro_host."' --user='".$dbackupexpro_user."' --password='".$dbackupexpro_pw."' {$dbackupexpro_name} < $file_unconpressed 2>&1";
		 exec($cmd, $output, $result); 
         if(@$result > 0)  {die('<i class="fa fa-exclamation-triangle"></i> '._('Error').' '.json_encode($output));}
	}
    
    
 
     
    if(file_exists($file_unconpressed)){ 
	 unlink($file_unconpressed);	
	 die(_('Database Sucessfully Restored.')); 
     }else{ die('<i class="fa fa-exclamation-triangle"></i> '._('The Database could not be Restored'));}
	
	
 
}	
 
	
	 

	
	
	
	
	
	
	
//#####################################################
// Enviar ficheiro por FTP
//#####################################################
public function enviar_ftp($ftp_id, $file_to_send, $remote_file, $max_files_to_retain=NULL, $db_name=NULL){
 
$server = $this->decrypt_ftp_server($ftp_id, $this->get_ftp($ftp_id,'ftp_server'));
$username = $this->decrypt_ftp_user($ftp_id, $this->get_ftp($ftp_id,'ftp_username'));
$password = $this->decrypt_ftp_pw($ftp_id, $this->get_ftp($ftp_id,'ftp_pw'));
$ftp_subfolder = $this->get_ftp($ftp_id,'ftp_subfolder');
//criar pasta no ftp caso nao exista
$this->dbackupexpro_ftp_mk_subdir($server, $username, $password, $ftp_subfolder,$ftp_id);	
	
	
    
	$use_ssl= $this->get_ftp($ftp_id, 'use_ssl_connection');		
if ($use_ssl == 1){$connection = ftp_ssl_connect($server)or die('<i class="fa fa-exclamation-triangle"></i> '._("Unable to connect to host"));}else {$connection = ftp_connect($server)or die('<i class="fa fa-exclamation-triangle"></i> '._("Unable to connect to host"));}
	
	
    if (@ftp_login($connection, $username, $password)){
    }else{
        echo '<i class="fa fa-exclamation-triangle"></i> '._('The credentials are not correct.');return false;
    }

    ftp_pasv($connection, true); // por o modo passivo caso tenha firewall ligada
    $upload = ftp_put($connection, $ftp_subfolder.$remote_file, $file_to_send, FTP_BINARY); //novo ficheiro enviado
	if (!$upload) { die(_("FTP upload failed")); }
	
	
    // nr de ficheiros a manter no remote
	 if(isset($max_files_to_retain)){
	$ficheiros_remotos= ftp_nlist($connection, $ftp_subfolder);
	// Apagar ficheiros se mais do que o nr to retain	
	// somente mexer nos ficheiros que contenham o nome DbackupeXPro-".$db_name." no caso de ter os backups na mesma subfolder de outra database e este nao apagar os outros	
	/*$ficheiros_remotos = preg_grep("/DbackupeXPro-".$db_name."/",$ficheiros_remotos); 
	//http://www.rubular.com/
	$ficheiros_remotos = preg_grep("/DbackupeXPro-CronJob-".$db_name."/",$ficheiros_remotos); //cronjob
	$ficheiros_remotos = preg_grep("/DbackupeXPro-Partial-".$db_name."/",$ficheiros_remotos); //Partial		 
	*/
	$ficheiros_remotos = preg_grep("(DbackupeXPro-".$db_name."|DbackupeXPro-CronJob-".$db_name."|DbackupeXPro-Partial-".$db_name.")",$ficheiros_remotos);
	$ficheiros_remotos = preg_grep( '/\.sql.gz$/', $ficheiros_remotos); // somente mexer nos ficheiros .sql.gz			
	sort($ficheiros_remotos);//alphabetical sorting	
    for ($i = 0; $i < (count($ficheiros_remotos) - $max_files_to_retain); $i++)
    {   
	 @ftp_delete($connection, $ficheiros_remotos[$i]);
    }	
 
 	
		
		
    } 
	// FIM nr de ficheiros a manter no remote
 
 
	
    ftp_close($connection); // ficheiros enviados
	
	
	return(true); 
}
	
	
 
	
	
	
	
	
	
//#####################################################
// Enviar ficheiro single ficheiro to FTP on click
//#####################################################		
public function dbackupexro_send_single_file_to_ftp($db_id,$filename){	
global $BACKUPS_PATH;
	
$dir= $BACKUPS_PATH.$db_id.'/';	
$max_files_to_retain_on_ftp= $this->get_db($db_id,'max_files_to_retain_on_ftp');
$db_name= $this->get_db($db_id,'name');	
$dbackupexpro_name= $this->decrypt_db_name($db_id, $db_name);
 
	
if($this->get_db($db_id,'use_ftp_id') !=0){
	$ftp_id= $this->get_db($db_id,'use_ftp_id');
	$enviar_ftp= $this->enviar_ftp($ftp_id, $dir.$filename, $filename, $max_files_to_retain_on_ftp, $dbackupexpro_name); //10 numero de ficheiros to keep
	
	//actualizar data do ultimo backup	enviado para o ftp
	if(!$enviar_ftp){die('<i class="fa fa-exclamation-triangle"></i> '._('It was not possible to send the File to this FTP Server!'));}
	else{echo _('The File was successfully sent to the FTP Server');}
	
	if($enviar_ftp){$this->update_db_single('last_backup_time_to_ftp',date("Y-m-d H:i:s"),$db_id);}
	}else{ die('<i class="fa fa-exclamation-triangle"></i> '._('First you need to select a FTP Server!'));}
	
}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
//#####################################################
// Criar subpastas no FTP
//#####################################################
public function dbackupexpro_ftp_mk_subdir($ftp_server, $ftp_username, $ftp_pw,$ftpath,$id){
	
$use_ssl= $this->get_ftp($id, 'use_ssl_connection');		
if ($use_ssl == 1){$conection= @ftp_ssl_connect($ftp_server)or die('<i class="fa fa-exclamation-triangle"></i> '._("Unable to connect to host"));}else {$conection= @ftp_connect($ftp_server)or die('<i class="fa fa-exclamation-triangle"></i> '._("Unable to connect to host"));}
	
	
$ftp_conn = $conection or die('<i class="fa fa-exclamation-triangle"></i> '._('The credentials are wrong or the FTP Server do not accept the connection.'));
$login = @ftp_login($ftp_conn, $ftp_username, $ftp_pw); if(!$login){echo'<i class="fa fa-exclamation-triangle"></i> '._('The credentials to create the ftp folder are not correct.');return false;}

	
ftp_pasv($ftp_conn, true);	// por o modo passivo caso tenha firewall ligada
	
if (ftp_nlist($ftp_conn, $ftpath) == false) {
	$ftpbasedir='./';	
   @ftp_chdir($ftp_conn, $ftpbasedir);  
   $parts = explode('/',$ftpath); 
   foreach($parts as $part){
      if(!@ftp_chdir($ftp_conn, $part)){
      @ftp_mkdir($ftp_conn, $part);
      @ftp_chdir($ftp_conn, $part);
      }
   }
	
}
ftp_close($ftp_conn);	
}	
	
	

	

	 
 
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
 
	
//#####################################################
// Add new FTP
//#####################################################
public function add_new_ftp($ftp_title,$ftp_server,$ftp_subfolder,$ftp_username,$ftp_pw,$use_ssl_connection){ 
global $con;
global $prefixo; 
 

$use_ssl= $use_ssl_connection;		
if ($use_ssl == 1){$conection= @ftp_ssl_connect($ftp_server)or die('<i class="fa fa-exclamation-triangle"></i> '._("Unable to connect to host"));}else {$conection= @ftp_connect($ftp_server)or die('<i class="fa fa-exclamation-triangle"></i> '._("Unable to connect to host"));}
	
	
$ftp_conn = $conection or die('<i class="fa fa-exclamation-triangle"></i> '._('The credentials are wrong or the FTP Server do not accept the connection.'));
$login = @ftp_login($ftp_conn, $ftp_username, $ftp_pw); if(!$login)die('<i class="fa fa-exclamation-triangle"></i> '._('The credentials are not correct.'));
ftp_close($ftp_conn);
 
	
 
$ftp_pw_token= bin2hex(random_bytes(16));
$ftp_user_token= bin2hex(random_bytes(16));
$ftp_server_token= bin2hex(random_bytes(16));	
$senha_enc= $this->encrypt_ftp_pw($ftp_pw,$ftp_pw_token);	
$user_enc= $this->encrypt_ftp_user($ftp_username,$ftp_user_token);
$server_enc= $this->encrypt_ftp_server($ftp_server,$ftp_server_token);
	
	
$sql= mysqli_query ($con, 'INSERT INTO '.$prefixo.'ftp (ftp_title,ftp_server,ftp_subfolder,ftp_username,ftp_pw,ftp_pw_token,ftp_user_token,ftp_server_token,use_ssl_connection) 
VALUES (
"'.mysqli_real_escape_string($con,$ftp_title).'",
"'.mysqli_real_escape_string($con,$server_enc).'", 
"'.mysqli_real_escape_string($con,$ftp_subfolder).'", 
"'.mysqli_real_escape_string($con,$user_enc).'",
"'.mysqli_real_escape_string($con,$senha_enc).'",
"'.mysqli_real_escape_string($con,$ftp_pw_token).'",
"'.mysqli_real_escape_string($con,$ftp_user_token).'",
"'.mysqli_real_escape_string($con,$ftp_server_token).'",
"'.mysqli_real_escape_string($con,$use_ssl_connection).'"
) ');
	
if (!$sql) { die("Error: " . mysqli_error($con));} 
	else{   
		return(true);
	}	
	
	
 
mysqli_close($con);	
}
//	END add_DB
	
	
  
 	
	
	
	
	
	
	
	
	

//######################################
// Procura, lista  de FTP
//######################################
public function get_all_ftp($s){ 	
global $con;
global $prefixo;	
 
global $procura_ftp_form_token;	 
global $edit_ftpform_token;
global $delete_ftpform_token;	
if(isset($_GET['procura_ftp_form_token'])){$get_procura_ftp_form_token= $_GET['procura_ftp_form_token'];}else $get_procura_ftp_form_token= $procura_ftp_form_token;

 
if(!isset($s_query)){$s_query="";}	
if (isset($s) && $s!=''){ $s_query= "WHERE ftp_title LIKE '%". mysqli_real_escape_string($con,$s) ."%' OR  
                            id LIKE '%". mysqli_real_escape_string($con,$s) ."%' OR  
							ftp_subfolder LIKE '%". mysqli_real_escape_string($con,$s) ."%' OR 
							ftp_server LIKE '%". mysqli_real_escape_string($con,$s) ."%'";} else $s="";
  

/*============  Paginacao em cima ==============*/
$start=0;
$limit=10;
if(isset($_GET['pagina'])){$pagina=$_GET['pagina'];$start=($pagina-1)*$limit;}else{$pagina=1;}
/*============  Paginacao em cima ==============*/


 

$sql= mysqli_query($con, 'SELECT  *  FROM '.$prefixo.'ftp '.$s_query.' order by id DESC LIMIT '.$start.', '.$limit.'') ;
	
 	
	
while($row = mysqli_fetch_object($sql)) {
 
$ftp_server= $this->decrypt_ftp_server($row->id, $row->ftp_server);
$ftp_username= $this->decrypt_ftp_user($row->id, $row->ftp_username);

if($row->use_ssl_connection ==1){$use_ssl_output= '<span class="cor_verde"><i class="fa fa-check"></i> '. _('SSL active').'</span>';}else {$use_ssl_output= _('SSL deativated');}
	
	 
if(!isset($tabela_inside)){$tabela_inside="";}	
$tabela_inside .= ' 
<tr id="row_'.$row->id.'">
<td>'.$row->id.'</td>
<td>'.$row->ftp_title.'</td>
<td>'.$ftp_server.'</td>
<td>'.$ftp_username.'</td>
<td>'.$row->ftp_subfolder.'</td> 
<td>'.$use_ssl_output.'</td> 
 
<td> 
<div class="btn-group">
<a href="#" data-toggle="modal" data-target="#modal-edit-ftp-'.$row->id.'" ftp-id="'.$row->id.'" class="btn btn-xs btn-default"><i class="ti-marker"></i></a>
<a data-toggle="confirm" delete_ftpform_token="'.$delete_ftpform_token.'" data-title="'._('Delete this ftp?').'" id="'.$row->id.'" data-btn-ok-label="'._('Yes').'"  data-btn-cancel-label="'._('No!').'"  class="btn btn-xs btn-default delete-ftp" ><i class="ti-trash"></i></a>


</div>
</td> 
</tr> 
';
	
?>	
<!--  modal -->
<div class="modal modal-default fade" id="modal-edit-ftp-<?php echo $row->id;?>" >
<form id="<?php echo $row->id;?>"  class="form-horizontal update_ftp_form" role="form" >
 <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?php echo _('Edit ').' '.$row->ftp_title;?></h4>
              </div>
              <div class="modal-body">
              
             	 

<form class="edit_ftp_form">
<div class="form-group">
    <label class="col-sm-12">
        <?php echo _('Ftp Title');?> <small><?php echo _('Information to let you identify this ftp');?></small>
    </label>
    <div class="col-sm-12">
        <input type="text" class="form-control" name="ftp_title" value="<?php echo $row->ftp_title;?>">
    </div>
</div>
	<div class="clearfix"></div> 
	
	
<div class="box-header"><h3 class="box-title"> <?php echo _('Credentials');?></h3> </div> 	
	
<div class="form-group top10">
    <label class="col-sm-12">
        <?php echo _('FTP Server');?> 
    </label>
    <div class="col-sm-12">
    
        <input type="text" class="form-control" name="ftp_server" value="<?php echo $ftp_server;?>">
    </div>
</div><div class="clearfix"></div>
<div class="form-group top20">
      <label class="col-sm-12">
        <?php echo _('FTP Subfolder where the Backups should be stored');?> 
    </label>
   <div class="col-sm-12"> <small><?php echo _('The script will create this folder/subfolders if not exists on the ftp Server');?></small>
        <input type="text" class="form-control ftp_subfolder" name="ftp_subfolder" value="<?php echo $row->ftp_subfolder;?>">
    </div>
</div><div class="clearfix"></div> 
  
 <div class="form-group top20">
    <label class="col-sm-12">
        <?php echo _('FTP User');?>  
    </label>
    <div class="col-sm-12">
        <input type="text" class="form-control" name="ftp_username" value="<?php echo $ftp_username;?>">
    </div>
</div><div class="clearfix"></div>
 

<div class="form-group top20">
    <label class="col-sm-12">
        <?php echo _('FTP Password');?> <small><?php echo _('Leave blank to not chnage the password');?></small>
    </label>
    <div class="col-sm-12">
        <input type="password" class="form-control" name="ftp_pw">
    </div>
	

<!--Checkbox -->
 <div class="col-xs-2 col-sm-2 top30 text-right">
<input type='checkbox' class="slide-check" value="1" name="use_ssl_connection" id="use_ssl_connection" <?php if($row->use_ssl_connection ==1){echo 'checked';}?> >
</div>		
 <div class="col-xs-10 col-sm-10 text-left" style="margin-top: 25px;">	
<label for="use_ssl_connection"><?php echo _('Use SSL Connection?');?> <br><small><?php echo _('Some FTP servers can only accept a SSL connection!');?></small></label>
</div>	 

	
	
	
</div><div class="clearfix"></div>
<input type="hidden" name="ftp_id" value="<?php echo $row->id;?>">
<input type="hidden" name="edit_ftpform_token"  value="<?php echo $edit_ftpform_token;?>">
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
}
   
	
	
 
echo $tabela_header= '<table class="table table-hover">
                  <tr>
				  <th>'._('Id').'</th>
				  <th>'._('FTP Title').'</th>
                  <th>'._('FTP Server').'</th>
				  <th>'._('FTP Username').'</th>
                  <th>'._('FTP Folder').'</th> 
				  <th>'._('SSL Connection').'</th> 
                  <th>'._('Options').'</th>
                  </tr>';
				
				  
if(!isset($tabela_inside)){$tabela_inside="";}				          
echo  $tabela_inside.'</table>';


/*============  Paginacao em baixo ==============*/
//contar os resultados da base de dados
$rows=mysqli_num_rows(mysqli_query($con,'SELECT  *  FROM '.$prefixo.'ftp '.$s_query.' '));
 if($rows=='0') echo '<div  style="color:#BFBFBF; text-align:center"><h1><br>'._('No results found!').'</h1></div>';
$total=ceil($rows/$limit);//Calcular o numero de paginas

$ajax_file='dbackupexpro_ajax.php';	
	
if(!isset($link_pagina)){$link_pagina="";}	
	
echo'<div class="row"></div><br><ul class="paginacao">'; 
if($pagina>1){
echo '<li><a href="'.$ajax_file.'?'.$link_pagina.'&pagina='.($pagina-1).'&s='.$s.'&procura_ftp_form_token='.$get_procura_ftp_form_token.'">&laquo;</a></li>';} // recuar uma pagina

//Mostar as paginas todas.  
for($i=1;$i<=$total;$i++){
	
if($i==$pagina) { echo '<li><a href="'.$ajax_file.'?'.$link_pagina.'&pagina='.$pagina.'&s='.$s.'&procura_ftp_form_token='.$get_procura_ftp_form_token.'" class="active">'.$i.'</a></li>'; } /*pagina activa*/

else { echo '<li><a href="'.$ajax_file.'?'.$link_pagina.'&pagina='.$i.'&s='.$s.'&procura_ftp_form_token='.$get_procura_ftp_form_token.'">'.$i.'</a></li>';}
}

if($pagina!=$total){echo '<li><a href="'.$ajax_file.'?'.$link_pagina.'&pagina='.($pagina+1).'&s='.$s.'&procura_ftp_form_token='.$get_procura_ftp_form_token.'">&raquo;</a></li>';} // avancar uma pagina 
echo '</ul>';
/*============ FIM Paginacao em baixo ==============*/ 
 
echo '<script src="../assets/js/bootstrap-confirmation.min.js"></script>';
echo '<script src="../assets/js/notificacoes.js"></script></script>';
}// END Lista ftp
	
	
	
	
	
	
	
	
	
} // END dbackupexro Class



 

 





 

     
	 
	 
 















//#####################################################
// TOKENS
//#####################################################
class dbackupexro_form_token{
	
public  function reset_all_sessions(){	
// Unset all of the session variables.
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy();
}	
	
public  function new_token($name){	
if(empty($_SESSION[$name])){
$_SESSION[$name] = bin2hex(random_bytes(16));}
}	
	
	
public  function get_session_token($name){
return($_SESSION[$name]);
}	
	 
	
 
}//	class dbackupexro_form_token	


if(!isset($_SESSION)) {session_start();}
$dbackupexro_form_token= new dbackupexro_form_token();

//add server token session
$dbackupexro_form_token->new_token('add_new_db_token');
$dbackupexro_form_token->new_token('procura_form_token');
$dbackupexro_form_token->new_token('edit_dbform_token');
$dbackupexro_form_token->new_token('delete_dbform_token');
$dbackupexro_form_token->new_token('resete_cron_token_dbform_token');
$dbackupexro_form_token->new_token('show_single_backups_list_dbform_token');
$dbackupexro_form_token->new_token('set_max_files_to_keep_dbform_token');
$dbackupexro_form_token->new_token('create_new_backup_dbform_token');
$dbackupexro_form_token->new_token('set_max_files_to_keep_ftp_dbform_token');
$dbackupexro_form_token->new_token('del_backup_dbform_token');
$dbackupexro_form_token->new_token('upload_backup_dbform_token');
$dbackupexro_form_token->new_token('restore_backup_dbform_token');
$dbackupexro_form_token->new_token('add_new_ftp_dbform_token');
$dbackupexro_form_token->new_token('enviar_single_file_ftp_token');
$dbackupexro_form_token->new_token('procura_ftp_form_token');
$dbackupexro_form_token->new_token('edit_ftpform_token');
$dbackupexro_form_token->new_token('delete_ftpform_token');
$dbackupexro_form_token->new_token('del_backup_ftpform_token');
$dbackupexro_form_token->new_token('change_ftp_token');
$dbackupexro_form_token->new_token('activate_main_cron_job_for_db_token');
$dbackupexro_form_token->new_token('change_partional_backup_token');
 


//get server Token session
$add_new_db_token= $dbackupexro_form_token->get_session_token('add_new_db_token');
$procura_form_token= $dbackupexro_form_token->get_session_token('procura_form_token');
$edit_dbform_token= $dbackupexro_form_token->get_session_token('edit_dbform_token');
$delete_dbform_token= $dbackupexro_form_token->get_session_token('delete_dbform_token');
$resete_cron_token_dbform_token= $dbackupexro_form_token->get_session_token('resete_cron_token_dbform_token');
$show_single_backups_list_dbform_token= $dbackupexro_form_token->get_session_token('show_single_backups_list_dbform_token');
$set_max_files_to_keep_dbform_token= $dbackupexro_form_token->get_session_token('set_max_files_to_keep_dbform_token');
$create_new_backup_dbform_token= $dbackupexro_form_token->get_session_token('create_new_backup_dbform_token');
$del_backup_dbform_token= $dbackupexro_form_token->get_session_token('del_backup_dbform_token');
$upload_backup_dbform_token= $dbackupexro_form_token->get_session_token('upload_backup_dbform_token');
$restore_backup_dbform_token= $dbackupexro_form_token->get_session_token('restore_backup_dbform_token');
$add_new_ftp_dbform_token= $dbackupexro_form_token->get_session_token('add_new_ftp_dbform_token');
$enviar_single_file_ftp_token= $dbackupexro_form_token->get_session_token('enviar_single_file_ftp_token');
$procura_ftp_form_token= $dbackupexro_form_token->get_session_token('procura_ftp_form_token');
$edit_ftpform_token= $dbackupexro_form_token->get_session_token('edit_ftpform_token');
$delete_ftpform_token= $dbackupexro_form_token->get_session_token('delete_ftpform_token');
$change_ftp_token= $dbackupexro_form_token->get_session_token('change_ftp_token');
$set_max_files_to_keep_ftp_dbform_token= $dbackupexro_form_token->get_session_token('set_max_files_to_keep_ftp_dbform_token');
$activate_main_cron_job_for_db_token= $dbackupexro_form_token->get_session_token('activate_main_cron_job_for_db_token');
$change_partional_backup_token = $dbackupexro_form_token->get_session_token('change_partional_backup_token');




//#####################################################
// TOKENS END
//#####################################################
?>