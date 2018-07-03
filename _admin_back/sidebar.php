<?php 
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Software: Regex The Speed Inproved PHP Login, 
// Website & User Management
// CopyRight: Litos Media - Carlos Santos de Azevedo
// Contact: info@litos.top
// 07-2017
#####################################################
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <div class="sidebar_avatar_container">
                    <div class="sidebar_avatar_img" style="background-image: url(<?php echo $user->user_profile_img();?>);"></div>
                </div>
            </div>
            <div class="pull-left info">
                <p>
                    <?php echo $user->get_logged_user('username') ;?>
                </p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <br>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
     
        
        
        
		  
<!-- Users -->
<li class="header"><i class="fa fa-users"></i>
    <?php echo _('Users');?>
</li>
<li><a href="<?php echo $ADMIN_URL.$SEO_URL_USERS;?>"><i class="fa fa-users"></i> <span><?php echo _('Users');?></span></a></li>
<li><a href="<?php echo $ADMIN_URL.$SEO_URL_ADD_USER;?>"><i class="fa fa-user-plus"></i> <span><?php echo _('Add User');?></span></a></li>

<!-- End Users -->

<li class="header"><i class="fa fa-gears"></i>
    <?php echo _('Site Options');?>
</li>
<li><a href="<?php echo $ADMIN_URL.$SEO_URL_SITE_OPTIONS;?>"><i class="fa fa-gear"></i> <span><?php echo _('Site Options');?></span></a></li>
<li><a href="<?php echo $ADMIN_URL.$SEO_URL_LANGUAGES;?>"><i class="fa fa-language"></i> <span><?php echo _('Languages');?></span></a></li>




<!-- Include Theme sidebar links-->
<?php if (file_exists($THEME_PATH.'theme_sidebar.php')) {
   include ($THEME_PATH.'theme_sidebar.php');
} ?>
<!-- END Theme sidebar links-->
   
   
 
        
        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>