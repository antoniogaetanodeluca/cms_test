<?php 
	include("autorizzazione.php");
	include("config.php") ;  
	include("funzioni.php") ;
	$seleziona_associazioni_categoria = mysql_query ("SELECT associazione_categoria.*, categoria.* 
															FROM associazione_categoria
															JOIN categoria ON associazione_categoria.id_categoria = categoria.id_categoria
															WHERE associazione_categoria.id_prodotto = $id_prodotto");					
			        
	
	if(isset($_GET['id_prodotto'])) {
	
		$id_prodotto = $_GET['id_prodotto'] ;
		
		$elenca= "SELECT * FROM prodotto_multilingua WHERE id_prodotto = $id_prodotto" ;
			$risultato = mysql_query ($elenca) or die(mysql_error()) ;
			
			while ($row = mysql_fetch_array($risultato)) { 
				
			
	
?>

<div class="pgn-admin">
	<div class="struttura_tab">
    	<div class="titolo_tab">
        	
            <p class="nuova_news">Modifica un prodotto</p>
        </div>
       
      <div class="contenuto_tab"> 
        	<form name="inserisci_news" action="include/azione.php?azione=prodotto_modifica" method="post" class="validateform" enctype="multipart/form-data" id="form"><br />
                <fieldset class="nuova_news">
                    <legend class="nuova_news">Prodotto</legend>
                    <ul id="nuova_news">
                     
                      <fieldset class="field_set_interno">
                           <legend class="field_set_interno">Dettagli Prodotto</legend>                           
                        
                        
                        
                        <li>
                            <label class="clear-label">Titolo</label>
                            <input name="titolo" type="text" id="titolo"  class="required" value="<?php echo $row['titolo']; ?>"/>
                        </li><br />
                        
                        <?php 
							$id_categoria_associati = "";
							while ($righe_estrai_dati_categoria = mysql_fetch_array($estrai_dati_categoria)){ 
							$id_cat_associati[] = $righe_estrai_dati_categoria['id_categoria'];
							$id_categoria_associati = implode(",",$id_cat_associati);
						?>
                        <li>
                            <label class="clear-label">Sezione</label>                            
                            <input type="checkbox" name="check_sezione[]" value="fashion" class="tipologia_sezione" <?php if ($row['sezione'] =="fashion"){ ?> checked="checked" <?php } ?>><label>fashion</label>
                            <input type="checkbox" name="check_sezione[]" value="beauty" class="tipologia_sezione" <?php if ($row['sezione'] =="beauty"){ ?> checked="checked" <?php } ?>><label>beauty</label>
                            <input type="checkbox" name="check_sezione[]" value="still_life" class="tipologia_sezione"<?php if ($row['sezione'] =="still_life"){ ?> checked="checked" <?php } ?>><label>still life</label>
                            <input type="checkbox" name="check_sezione[]" value="food" class="tipologia_sezione"<?php if ($row['sezione'] =="food"){ ?> checked="checked" <?php } ?>><label>food</label>
                            <input type="checkbox" name="check_sezione[]" value="ambient" class="tipologia_sezione"<?php if ($row['sezione'] =="ambient"){ ?> checked="checked" <?php } ?>><label>ambient</label>
                            <input type="checkbox" name="check_sezione[]" value="paint" class="tipologia_sezione"<?php if ($row['sezione'] =="paint"){ ?> checked="checked" <?php } ?>><label>paint</label>
                             <input type="checkbox" name="check_sezione[]" value="portrait" class="tipologia_sezione"<?php if ($row['sezione'] =="portrait"){ ?> checked="checked" <?php } ?>><label>portrait</label>
                             <input type="checkbox" name="check_sezione[]" value="advertising" class="tipologia_sezione"<?php if ($row['sezione'] =="advertising"){ ?> checked="checked" <?php } ?>><label>advertising</label>
                        </li>
                        <br /><br />
                        
                                                
                          
                      </fieldset> 
                      
                       
                      <br />
                                              <label class="clear-label" style="width: 200px;">Descrizione</label> <br />
                        <textarea id="descrizione" name="descrizione" ><?php echo $row['descrizione']; ?></textarea>
                        
                   	  </li><br />
                      
                                          	
                     
                      
                        
                    <fieldset class="field_set_interno_galleria">
               		<legend class="field_set_interno_galleria" ><strong>Immagini</strong> - ( trascina le immagini per scegliere l'ordine di visualizzazione )</legend> 	
                    
                     <div class="sortable">
                     <?php                                 
                        $seleziona_associazione_immagini_tutte = mysql_query("SELECT associazione_immagini.*, immagini.*
                                                                                FROM associazione_immagini								
                                                                                JOIN immagini ON associazione_immagini.immagine_id = immagini.immagine_id 
                                                                                WHERE associazione_immagini.riferimento_id = '$id_prodotto' AND associazione_immagini.riferimento = 'prodotto'
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
                     
                    
                   
                    <div class="sortable">
                     <?php
                    if($id_img_associati != "") {
                        $eleneca_immagini_non_associate = mysql_query("SELECT * FROM immagini WHERE immagine_id NOT IN ($id_img_associati) ") or die(mysql_error());
                    } else {
                        $eleneca_immagini_non_associate = mysql_query("SELECT * FROM immagini") or die(mysql_error());
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
                    
                                         <li>
							<input class="bt" name="modifica" type="submit"  value="modifica"/>
					 	</li>
                        <li>
                            <input type="hidden" value="<?php echo $row['id_prodotto']; ?>" name="id_prodotto" id="id_prodotto" />
                            <input type="hidden" name="riferimento" value="prodotto" />
                     	</li>
                        <br />
                        
                    </ul>
                </fieldset>
                
                
                
                      
    	</div>
    </div>
    	 
</div>

<?php

	}}
	
?>