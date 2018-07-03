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
// List all results
#####################################################-->
<div class="col-xs-12 top30" id="list_result_box">
 <div class="box ">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-database"></i><sup> <i class="fa fa-cogs"></i> </sup> <?php echo _('My FTP Servers');?> <small>- <?php echo _('Manage your FTP servers!');?></small></h3>
				
				
		<a href="add-new-ftp" class="btn btn-default  btn-sm bg-color-active left30" style="border-radius: 3px"><?php echo _('Add new FTP');?> <i class="fa fa-plus-circle"></i></a>		
 
<div class="box-tools">
                <div class="input-group input-group-sm" style="width: 250px;">
                  <input type="text" name="s" id="s" class="form-control pull-right" placeholder="<?php echo _('Search by id or FTP title');?>">
                  <input type="hidden" name="procura_ftp_form_token" id="procura_ftp_form_token" value="<?php echo $procura_ftp_form_token;?>">
                  

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    
                  </div>
                </div>
          </div>
           
 
</div> <!-- /.box-header -->           
           
 
           
<div class="box-body">             
           
              
<div  id="ftp_list_result" style="overflow:auto;" class="col-md-12"> 
<?php $DbackupeXPro->get_all_ftp('');?>
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