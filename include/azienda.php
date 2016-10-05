<?php 
	include("autorizzazione.php");
	include("config.php") ;  
	include("funzioni.php") ;
	$estrai_dati = mysql_query("SELECT * FROM azienda_multilingua") or die(mysql_error()) ;
	while ($row = mysql_fetch_array($estrai_dati)){	
	$id_azienda = $row['id_azinda'];	
?>

<div class="pgn-admin">
	<div class="struttura_tab">
    	<div class="titolo_tab">
        	
            <p class="nuova_news">Modifica Azienda </p>
        </div>
       
      <div class="contenuto_tab"> 
        	<form name="inserisci_news" action="include/azione.php?azione=azienda_modifica" method="post" class="validateform" enctype="multipart/form-data" id="form"><br />
                <fieldset class="nuova_news">
                    <legend class="nuova_news">Azienda</legend>
                    <ul id="nuova_news">
                     
                      <fieldset class="field_set_interno">
                           <legend class="field_set_interno">Azienda</legend>                           
                        
                        
                        
                        <li>
                            <label class="clear-label">Titolo</label>
                            <input name="titolo" type="text" id="titolo"  class="required" value="<?php echo $row['titolo']; ?>"/>
                        </li><br />
                        
                    
                          
                      </fieldset> 
                      
                       
                      <br />
                      <li>
                            <label class="clear-label">Anteprima</label> <br />
                            <textarea id="descrizione_breve" name="descrizione_breve" ><?php echo $row['descrizione_breve']; ?></textarea>
	                       </li><br />
                      <li>
                        <label class="clear-label" style="width: 200px;">Descrizione</label> <br />
                        <textarea id="descrizione" name="descrizione" ><?php echo $row['descrizione']; ?></textarea>
                        
                   	  </li><br />
                      
                                          	
                     
                      
                        
                    <fieldset class="field_set_interno_galleria">
               		<legend class="field_set_interno_galleria" >Trascina le foto per scegliere l'ordine di visualizzazione</legend> 	
                    
                     <div id="sortable">
                     <?php                                 
                        $id_azienda = $row['id_azienda']; 
						$seleziona_associazione_immagini_tutte = mysql_query("SELECT associazione_immagini.*, immagini.*
                                                                                FROM associazione_immagini								
                                                                                JOIN immagini ON associazione_immagini.immagine_id = immagini.immagine_id 
                                                                                WHERE associazione_immagini.riferimento_id = '$id_azienda' AND associazione_immagini.riferimento = 'agenzia'
																				ORDER BY ordine");
                        $id_img_associati = "";
                        while($righe_immagini_associate = mysql_fetch_array($seleziona_associazione_immagini_tutte) ){
                            $id_associati[] = $righe_immagini_associate['immagine_id'];
                            $id_img_associati = implode(",",$id_associati);								
                    ?> 
                        <div class="immagine">                                        
                            <div class="immagine_esterno">
                              <input type="checkbox" name="check_immagine[]" value="<?php echo $righe_immagini_associate['immagine_id']; ?>" checked="checked"/>                                           <a href="<?php echo '../' . $righe_immagini_associate['percorso_fullsize']; ?>" class="fancybox">
                                    <img src="immagini/cerca.png" class="cerca"/>
                               </a> 
                             </div>
                             <div class="immagine_interno">                                    
                                <img src="<?php echo '../' . $righe_immagini_associate['percorso_thumb']; ?>"  width="100" height="100" class="bordo"/>                                   		 </div>                                    
                            
                        </div> <!-- chiusura div immagine --> 
                    <?php
                    }
                    ?>  
                    </div><!-- chiusura div sortable -->
                     
                    
                   
                    <div id="sortable">
                     <?php
                    if($id_img_associati != "") {
                        $eleneca_immagini_non_associate = mysql_query("SELECT * FROM immagini WHERE immagine_id NOT IN ($id_img_associati) ") or die(mysql_error());
                    } else {
                        $eleneca_immagini_non_associate = mysql_query("SELECT * FROM immagini ") or die(mysql_error());
                    }
                    while($righe_immagini_non_associate = mysql_fetch_array($eleneca_immagini_non_associate)){
                    ?>
                        <div class="immagine">
                            
                            <div class="immagine_esterno">
                            
                              <input type="checkbox" name="check_immagine[]" value="<?php echo $righe_immagini_non_associate['immagine_id']; ?>" />                                           <a href="<?php echo '../' . $righe_immagini_non_associate['percorso_fullsize']; ?>" class="fancybox">
                                    <img src="immagini/cerca.png" class="cerca"/>
                               </a> 
                             </div>
                             
                             <div class="immagine_interno">                                    
                                <img src="<?php echo '../' . $righe_immagini_non_associate['percorso_thumb']; ?>"  width="100" height="100" class="bordo"/>                                 		 </div>                                    
                            
                        </div> <!-- chiusura div immagine -->
                    <?php 
                        }
                    ?>
                    </div><!-- chiusura div sortable -->
                    </fieldset><br />
                    
                    
                    <!-- Allegati -->
                
                <fieldset class="field_set_interno_galleria">
               		<legend class="field_set_interno_galleria" ><strong>Allegati</strong> - ( trascina gli allegati per scegliere l'ordine di visualizzazione )</legend> 	
                    
                     <div class="sortable">
                     <?php                                 
                        $seleziona_associazione_allegati_tutti = mysql_query("SELECT associazione_allegati.*, allegati.*
                                                                                FROM associazione_allegati								
                                                                                JOIN allegati ON associazione_allegati.id_allegato = allegati.id_allegato
                                                                                WHERE associazione_allegati.riferimento_id = '$id_azienda' 
																				AND associazione_allegati.riferimento = 'agenzia'
																				ORDER BY ordine");
                        $id_allegati_associati = "";
                        while($righe_allegati_associati = mysql_fetch_array($seleziona_associazione_allegati_tutti) ){
                            $id_associati_array[] = $righe_allegati_associati['id_allegato'];
                            $id_allegati_associati = implode(",",$id_associati_array);
							$estensione = $righe_allegati_associati['estensione'];								
                    ?> 
                        <div class="immagine">                                        
                            <div class="immagine_esterno">
                            	<input type="checkbox" name="check_allegato[]" value="<?php echo $righe_allegati_associati['id_allegato']; ?>" checked="checked"/>                            </div>
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
                            
                        </div> <!-- chiusura div immagine --> 
                    <?php
                    }
                    ?>  
                    </div><!-- chiusura div sortable -->
                     
                    
                   
                    <div class="sortable">
                     <?php
                    if($id_allegati_associati != "") {
                        $eleneca_allegati_non_associati = mysql_query("SELECT * FROM allegati WHERE id_allegato NOT IN ($id_allegati_associati) ") or die(mysql_error());
                    } else {
                        $eleneca_allegati_non_associati = mysql_query("SELECT * FROM allegati") or die(mysql_error());
                    }
                    while($righe_allegati_non_associati = mysql_fetch_array($eleneca_allegati_non_associati)){
                    $estensione = $righe_allegati_non_associati['estensione'];	
					?>
                        <div class="immagine">
                            
                            <div class="immagine_esterno">
                            	<input type="checkbox" name="check_allegato[]" value="<?php echo $righe_allegati_non_associati['id_allegato']; ?>" />                             
                            </div>
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
											?>"  width="100" height="100" class="bordo"/>
                            </div>                                    
                            
                        </div> <!-- chiusura div immagine -->
                    <?php 
                        }
                    ?>
                    </div><!-- chiusura div sortable -->
                    
                    </fieldset><br />
                   <!-- fine allegati -->

                    
                    
                    
                      <li>
							<input class="bt" name="modifica" type="submit"  value="modifica"/>
					 	</li>
                        <li>
                            <input type="hidden" value="<?php echo $id_azienda; ?>" name="id_azienda" id="id_azienda" />
                            <input type="hidden" name="riferimento" value="agenzia" />
                     	</li>
                        <br />
                        
                    </ul>
                </fieldset>
    	</div>
    </div>
    	 
</div>

<?php

	}
	
?>