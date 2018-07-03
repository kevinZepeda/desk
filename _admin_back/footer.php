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
<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        <?php echo get_website('domain').' - V'.$REGEX_VERSION;?>

    </div>
    <!-- Default to the left -->

    <?php echo vari(get_website('copyright'));?>

</footer>
   
  
  

<!-- REQUIRED JS SCRIPTS -->
<script src="<?php echo $ADMIN_URL;?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo $ADMIN_URL;?>bower_components/jquery-ui/ui/sortable.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo $ADMIN_URL;?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- App -->
<script src="<?php echo $ADMIN_URL;?>assets/js/app.min.js"></script>
<script src="<?php echo $ADMIN_URL;?>assets/js/to-do.js"></script>
<!-- Notifications -->
<script src="<?php echo $ADMIN_URL;?>assets/js/notificacoes.js"></script>



<script>
/* Set the menu links to active if onthe page*/
$(document).ready(function () {	
var currentLocation = window.location.href;
 
	
if (currentLocation != '<?php echo $ADMIN_URL;?>'){
$('[href*="'+currentLocation+'"]').parent('li').addClass('active');
}	
 

<?php if( isset($_GET["file"])){?>
if (/theme/.test(window.location.href)){$('[href*="<?php echo $THEME_URL.$_GET["file"];?>"]').parent('li').addClass('active');}	
}
<?php } ?>
				  

});//
</script>





</body>
</html>