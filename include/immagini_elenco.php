<?php 
	include("autorizzazione.php");
	include("config.php") ; 
	include("funzioni.php");
	 $elenca= mysql_query("SELECT  * FROM immagini") or die(mysql_error());
      $totale_record = mysql_num_rows($elenca);
?>

<div class="pgn-admin">
	<div class="struttura_tab">
    	<div class="titolo_tab">
        	
            <p class="nuova_news">Gestione Immagini Sezioni</p>
            
        </div>
	
    
    <div class="contenuto_tab"> 
    	<fieldset class="field_set_interno_galleria">
           <legend class="field_set_interno_galleria" >Elenco Immagini Sezioni</legend>   
            <?php
                    if($totale_record > 0){
                    while($righe = mysql_fetch_array($elenca)) {
                ?>
            <div class="immagine">    
                <div class="immagine_esterno">                      		
                    <a href="include/azione.php?azione=immagini_cancella&immagine_id=<?php echo $righe['immagine_id']; ?>" /><img src="immagini/delete.png" class="delete" /></a>
                    <a href="<?php echo $righe['percorso_fullsize']; ?>" class="fancybox"><img src="immagini/cerca.png" class="search"/></a>
                </div>	
               <div class="clear"></div> 
                <div class="immagine_interno">                                    
                     <img src="<?php echo $righe['percorso_thumb']; ?>"  width="100" height="100" class="bordo"/>
                   
                </div>
            </div>
           
             <?php
                        } 
                    } else {
                        echo "<p>Nessuna immagine &egrave; stata ancora caricata, <a href='index.php?page=immagini_inserisci' style='color: #3A6383;''>aggiungine una</a> !</p>";
                        }
                    
                ?>
                
                
      </fieldset>
      
      <?php
		if($totale_record > 0){
    ?>
     <a href="index.php?page=immagini_inserisci" class="bt_more">aggiungi</a>
    <?php
		}
	?>
     <div class="clear"></div>
    </div>
    </div>
    
</div>