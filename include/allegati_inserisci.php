<?php 
	include("config.php");
	include("autorizzazione.php");
	include("funzioni.php");
?>


<div class="pgn-admin">
	<div class="struttura_tab">
    	<div class="titolo_tab allegati">
        	
            <p class="nuova_news">Gestione Allegati</p>
        </div>
       
       <div class="contenuto_tab"> 
        	<form name="inserisci_news" action="include/azione.php?azione=allegato_inserisci" method="post" class="validateform" enctype="multipart/form-data"><br />
                <fieldset class="nuova_news">
                    <legend class="nuova_news">Inserisci un allegato</legend>
                    <ul id="nuova_news">
                      	
                      <li>
                      	<label class="clear-label" style="width: 200px; text-transform:capitalize;">Scegli un allegato (Max 5 MB)</label><br />                   
                        <input name="nome_allegato" type="file" id="nome_allegato"/>
                      </li><br /><br />
                     
                      <li>
                      	<label class="clear-label" style="width: 100px; text-transform:capitalize;">Nome allegato</label>                       
                        <input name="titolo_allegato" id="titolo_allegato" />
                      </li><br />
                      
                      <li>
                      	<label class="clear-label" style="width: 100px; text-transform:capitalize;">Descrizione</label>
                      	<textarea name="descrizione_allegato"></textarea>
                      </li><br />
                     
                        <li>
							
                            <input class="bt_upload" name="inserisci" type="submit" value="upload"/>
                           
					 	</li><br />
                        
                    </ul>
                  </fieldset>
                </form>
                
               
                
    	</div>
    </div>
    	 
</div>
