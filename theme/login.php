<?php 
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Software: Regex The Speed Inproved PHP Login, 
// Website & User Management
// CopyRight: Litos Media - Carlos Santos de Azevedo
// Contact: info@litos.top
#####################################################
 
if(user_is_logged_in()) header("Location: ".get_website('redirect_url_after_login'));

?>
<!-- Main container -->
    <main>
      <section class="no-border-bottom section-sm">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-lg-6 col-lg-offset-3">
					 
				
              <div class="card card-login">
				 
				 
				  
            <div class="card-header text-center" id="card-header"> <br>
	 
	

 
		      <img src="<?php  echo $SITE_URL.$LOGO_PATH.get_website('logo');?>" alt="logo" class="img-responsive logo"> 
		 
				
 
                </div>
				  
                     
              
   
 
				  
				  
                <div class="card-block bs-component">
				 
                  <br>
                  <form class="ajax_send" >
   
                    <div class="form-group" style="position:relative">
                      <input autocomplete="off" required class="form-control input-lg DbackupexProInput" type="email" name="email"  >
						<label for="email"><i class="fa fa-envelope" ></i> <?php echo _('Email');?></label>
                    </div>
                    
                    <div class="form-group" style="position:relative">
                      <input autocomplete="off" required class="form-control input-lg DbackupexProInput" type="password" name="pw"   >
						<label for="pw"><i class="fa fa-lock"></i> <?php echo _('Pw');?></label>
                    </div>
                    <input type="hidden" value="ewef34t235756g23eww" name="fazer_login">	
               
                  <?php if (get_website('recaptcha_login')==1){include('inc/recaptcha-html.php');}?>
              
                    
                    
                    <button class="btn btn-primary btn-block abrir_loader" type="submit"> <?php echo _('Make login');?> <i class="fa fa-paper-plane"></i></button> 
 


                  </form>
                  <br>
                </div>

                <div class="card-footer">
                  <div class="row text-center">
                    <div class="col-xs-6">
                       
                    </div>

                    <div class="col-xs-6">
                      <a href="<?php echo $SEO_URL_USER_PW_RECOVERY;?>"><?php echo _('Forget password?');?></a>
						
					
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
