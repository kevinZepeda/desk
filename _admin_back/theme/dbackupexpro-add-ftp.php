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
<h3 class="box-title"><i class="fa fa-server"></i><sup><strong> +</strong></sup> <?php echo _('Add new Ftp Server');?> <small><br>
<?php echo _('You can add the FTP servers that you can choose to upload the Databases Backups');?></small></h3>
</div> <!-- /.box-header -->            
        
        
     
    

<div class="box-body">                  
<form id="add_new_ftp" action="dbackupexpro_ajax.php" method="post">
<input type="hidden" name="add_new_ftp_dbform_token"  value="<?php echo $add_new_ftp_dbform_token;?>"> 
	
<div class="form-group">
    <label class="col-sm-12">
        <?php echo _('FTP Title');?> <small><?php echo _('Information to let you identify this Ftp Server');?></small>
    </label>
    <div class="col-sm-12">
        <input type="text" class="form-control" name="ftp_title">
    </div>
</div>
	<div class="clearfix"></div> 
<hr>



<div class="box-header"><h3 class="box-title"> <?php echo _('Credentials');?></h3> </div> 

<div class="form-group top10">
    <label class="col-sm-12">
        <?php echo _('FTP Server');?> 
    </label>
    <div class="col-sm-12">
        <input type="text" class="form-control" name="ftp_server">
    </div>
</div><div class="clearfix"></div> 
 
 
 <div class="form-group top10">
    <label class="col-sm-12">
        <?php echo _('FTP Subfolder where the Backups should be stored');?> 
    </label>
    <div class="col-sm-12"> <small><?php echo _('DbackupexPro will create this folder/subfolder if not exists on the ftp Server');?></small>
        <input type="text" class="form-control ftp_subfolder" name="ftp_subfolder" value="">
    </div>
</div><div class="clearfix"></div> 

 
<div class="form-group top20">
    <label class="col-sm-12">
        <?php echo _('FTP Username');?>  
    </label>
    <div class="col-sm-12">
        <input type="text" class="form-control" name="ftp_username">
    </div>
</div><div class="clearfix"></div> 
  
 
 

<div class="form-group top20">
    <label class="col-sm-12">
        <?php echo _('FTP Password');?>  
    </label>
    <div class="col-sm-12">
        <input type="password" class="form-control" name="ftp_pw">
    </div>
	
	
<!--Checkbox -->
 <div class="col-xs-2 col-sm-2 top30 text-center">
<input type='checkbox' class="slide-check" value="1" name="use_ssl_connection" id="use_ssl_connection">
</div>		
 <div class="col-xs-10 col-sm-10 text-left" style="margin-top: 25px;">	
<label for="use_ssl_connection"><?php echo _('Use SSL Connection?');?> <br><small><?php echo _('Some FTP servers can only accept a SSL connection!');?></small></label>
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