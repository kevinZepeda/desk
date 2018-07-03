<?php 
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Software: Regex The Speed Inproved PHP Login, 
// Website & User Management
// CopyRight: Litos Media - Carlos Santos de Azevedo
// Contact: info@litos.top
// 07-2017
#####################################################
include ("../inc/db.php");
include ("../inc/func.php");
include ("inc/admin_func.php");
include ("inc/admin_conf.php");
include ("inc/admin_login_required.php");
include ("header.php"); 
$client= new client();
?>
<?php include ("sidebar.php");?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?php echo _('Admin Dashboard');?>
        <small><?php echo _('Manage here your website!');?></small>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">

		
    
    
    
<?php include ("theme/inc/dbackupexpro_daschboard_stats.php"); ?>
    
    
    
  <!-- Small boxes (Stat box) -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-skin">
            <div class="inner ">
              <h3><?php echo $client->total_clients();?></h3>

              <p><?php echo _('Total of Users');?></p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a class="small-box-footer"><?php echo _('Total of Users registered');?></a>
          </div>
        </div>
        <!-- ./col -->
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-skin">
            <div class="inner">
               <h3><?php echo $client->total_clients_today();?></h3>
                <p><?php echo _('Today');?></p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a class="small-box-footer"><?php echo _('Total of Users registered today');?></a>
          </div>
        </div>
        <!-- ./col -->
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-skin">
            <div class="inner">
             <h3><?php echo $client->total_clients_this_month();?></h3>
              <p><?php echo _('This month');?></p>
            </div>
            <div class="icon">
              <i class="ti-calendar"></i>
            </div>
            <a class="small-box-footer"><?php echo _('Total of Users registered this month');?></a> 
          </div>
        </div>
        <!-- ./col -->
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-skin">
            <div class="inner">
              <h3><?php echo $client->total_clients_last_month();?></h3>
              <p><?php echo _('Last month');?></p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-minus-o"></i>
            </div>
            <a class="small-box-footer"><?php echo _('Total of Users registered last month');?></a> 
          </div>
        </div>
        <!-- ./col -->
       
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
<!-- LAST USERS LIST -->
  <div class="col-sm-4 col-xs-12">
 <div class="box "  style="min-height: 456px">
                <div class="box-header">
                  <h3 class="box-title"><?php echo _('Latest Members');?></h3>

                  <div class="box-tools no-bg pull-right">
                    <span class="label bg-skin-dark"><?php echo _('Last 8 Members');?></span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="ti-minus"></i></button>
            
                    
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="ti-close"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding ">
                  <ul class="users-list clearfix">
                   
                     <?php echo $client->get_last_clients(); ?> 
          
        
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="<?php echo $SEO_URL_USERS;?>" class="uppercase"><?php echo _('View All Users');?></a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
<!-- USERS LIST -->
   
    
    
    
    
    
    
    
    
    
    
 <!-- solid sales graph -->
           <div class="col-sm-8 col-xs-12">
          <div class="box box-solid bg-skin">
            <div class="box-header">
              <i class="fa fa-th"></i>

              <h3 class="box-title"><?php echo _('Users Registration Graph');?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn bg-skin-dark btn-sm" data-widget="collapse"><i class="ti-minus"></i>
                </button>
                <button type="button" class="btn bg-skin-dark btn-sm" data-widget="remove"><i class="ti-close"></i>
                </button>
              </div>
            </div>
            <div class="box-body border-radius-none">
              <div class="chart" id="line-chart" style="height: 250px;"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-border">
              <div class="row">
                <div class="col-xs-6 col-sm-3 text-center" style="border-right: 1px solid #f4f4f4">
                  <input type="text" class="knob" data-readonly="true" value="<?php echo $client->total_users_admin();?>" data-width="60" data-height="60"
                         data-fgColor="<?php echo $skin_color;?>">

                  <div class="knob-label"><?php echo _('Admin users');?></div>
                </div>
                <!-- ./col -->
                <div class="col-xs-6 col-sm-3 text-center" style="border-right: 1px solid #f4f4f4">
                  <input type="text" class="knob" data-readonly="true" value="<?php echo $client->total_users_frontend();?>" data-width="60" data-height="60"
                         data-fgColor="<?php echo $skin_color;?>">

                  <div class="knob-label"><?php echo _('Front end users');?></div>
                </div>
                <!-- ./col -->
                <div class="col-xs-6 col-sm-3 text-center" style="border-right: 1px solid #f4f4f4">
                  <input type="text" class="knob" data-readonly="true" value="<?php echo $client->total_users_not_activated();?>" data-width="60" data-height="60"
                         data-fgColor="<?php echo $skin_color;?>">

                  <div class="knob-label"><?php echo _('Accounts not confirmed');?></div>
                </div>
                <!-- ./col -->
                   <div class="col-xs-6 col-sm-3 text-center">
                  <input type="text" class="knob" data-readonly="true" value="<?php echo $client->total_users_banned();?>" data-width="60" data-height="60"
                         data-fgColor="<?php echo $skin_color;?>">

                  <div class="knob-label"><?php echo _('Banned Accounts');?></div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
		</div>
    
    
    
    
    
    
 
    
    
    
    
    
    
    
    
    
		</div><!-- /.Row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
<?php include ("sidebar_right.php");?>
<?php include ("footer.php");?>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>


<script>
$('.knob').knob();
var line = new Morris.Line({
    element          : 'line-chart',
    resize           : true,
    data             : [<?php echo $client->total_users_on_period_data_for_morris_line();?>],
    xkey             : 'period',
    ykeys            : ['clients'],
    labels           : ['<?php echo _('Users');?>'],
    lineColors       : ['#efefef'],
    lineWidth        : 2,
    hideHover        : 'auto',
    gridTextColor    : '#fff',
    gridStrokeWidth  : 0.4,
    pointSize        : 4,
    pointStrokeColors: ['#efefef'],
    gridLineColor    : '#efefef',
    gridTextFamily   : 'Open Sans',
    gridTextSize     : 10
  });
</script>

 