<?php 
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Software: Regex The Speed Inproved PHP Login, 
// Website & User Management
// CopyRight: Litos Media - Carlos Santos de Azevedo
// Contact: info@litos.top
// 07-2017
#####################################################
include($_SERVER['DOCUMENT_ROOT']."/inc/db.php");
include($_SERVER['DOCUMENT_ROOT']."/inc/func.php");
include ("inc/admin_func.php");
include ("inc/admin_conf.php");
include ("inc/admin_login_required.php");
include ("header.php");
$client= new client(); 
include ("sidebar.php");
?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
<!-- Main content -->
<section class="content">
<div class="row">




       
       
       
  
       
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 ">
  
          
			  
		    <div class="nav-tabs-custom">
			 <!-- Header Tabs -->
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true"><?php echo _('Site Images');?></a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false"><?php echo _('Site Info');?></a></li>
			  <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false"><?php echo _('Registration & Login');?></a></li>
              <!--<li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false"><?php // echo _('Social Login');?></a></li>-->
              <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false"><?php echo _('Recaptcha');?></a></li>
              <li class=""><a href="#tab_6" data-toggle="tab" aria-expanded="false"><?php echo _('Emails');?></a></li>
              <li class=""><a href="#tab_7" data-toggle="tab" aria-expanded="false"><?php echo _('Skin');?></a></li>
              <li class=""><a href="#tab_8" data-toggle="tab" aria-expanded="false"><?php echo _('Others');?></a></li>
             </ul>
             <!-- END Header Tabs -->

			  
            
            	
				
<div class="tab-content">

 <!-- Tab 1  SITE IMAGES -->	
<div class="tab-pane  active container-fluid" id="tab_1"  >
<div class="box-header"> <h3 class="box-title"><?php echo _('Corporate');?></h3> </div>	  
				  
                  
        
 <!-- ==================== Default Avatar ==================== -->
<div class="col-xs-12 col-md-4">
 
<span class="info-box-text"><?php echo _('Default Avatar');?></span>
<br>  
<form method="post" action="ajax.php"   class="send_default_avatar" id="send_default_avatar" enctype="multipart/form-data">
<input type="file" name="file" class="dropify" data-default-file="../<?php echo $AVATAR_PATH.get_website('default_avatar');?>" data-max-height="6000" data-max-width="6000" data-max-file-size="<?php echo get_website('avatar_upload_max_size');?>M" data-show-remove="false">
<br>
<input type="hidden" name="send_default_avatar" value="684geerferferferf653456546563">
</form>  
  
</div>         
<!-- ==================== END Default Avatar  ==================== -->              
             

                  
                  
                  
         
                  
                  
<!-- ==================== Logo and Favicon  ==================== -->
<!--logo-->
<div class="col-xs-12 col-md-4">
    <span class="info-box-text"><?php echo _('Logo');?></span>
    <br>
    <form method="post" action="ajax.php" class="send_logo" enctype="multipart/form-data">
        <input type="file" name="file" class="dropify" data-default-file="../assets/img/<?php echo  get_website('logo');?>" data-max-height="6000" data-max-width="6000" data-max-file-size="<?php echo get_website('avatar_upload_max_size');?>M" data-show-remove="false">
        <br>
        <input type="hidden" name="send_logo" value="wefwef34tt56zg454rg">
    </form>
</div>


<!--Favicon-->
<div class="col-xs-12 col-md-4">
    <span class="info-box-text"><?php echo _('Fav Icon');?></span>
    <br>
    <form method="post" action="ajax.php" class="send_favicon" enctype="multipart/form-data">
        <input type="file" name="file" class="dropify" data-default-file="../assets/img/<?php echo get_website('favicon');?>" data-max-height="6000" data-max-width="6000" data-max-file-size="4M" data-show-remove="false">
        <br>
        <input type="hidden" name="send_favicon" value="erg45z46jh5453h5v3">
    </form>
</div>      
<!-- ==================== END Logo and Favicon  ==================== -->                     
                  
                  
                  
 <div class="clearfix"></div>
 <hr>          
				  
 	
<div class="box-header"> <h3 class="box-title"><?php echo _('Image Sizes');?></h3> </div>				  


<form class="form-horizontal ajax_send" style="padding-left:10px; padding-right:10px;">    	
			  
