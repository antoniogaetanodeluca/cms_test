<?php 
	include("autorizzazione.php");
	include("config.php") ;  
?>
<script type="text/javascript">
$(document).ready(function() {
		/*function mostra_responso() {
			alert ('Operazione avvenuta con successo . ');
		}
		
		$(function() {
			$( "#finestra" ).dialog();
		});*/
		
		$(".datepicker").datepicker();
	
	 	
		$("a.fancybox").fancybox({
			'zoomSpeedIn': 1000,
			'zoomSpeedOut':1000,
			'overlayShow': false,
			'easingIn':'easeOutBack',
			'easingOut':'easeInBack',
			'zoomOpacity':true
			
		});
     
		
		$(".validateform").validate();
		
		//$(".dialog").dialog();
		
		$( "#tabs" ).tabs();

		$( ".sortable" ).sortable();
		$( ".sortable" ).disableSelection();
		 
		
        $('#tabella').dataTable( {
            "oLanguage": { "sUrl": "js/datatable/datatable_italiano.txt" },
                "bJQueryUI": true,
                //"sPaginationType": "full_numbers",
                "aoColumnDefs": [
			      { "bSortable": false, "aTargets": [ 5 ] }
			    ]
        } );
        
        $('#tabella_note').dataTable( {
            "oLanguage": { "sUrl": "js/datatable/datatable_italiano.txt" },
                "bJQueryUI": true,
                //"sPaginationType": "full_numbers",
                "aoColumnDefs": [
			      { "bSortable": false, "aTargets": [ 4 ] }
			    ]
        } );
        
       
		$( ".slider1" ).slider({
			range: "min",
			value: 1,
			min: 1,
			max: 12,
			slide: function( event, ui ) {
				$( "#mesi" ).val( ui.value);
			}
		});
		$( "#mesi" ).val( $( ".slider1" ).slider( "value" ));
		
		$( ".slider2" ).slider({
			range: "min",
			value: 1,
			min: 1,
			max: 30,
			slide: function( event, ui ) {
				$( "#giorni" ).val( ui.value);
			}
		});
		$( "#giorni" ).val( $( ".slider2" ).slider( "value" ));

		$( ".slider3" ).slider({
			range: "min",
			value: 1,
			min: 1,
			max: 36,
			slide: function( event, ui ) {
				$( "#quantita" ).val( ui.value);
			}
		});
		$( "#quantita" ).val( $( ".slider3" ).slider( "value" ));
        
        
	    
	   
	
});		
		
</script>
<script type="text/javascript">
window.onload = function()
{
	
	CKEDITOR.replace( 'note' );
	toolbar: 'editor_html';

};
</script>


    
   		
		
	

		
		
	






