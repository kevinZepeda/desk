<?php 
//######################################
// CARLOS SANTOS DE AZEVEDO
// Software: Regex Login/Register with user management
// Para: Litos Media
//07-2017######################################

include($_SERVER['DOCUMENT_ROOT']."/inc/db.php");
include($_SERVER['DOCUMENT_ROOT']."/inc/func.php");
include ("inc/admin_func.php");
include ("inc/admin_conf.php");
include ("inc/admin_login_required.php");
include ("header.php"); 

?>

 
<?php include ("sidebar.php");?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    </section>




<!-- Main content -->
<section class="content container-fluid">

	
	

	


<!-- Set lang -->	
<div class="col-xs-12 col-sm-12 col-md-6 top30" > 	
 <div class="box">
 <div class="box-header"><h3 class="box-title"> <?php echo _('Default Language');?><br>
<small><?php echo _('Set the default Language of your Website');?></small>
</h3></div>          

<div class="box-body ">                 
<div class="col-xs-12 col-sm-12 col-md-12 set_default_lang_container">
 
 
<!--   Drop down --> 
<form id="set_default_lang">
<div class="input-group input-group-lg top20">   
	<select class="form-control col-sm-12" name="default_lang" id="default_lang"></select>
<input type="hidden" name="set_default_language"  value="03e687346c048649854u8hr98fe8bee7f6dcb6e">   
<div class="input-group-btn">
<button type="submit" class="btn btn-default btn-lg bg-color-active"><i class="fa fa-language"></i></button>
</div>
</div>
<div class="clearfix"></div>
<hr>
 <!--   END Drop down -->                 
</form>   
 
 
<!--Checkbox -->
<div class="col-xs-12 col-sm-12">
<form id="change_multi_language">   
    <input type='checkbox' class="slide-check" value="1" name="multilanguage_active" id="multilanguage_active" <?php if(get_website( 'multilanguage_active')==1){echo 'checked';}?> >
    <input type="hidden" name="change_multi_lang"  value="4957fh634537h4645d649854u8hr98fe8erng90384j58fjdhs6">
    <label for="multilanguage_active">
        <?php echo _('Multilanguage? <small>Activate if you want that users and Admin can choose their own Language</small>');?></label>
</form>        
</div>
 <div class="clearfix bottom10"></div>
                 
 
 
 
 
 
 
</div>          
</div>                
</div>
</div>
         
<!-- END Set lang -->

	
		
			
				
						
	
	
	
	
	
	
<!-- Add lang -->	
<div class="col-xs-12 col-sm-12 col-md-6 top30" > 	
 <div class="box">
 <div class="box-header"><h3 class="box-title"> <?php echo _('Add new Languages:');?><br>
<small><?php echo _('Only activated Languages will be showed to users as option.');?></small>
</h3></div>          

<div class="box-body">                  
<form id="add_language">
 
 <!-- Select files -->
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="input-group">
<input type="text" name="language_name" class="form-control pull-right" placeholder="<?php echo _('Type the Language name ex. German');?>">
<input type="text" name="language_code" class="form-control pull-right" placeholder="<?php echo _('Language Code Reference ex. de_DE');?>">
<input type="text" name="language_code_ini" class="form-control pull-right" placeholder="<?php echo _('Language Code initials ex. de');?>">
<div class="input-group-btn">
        <button type="submit" class="btn btn-default" style="height: 102px; border-radius: 0px"><i class="ti-plus"></i></button>
</div>
	
	
</div>   <br><br>
</div> 

            
</div>                
<input type="hidden" name="send_language"  value="03e687346cd85590be5e8bee7f6dcb6e">            
</form> 
</div>
</div>
         
<!-- END Add lang -->	
	




 







<div class="clearfix"></div>
 


<div class="col-xs-12 col-sm-12 col-md-12" > 	
<div class="box">
<div class="box-header"><h3 class="box-title"> <?php echo _('Saved Languages:');?> <br><small>

<i class="fa fa-info-circle"></i> <?php echo _('The list that you add here, is the list of languages that a user can choose.');?>
<strong><?php echo _('Ex. for German');?></strong> <br>
1- <?php echo _('Activate "Multilanguage"');?><br>
2- <?php echo _('<strong>Add the desired Language:</strong> Language Name: German, Language Code: de_DE, Language Initals: de ');?><br>
3- <?php echo _('<strong>The files:</strong> create this folder and file -> www.yoursite.ltd/language/de_DE/LC_MESSAGES/de_DE.po');?><br>
4- <?php echo _('Translate the de_DE.po file with Po-Edit');?>

 </small></h3></div>        
        
        
<div class="box-body">                      
<div  id="languages_list_container" style="overflow:auto;"></div>
</div>             
</div> <!--/.box-->            
</div> 
 




	
 
   
 

 
 
  
 
 

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  
 
<?php include ("sidebar_right.php");?>
<?php include ("footer.php");?>

<script src="assets/js/languages.js"></script>


 