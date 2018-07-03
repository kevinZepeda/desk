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
	
		
		
		
 
	
	 
<!--#####################################################
// Add new
#####################################################-->
 
 

<div class="col-xs-12 col-sm-12 col-md-6 top30" > 	
 <div class="box">
        
<div class="box-header">
<h3 class="box-title"><i class="fa fa-database"></i><sup><strong> +</strong></sup> <?php echo _('Add new Database');?> <small><br>
<?php echo _('If you add a Database that is not on the same host as DbackupeX you must allow remote conections on your Server Settings');?></small></h3>
</div> <!-- /.box-header -->            
        
        
     
    

<div class="box-body">                  
<form id="add_new_database" action="dbackupexpro_ajax.php" method="post">
<input type="hidden" name="add_new_dbform_token"  value="<?php echo $add_new_db_token;?>"> 
	
<div class="form-group">
    <label class="col-sm-12">
        <?php echo _('DB Title');?> <small><?php echo _('Information to let you identify this Database');?></small>
    </label>
    <div class="col-sm-12">
        <input type="text" class="form-control" name="title">
    </div>
</div>
	<div class="clearfix"></div> 
<hr>



<div class="box-header"><h3 class="box-title"> <?php echo _('Credentials');?></h3> </div> 

<div class="form-group top10">
    <label class="col-sm-12">
        <?php echo _('Host');?> 
    </label>
    <div class="col-sm-12">
        <input type="text" class="form-control" name="host" value="localhost">
    </div>
</div><div class="clearfix"></div> 

 
<div class="form-group top20">
    <label class="col-sm-12">
        <?php echo _('DB Name');?>  
    </label>
    <div class="col-sm-12">
        <input type="text" class="form-control" name="name">
    </div>
</div><div class="clearfix"></div> 
  
 <div class="form-group top20">
    <label class="col-sm-12">
        <?php echo _('DB User');?>  
    </label>
    <div class="col-sm-12">
        <input type="text" class="form-control" name="user">
    </div>
</div><div class="clearfix"></div>
 

<div class="form-group top20">
    <label class="col-sm-12">
        <?php echo _('DB Password');?>  
    </label>
    <div class="col-sm-12">
        <input type="password" class="form-control" name="pw">
    </div>
</div><div class="clearfix"></div>

 
 
<button class="btn btn-default  btn-sm btn-block bg-color-active top20" type="submit"><i class="ti-plus"></i> <?php echo _('Add');?></button>
 
 
            
</div>                
           
</form> 
</div>
</div>
         
<!-- END ADD new -->
			
	
	
	
	
	
	
	
	
	
	
	
<!-- END Content -->	
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

 <?php 
include ("theme/dbackupexpro_footer.php");
?>