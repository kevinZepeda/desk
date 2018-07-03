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

$todo= new todo();



//######################################
// Load to-do items
//######################################
if(isset($_GET['show-list'])=="387th78543468"){
echo $todo->get_all();
}


//######################################
// Load to-do nr. of items  
//######################################
if(isset($_GET['todo_qty'])=="387thrgerg"){

if($todo->total_to_do()>"0"){
echo'<script>$("#todo_qty_container").addClass("label label-danger")</script>';
echo  $todo->total_to_do();	}
if($todo->total_to_do()==0){echo'<script>$("#todo_qty_container").removeClass("label label-danger")</script>';}
}





//######################################
// Change order To-do List
//######################################
if(isset($_POST['todo-item'])){
$i = 0;
foreach ($_POST['todo-item'] as $value) {
	$sql= mysqli_query($con, 'UPDATE '.$prefixo.'todo SET position="'.mysqli_real_escape_string($con,$i).'" WHERE id="'.$value.'" ');
    $i++;
}
}





//######################################
// Add new  to-do item
//######################################

if(isset($_POST['addnew_todo'])=='3t0f93j30985'){
	
if(!$_POST['text']){die('<i class="fa fa-exclamation-triangle"></i> '._('Please add a To-Do text.'));}
	
$todo->add_new_to_do($_POST['text'], $_POST['date']);
die(_('To-Do Task sucessfully added'));	
}





//######################################
// Set  to-do item as done
//######################################
if(isset($_GET['set_to_to_as_done'])=="387thrgewedfrg"){
$todo->update_todo_done($_GET['todo_item_id']);
die(_('To-do Task changed sucessfull.'));
}


 

//######################################
// Remove to-do item  
//######################################
if(isset($_GET['delete_to_do_task'])=="3wefweffrg"){
$todo->delete_todo_task($_GET['todo_item_id']);
die(_('To-do Task sucessfully deleted.'));
}


 

//######################################
// Update to-do item  
//######################################
if(isset($_POST['update_todo_task'])=="4456645zh546456dd34rfg"){
$todo->update_todo_task($_POST['todo_item_id'],$_POST['text'],$_POST['date']);
die(_('To-do Task sucessfully updated.'));
}





// Idioma para a calendario
$idioma_calendario='en';
$lang= new lang();
$user= new user();
if (get_website('language')){$idioma_calendario= $lang->get_lang(get_website('language'),'language_code_ini');}//Default Language
if ($user->get_logged_user('language') && get_website('multilanguage_active') =='1'){$idioma_calendario= $lang->get_lang($user->get_logged_user('language'),'language_code_ini');}// user language

?>
<!-- confirmation -->
<script src="<?php echo $ADMIN_URL;?>assets/js/bootstrap-confirmation.min.js"></script>


<!--/*#################################### 
  Datepicker 
//#################################### -->
<link rel="stylesheet" href="<?php echo $ADMIN_URL;?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="<?php echo $ADMIN_URL;?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo $ADMIN_URL;?>bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.<?php echo $idioma_calendario;?>.min.js"></script>



<script>
 //Date picker new To-do list
    $('.datepicker').datepicker({
      autoclose: true,
      language: '<?php echo $idioma_calendario;?>',
      orientation:'bottom',
		 
	 
 
    }); 
	 $('.datepicker').datepicker({ defaultDate: new Date() });
</script>
<!--/*#################################### 
  END Datepicker 
//#################################### -->
 


 