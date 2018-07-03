<?php 
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Software: Regex The Speed Inproved PHP Login, 
// Website & User Management
// CopyRight: Litos Media - Carlos Santos de Azevedo
// Contact: info@litos.top
// 07-2017
#####################################################

$demo_on ="0"; // 1 for on 0 for Off

	 
//######################################
//  Funcao time ago
//######################################update_permalink
function time_ago($time_ago)
{
    $time_ago = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
    // Seconds
    if($seconds <= 60){
        return _('just now');
    }
    //Minutes
    else if($minutes <=60){
        if($minutes==1){
            return _('one minute ago');
        }
        else{
            return sprintf(_('%s minutes ago'),$minutes);
        }
    }
    //Hours
    else if($hours <=24){
        if($hours==1){
            return  _('an hour ago');
        }else{
            return sprintf(_('%s hrs ago'),$hours);
        }
    }
    //Days
    else if($days <= 7){
        if($days==1){
            return _('yesterday');
        }else{
            return sprintf(_('%s days ago'),$days);
        }
    }
    //Weeks
    else if($weeks <= 4.3){
        if($weeks==1){
            return  _("a week ago");
        }else{
            return sprintf(_('%s weeks ago'),$weeks);
        }
    }
    //Months
    else if($months <=12){
        if($months==1){
            return _("a month ago");
        }else{
            return sprintf(_('%s months ago'),$months);
        }
    }
    //Years
    else{
        if($years==1){
            return _("one year ago"); 
        }else{
            return sprintf(_('%s years ago'),$years);
        }
    }
}











