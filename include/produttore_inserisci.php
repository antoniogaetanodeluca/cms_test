<?php 
	include("config.php");
	include("autorizzazione.php");
	include("funzioni.php");
	$elenca_immagini = mysql_query("SELECT * FROM immagini") or die(mysql_error());
	$totale_elenca_immagini = mysql_num_rows($elenca_immagini);
	$query_allegato = mysql_query("SELECT * FROM allegati") or die(mysql_error());
	$totale_record_allegato = mysql_num_rows($query_allegato);
?>

<div class="pgn-admin">
	<div class="struttura_tab">
    	<div class="titolo_tab">
        	
            <p class="nuova_news">Inserisci un nuovo <strong>produttore</strong></p>
        </div>
       
       <div class="contenuto_tab"> 
        	<form name="inserisci_news" action="include/azione.php?azione=produttore_inserisci" method="post" class="validateform" enctype="multipart/form-data">
                
                   
                    <ul id="nuova_news">
                     
                      <fieldset class="field_set_interno">
                           <legend class="field_set_interno" >Nuovo Inserimento ( I campi segnati in rosso sono obbligatori )</legend>                           
                                <li>
		                            <label class="clear-label">Nome</label>
		                            <input name="nome" type="text" id="nome"  class="required"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Cognome</label>
		                            <input name="cognome" type="text" id="cognome"  class="required"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Ragione Sociale</label>
		                            <input name="ragione_sociale" type="text" id="ragione_sociale"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Partita Iva</label>
		                            <input name="piva" type="text" id="piva"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Codice Fiscale</label>
		                            <input name="codice_fiscale" type="text" id="codice_fiscale"  class="required"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Indirizzo</label>
		                            <input name="indirizzo" type="text" id="indirizzo"  class="required"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Citt&agrave;</label>
		                            <input name="citta" type="text" id="citta"  class="required"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Cap</label>
		                            <input name="cap" type="text" id="cap"  class="required"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Banca</label>
		                            <input name="banca" type="text" id="banca"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Iban</label>
		                            <input name="iban" type="text" id="iban"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Telefono</label>
		                            <input name="telefono" type="text" id="telefono"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Fax</label>
		                            <input name="fax" type="text" id="fax"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Cellulare</label>
		                            <input name="cellulare" type="text" id="cellulare"  class="required"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Email</label>
		                            <input name="email" type="text" id="email"  class="required"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Email Pec</label>
		                            <input name="email_pec" type="text" id="email_pec"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Sito Web</label>
		                            <input name="sito_web" type="text" id="sito_web"/>
		                        </li><br /><br />
                        
                                               
                       <li>
                        <label class="clear-label" style="width: 200px;">Note</label> <br /> <br />
                        <textarea id="note" name="note" ></textarea>
                        
                   	  </li><br />
                   	  
                   	  <!-- IMMAGINI -->
                   	  
                   	  <fieldset class="field_set_interno_galleria">
                           <legend class="field_set_interno_galleria">Immagini</legend>   
							<?php
                                    if($totale_elenca_immagini >= 1){
									while($righe_immagini = mysql_fetch_array($elenca_immagini)){
                                ?>
                            <div class="immagine">    
                                <div class="immagine_esterno">                      		
                                    <input type="checkbox" name="check_immagine[]" value="<?php echo $righe_immagini['immagine_id']; ?>" />
                                    <a href="<?php echo  $righe_immagini['percorso_fullsize']; ?>" class="fancybox"><img src="immagini/cerca.png" class="cerca"/></a>
                                </div>	
                               <div class="clear"></div> 
                                <div class="immagine_interno">                                    
                                     <img src="<?php echo  $righe_immagini['percorso_thumb']; ?>"  width="100" height="100" class="bordo"/>
                                   
                                </div>
                            </div>
                           
                             <?php
                                    	} 
									} else {
										echo "<p>Nessuna immagine &egrave; stata ancora caricata .</p>";
										}
									
                                ?>
                      </fieldset>
                      
                      <!-- ALLEGATI -->
                      
                      <fieldset class="field_set_interno_galleria">
                           <legend class="field_set_interno_galleria">Allegati</legend>   
							<?php
								if($totale_record_allegato >= 1){
								while($righe_query_allegato = mysql_fetch_array($query_allegato)){
								$estensione = $righe_query_allegato['estensione'];	
							?>
                            <div class="immagine">                                        
                                <div class="immagine_esterno">
                                    <input type="checkbox" name="check_allegato[]" value="<?php echo $righe_query_allegato['id_allegato']; ?>" />
                                    <a href="">
                                    	<img src="immagini/info.png" alt="<?php echo $righe_query_allegato['titolo_allegato']; ?>" title="<?php echo $righe_query_allegato['titolo_allegato']; ?>" class="info_inserisci"/>
                                    </a>
                                </div>
                            	<div class="clear"></div>
                                <div class="immagine_interno">                                    
                                    <img src="<?php
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
										echo "<p>Nessuna allegato &egrave; stato ancora caricato .</p>";
										}
									
                                ?>
                      </fieldset><br />
                      
                                            
                        
                        <li>
							<input class="bt" name="inserisci" type="submit"  value="inserisci"/>
                            <input type="hidden" name="riferimento" value="produttore" />
                        </li><br /><br />
                        
                    </ul>
               
    	</div>
    </div>
    	 
</div>
