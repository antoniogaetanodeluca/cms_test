<?php 
	include("config.php");
	include("autorizzazione.php");
	include("funzioni.php");
	$elenca_immagini = mysql_query("SELECT * FROM immagini") or die(mysql_error());
	$totale_record = mysql_num_rows($elenca_immagini);
?>


<div class="pgn-admin">
	<div class="struttura_tab">
    	<div class="titolo_tab">
        	
            <p class="nuova_news foto">Gestione Immagini</p>
        </div>
       
       <div class="contenuto_tab"> 
        	<form name="inserisci_news" action="include/azione.php?azione=immagini_inserisci" method="post" class="validateform" enctype="multipart/form-data"><br />
                <fieldset class="nuova_news">
                    <legend class="nuova_news">Inserisci una nuova immagine</legend>
                    <ul id="nuova_news">
                      	
                      <li>
                      	<label class="clear-label" style="width: 200px; text-transform:capitalize;">Scegli un'immagine (Max 1MB)</label><br />                   
                        <input name="immagine" type="file" id="immagine"/>
                      </li><br />
                     
                      <li>
                      	<label class="clear-label" style="width: 180px; text-transform:capitalize;">Descrizione</label><br /><br />
                      	<textarea name="descrizione_immagine" name="note" id="note"></textarea>
                      </li>                     
                        <li>
							
                            <input class="bt_upload" name="inserisci" type="submit"  value="upload"/>
                            <input name="altezza_immagine" id="altezza_immagine" class="dimensioni" value="768" type="hidden"/>
                            <input name="larghezza_immagine" id="larghezza_immagine" class="dimensioni" value="1024" type="hidden"/>
					 	</li><br /><br /><br />
                        
                    </ul>
                  </fieldset>
                </form>
                
               
                
    	</div>
    </div>
    	 
</div>