<!-- ==================== AVATAR SIZES ==================== -->
<div class="col-xs-12 col-sm-6">
    <label class="col-sm-12">
        <?php echo _('Avatar Image width <br><small>The image will be resized.</small>');?>
    </label>
    <div class="col-sm-10">
        <input type="text" class="form-control input_xs left" name="avatar_max_width" value="<?php echo get_website('avatar_max_width');?>">
        <div class="label-2">
            <?php echo _('Px');?>
        </div>
    </div>

    <label class="col-sm-12">
        <?php echo _('Avatar Upload Max. size');?>
    </label>
    <div class="col-sm-10">
        <input type="text" class="form-control input_xs left" name="avatar_upload_max_size" value="<?php echo get_website('avatar_upload_max_size');?>">
        <div class="label-2">
            <?php echo _('MB');?>
        </div>
    </div>
</div>                 		 
<!-- ==================== END AVATAR SIZES ==================== -->	



<!-- ==================== LOGO SIZES ==================== -->
<div class="col-xs-12 col-sm-6">
    <label class="col-sm-12">
        <?php echo _('LOGO Image width <br><small>The image will be resized.</small>');?>
    </label>
    <div class="col-sm-10">
        <input type="text" class="form-control input_xs left" name="logo_max_width" value="<?php echo get_website('logo_max_width');?>">
        <div class="label-2">
            <?php echo _('Px');?>
        </div>
    </div>

    <label class="col-sm-12">
        <?php echo _('LOGO Upload Max. size');?>
    </label>
    <div class="col-sm-10">
        <input type="text" class="form-control input_xs left" name="logo_upload_max_size" value="<?php echo get_website('logo_upload_max_size');?>">
        <div class="label-2">
            <?php echo _('MB');?>
        </div>
    </div>
</div>                  		 
<!-- ==================== END LOGO SIZES ==================== -->	

 		  			  
</div>
<!-- ENDE Tab 1 -->
    
    
    
    
    
    
    
    
     
    
    
	
<!-- Tab 2 Website Info -->
<div class="tab-pane container-fluid" id="tab_2">

    <div class="box-header">
        <h3 class="box-title"><?php echo _('Website information');?></h3> </div>

    <div class="col-sm-12">
        <input type='checkbox' class="slide-check" value="1" name="use_ssl" id="use_ssl" <?php if(get_website( 'use_ssl')==1){echo 'checked';}?> >
        <label for="use_ssl">
            <?php echo _('Activate Website SSl (Https)');?>
        </label>
    </div>

    <div class="clearfix"></div>
    <div class="form-group top25">
        <label for="input3" class="col-sm-12">
            <?php echo _('Website Domain');?>
        </label>
        <div class="col-sm-12">
            <input type="text" class="form-control" name="domain" value="<?php echo get_website('domain');?>">
        </div>
    </div>

    <div class="form-group">
        <label for="input1" class="col-sm-12">
            <?php echo _('Website Name');?>
        </label>
        <div class="col-sm-12">

            <input id="input1" type="text" class="form-control" name="name" value="<?php echo get_website('name');?>">

        </div>
    </div>

    <div class="form-group">
        <label for="input6" class="col-sm-12">
            <?php echo _('Website Description');?>
        </label>
        <div class="col-sm-12">
            <textarea class="form-control" maxlength="255" rows="4" id="input6" name="description"><?php echo get_website('description');?></textarea>
        </div>
    </div>
    
    

    <div class="form-group">
        <label for="input3" class="col-sm-12">
            <?php echo _('Website Email');?>
        </label>
        <div class="col-sm-12">
            <input type="email" class="form-control" name="site_email" value="<?php echo get_website('site_email');?>">
        </div>
    </div>

    <div class="form-group">
        <label for="input3" class="col-sm-12">
            <?php echo _('Support Email');?>
        </label>
        <div class="col-sm-12">
            <input type="email" class="form-control" name="site_support_email" value="<?php echo get_website('site_support_email');?>">
        </div>
    </div>

    <div class="form-group">
        <label for="input3" class="col-sm-12">
            <?php echo _('Email Signature');?>
        </label>
        <div class="col-sm-12">
            <input type="text" class="form-control" name="assinatura" value="<?php echo get_website('assinatura');?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-12">
            <?php echo _('Footer Copyright.');?>
                <small><?php echo _('Use {CURRENT-YEAR} to get the current year. {WEBSITE_NAME} for Website name.');?> </small></label>

        <div class="col-sm-12">
            <input type="text" class="form-control" name="copyright" value="<?php echo get_website('copyright');?>">
        </div>
    </div>

