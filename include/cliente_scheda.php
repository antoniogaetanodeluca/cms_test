<?php 
	include("config.php");
	include("autorizzazione.php");
	include("funzioni.php");
	include("js_tabs.php");
	if(isset($_GET['id_cliente'])){
		$id_cliente = $_GET['id_cliente'];
		$elenca_dati_cliente = mysql_query("SELECT * FROM cliente WHERE id_cliente = $id_cliente") or die(mysql_error());
		$risultato_elenca_dati_cliente = mysql_num_rows($elenca_dati_cliente);
		if($risultato_elenca_dati_cliente > 0){
			while ($riga_elenca_dati_cliente = mysql_fetch_array($elenca_dati_cliente)){		
?>

<div class="pgn-admin">
	<div class="struttura_tab">
    	<div class="titolo_tab">
        	
            <p class="nuova_news info_user">Scheda di <strong><?php echo $riga_elenca_dati_cliente['ragione_sociale'];?></strong></p>
        </div>
       <div id="tabs">
	   		<ul>
				<li><a href="#tabs-1">Dettaglio Cliente</a></li>
				<li><a href="#tabs-2">Allegati</a></li>
			</ul>
			<div id="tabs-1">
		       <div class="contenuto_tab"> 
			       <table cellspacing="0" summary="Scheda Cliente" class="scheda_cliente" cellspacing="5" cellpadding="5">
						<tr>
							<td class="scuro">Codice Cliente</td>
							<td><p><?php echo $riga_elenca_dati_cliente['codice_cliente']; ?></p></td>
						</tr>
						<tr>
							<td class="scuro">Nome</td>
							<td><p><?php echo $riga_elenca_dati_cliente['nome']; ?></p></td>
						</tr>
						<tr>
							<td class="scuro">Cognome</td>
							<td><p><?php echo $riga_elenca_dati_cliente['cognome']; ?></p></td>
						</tr>
						<tr>
							<td class="scuro">Ragione Sociale</td>
							<td><p><?php echo $riga_elenca_dati_cliente['ragione_sociale']; ?></p></td>
						</tr>
						<tr>
							<td class="scuro">Partita Iva</td>
							<td><p><?php echo $riga_elenca_dati_cliente['piva']; ?></p></td>
						</tr>
						<tr>
							<td class="scuro">Codice Fiscale</td>
							<td><p><?php echo $riga_elenca_dati_cliente['codice_fiscale']; ?></p></td>
						</tr>
						<tr>
							<td class="scuro">Indirizzo</td>
							<td><p><?php echo $riga_elenca_dati_cliente['indirizzo']; ?></p></td>
						</tr>
						<tr>
							<td class="scuro">Citt&agrave;</td>
							<td><p><?php echo $riga_elenca_dati_cliente['citta']; ?></p></td>
						</tr>
						<tr>
							<td class="scuro">Cap</td>
							<td><p><?php echo $riga_elenca_dati_cliente['cap']; ?></p></td>
						</tr>
						<tr>
							<td class="scuro">Banca</td>
							<td><p><?php echo $riga_elenca_dati_cliente['banca']; ?></p></td>
						</tr>
						<tr>
							<td class="scuro">Iban</td>
							<td><p><?php echo $riga_elenca_dati_cliente['iban']; ?></p></td>
						</tr>
						<tr>
							<td class="scuro">Telefono</td>
							<td><p><?php echo $riga_elenca_dati_cliente['telefono']; ?></p></td>
						</tr>
						<tr>
							<td class="scuro">Fax</td>
							<td><p><?php echo $riga_elenca_dati_cliente['fax']; ?></p></td>
						</tr>
						<tr>
							<td class="scuro">Cellulare</td>
							<td><p><?php echo $riga_elenca_dati_cliente['cellulare']; ?></p></td>
						</tr>
						<tr>
							<td class="scuro">Email</td>
							<td><p><a href="mailto:<?php echo $riga_elenca_dati_cliente['email']; ?>"><?php echo $riga_elenca_dati_cliente['email']; ?></a></p></td>
						</tr>
						<tr>
							<td class="scuro">Email Pec</td>
							<td><p><a href="mailto:<?php echo $riga_elenca_dati_cliente['email_pec']; ?>"><?php echo $riga_elenca_dati_cliente['email_pec']; ?></a></p></td>
						</tr>
						<tr>
							<td class="scuro">Sito Web</td>
							<td><p><?php echo $riga_elenca_dati_cliente['sito_web']; ?></p></td>
						</tr>
						<tr>
							<td class="scuro">Note</td>
							<td><?php echo $riga_elenca_dati_cliente['note']; ?></td>
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
	                                                                                WHERE associazione_allegati.riferimento_id = '$id_cliente' 
																					AND associazione_allegati.riferimento = 'cliente'
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
