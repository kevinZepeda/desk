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
<!-- Main container -->
    <main>
      <section class="no-border-bottom section-sm">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
              <div class="card card-login">
                <div class="card-header" id="card-header">
                  <h6><?php echo _('Set your new password');?></h6>
                </div>

                <div class="card-block">
			  
                  <br>
                  <form class="ajax_send">
				   
                  <div class="form-group">
                      <input class="form-control input-lg" type="password" name="pw"   required placeholder="<?php echo _('Password');?>" required><br>
                       
                    </div>
                     <div class="form-group">
                      <input class="form-control input-lg" type="password" name="pw_confirm" required placeholder="<?php echo _('Confirm Password');?>" required><br>
 
                    </div>
                    <input type="hidden" value="rg65fve9vhn0r483ß9u0mvb45756" name="fazer_nova_senha">
                    <input type="hidden" value="<?php echo $_GET['m'];?>" name="m">
                    <input type="hidden" value="<?php echo $_GET['token'];?>" name="token">	
                    <button class="btn btn-primary btn-block abrir_loader" type="submit"> <?php echo _('Save new password');?></button>
                  </form>
                  <br>
                </div>

     
              </div>

  

            </div>
          </div>
        </div>
      </section>

    </main>
    <!-- END Main container -->
 <script src="<?php echo $SITE_URL?>assets/js/login-register.js"></script>