</div>
<!-- ENDE Tab 2Website Info -->
				
				
				
				
				
				
				
				
				
				
				
			 <!-- Tab 3 Login And Register-->
            <div class="tab-pane container-fluid" id="tab_3">
				  
		   
 	  <div class="box-header"> <h3 class="box-title"><?php echo _('Registration & Login');?></h3> </div>
	 	  
 
				
		  
				  
				  <hr>
                    <div class="form-group">
                    <label class="col-sm-12"><?php echo _('Password min. length <br><small>How long should be the Passords at least?</small>');?></label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control input_xs left"  name="pw_min_length" value="<?php echo get_website('pw_min_length');?>" > 
					<div class="label-2"> <?php echo _('Characters');?> </div>
                    </div>
                    </div>
             
                  
				  
				 	<div class="form-group">
                    <label class="col-sm-12"><?php echo _('Login Life Time <small>After this period the user need to login again</small>');?></label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control input_xs left"  name="login_life_time" value="<?php echo get_website('login_life_time');?>" > 
					<div class="label-2"> <?php echo _('Hours');?> </div>
                    </div>
                    </div>
					
  
  
                     <div class="form-group">
                    <label class="col-sm-12"><?php echo _('Confirm new Account Link Life Time. <small>How long is the link to confirm the new account valid. If the user do not activate his accont in this period, he need to register again.</small>');?></label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control input_xs left"  name="token_confirm_new_account_life_time" value="<?php echo get_website('token_confirm_new_account_life_time');?>"> 
                    <div class="label-2"> <?php echo _('Days');?> </div>
                    </div>
                    </div> 
                    
                    
                    
                    
                   <div class="form-group">
                    <label class="col-sm-12"><?php echo _('Password reset Link Life Time <small>How long is the link to reset the password valid. If the user do not reset the Pasword in this period, he need to ask for Password reset again.</small>');?></label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control input_xs left"  name="token_reset_pw_life_time" value="<?php echo get_website('token_reset_pw_life_time');?>"> 
                    <div class="label-2"> <?php echo _('Hours');?> </div>
                    </div>
                    </div> 
				  
 


<div class="clearfix"></div>
<hr class="top45">
<div class="box-header"> <h3 class="box-title"><?php echo _('Redirects');?></h3> </div> 
				  
	
    
             <div class="form-group">
                    <label class="col-sm-12"><?php echo _('After login <small>Where should the users be redirected after login?</small>');?></label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control"  name="redirect_url_after_login" value="<?php echo get_website('redirect_url_after_login');?>"> 
                    </div>
               </div>
               
               
               
               <div class="form-group">
                    <label class="col-sm-12"><?php echo _('After Admin login <small>Where should the Admin be redirected after login?</small>');?></label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control"  name="redirect_url_admin_after_login" value="<?php echo get_website('redirect_url_admin_after_login');?>"> 
                    </div>
               </div>
                    
      
      
               <div class="form-group">
                    <label class="col-sm-12"><?php echo _('After logout <small>Where should the users be redirected after logout?</small>');?></label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control"  name="redirect_url_after_logout" value="<?php echo get_website('redirect_url_after_logout');?>"> 
                    </div>
                </div>   
                    
                    
               <div class="form-group">
                    <label class="col-sm-12"><?php echo _('After Password Recovery <small>Where should the users be redirected after Password Recovery?</small>');?></label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control"  name="redirect_url_after_pw_recovery" value="<?php echo get_website('redirect_url_after_pw_recovery');?>"> 
                    </div>
                </div>   
                    
                    
                <div class="form-group">
                    <label class="col-sm-12"><?php echo _('If not loged in <small>Where should all users be redirected if the page needs login but the user is not logged in?</small>');?></label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control"  name="redirect_url_not_logged_in" value="<?php echo get_website('redirect_url_not_logged_in');?>"> 
                    </div>
                 </div>   
 
    
  
    			  
</div>
<!-- ENDE Tab 3 Login And Register-->
				
				
				












				
<!-- Tab 4 Recaptcha -->				
<div class="tab-pane container-fluid" id="tab_4">	
<div class="box-header"> <h3 class="box-title"><?php echo _('Recaptcha');?></h3> </div>
 

 <!--Checkbox -->
 <div class="col-xs-12 col-sm-4">
