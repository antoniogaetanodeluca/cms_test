<?php 
	include("config.php");
	include("autorizzazione.php");
	include("funzioni.php");
	$estrai_dati_nota = mysql_query ("SELECT cliente.*, associazione_note.*, note.*
									 FROM cliente 
									 JOIN associazione_note ON associazione_note.riferimento_id = cliente.id_cliente
									 JOIN note ON note.id_nota = associazione_note.id_nota
									 ORDER BY note.data") or die(mysql_error());
	$totale_dati_nota = mysql_num_rows($estrai_dati_nota);
?>

<div class="pgn-admin">
	<h3>Elenco completo delle Note</h3>
    <div class="azioni">
    	<a href="index.php?page=nota_inserisci" /><button class="bt_aggiungi">Inserisci Nuovo</button></a>
		<!-- <a href="include/azione.php?azione=cliente_cancella_tutti"  /><button class="bt_cancella">Cancella Selezionati</button></a> -->
    </div>    
    <div style="width:100%" class="tabella_data_tables"> 		
		<table id="tabella_note"> 
			<thead> 
				<tr>
					<th>Data</th><th>Referente</th><th>Titolo</th><th>Anteprima</th><th>Azione</th>
				</tr> 
			</thead> 
			<tbody> 
				<?php 
					if($totale_dati_nota > 0){
						while($righe_dati_nota = mysql_fetch_array($estrai_dati_nota)){
				?>
				<tr>
					<td><?php echo $righe_dati_nota['data'];?></td>
					<td><?php echo $righe_dati_nota['ragione_sociale'];?></td>
					<td><?php echo $righe_dati_nota['titolo'];?></td>
					<td><?php echo $righe_dati_nota['nota'];?></td>
					<td>
						<a href="include/nota_scheda.php?id_nota=<?php echo $righe_dati_nota['id_nota'];?>" class="fancybox">
							<img src="immagini/info.png" alt="informazioni dettagliate" title="informazioni dettagliate"/>
						</a>
						<a href="index.php?page=nota_modifica&id_nota=<?php echo $righe_dati_nota['id_nota']; ?>" />
							<img src="immagini/modifica.png" alt="modifica" title="modifica"/>
						</a>
						<a href="include/azione.php?azione=nota_cancella&id_nota=<?php echo $righe_dati_nota['id_nota']; ?>" />
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