////////////////////////////////////////
// contact
///////////////////////////////////////
$(".kontakt_ajax_send").submit(function(e){e.preventDefault();return $.ajax({type:"POST",url:"/ajax.php",data:$(".kontakt_ajax_send").serialize(),beforeSend:function(){$(".kontakt_ajax_send").prepend('<div class="loader_card"></div>')},success:function(e){null==document.querySelector("#msg")&&$(".butao-submit").prepend('<div id="msg" style="text-align:center"></div>'),$("#msg").html(e),$(".loader_card").fadeOut(600),setTimeout(function(){$(".loader_card").remove()},800)}}),!1});