<input type='checkbox' class="slide-check" value="1" name="recaptcha_login" id="recaptcha_login" <?php if(get_website('recaptcha_login')==1){echo 'checked';}?> >
<label for="recaptcha_login"><?php echo _('On Login');?></label> 
 </div>
  
 


 
 
 <!--Checkbox -->
 <div class="col-xs-12 col-sm-4">
  <input type='checkbox' class="slide-check" value="1" name="recaptcha_reset_pw"  id="recaptcha_reset_pw" <?php if(get_website('recaptcha_reset_pw')==1){echo 'checked';}?>></label>
   <label for="recaptcha_reset_pw"> <?php echo _('On Reset Password');?> </label>
 </div>
 
      
  
 
           
       
       
       
       
       
       
       
<div class="clearfix"></div>
<hr>              
                    
               
               
               <div class="form-group">
                    <label class="col-sm-12"><?php echo _('Site Key <small>Register API keys at https://www.google.com/recaptcha/admin</small>');?></label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control"  name="recaptcha_site_key" value="<?php echo get_website('recaptcha_site_key');?>"> 
                    </div>
               </div>
                    
      
      
               <div class="form-group">
                  <label class="col-sm-12"><?php echo _('Secret Key');?></label>
                  <div class="col-sm-12">
                  <input type="text" class="form-control"  name="recaptcha_secret_key" value="<?php echo get_website('recaptcha_secret_key');?>"> 
                  </div>
                </div>  				
</div>
<!-- END Tab 4 Recaptcha -->				
				
				
                
                
                

				
              
              
              
               
<!-- Tab 5 Social Login-->				
<div class="tab-pane container-fluid" id="tab_5">	
<div class="box-header"> <h3 class="box-title"><?php echo _('Social Login');?></h3> </div>
 

 <!--Checkbox -->
 <div class="col-xs-12 col-sm-4">
<input type='checkbox' class="slide-check" value="1" name="facebook_login" id="facebook_login" <?php if(get_website('facebook_login')==1){echo 'checked';}?> >
<label for="facebook_login"><?php echo _('Facebook Login');?></label>
 </div>
  
 

<!--Checkbox -->
 <div class="col-xs-12 col-sm-4">
<input type='checkbox' class="slide-check" value="1" name="twitter_login" id="twitter_login" <?php if(get_website('twitter_login')==1){echo 'checked';}?> >
<label for="twitter_login"><?php echo _('Twitter Login');?></label>
 </div>
 
 
 
   
       
<div class="clearfix"></div>
<hr>              
                    


<!--Facebook Keys-->
<div class="form-group">
    <label class="col-sm-12">
        <?php echo _('Facebook App-ID <small>Create app at https://developers.facebook.com/apps/</small>');?></label>
    <div class="col-sm-12">
        <input type="text" class="form-control" name="facebook_site_key" value="<?php echo get_website('facebook_site_key');?>">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-12">
        <?php echo _('Facebook App-Secret Key');?>
    </label>
    <div class="col-sm-12">
        <input type="text" class="form-control" name="facebook_secret_key" value="<?php echo get_website('facebook_secret_key');?>">
    </div>
</div>

<!--Twitter Keys-->
<div class="clearfix"></div>
<hr>

<div class="form-group">
    <label class="col-sm-12">
        <?php echo _('Twitter Consumer Key (API Key) <small>Create app at https://apps.twitter.com/ with Read, Write and Request email addresses from users permissions activated</small>');?></label>
    <div class="col-sm-12">
        <input type="text" class="form-control" name="twitter_site_key" value="<?php echo get_website('twitter_site_key');?>">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-12">
        <?php echo _('Twitter Consumer Secret (API Secret)');?>
    </label>
    <div class="col-sm-12">
        <input type="text" class="form-control" name="twitter_secret_key" value="<?php echo get_website('twitter_secret_key');?>">
    </div>
</div>
                
                

</div>
<!-- END Tab 5 Social Login -->            
               
               
               
               
               
               
               
               
               
                
                
      
                
                          
                                    
                                              
 <!-- Tab 6 Emails -->				
