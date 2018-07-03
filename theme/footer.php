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
 <footer class="footer center navbar navbar-default navbar-fixed-bottom">
      <div class="container center"><br>
        <div class="logo pull-left">
            <a href="<?php echo $SITE_URL;?>"><?php echo get_logo();?></a>
          </div>
		   <p style="margin:auto"><?php echo vari(get_website('copyright'));?></p>
       <p style="color: aliceblue;margin:auto; font-size: 10px;"><?php echo get_litos_media('copyright') ;?></p>
      </div>
    </footer>

  </body>
</html>

<?php
clean_not_activated_users();
// Close connection
mysqli_close ($con);
?>  