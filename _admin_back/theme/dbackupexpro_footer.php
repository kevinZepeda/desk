<?php 
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Theme: BusinessX
// Regex Login Theme
// CopyRight: Litos Media - Carlos Santos de Azevedo
// Contact: info@litos.top
// 11-2017
#####################################################
 ?>
<!-- REQUIRED JS SCRIPTS -->
<script type="text/javascript" src="assets/js/dbackupexpro.js?a=<?php echo time();?>"></script>
<script type="text/javascript" src="assets/js/dbackupex-notificacoes.js"></script>
 
 
<script>
    $(document).ready(function() {
        $('.dropify').dropify({
            messages: {
                default: '<?php echo _('Drag and drop or click here to upload your .sql.gz DB Dump backup file')?>',
                replace: '<?php echo _('Drag and drop a file or click to upload a another file')?>',
                remove: '<?php echo _('Remove')?>',
                error: '<?php echo _('Sorry, the file is too large')?>'
            }
        });

		
		
		
		$(document).ready(function(){
$("checkbox").butoes({
    checked_label: "Ausgewählt!",
    unchecked_label: "Klicken zum auswählen!",
	 separator: "-"
});

$(".form-check-input :radio").butoes({
    checked_label: "Ausgewählt!",
    unchecked_label: "Klicken zum auswählen!",
	 separator: "-"
});

});
		
		
		
		
    });
</script>
<script type="text/javascript" src="assets/js/clipboard.min.js"></script>
   <script>
    var clipboard = new Clipboard(".copy-clip");

    clipboard.on("success", function(e) {
        console.log(e);
    });

    clipboard.on("error", function(e) {
        console.log(e);
    });
    </script>     
<!-- END REQUIRED JS SCRIPTS -->