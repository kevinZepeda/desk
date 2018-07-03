<?php 
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Software: Regex The Speed Inproved PHP Login, 
// Website & User Management
// CopyRight: Litos Media - Carlos Santos de Azevedo
// Contact: info@litos.top
// 07-2017
#####################################################
 $COOKIE_LIFE_TIME= get_website('login_life_time')+20;
 setcookie(md5($PW_PREFIXO."login_token"),$login_token,time()-(3600*$COOKIE_LIFE_TIME));
header("Location: ".get_website('redirect_url_after_logout'));