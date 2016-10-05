<?php 
	include("config.php");
	include("autorizzazione.php");
	include("funzioni.php");
?>

<div class="pgn-admin">
	
    <h3>Elenco completo delle Categorie</h3>
    <div class="struttura_tab" style="width:940px;">
        <div class="titolo_tab">
            <ul class="elenco_titolo_tab">
                <li class="checkbox"><label>&nbsp;</label></li>
                <li class="data"><label>Titolo</label></li>
                <li class="titolo"><label></label></li>
                <li class="anteprima" style="width:400px;"><label>Descrizione</label></li>
                <li class="azione" style="width:67px; padding-left:85px "><label>Azione</label></li>
             </ul>
         </div>
            
         <div class="contenuto_tab" style="padding: 0; width:940px;"> 
			<?php
                
                $elenca= "SELECT * FROM categoria ORDER BY id_categoria" ;
                $risultato = mysql_query ($elenca) or die(mysql_error()) ;
                $righe_totali = mysql_num_rows($risultato);
				if($righe_totali > 0 ){
                while ($row = mysql_fetch_array($risultato)) { 
                    extract($row) ;
                
            ?>
			
            <div class="riga">
                <div class="checkbox"><p><input type="checkbox" name="cancellatutti[]" value="<?php echo $row['id_categoria'];?>"/></p></div>
                <div class="data">
                	<p>
                	<?php
					
						$anteprima_titolo = $row['titolo_categoria'];
						if (strlen($anteprima_titolo) > 60 ){
							$anteprima_titolo = substr($anteprima_titolo, 0, 60) . '...' ;
						}
						echo $anteprima_titolo;			 
			
					?>
                    </p>
                </div>
                <div class="titolo"><p></p></div>
                
                <div class="azione">
                	<p><a href="index.php?page=categoria_modifica&id_categoria=<?php echo $row['id_categoria']; ?>" /><img src="immagini/modifica.png" alt="modifica" title="modifica"/></a></p>
               </div>
              
               <div class="azione">
               		<p><a href="include/azione.php?azione=categoria_cancella&id_categoria=<?php echo $row['id_categoria']; ?>" /><img src="immagini/cancella.png" alt="cancella" title="cancella"/></a></p>
              </div>
             
             </div>
            
            <?php 
				} 
					} else { 
						echo "<p style='color:#FF0000; padding-left: 10px;'>Non sono state inserite categorie .</p>";
				}		
			?>
                

    	</div>
        
        
    
    
    </div><!--div struttura tab -->
    
    <br />
    
    <div class="aggiungi">
        	<a href="index.php?page=categoria_inserisci" /><button class="bt_aggiungi">inserisci</button></a>
    		<a href="include/azione.php?azione=categoria_cancella_tutti"  /><button class="bt_cancella_tutti">Cancella Selezionati</button></a>
    </div>
    
</div>