class website{
	
public function update_all_options($tab1,
								   $tab2,
								   $tab3,
								   $tab4,
								   $tab5,
								   $tab6,
								   $tab7,
								   $tab8,
								   $tab9,
								   $tab10,
								   $tab11,
								   $tab12,
								   $tab13,
								   $tab14,
								   $tab15,
								   $tab16,
								   $tab17,
								   $tab18,
								   $tab19,
								   $tab20,
								   $tab21,
								   $tab22,
								   $tab23,
								   $tab24,
								   $tab25,
								   $tab26,
								   $tab27,
								   $tab28,
								   $tab29,
								   $tab30,
								   $tab31,
								   $tab32,
								   $tab33,
								   $tab34,
								   $tab35,
								   $tab36,
								   $tab37,
								   $tab38,
								   $tab39,
								   $tab40,
								   $tab41,
								   $tab42,
								   $tab43,
								   $tab44,
								   $tab45,
								   $tab46,
								   $tab47,
								    
								   
								   $valor1,
								   $valor2,
								   $valor3,
								   $valor4,
								   $valor5,
								   $valor6,
								   $valor7,
								   $valor8,
								   $valor9,
								   $valor10,
								   $valor11,
								   $valor12,
								   $valor13,
								   $valor14,
								   $valor15,
								   $valor16,
								   $valor17,
								   $valor18,
								   $valor19,
								   $valor20,
								   $valor21,
								   $valor22,
								   $valor23,
								   $valor24,
								   $valor25,
								   $valor26,
								   $valor27,
								   $valor28,
								   $valor29,
								   $valor30,
								   $valor31,
								   $valor32,
								   $valor33,
								   $valor34,
								   $valor35,
								   $valor36,
								   $valor37,
								   $valor38,
								   $valor39,
								   $valor40,
								   $valor41,
								   $valor42,
								   $valor43,
								   $valor44,
								   $valor45,
								   $valor46,
								   $valor47 
								   ) { 
global $con;
global $prefixo;
$sql= mysqli_query($con, 'UPDATE '.$prefixo.'site_options SET 
'.$tab1.'="'.mysqli_real_escape_string($con,$valor1).'",
'.$tab2.'="'.mysqli_real_escape_string($con,$valor2).'",
'.$tab3.'="'.mysqli_real_escape_string($con,$valor3).'",
'.$tab4.'="'.mysqli_real_escape_string($con,$valor4).'",
'.$tab5.'="'.mysqli_real_escape_string($con,$valor5).'",
'.$tab6.'="'.mysqli_real_escape_string($con,$valor6).'",
'.$tab7.'="'.mysqli_real_escape_string($con,$valor7).'",
'.$tab8.'="'.mysqli_real_escape_string($con,$valor8).'",
'.$tab9.'="'.mysqli_real_escape_string($con,$valor9).'",
'.$tab10.'="'.mysqli_real_escape_string($con,$valor10).'",
'.$tab11.'="'.mysqli_real_escape_string($con,$valor11).'",
'.$tab12.'="'.mysqli_real_escape_string($con,$valor12).'",
'.$tab13.'="'.mysqli_real_escape_string($con,$valor13).'",
'.$tab14.'="'.mysqli_real_escape_string($con,$valor14).'",
'.$tab15.'="'.mysqli_real_escape_string($con,$valor15).'",
'.$tab16.'="'.mysqli_real_escape_string($con,$valor16).'",
'.$tab17.'="'.mysqli_real_escape_string($con,$valor17).'",
'.$tab18.'="'.mysqli_real_escape_string($con,$valor18).'",
'.$tab19.'="'.mysqli_real_escape_string($con,$valor19).'",
'.$tab20.'="'.mysqli_real_escape_string($con,$valor20).'",
'.$tab21.'="'.mysqli_real_escape_string($con,$valor21).'",
'.$tab22.'="'.mysqli_real_escape_string($con,$valor22).'",
'.$tab23.'="'.mysqli_real_escape_string($con,$valor23).'",
'.$tab24.'="'.mysqli_real_escape_string($con,$valor24).'",
'.$tab25.'="'.mysqli_real_escape_string($con,$valor25).'",
'.$tab26.'="'.mysqli_real_escape_string($con,$valor26).'",
'.$tab27.'="'.mysqli_real_escape_string($con,$valor27).'",
'.$tab28.'="'.mysqli_real_escape_string($con,$valor28).'",
'.$tab29.'="'.mysqli_real_escape_string($con,$valor29).'",
'.$tab30.'="'.mysqli_real_escape_string($con,$valor30).'",
'.$tab31.'="'.mysqli_real_escape_string($con,$valor31).'",
'.$tab32.'="'.mysqli_real_escape_string($con,$valor32).'",
'.$tab33.'="'.mysqli_real_escape_string($con,$valor33).'",
'.$tab34.'="'.mysqli_real_escape_string($con,$valor34).'",
'.$tab35.'="'.mysqli_real_escape_string($con,$valor35).'",
'.$tab36.'="'.mysqli_real_escape_string($con,$valor36).'",
'.$tab37.'="'.mysqli_real_escape_string($con,$valor37).'",
'.$tab38.'="'.mysqli_real_escape_string($con,$valor38).'",
'.$tab39.'="'.mysqli_real_escape_string($con,$valor39).'",
'.$tab40.'="'.mysqli_real_escape_string($con,$valor40).'",
'.$tab41.'="'.mysqli_real_escape_string($con,$valor41).'",
'.$tab42.'="'.mysqli_real_escape_string($con,$valor42).'",
'.$tab43.'="'.mysqli_real_escape_string($con,$valor43).'",
'.$tab44.'="'.mysqli_real_escape_string($con,$valor44).'",
'.$tab45.'="'.mysqli_real_escape_string($con,$valor45).'",
'.$tab46.'="'.mysqli_real_escape_string($con,$valor46).'",
'.$tab47.'="'.mysqli_real_escape_string($con,$valor47).'"
 '); 

} 



public function update_option($set_tabela,$valor_to_update) { 
global $con;
global $prefixo;
$sql= mysqli_query($con, 'UPDATE '.$prefixo.'site_options SET '.$set_tabela.'="'.mysqli_real_escape_string($con,$valor_to_update).'" '); 
}



 

}//END CLASS WEBSITE






class client{
 
public function get_client_avatar($user_id){ 
global $con;
global $prefixo;
global $AVATAR_PATH;
global $SITE_URL;	
$sql= mysqli_query($con, 'SELECT avatar FROM '.$prefixo.'users WHERE id="'.$user_id.'"  ') ;
while($row = mysqli_fetch_object($sql)) {
if ($row->avatar){return $SITE_URL.$AVATAR_PATH.$row->avatar;}else {return $SITE_URL.$AVATAR_PATH.get_website("default_avatar");}
} 
}



public function get_client($o_que,$user_id){ 
global $con;
global $prefixo;
$sql= mysqli_query($con, 'SELECT '.$o_que.' FROM '.$prefixo.'users WHERE id="'.$user_id.'"  ') ;
while($row = mysqli_fetch_object($sql)) {return $row->$o_que;} 
}


	
	
 
 

 
	
	
/*************
ESTATISTICAS
**************/
public function get_last_clients(){ 
global $con;
global $prefixo;
global $SEO_URL_USERS_EDIT;	
$sql= mysqli_query($con, 'SELECT * FROM '.$prefixo.'users ORDER BY reg_date DESC LIMIT 8') ;
while($row = mysqli_fetch_object($sql)) {

if(!isset($userlist)){$userlist="";}	
$userlist .='<li class="col-sm-4 col-xs-12">
<a class="users-list-name" href="'.$SEO_URL_USERS_EDIT.'?id='.$row->id.'"  >
<div class="last_users_avatar_img" style="background-image: url('.$this->get_client_avatar($row->id).');"></div>
<'.$row->username.'
<span class="users-list-date">'.time_ago($row->reg_date).'</span></a></li>
';	 
}
if(isset($userlist)){return $userlist;}
}
	
	
	
public function total_clients(){
global $con;
global $prefixo;
$sql= mysqli_query($con, 'SELECT * FROM '.$prefixo.'users') ;
return   sprintf("%02d", mysqli_num_rows($sql));
}
	
	
public function total_users_admin(){
global $con;
global $prefixo;
$sql= mysqli_query($con, 'SELECT * FROM '.$prefixo.'users WHERE role="admin" OR role="super_admin"');
return   sprintf("%02d", mysqli_num_rows($sql));
}

	
public function total_users_frontend(){
global $con;
global $prefixo;
$sql= mysqli_query($con, 'SELECT * FROM '.$prefixo.'users WHERE role="front_end_user"');
return   sprintf("%02d", mysqli_num_rows($sql));
}
	
	
public function total_users_not_activated(){
global $con;
global $prefixo;
$sql= mysqli_query($con, 'SELECT * FROM '.$prefixo.'users WHERE register_token != "activated" ');
return   sprintf("%02d", mysqli_num_rows($sql));
}

public function total_users_banned(){
global $con;
global $prefixo;
$sql= mysqli_query($con, 'SELECT * FROM '.$prefixo.'users WHERE banned= "1" ');
return   sprintf("%02d", mysqli_num_rows($sql));
}
	
	
	

public function total_clients_today(){
global $con;
global $prefixo;
$sql= mysqli_query($con, 'SELECT * FROM '.$prefixo.'users WHERE YEAR(reg_date) = YEAR(NOW()) AND MONTH(reg_date) = MONTH(NOW()) AND DAY(reg_date) = DAY(NOW())') ;
return   sprintf("%02d", mysqli_num_rows($sql));
}	
	
	
public function total_clients_this_month(){
global $con;
global $prefixo;
$sql= mysqli_query($con, 'SELECT * FROM '.$prefixo.'users WHERE YEAR(reg_date) = YEAR(NOW()) AND MONTH(reg_date)=MONTH(NOW())') ;
return   sprintf("%02d", mysqli_num_rows($sql));
}		

	
 
	
public function total_clients_last_month(){
global $con;
global $prefixo;
$sql= mysqli_query($con, 'SELECT * FROM '.$prefixo.'users WHERE YEAR(reg_date) = YEAR(NOW()) AND MONTH(reg_date) = MONTH(NOW() - INTERVAL 1 MONTH) ') ;
return   sprintf("%02d", mysqli_num_rows($sql));
}		
	
	
	
	
 
function total_users_on_period($mes,$ano){
global $con;
global $prefixo;
$sql= mysqli_query($con, 'SELECT * FROM '.$prefixo.'users WHERE Year(reg_date)="'.$ano.'" AND Month(reg_date)="'.$mes.'"  ');
$resultado= mysqli_num_rows ( $sql );
return $resultado;
}


function total_users_on_period_data_for_morris_line(){
for($i=0;$i<=12;$i++){
$time = strtotime("first day of -". $i." months");
$numero_mes= date("m",$time);
$ano_morris=  date("Y",$time);
$months= $ano_morris.'-'.$numero_mes;

if($i<>'12'){$poe_virgula=','; }else $poe_virgula='';
if(!isset($resultado)){$resultado="";}	
$resultado.= '{period: "'.$months.'", clients: '.$this->total_users_on_period($numero_mes,$ano_morris).'}'.$poe_virgula.'';
}
return $resultado;
}
	
	
	
/****************
END ESTATISTICAS
*****************/
  

	
	
	
	
	
	
public function print_user_role($user_id){ 
global $con;
global $prefixo;
$sql= mysqli_query($con, 'SELECT role FROM '.$prefixo.'users WHERE id="'.$user_id.'"  ') ;
while($row = mysqli_fetch_object($sql)) {
if($row->role == 'admin'){ return _('Administrator');} 
elseif($row->role == 'front_end_user'){ return _('Frontend user');}
elseif($row->role == 'front_end_user_2'){ return _('Frontend user 2');}
elseif($row->role == 'front_end_user_3'){ return _('Frontend user 3');}
elseif($row->role == 'front_end_user_4'){ return _('Frontend user 4');}	
elseif($row->role == 'super_admin'){ return _('Master Administrator');}
else {return _('Without role');}
}}



public function print_role($role){ 
if($role == 'admin'){ return _('Administrator');} 
elseif($role == 'front_end_user'){ return _('Frontend user');}
elseif($role == 'front_end_user_2'){ return _('Frontend user 2');}
elseif($role == 'front_end_user_3'){ return _('Frontend user 3');}
elseif($role == 'front_end_user_4'){ return _('Frontend user 4');}	
elseif($role == 'super_admin'){ return _('Master Administrator');}
else {return _('Without role');}
} 






public function delete_client($user_id){ 
global $con;
global $prefixo;
$sql= mysqli_query($con, 'DELETE FROM '.$prefixo.'users WHERE id="'.$user_id.'"  ') ;
}

 
	
 
	
public function ban_unban_client($id) { 
global $con;
global $prefixo;
$sql= mysqli_query($con, 'UPDATE '.$prefixo.'users SET banned=IF(banned=1, 0, 1) WHERE id="'.$id.'" ');
}
	
 
	 
 
 
public function update_client($id,$set_tabela,$valor_to_update) { 
global $con;
global $prefixo;
global $log_cokkie;
$sql= mysqli_query($con, 'UPDATE '.$prefixo.'users SET '.$set_tabela.'="'.mysqli_real_escape_string($con,$valor_to_update).'" WHERE id="'.$id.'" '); 
}


	
	
	
	
public function create_client($tabela1,$tabela2,$tabela3,$tabela4,$tabela5,$tabela6,$tabela7,$tabela8,   $o_que1,$o_que2,$o_que3,$o_que4,$o_que5,$o_que6,$o_que7,$o_que8) { 
global $con;
global $prefixo;
$query= mysqli_query ($con, 'INSERT INTO '.$prefixo.'users (
															'.$tabela1.', 
															'.$tabela2.',
															'.$tabela3.',
															'.$tabela4.',
															'.$tabela5.',
															'.$tabela6.',
															'.$tabela7.',
															'.$tabela8.'
) VALUES ( 
"'.mysqli_real_escape_string($con,$o_que1).'",
"'.mysqli_real_escape_string($con,$o_que2).'", 
"'.mysqli_real_escape_string($con,$o_que3).'",
"'.mysqli_real_escape_string($con,$o_que4).'",
"'.mysqli_real_escape_string($con,$o_que5).'",
"'.mysqli_real_escape_string($con,$o_que6).'",
"'.mysqli_real_escape_string($con,$o_que7).'",
"'.mysqli_real_escape_string($con,$o_que8).'"
) ');}

//	END create_client
	
	
	
 


}//end class user










class permalink{
	
public  function format_slug( $string, $separator = '-' )
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


public function update_permalink($id,$valor_to_update) { 
global $con;
global $prefixo;
$sql= mysqli_query($con, 'UPDATE '.$prefixo.'permalinks SET slug="'.mysqli_real_escape_string($con,$valor_to_update).'" WHERE id="'.$id.'" ');
}


 
public function add_permalink($file,$slug) { 
global $con;
global $prefixo;
mysqli_query ($con, 'INSERT INTO '.$prefixo.'permalinks (file,slug) VALUES ( "'.mysqli_real_escape_string($con,$file).'","'.mysqli_real_escape_string($con,$slug).'") ');
}

 
 



public function ja_existe($file,$slug){ 
global $con;
global $prefixo;
$sql= mysqli_query($con, 'SELECT * FROM '.$prefixo.'permalinks WHERE file="'.$file.'" OR slug="'.$slug.'" ') ;
while($row = mysqli_fetch_object($sql)) {
if (mysqli_num_rows($sql)!=0){ return true;}
} 
}

	
	
	

public function get_slug($parts){ 
global $con;
global $prefixo; 
$sql= mysqli_query($con, 'SELECT * FROM '.$prefixo.'permalinks WHERE slug="'.$parts[1].'" ') ;
while($row = mysqli_fetch_object($sql)) {return $row->slug;}
}
	
	
 public function get_file($parts){ 
global $con;
global $prefixo; 
$sql= mysqli_query($con, 'SELECT * FROM '.$prefixo.'permalinks WHERE slug="'.$parts[1].'" ') ;
while($row = mysqli_fetch_object($sql)) {return $row->file;}
}

	
	

public function get_file_list(){
global $con;
global $prefixo; 
$sql= mysqli_query($con, 'SELECT * FROM '.$prefixo.'permalinks') ;
while($row = mysqli_fetch_object($sql)) {
$files_ja_usados .=  $row->file;
}	

return '<select class="form-control col-sm-12" name="file">
<option selected> '._('Select the file that will be linked with the slug').'</option>';
$dir = "../";
//$files = preg_grep('~\.(php|html)$~', scandir($dir));
$files = preg_grep('~\.(php)$~', scandir($dir));//somente php files
foreach ($files as $file){
if ( is_file($dir. $file)){
if ($file !='ajax_login.php' &&  
    $file !='ajax.php' &&
    $file !='header.php'  &&
	$file !='footer.php' &&
	$file !='info.php'  &&
	$file !='permalinks.php'
	
){$option= '<option value="'.$file.'">'.$file.'</option>';
 
 }}}

 
return '</select>';
 
}
	
	
	
	
	
	
}//end class permalink










/*######################################
// To do List
//#####################################*/

class todo{

	
	
public function get_all(){ 
global $con;
global $prefixo; 
$sql= mysqli_query($con, 'SELECT * FROM '.$prefixo.'todo ORDER BY position ASC, date DESC') ;
while($row = mysqli_fetch_object($sql)) {

	
/* If task is done add class to the text*/
if($row->done == 1){$done="done";}else{$done="";}

/*Icon set as done or doen undo*/
if($row->done == 1){
$done_icon='<i class="fa fa-undo  set-todo-done" todo-item-id="'.$row->id.'"  id="undo-done-todo"></i>';
}else{$done_icon='<i class="fa fa-check-square-o set-todo-done" todo-item-id="'.$row->id.'"></i>';}
	

/* If date limit is set or not*/
if(!$row->date_limit){$date_limit= _('No date limit');}	else {$date_limit=$row->date_limit;}	
	
 
/* If date limit is today */
if(strtotime($row->date_limit) <= strtotime('now') && $row->date_limit !='' && $row->done == 0){
	
	$hoje_data_limite_style='border-left:10px solid #dd5353; position:relative;';
	$hoje_data_limite_simbolo= '<div class="dot-pulse" style="position:absolute; right:8px; top:6px;color:#fff"><i class="fa fa-clock-o"></i></div>';
 
}
	
	else {
		  $hoje_data_limite_style="";
		  $hoje_data_limite_simbolo="";
		 }	
	
	
if(!isset($todo_list)){$todo_list="";}	
$todo_list .=' <li class="'.$done.' todo-item-li" id="todo-item-'.$row->id.'" style="'.$hoje_data_limite_style.'">
                  <!-- drag handle -->
                  <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                
                  <!-- todo text -->
                  <span class="text" >'.$row->text.'</span> '.$hoje_data_limite_simbolo.'
                  <!-- Emphasis label -->
                  <br><small class="label label-warning"><i class="fa fa-clock-o"></i> '.$date_limit.'</small>
                  <!-- General tools such as edit or delete-->
                  <div class="tools">
				    '.$done_icon.'
                    <i class="fa fa-edit" data-toggle="modal" data-target="#modal-edit-todo-'.$row->id.'"></i>
                    <i class="ti-trash apagar_to-do" data-toggle="confirm" data-title="Are you sure?" delete_todo_id="'.$row->id.'" data-btn-ok-label="Ja" data-btn-cancel-label="No!" ></i> 
                  </div>
                </li>';
	
if(!isset($modal)){$modal="";}	
$modal .='<div class="modal modal-default fade" id="modal-edit-todo-'.$row->id.'"  data-backdrop="false" style=" padding-top:5%">
<form class="form-horizontal change_todo_item" role="form">
 <div class="modal-dialog" >
            <div class="modal-content" >
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">'._('Edit To-Do Task').'</h4>
              </div>
              <div class="modal-body">
			 
                
				<div class="form-group">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="ti-pin2"></i>
                  </div>
                  <textarea class="form-control pull-right" name="text" placeholder="'._('To-Do text').'">'.$row->text.'</textarea>
                </div>
                <!-- /.input group -->
              </div>
			  <div class="form-group">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="ti-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right datepicker" name="date" placeholder="'._('Limit Date').'" value="'.$date_limit.'">
                </div>
                <!-- /.input group -->
              </div>
 
				
			    <input type="hidden" name="todo_item_id" value="'.$row->id.'">
				<input type="hidden" name="update_todo_task" value="4456645zh546456dd34rfg">
                
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">'._('Cancel').'</button>
              <button type="submit" class="btn btn-default">'._('Save changes').'</button> 
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
    <!-- /.modal-dialog -->
	</form>
</div>	';
	
	
	
}	
	
	
	
if(isset($todo_list)){echo $todo_list.$modal;}	
	
	 
}
//
	
	
	
	
	
public function add_new_to_do($text, $date_limit) {
global $con;
global $prefixo;
$query= mysqli_query ($con, 'INSERT INTO '.$prefixo.'todo (text,date_limit) VALUES ("'.mysqli_real_escape_string($con,$text).'","'.mysqli_real_escape_string($con,$date_limit).'") ');
}	
//

	
	
	
	
public function total_to_do() {
global $con;
global $prefixo;
$sql= mysqli_query($con, 'SELECT * FROM '.$prefixo.'todo WHERE done="0" ');
$resultado= mysqli_num_rows ( $sql );
return $resultado;
}	
	

public function update_todo_task($id,$text,$date_limit) { 
global $con;
global $prefixo;
$sql= mysqli_query($con, 'UPDATE '.$prefixo.'todo SET text="'.$text.'", date_limit="'.$date_limit.'"  WHERE id="'.$id.'" ');
}	
	
	
	
public function update_todo_done($id) { 
global $con;
global $prefixo;
$sql= mysqli_query($con, 'UPDATE '.$prefixo.'todo SET done=IF(done=1, 0, 1) WHERE id="'.$id.'" ');
}
	 
	
	
	
public function delete_todo_task($id) { 
global $con;
global $prefixo;
$sql= mysqli_query($con, 'DELETE FROM '.$prefixo.'todo WHERE id="'.$id.'" ');
}
 
	
}// End class To do List

?>