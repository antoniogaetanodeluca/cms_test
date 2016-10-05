<?php 
	include("config.php");
	include("autorizzazione.php");
	include("funzioni.php");
?>

<div class="pgn-admin">
	<div class="struttura_tab">
    	<div class="titolo_tab">
        	
            <p class="nuova_news">Inserisci una nuova Categoria </p>
        </div>
       
       <div class="contenuto_tab"> 
        	<form name="inserisci_news" action="include/azione.php?azione=categoria_inserisci" method="post" class="validateform" enctype="multipart/form-data"><br />
                <fieldset class="nuova_news">
                    <legend class="nuova_news">categoria</legend>
                    <ul id="nuova_news">
                     
                      <fieldset class="field_set_interno">
                           <legend class="field_set_interno" >Nuovo Inserimento</legend>                           
                        <!--<li>
                            <label class="clear-label">ROI</label>
                            <input name="roi" type="text" id="roi"  class="required"/>
                        </li><br />-->
                        
                        
                        <li>
                            <label class="clear-label">Titolo</label>
                            <input name="titolo_categoria" type="text" id="titolo_categoria"  class="required"/>
                        </li><br />
                      
                      
                      
                      
                      
                      
                      </fieldset>
                     
                        <br />
                        <li>
							<input class="bt" name="inserisci" type="submit"  value="inserisci"/>
                            <input type="hidden" name="riferimento" value="categoria" />
					 	</li><br />
                        
                    </ul>
                </fieldset>
    	</div>
    </div>
    	 
</div>