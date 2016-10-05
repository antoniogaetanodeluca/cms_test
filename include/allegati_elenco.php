<?php 
	include("autorizzazione.php");
	include("config.php") ; 
	include("funzioni.php");
	 $elenca= mysql_query("SELECT * FROM allegati") or die(mysql_error());
      $totale_record = mysql_num_rows($elenca);
?>

<div class="pgn-admin">
	<div class="struttura_tab">
    	<div class="titolo_tab">
        	
            <p class="nuova_news">Gestione Allegati</p>
        </div>
	
    
    <div class="contenuto_tab"> 
    	<fieldset class="field_set_interno_galleria">
           <legend class="field_set_interno_galleria">Elenco Allegati</legend>   
            <?php
                    if($totale_record > 0){
                    while($righe = mysql_fetch_array($elenca)) {
					$estensione = $righe['estensione'];
                ?>
            <div class="immagine">    
                <div class="immagine_esterno">                      		
                    <a href="include/azione.php?azione=allegati_cancella&id_allegato=<?php echo $righe['id_allegato']; ?>" /><img src="immagini/delete.png" class="delete" /></a>
                	<a href="<?php echo $sito . $righe['percorso_fullsize']; ?>"><img src="immagini/download.png" alt="scarica il file" title="scarica il file" class="download"/></a>
                    <a href=""><img src="immagini/info.png" alt="<?php echo $righe['titolo_allegato']; ?>" title="<?php echo $righe['titolo_allegato']; ?>" class="info"/></a>
                </div>	
               <div class="clear"></div> 
                <div class="immagine_interno">                                    
                     <img src="
					 	<?php
							if ($estensione == 'rtf' || $estensione == 'txt'){
								echo 'immagini/txt.png';
							} else { 
								if ($estensione == 'doc'){
									echo 'immagini/doc.png';
								} else {
									echo 'immagini/pdf.png';
									}
								}
						?>
                     "  width="100" height="100" class="bordo"/>
                   
                </div>
            </div>
           
             <?php
                        } 
                    } else {
                        echo "<p>Nessun file &egrave; stato caricato, <a href='index.php?page=allegati_inserisci' style='color: #3A6383;''>aggiungine uno</a> !</p>";
                        }
                    
                ?>
      </fieldset>
     <?php
		if($totale_record > 0){
    ?>
     <a href="index.php?page=allegati_inserisci" class="bt_more">aggiungi</a>
    <?php
		}
	?>
	<div class="clear"></div>
    </div>
    </div>
    
</div>