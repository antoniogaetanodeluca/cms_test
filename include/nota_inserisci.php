<?php 
	include("config.php");
	include("autorizzazione.php");
	include("funzioni.php");
	$estrai_clienti = mysql_query ("SELECT * FROM cliente ORDER BY id_cliente") or die(mysql_error());
	$totale_clienti = mysql_num_rows($estrai_clienti);
?>

<div class="pgn-admin">
	<div class="struttura_tab">
    	<div class="titolo_tab">
        	
            <p class="nuova_news">Inserisci un nuova nota</p>
        </div>
       
       <div class="contenuto_tab nota"> 
        	<form name="inserisci_news" action="include/azione.php?azione=nota_inserisci" method="post" class="validateform" enctype="multipart/form-data">
                
                   
                    <ul id="nuova_news">
                     
                      <fieldset class="field_set_interno nota">
                           <legend class="field_set_interno" >Nuovo Inserimento ( I campi segnati in rosso sono obbligatori )</legend>                           
                                <li>
		                            <label class="clear-label">Titolo</label>
		                            <input name="titolo" type="text" id="titolo"  class="required"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Data</label>
		                            <input name="data" type="text" id="data" readonly="" class="required" value="<?php echo date("d-m-y,H-i");?>"/>
		                        </li><br /><br />
		                       		                        
		                        <li>
		                            <label class="clear-label">Referente</label>
		                            <select name="referente">
		                            	<?php 
			                            	if ($totale_clienti > 0){
				                            	while ($righe_estrai_clienti = mysql_fetch_array($estrai_clienti)){
			                            ?>
			                            <option value="<?php echo $righe_estrai_clienti['id_cliente']; ?>"><?php echo $righe_estrai_clienti['cognome']; ?></option>
			                            <?php 	
			                            		} 
			                            	} else {
			                            ?>
			                            <option value="nessun_cliente">-</option>
			                            <?php
			                            	}
			                            ?>
		                            </select>
		                        </li>
		                        
		                        
                        
                                               
                       <li>
                        <label class="clear-label" style="width: 200px;">Note</label> <br /> <br />
                        <textarea id="note" name="note" ></textarea>
                        
                   	  </li>
                      
                                            
                        
                        <li>
							<input class="bt" name="inserisci" type="submit"  value="inserisci"/>
                            <input type="hidden" name="riferimento" value="nota" />
					 	</li><br /><br /><br />
                        
                    </ul>
               
    	</div>
    </div>
    	 
</div>