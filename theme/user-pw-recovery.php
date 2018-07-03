<?php 
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Software: Regex The Speed Inproved PHP Login, 
// Website & User Management
// CopyRight: Litos Media - Carlos Santos de Azevedo
// Contact: info@litos.top
// 07-2017
#####################################################
if(user_is_logged_in()) header("Location: ".$SITE_URL.$SEO_URL_MY_ACCOUNT); 
 
?>
<!-- Main container -->
<main>		
	 <section class="no-border-bottom section-sm">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
              <div class="card card-login">
                <div class="card-header" id="card-header">
                  <h6><?php echo _('Password recovery');?></h6>
                </div>

                <div class="card-block"  >
               
                  <br>
                  <form class="ajax_send">
                    <div class="form-group">
                      <input class="form-control input-lg" type="email" name="email" required placeholder="<?php echo _('Email address');?>">
                    </div>
                     <input type="hidden" value="3464645b4vt4545654465gfh" name="pw_recover">	
                     
                     
                   <?php if (get_website('recaptcha_reset_pw')==1){include('inc/recaptcha-html.php');}?>
               
                     
                     
                    <button class="btn btn-primary btn-block" type="submit"><?php echo _('Send password');?></button>
                  </form>
                  <br>
                </div>

                <div class="card-footer">
                  <div class="row text-center">
                    <div class="col-xs-6">
                      <a href="<?php echo $SEO_URL_LOGIN;?>"><?php echo _('Login');?></a>
                    </div>

                    <div class="col-xs-6">
                       
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- END Main container -->
<script src="<?php echo $SITE_URL?>assets/js/login-register.js"></script>