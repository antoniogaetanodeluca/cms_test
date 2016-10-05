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
        	
            <p class="nuova_news">Gestione Immagini Galleria</p>
        </div>
       
       <div class="contenuto_tab"> 
        	<form name="inserisci_news" action="include/azione.php?azione=galleria_inserisci" method="post" class="validateform" enctype="multipart/form-data"><br />
                <fieldset class="nuova_news">
                    <legend class="nuova_news">Inserisci una nuova immagine per la Galleria</legend>
                    <ul id="nuova_news">
                      	
                      <li>
                      	<label class="clear-label" style="width: 200px; text-transform:capitalize;">Scegli un'immagine (Max 1MB)</label><br />                   
                        <input name="immagine" type="file" id="immagine"/>
                      </li><br /><br />
                     
                      <li>
                      	<label class="clear-label" style="width: 180px; text-transform:capitalize;">Specifica la larghezza (px)</label>                       
                        <input name="larghezza_immagine" id="larghezza_immagine" class="dimensioni" value="960"/>
                      </li><br />
                      
                      <li>
                      	<label class="clear-label" style="width: 180px; text-transform:capitalize;">Specifica l'altezza (px)</label>                       
                        <input name="altezza_immagine" id="altezza_immagine" class="dimensioni" value="500"/>
                      </li><br />
                      
                      <!--<li>
                      	<label class="clear-label" style="width: 180px; text-transform:capitalize;">Inserisci una descrizione</label>
                        <textarea>
                        </textarea>
                      </li><br />-->
                        <input type="hidden" name="riferimento" value="galleria" />
                        <br />
                        <li>
                        	<input class="bt_upload" name="inserisci" type="submit"  value="upload"/>
                        </li><br />
                        
                    </ul>
                  </fieldset>
                </form>
                
               
                
    	</div>
    </div>
    	 
</div>
