<?php 
	include("config.php");
	include("autorizzazione.php");
	include("funzioni.php");
	include("js_tabs.php");
	if(isset($_GET['id_produttore'])){
		$id_produttore = $_GET['id_produttore'];
		$elenca_dati_produttore = mysql_query("SELECT * FROM produttore WHERE id_produttore = $id_produttore") or die(mysql_error());
		$risultato_elenca_dati_produttore = mysql_num_rows($elenca_dati_produttore);
		if($risultato_elenca_dati_produttore > 0){
			while ($riga_elenca_dati_produttore = mysql_fetch_array($elenca_dati_produttore)){		
?>

<div class="pgn-admin">
	<div class="struttura_tab">
    	<div class="titolo_tab">
        	
            <p class="nuova_news info_user">Scheda di <strong><?php echo $riga_elenca_dati_produttore['ragione_sociale'];?></strong></p>
        </div>
       
       <div id="tabs">
       <div class="contenuto_tab"> 
	       <ul>
				<li><a href="#tabs-1">Dettaglio Produttore</a></li>
				<li><a href="#tabs-2">Allegati</a></li>
			</ul>
	       <div id="tabs-1">
	       <table cellspacing="0" summary="Scheda produttore" class="scheda_cliente" cellspacing="5" cellpadding="5">
				<tr>
					<td class="scuro">Codice produttore</td>
					<td><p><?php echo $riga_elenca_dati_produttore['codice_produttore']; ?></p></td>
				</tr>
				<tr>
					<td class="scuro">Nome</td>
					<td><p><?php echo $riga_elenca_dati_produttore['nome']; ?></p></td>
				</tr>
				<tr>
					<td class="scuro">Cognome</td>
					<td><p><?php echo $riga_elenca_dati_produttore['cognome']; ?></p></td>
				</tr>
				<tr>
					<td class="scuro">Ragione Sociale</td>
					<td><p><?php echo $riga_elenca_dati_produttore['ragione_sociale']; ?></p></td>
				</tr>
				<tr>
					<td class="scuro">Partita Iva</td>
					<td><p><?php echo $riga_elenca_dati_produttore['piva']; ?></p></td>
				</tr>
				<tr>
					<td class="scuro">Codice Fiscale</td>
					<td><p><?php echo $riga_elenca_dati_produttore['codice_fiscale']; ?></p></td>
				</tr>
				<tr>
					<td class="scuro">Indirizzo</td>
					<td><p><?php echo $riga_elenca_dati_produttore['indirizzo']; ?></p></td>
				</tr>
				<tr>
					<td class="scuro">Citt&agrave;</td>
					<td><p><?php echo $riga_elenca_dati_produttore['citta']; ?></p></td>
				</tr>
				<tr>
					<td class="scuro">Cap</td>
					<td><p><?php echo $riga_elenca_dati_produttore['cap']; ?></p></td>
				</tr>
				<tr>
					<td class="scuro">Banca</td>
					<td><p><?php echo $riga_elenca_dati_produttore['banca']; ?></p></td>
				</tr>
				<tr>
					<td class="scuro">Iban</td>
					<td><p><?php echo $riga_elenca_dati_produttore['iban']; ?></p></td>
				</tr>
				<tr>
					<td class="scuro">Telefono</td>
					<td><p><?php echo $riga_elenca_dati_produttore['telefono']; ?></p></td>
				</tr>
				<tr>
					<td class="scuro">Fax</td>
					<td><p><?php echo $riga_elenca_dati_produttore['fax']; ?></p></td>
				</tr>
				<tr>
					<td class="scuro">Cellulare</td>
					<td><p><?php echo $riga_elenca_dati_produttore['cellulare']; ?></p></td>
				</tr>
				<tr>
					<td class="scuro">Email</td>
					<td><p><a href="mailto:<?php echo $riga_elenca_dati_produttore['email']; ?>"><?php echo $riga_elenca_dati_produttore['email']; ?></a></p></td>
				</tr>
				<tr>
					<td class="scuro">Email Pec</td>
					<td><p><a href="mailto:<?php echo $riga_elenca_dati_produttore['email_pec']; ?>"><?php echo $riga_elenca_dati_produttore['email_pec']; ?></a></p></td>
				</tr>
				<tr>
					<td class="scuro">Sito Web</td>
					<td><p><?php echo $riga_elenca_dati_produttore['sito_web']; ?></p></td>
				</tr>
				<tr>
					<td class="scuro">Note</td>
					<td><?php echo $riga_elenca_dati_produttore['note']; ?></td>
				</tr>
			</table>
			</div>
			<div id="tabs-2">
			<fieldset class="field_set_interno_galleria">
               		 	
                    
                     <div class="sortable">
                     <?php                                 
                        $seleziona_associazione_allegati_tutti = mysql_query("SELECT associazione_allegati.*, allegati.*
                                                                                FROM associazione_allegati								
                                                                                JOIN allegati ON associazione_allegati.id_allegato = allegati.id_allegato
                                                                                WHERE associazione_allegati.riferimento_id = '$id_produttore' 
																				AND associazione_allegati.riferimento = 'produttore'
																				ORDER BY ordine");
                        $id_allegati_associati = "";
                        while($righe_allegati_associati = mysql_fetch_array($seleziona_associazione_allegati_tutti) ){
                            $id_associati_array[] = $righe_allegati_associati['id_allegato'];
                            $id_allegati_associati = implode(",",$id_associati_array);
							$estensione = $righe_allegati_associati['estensione'];								
                    ?> 
                        <a href="<?php echo $righe_allegati_associati['percorso_fullsize']; ?>" target="_blank"><?php echo $righe_allegati_associati['titolo_allegato'].".".$righe_allegati_associati['estensione'];?></a> 
                    <?php
                    }
                    ?>  
                    </div><!-- chiusura div sortable -->              
			</fieldset>
       </div>
    	</div>
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
