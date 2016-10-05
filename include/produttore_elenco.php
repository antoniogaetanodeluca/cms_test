<?php 
	include("config.php");
	include("autorizzazione.php");
	include("funzioni.php");
	$estrai_dati_clienti = mysql_query ("SELECT * FROM produttore ORDER BY ragione_sociale") or die(mysql_error());
	$totale_dati_clienti = mysql_num_rows($estrai_dati_clienti);
?>

<div class="pgn-admin">
	
    <h3>Elenco completo dei Produttori</h3>
    
    <div class="azioni">
    	<a href="index.php?page=produttore_inserisci" /><button class="bt_aggiungi">Inserisci Nuovo</button></a>
		<!-- <a href="include/azione.php?azione=cliente_cancella_tutti"  /><button class="bt_cancella">Cancella Selezionati</button></a> -->
    </div>
    
    <div style="width:100%" class="tabella_data_tables"> 
		<table id="tabella"> 
			<thead> 
				<tr>
					<!-- <th>Sel.</th> --><th>Cod. Produttore</th><th>Ragione Sociale</th><th>Cognome</th><th>Cellulare</th><th>Email</th><th>Azione</th>
				</tr> 
			</thead> 
			<tbody> 
			<?php 
				if($totale_dati_clienti > 0){
					while($righe_dati_clienti = mysql_fetch_array($estrai_dati_clienti)){
			?>
			<tr>
				<!-- <td><input name="check_cliente[]" value="<?php //echo $righe_dati_clienti['id_cliente']; ?>" type="checkbox"/></td> -->
				<td><?php echo $righe_dati_clienti['codice_produttore']; ?></td>
				<td><?php echo $righe_dati_clienti['ragione_sociale'];?></td>
				<td><?php echo $righe_dati_clienti['cognome']; ?></td>
				<td><?php echo $righe_dati_clienti['cellulare']; ?></td>
				<td><?php echo $righe_dati_clienti['email']; ?></td>
				<td>
					<a href="include/produttore_scheda.php?id_produttore=<?php echo $righe_dati_clienti['id_produttore']; ?>" class="fancybox"/>
						<img src="immagini/info.png" alt="informazioni dettagliate" title="informazioni dettagliate"/>
					</a>
					<a href="index.php?page=produttore_modifica&id_produttore=<?php echo $righe_dati_clienti['id_produttore']; ?>" />
						<img src="immagini/modifica.png" alt="modifica" title="modifica"/>
					</a>
					<a href="include/azione.php?azione=produttore_cancella&id_produttore=<?php echo $righe_dati_clienti['id_produttore']; ?>" />
						<img src="immagini/cancella.png" alt="cancella" title="cancella"/>
					</a>										
				</td>
				
			</tr>
			<?php
					}
				}
			?>
			</tbody> 
		</table> 
	</div>     
</div>