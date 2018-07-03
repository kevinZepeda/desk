<?php 
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Software: Regex The Speed Inproved PHP Login, 
// Website & User Management
// CopyRight: Litos Media - Carlos Santos de Azevedo
// Contact: info@litos.top
// 07-2017
#####################################################
$user= new user();

?>
<!DOCTYPE html>
<html><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo get_website('name');?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo $ADMIN_URL;?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $ADMIN_URL;?>bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo $ADMIN_URL;?>bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo $ADMIN_URL;?>assets/css/app.min.css">
  <link rel="stylesheet" href="<?php echo $ADMIN_URL;?>assets/css/efeitos.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $ADMIN_URL;?>assets/css/admin_css.css?a=<?php echo time();?>">
  <link rel="stylesheet" type="text/css" href="<?php echo $ADMIN_URL;?>assets/css/notificacoes.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Work+Sans">
  <!-- jQuery 3 -->
  <script src="<?php echo $ADMIN_URL;?>bower_components/jquery/dist/jquery.min.js"></script>
  
  <!-- Favicons -->
  <?php echo get_favicon();?>
 
  


  <!-- Skin  -->
  <link rel="stylesheet" type="text/css" href="<?php echo $ADMIN_URL;?>assets/css/skin/<?php echo get_website('skin');?>.css?a=<?php echo time();?>"><!-- dark_blue.css -->
  <?php $skin_color= get_website('skin_color');?>

  <!-- Notification -->
<script type="text/javascript">
var som_da_notificacao= '<?php echo get_website("notification_sound");?>';
</script>

 
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  
</head>
 
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo $ADMIN_URL;?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><?php echo initials(get_website('name'));?></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><?php echo get_website('name');?></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
       
       
       
        
  
        
         
        
        
        
        
 
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
             <div class="small_avatar_container"><div class="small_avatar_img" style="background-image: url(<?php echo $user->user_profile_img();?>);"></div></div>
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $user->get_logged_user('username') ;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
            
               <div class="big_avatar_container"><div class="big_avatar_img" style="background-image: url(<?php echo $user->user_profile_img();?>);"></div></div>
                <p>
                  <?php echo $user->get_logged_user('username') ;?>
                  <small>(Administrator)</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-6 text-center">
                    <a href="<?php echo  $ADMIN_URL.$SEO_URL_USERS_EDIT;?>?id=<?php echo $user->get_user('id');?>"><i class="ti-marker" ></i> <?php echo _('Edit profile');?></a>
                  </div>
                  <div class="col-xs-6 text-center">
                     <a href="<?php echo  $ADMIN_URL.$SEO_URL_USERS_EDIT;?>?id=<?php echo $user->get_user('id');?>"><i class="fa fa-picture-o" ></i> <?php echo _('Edit Avatar');?></a>
                  </div>
          
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
             
                <div class="pull-right">
                  <a href="<?php echo $SITE_URL.$SEO_URL_LOGOUT;?>" class="btn btn-default btn-flat"><i class="ti-power-off" aria-hidden="true"></i> <?php echo _('Sign out');?></a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
          
          
            
          <li id="abrir_todo-list" class=" tasks-menu">
           

            <a href="#" data-toggle="control-sidebar"><i class="ti-clipboard"></i> <?php echo _('To Do List');?> <span id="todo_qty_container"></span></a>
            
          </li>
        </ul>
      </div>
    </nav>
  </header> 
  
 <?php if ($REGEX_VERSION != get_litos_media('version')){?>
<?php echo erro_box('You updated the Regex Login Script to a new version. <i class="fa fa-database"></i>  Please click <a href="'.$ADMIN_URL.$SEO_URL_UPGRADE_DB.'">Here</a> to complete the upgrade.');?>
<?php }?>      
