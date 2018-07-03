<?php 
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Software: Regex The Speed Inproved PHP Login, 
// Website & User Management
// CopyRight: Litos Media - Carlos Santos de Azevedo
// Contact: info@litos.top
// 07-2017
#####################################################
/*se ja esta logado, rediret to my account*/ 
if(user_is_logged_in()) header("Location: ".$SITE_URL.$SEO_URL_MY_ACCOUNT); 
$email_token= $_GET['token'];
$m= encriptar( $_GET['m'], 'd' );
$butao_continuar='<a href="'.$SITE_URL.$SEO_URL_MY_ACCOUNT.'" class="btn btn-primary btn-block" >'._("Continue to my Account").'</a>';
?>
<!-- Main container -->
    <main>
      <section class="no-border-bottom section-sm">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
              <div class="card">
                <div class="card-header">
                  <h6><?php echo get_website('name'); ?></h6>
                </div>

                <div class="card-block">
                  <br>
               <?php echo check_activation_link_new_account($email_token,$m); ?>
               <?php echo $butao_continuar; ?>
              
                  <br>
                </div>

        

            </div>
          </div>
        </div>
      </section>

    </main>
    <!-- END Main container -->