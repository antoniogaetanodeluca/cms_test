<?php 
	include("autorizzazione.php");
	include("config.php"); 
	include("funzioni.php");
	$seleziona_clienti = mysql_query("SELECT * FROM cliente LIMIT 3") or die(mysql_error());
	$totale_clienti = mysql_num_rows($seleziona_clienti);
	
	$seleziona_preventivi = mysql_query("SELECT * FROM preventivo LIMIT 3") or die(mysql_error());
	$totale_preventivi = mysql_num_rows($seleziona_preventivi);
	
	$seleziona_note = mysql_query("SELECT * FROM note LIMIT 3") or die(mysql_error());
	$totale_note = mysql_num_rows($seleziona_note);
	
	$seleziona_produttori = mysql_query("SELECT * FROM produttore LIMIT 3") or die(mysql_error());
	$totale_produttori = mysql_num_rows($seleziona_produttori);

	$user = $_SESSION['username'];
	$estrai_dati_utente = mysql_query("SELECT * FROM utenti WHERE username = '$user' ") or die(mysql_error());

?>

<div class="pgn-admin">
	<h4>Benvenuto <?php while($riga = mysql_fetch_array($estrai_dati_utente)){ echo $riga['nome'] ." ". $riga['cognome']; }?></h4>
	<p>di seguito una breve panoramica delle operazioni principali </p><br />
	<div class="widget">
        <a href="index.php?page=cliente_inserisci" class="link_div" alt="inserisci un nuovo cliente" title="inserisci un nuovo cliente"/>
            <img src="immagini/cliente.png" />
           <p>Cliente</p>
         </a>
        </div>   
 
    
		<div class="widget" >
            <a href="index.php?page=produttore_inserisci" class="link_div" alt="inserisci un nuovo produttore" title="inserisci un nuovo produttore"/>
                <img src="immagini/fornitore.png" />
                <p>Produttore</p>
             </a>
        </div>

    	        
         <div class="widget ">
            <a href="index.php?page=preventivo_inserisci" class="link_div" alt="inserisci un nuovo preventivo" title="inserisci un nuovo preventivo"/>
                <img src="immagini/preventivo.png" />
                <p>Preventivo</p>
             </a>
        </div>
        
         <div class="widget ">
            <a href="index.php?page=nota_inserisci" class="link_div" alt="inserisci una nuova nota" title="inserisci una nuova nota"/>
                <img src="immagini/note.png" />
                <p>Note</p>
             </a>
        </div>
        
        <div class="clear"></div>
	</div>
    
   <?php 
		if ($totale_preventivi > 0){
			
	?>
	<div class="contenuto_tab no_padding margine"> 
    	<fieldset class="nuova_news">
        	<legend class="nuova_news">Ultimi preventivi inseriti</legend>
        		<?php while($righe_preventivi = mysql_fetch_array($seleziona_preventivi)){ ?>
        		<div class="box">
        			<a href="include/preventivo_scheda.php?id_preventivo=<?php echo $righe_preventivi['id_preventivo'];?>" class="fancybox">
						preventivo
					</a>
        		</div>
        		<?php 
	        		}
        		?>
        </fieldset>
	</div>
	<?php
	       	}
	?>

	<?php 
		if ($totale_clienti > 0){
	?>
	<div class="contenuto_tab no_padding margine"> 
    	<fieldset class="nuova_news">
		<legend class="nuova_news">Ultimi clienti inseriti</legend>
			<?php while($righe_clienti = mysql_fetch_array($seleziona_clienti)){ ?>
			<div class="box">
				<a href="include/cliente_scheda.php?id_cliente=<?php echo $righe_clienti['id_cliente'];?>" class="fancybox">
					<?php echo $righe_clienti['cognome'] . " " . $righe_clienti['nome'];?>
				</a>
				, lavora presso <?php echo $righe_clienti['ragione_sociale']; ?>
			</div>
			<?php } ?>
		</fieldset>
	</div>
	<?php
	    }
	?>
	
	<?php 
		if ($totale_produttori > 0){
	?>
	<div class="contenuto_tab no_padding margine"> 
    	<fieldset class="nuova_news">
		<legend class="nuova_news">Ultimi produttori inseriti</legend>
			<?php while($righe_produttori = mysql_fetch_array($seleziona_produttori)){ ?>
			<div class="box">
				<a href="include/produttore_scheda.php?id_produttore=<?php echo $righe_produttori['id_produttore'];?>" class="fancybox">
					<?php echo $righe_produttori['cognome'] . " " . $righe_produttori['nome'];?>
				</a>
				, lavora presso <?php echo $righe_produttori['ragione_sociale']; ?>
			</div>
			<?php } ?>
		</fieldset>
	</div>
	<?php
	    }
	?>

	<?php 
		if ($totale_note > 0){			
	?>
	<div class="contenuto_tab no_padding margine"> 
    	<fieldset class="nuova_news">
        	<legend class="nuova_news">Ultime note inserite</legend>
        	<?php 
        		$i = 1; 
        		while($righe_note = mysql_fetch_array($seleziona_note)){ 
        			
        	?>
			<div class="box">
				<?php echo "Nota #$i del " . converti_data_in_ita($righe_note['data']) . $righe_note['nota'];?>	
			</div>
			<?php $i++; } ?>
		</fieldset>
	</div>
	<?php
	     }
	?>

        
</div>