<div class="tab-pane container-fluid" id="tab_6">	

	
 


   

 
 				
 				
 				
 				
 				
 				
 				
 				
<div class="clearfix"></div>
<hr class="top45">  <!-- Password Reset email -->
 <div class="box-header top30"> <h3 class="box-title"><?php echo _('Password Reset Email');?></h3> </div>
 
      <div class="form-group">
                    
                    <div class="col-sm-12">
                    <label for="pw_reset_mail_subject"><?php echo _('Subject <small><br><b>Shortcodes:</b><br> {CURRENT-YEAR},{WEBSITE_NAME},{WEBSITE_DESCRIPTION},{SITE_EMAIL},{SIGNATURE},{DOMAIN}</small>');?></label>
                    <input type="text" class="form-control"  name="pw_reset_mail_subject" id="pw_reset_mail_subject" value="<?php echo get_website('pw_reset_mail_subject');?>">
                    
                    <label for="pw_reset_mail_body" class="top25" ><?php echo _('Email message <small><br><b>Shortcodes:</b><br> {CONFIRMATION_LINK},{CURRENT-YEAR},{WEBSITE_NAME},{WEBSITE_DESCRIPTION},{SITE_EMAIL},{SIGNATURE},{DOMAIN}</small>');?></label>
					<textarea name="pw_reset_mail_body" id="pw_reset_mail_body" class="form-control"><?php echo get_website('pw_reset_mail_body');?></textarea>
                    </div>
               </div>
 <!-- End Password Reset email -->
 
 
 <div class="clearfix"></div>
<hr class="top45">   









	 <!-- Email Header and Footer-->
  
  <div class="box-header top30"> <h3 class="box-title"><?php echo _('Email Header and Footer <small>You can set your html template to style your emails</small>');?></h3> </div>    
     
     
      <div class="form-group">
                    
                    <div class="col-sm-12">
                    <label for="mail_header"  ><?php echo _('Email Header <small><br><b>Shortcodes:</b><br> {SUBJECT},{CURRENT-YEAR},{WEBSITE_NAME},{WEBSITE_DESCRIPTION},{SITE_EMAIL},{SIGNATURE},{DOMAIN}</small>');?></label>
					<textarea name="mail_header" id="mail_header" class="form-control"><?php echo get_website('mail_header');?></textarea>
                    
                    <label for="mail_footer" class="top25" ><?php echo _('Email Footer <small><br><b>Shortcodes:</b><br> {SUBJECT},{CURRENT-YEAR},{WEBSITE_NAME},{WEBSITE_DESCRIPTION},{SITE_EMAIL},{SIGNATURE},{DOMAIN}</small>');?></label>
					<textarea name="mail_footer" id="mail_footer" class="form-control"><?php echo get_website('mail_footer');?></textarea>
                    </div>
               </div>
 <!-- End Email Header and Footer-->



 

 
 
 
