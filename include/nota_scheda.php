<?php 
	include("config.php");
	include("autorizzazione.php");
	include("funzioni.php");
	if(isset($_GET['id_nota'])){
		$id_nota = $_GET['id_nota'];
		$elenca_dati_nota = mysql_query("SELECT * FROM note WHERE id_nota = $id_nota") or die(mysql_error());
		$risultato_elenca_dati_nota = mysql_num_rows($elenca_dati_nota);
		if($risultato_elenca_dati_nota > 0){
			while ($riga_elenca_dati_nota = mysql_fetch_array($elenca_dati_nota)){		
?>

<div class="pgn-admin">
	<div class="struttura_tab">
    	<div class="titolo_tab">
        	
            <p class="nuova_news info_user">Nota del <strong><?php echo converti_data_in_ita($riga_elenca_dati_nota['data']);?></strong></p>
        </div>
       
       <div class="contenuto_tab"> 
	       <table cellspacing="0" summary="Scheda Cliente" class="scheda_cliente" cellspacing="5" cellpadding="5">
				<tr>
					<td class="scuro">Titolo</td>
					<td><p><?php echo $riga_elenca_dati_nota['titolo']; ?></p></td>
				</tr>
				<tr>
					<td class="scuro">Nota</td>
					<td><p><?php echo $riga_elenca_dati_nota['nota']; ?></p></td>
				</tr>					
			</table>			             
    	</div>
    </div>
    	 
</div>
<?php
	    }
	  } 		 
	} else {
		echo "Si &egrave; verificato un errore, contattare il supporto tecnico .";
	}
?>
