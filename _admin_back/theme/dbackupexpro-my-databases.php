<?php
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Software: DbackupeX Pro
// Mysql Database Backups Central
// CopyRight: Litos Media - Carlos Santos de Azevedo
// Contact: info@litos.top
#####################################################
include_once('theme/inc/dbackupexpro_admin_func.php');
include ("theme/dbackupexpro_header.php");
$DbackupeXPro= new DbackupeXPro();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Main content -->
<section class="content container-fluid">

 			
		
<!-- Content -->		
 

	 
	
	
	
<?php
	
	
if (DEBUG == true){
$output = shell_exec('crontab -l');
$cron_file = '/'.__DIR__."/tmp/crontab.txt";

///Execute script when form is submitted
if(isset($_POST['add_cron'])) { 

// Add new cron job -->
if(!empty($_POST['add_cron'])) {
file_put_contents($cron_file, $output.$_POST['add_cron'].PHP_EOL);
}

// Remove cron job -->
if(!empty($_POST['remove_cron'])) {
$remove_cron = str_replace($_POST['remove_cron']."\n", "", $output);
file_put_contents($cron_file, $remove_cron);
}

// Remove all cron jobs -->
if(isset($_POST['remove_all_cron'])) {
echo exec("crontab -r");
} else {
echo exec("crontab $cron_file");
}
 
}
	
echo  'Current Cron Jobs:</b><br>'.nl2br($output);
	

echo '<h2>Add or Remove Cron Job</h2>
<form method="post" action="dbackupexpro-my-databases.php">
<b>Add New Cron Job:</b><br>
<input type="text" name="add_cron" size="100" placeholder="* * * * * /usr/local/bin/php -q /home/username/public_html/my_cron.php"><br>
<b>Remove Cron Job:</b><br>
<input type="text" name="remove_cron" size="100" placeholder="* * * * * /usr/local/bin/php -q /home/username/public_html/my_cron.php"><br>
<input type="checkbox" name="remove_all_cron" value="1"> Remove all cron jobs?<br>
<input type="submit"><br>
</form>	';	
}	
	
?>

	
	 

 
 
	
<!--#####################################################
// List all results
#####################################################-->
<div class="col-xs-12 top30" id="list_result_box">
 <div class="box ">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-database"></i><sup> <i class="fa fa-cogs"></i> </sup> <?php echo _('My Databases');?> <small>- <?php echo _('Manage your Databases!');?></small></h3>
				

 

 	<a href="add-new-db" class="btn btn-default  btn-sm bg-color-active left30" style="border-radius: 3px"><?php echo _('Add new Database');?> <i class="fa fa-plus-circle"></i></a>
				
				
				
<div class="box-tools">
 
	
                <div class="input-group input-group-sm" style="width: 250px;">
                  <input type="text" name="s" id="s" class="form-control pull-right" placeholder="<?php echo _('Search by id, Title or host');?>">
                  <input type="hidden" name="procura_form_token" id="procura_form_token" value="<?php echo $procura_form_token;?>">
                  

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    
                  </div>
                </div>
          </div>
           
 
</div> <!-- /.box-header -->           
           
 
           
<div class="box-body">             
           
              
<div  id="database_list_result" style="overflow:auto;" class="col-md-12"> 
<?php $DbackupeXPro->get_all_db('');?>
</div>
             
 
</div><!-- end box body //-->    
</div><!-- end box //-->    
</div><!-- end col-xs-12 //-->
<!--#####################################################
// END List all results
#####################################################-->
	
	
	
	 
	 
	
	
	
	
<!-- END Content -->	
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

 <?php 
include ("theme/dbackupexpro_footer.php");
?>