<?php 
	include("config.php");
	include("autorizzazione.php");
	include("funzioni.php");
	$estrai_dati_clienti = mysql_query ("SELECT * FROM cliente ORDER BY cognome") or die(mysql_error());
	$totale_dati_clienti = mysql_num_rows($estrai_dati_clienti);
?>

<div class="pgn-admin">
	
    <h3>Elenco completo dei Clienti</h3>
    
    <div class="azioni">
    	<a href="index.php?page=cliente_inserisci" /><button class="bt_aggiungi">Inserisci Nuovo</button></a>
		<!-- <a href="include/azione.php?azione=cliente_cancella_tutti"  /><button class="bt_cancella">Cancella Selezionati</button></a> -->
    </div>
    
    <div style="width:100%" class="tabella_data_tables"> 
		
		<table id="tabella"> 
			<thead> 
				<tr>
					<!-- <th>Sel. --><th>Cod. Cliente</th><th>Ragione Sociale</th><th>Cognome</th><th>Cellulare</th><th>Email</th><th>Azione</th>
				</tr> 
			</thead> 
			<tbody> 
			<?php 
				if($totale_dati_clienti > 0){
					while($righe_dati_clienti = mysql_fetch_array($estrai_dati_clienti)){
			?>
			<tr>
				<!-- <td><input name="check_cliente[]" value="<?php //echo $righe_dati_clienti['id_cliente']; ?>" type="checkbox"/></td> -->
				<td><?php echo $righe_dati_clienti['codice_cliente']; ?></td>
				<td><?php echo $righe_dati_clienti['ragione_sociale'];?></td>
				<td><?php echo $righe_dati_clienti['cognome']; ?></td>
				<td><?php echo $righe_dati_clienti['cellulare']; ?></td>
				<td><a href="mailto:<?php echo $righe_dati_clienti['email']; ?>"><?php echo $righe_dati_clienti['email']; ?></a></td>
				<td>
					<a href="include/cliente_scheda.php?id_cliente=<?php echo $righe_dati_clienti['id_cliente'];?>" class="fancybox">
						<img src="immagini/info.png" alt="informazioni dettagliate" title="informazioni dettagliate"/>
					</a>
					<a href="include/azione.php?azione=inserisci_preventivo&id_cliente=<?php echo $righe_dati_clienti['id_cliente']; ?>" />
						<img src="immagini/crea_preventivo.png" alt="crea un preventivo" title="crea un preventivo"/>
					</a>
					<a href="index.php?page=cliente_modifica&id_cliente=<?php echo $righe_dati_clienti['id_cliente']; ?>" />
						<img src="immagini/modifica.png" alt="modifica" title="modifica"/>
					</a>
					<a href="include/azione.php?azione=cliente_cancella&id_cliente=<?php echo $righe_dati_clienti['id_cliente']; ?>" />
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
	<div id="scheda_cliente">
		<?php 
			if(isset($_GET['id_cliente'])){
				$id_cliente = $_GET['id_cliente'];
				$estrai_scheda_cliente = mysql_query("SELECT * FROM cliente WHERE id_cliente = $id_cliente") or die(mysql_error());
				$risultato_estrai_scheda_cliente = mysql_num_rows($estrai_scheda_cliente);
				while ($riga_scheda_cliente = mysql_fetch_array($estrai_scheda_cliente)){
		?>
		<p><?php echo $righe_dati_clienti['ragione_sociale']; ?></p>
		<?php
				}
			}
		?>
	</div>    
</div>