<?php 
	include("autorizzazione.php");
	include("config.php"); 
?>

<div class="pgn-admin">
	 <?php
    	$conta_news =  "SELECT COUNT(*) as contanews FROM news" ;
    	$risultato = mysql_query($conta_news) or die(mysql_error()) ;
		$risultato_news = mysql_fetch_array($risultato) ; 	
		
		$conta_vetrine = "SELECT COUNT(*) as contavetrine FROM vetrina" ;
		$risultato2 = mysql_query($conta_vetrine) or die(mysql_error()) ;
		$risultato_vetrine = mysql_fetch_array($risultato2) ;
	?>
    
    <div class="struttura_tab">
    	<div class="titolo_tab">
        	<p class="mini_stat">Statistiche in breve : </p>
        </div>
       
       <div class="contenuto_tab" > 
        	<p>Sono state inserite <strong><?php print $risultato_news['contanews'] ; ?></strong> news .</p>
            <p>Sono stati inseriti <strong><?php print $risultato_vetrine['contavetrine'] ; ?></strong> prodotti in vetrina .</p>
    	</div>
    </div>
</div>