</div>
<!-- END Tab 6 Emails -->		                                                       
                                                                  
                                                                            
                                                                                                
                
                
                
                
                
                
                
                
            <!-- Tab 7 Skin -->	
              <div class="tab-pane container-fluid" id="tab_7">
              
				  
				  <div class="box-header top15"> <h3 class="box-title"><?php echo _('Admin Skin');?></p></h3> </div> 
				  
 
    
				  
			      <div class="form-group top10">
                      <label class="col-sm-12"><?php echo _('Select your Skin');?></label>
                      <div class="col-sm-12"> 
                      <select name="skin" class="form-control" >
                      <option <?php if (get_website('skin')=='kaki') echo 'selected';?> value="kaki" cor="#BDAA93"><?php echo _('Kaki');?></option>
                      <option <?php if (get_website('skin')=='blue') echo 'selected';?> value="blue" cor="#428BCA"><?php echo _('Blue');?></option>
                      <option <?php if (get_website('skin')=='light_blue') echo 'selected';?> value="light_blue" cor="#80caf0"><?php echo _('Light blue');?></option>
                      <option <?php if (get_website('skin')=='rosa') echo 'selected';?> value="rosa" cor="#cd9db7"><?php echo _('Rosa');?></option>
                      <option <?php if (get_website('skin')=='grey') echo 'selected';?> value="grey" cor="#b5b5b7"><?php echo _('Grey');?></option>
                      <option <?php if (get_website('skin')=='green') echo 'selected';?> value="green" cor="#afc765"><?php echo _('Green');?></option>
                      <option <?php if (get_website('skin')=='orange') echo 'selected';?> value="orange" cor="#ff8a65"><?php echo _('Orange');?></option>
                      <option <?php if (get_website('skin')=='braun') echo 'selected';?> value="braun" cor="#bcaaa4"><?php echo _('Braun');?></option>
                      <option <?php if (get_website('skin')=='blank') echo 'selected';?> value="blank" cor="#bcaaa4"><?php echo _('Light (Basis only)');?></option>
                       
                      </select>
                      
                      <input type="hidden" name="skin_color" id="skin_color">
                      
                      
                      
                      
                      </div>
                    </div>	  
				  
				  
              </div>
             <!-- ENDE Tab 7 Skin -->	    
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
				
	
	
	<!-- Tab 8 Other options -->	
              <div class="tab-pane container-fluid" id="tab_8">
              
				  
				  <div class="box-header top15"> <h3 class="box-title"><?php echo _('Other options');?></p></h3> </div> 
				  
				  
				 
				  
				  
			      <div class="form-group">
                      <label class="col-sm-12"><?php echo _('Notification Sound');?></label>
                      <div class="col-sm-12"> 
                      <select name="notification_sound" class="form-control" >
                      <option <?php if (get_website('notification_sound')=='no_sound') echo 'selected';?> value="no_sound"><?php echo _('No sound');?></option>
                      <option <?php if (get_website('notification_sound')=='1') echo 'selected';?> value="1">1</option>
                      <option <?php if (get_website('notification_sound')=='2') echo 'selected';?> value="2">2</option>
					  <option <?php if (get_website('notification_sound')=='3') echo 'selected';?> value="3">3</option>
					  <option <?php if (get_website('notification_sound')=='4') echo 'selected';?> value="4">4</option>
					  <option <?php if (get_website('notification_sound')=='5') echo 'selected';?> value="5">5</option>
					  <option <?php if (get_website('notification_sound')=='6') echo 'selected';?> value="6">6</option>
					  <option <?php if (get_website('notification_sound')=='7') echo 'selected';?> value="7">7</option>
					  <option <?php if (get_website('notification_sound')=='8') echo 'selected';?> value="8">8</option>
					  <option <?php if (get_website('notification_sound')=='9') echo 'selected';?> value="9">9</option>
					  <option <?php if (get_website('notification_sound')=='10') echo 'selected';?> value="10">10</option>
                      </select>
                      
                      
                      <br><label><?php echo _('Notification Sound test');?></label><br>
                      <div class="btn-group">
                       <a class="btn btn-default  btn-xs bg-color-active testar_som"  som="1"><i class="fa fa-volume-up"> 1 </i></a>
                       <a class="btn btn-default  btn-xs bg-color-active testar_som"  som="2"><i class="fa fa-volume-up"> 2 </i></a>
                       <a class="btn btn-default  btn-xs bg-color-active testar_som"  som="3"><i class="fa fa-volume-up"> 3 </i></a>
                       <a class="btn btn-default  btn-xs bg-color-active testar_som"  som="4"><i class="fa fa-volume-up"> 4 </i></a>
                       <a class="btn btn-default  btn-xs bg-color-active testar_som"  som="5"><i class="fa fa-volume-up"> 5 </i></a>
                       <a class="btn btn-default  btn-xs bg-color-active testar_som"  som="6"><i class="fa fa-volume-up"> 6 </i></a>
                       <a class="btn btn-default  btn-xs bg-color-active testar_som"  som="7"><i class="fa fa-volume-up"> 7 </i></a>
                       <a class="btn btn-default  btn-xs bg-color-active testar_som"  som="8"><i class="fa fa-volume-up"> 8 </i></a>
                       <a class="btn btn-default  btn-xs bg-color-active testar_som"  som="9"><i class="fa fa-volume-up"> 9 </i></a>
                       <a class="btn btn-default  btn-xs bg-color-active testar_som"  som="10"><i class="fa fa-volume-up"> 10 </i></a>
                     </div>
                      
                      
                      
                      
                      </div>
                    </div>	  
				  
				  
              </div>
             <!-- ENDE Tab 8 Other options -->	
	
	
	
	
	
	
				
				
		<br>		
	    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-1 ">
        <input type="hidden" name="edit_site_options" value="erwefer89fg4945g495g45t43w">
        <button class="btn btn-default  btn-sm btn-block bg-color-active " type="submit"><?php echo _('Save changes');?></button>
        </div>
        </div>
        
                  		 
				
				
				
				
	         </div>
            <!-- /.tab-content -->
          </div>
          <!-- END nav tab  -->
	    </form>	
        </div>
	
	
	
</div><!-- END  row-->			
				
            
       
       

 
      
 
 
 
 
    
 











 

</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php include ("sidebar_right.php");?>
<?php include ("footer.php");?>

<script src="assets/js/site_options.js"></script>
<script src="../assets/js/ajaxForm.js"></script>
 