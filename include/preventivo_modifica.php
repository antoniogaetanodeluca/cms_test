<?php 
	include("config.php");
	include("autorizzazione.php");
	include("funzioni.php");
	if(isset($_GET['id_produttore'])){
		$id_produttore = $_GET['id_produttore'];
		$elenca_dati_produttore = mysql_query("SELECT * FROM produttore WHERE id_produttore = $id_produttore") or die(mysql_error());
		$risultato_elenca_dati_produttore = mysql_num_rows($elenca_dati_produttore);
		if($risultato_elenca_dati_produttore > 0){
			while ($riga_elenca_dati_produttore = mysql_fetch_array($elenca_dati_produttore)){		
?>

<div class="pgn-admin">
	<div class="struttura_tab">
    	<div class="titolo_tab">
        	
            <p class="nuova_news modifica">Stai modificando la scheda relativa a <strong><?php echo $riga_elenca_dati_produttore['ragione_sociale'];?></strong></p>
        </div>
       
       <div class="contenuto_tab"> 
        	<form name="inserisci_news" action="include/azione.php?azione=produttore_modifica" method="post" class="validateform" enctype="multipart/form-data">
                
                   
                    <ul id="nuova_news">
                     
                      <fieldset class="field_set_interno">
                           <legend class="field_set_interno" >Modifica valori esistenti ( i campi segnati in rosso sono obbligatori )</legend>                           
                                <li>
		                            <label class="clear-label">Nome</label>
		                            <input name="nome" type="text" id="nome"  class="required" value="<?php echo $riga_elenca_dati_produttore['nome']; ?>"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Cognome</label>
		                            <input name="cognome" type="text" id="cognome"  class="required" value="<?php echo $riga_elenca_dati_produttore['cognome']; ?>"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Ragione Sociale</label>
		                            <input name="ragione_sociale" type="text" id="ragione_sociale" value="<?php echo $riga_elenca_dati_produttore['ragione_sociale']; ?>"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Partita Iva</label>
		                            <input name="piva" type="text" id="piva" value="<?php echo $riga_elenca_dati_produttore['piva']; ?>"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Codice Fiscale</label>
		                            <input name="codice_fiscale" type="text" id="codice_fiscale" class="required" value="<?php echo $riga_elenca_dati_produttore['codice_fiscale']; ?>"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Indirizzo</label>
		                            <input name="indirizzo" type="text" id="indirizzo"  class="required" value="<?php echo $riga_elenca_dati_produttore['indirizzo']; ?>"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Citt&agrave;</label>
		                            <input name="citta" type="text" id="citta"  class="required" value="<?php echo $riga_elenca_dati_produttore['citta']; ?>"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Cap</label>
		                            <input name="cap" type="text" id="cap"  class="required" value="<?php echo $riga_elenca_dati_produttore['cap']; ?>"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Banca</label>
		                            <input name="banca" type="text" id="banca" value="<?php echo $riga_elenca_dati_produttore['banca']; ?>"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Iban</label>
		                            <input name="iban" type="text" id="iban" value="<?php echo $riga_elenca_dati_produttore['iban']; ?>"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Telefono</label>
		                            <input name="telefono" type="text" id="telefono" value="<?php echo $riga_elenca_dati_produttore['telefono']; ?>"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Fax</label>
		                            <input name="fax" type="text" id="fax" value="<?php echo $riga_elenca_dati_produttore['fax']; ?>"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Cellulare</label>
		                            <input name="cellulare" type="text" id="cellulare" class="required" value="<?php echo $riga_elenca_dati_produttore['cellulare']; ?>"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Email</label>
		                            <input name="email" type="text" id="email"  class="required" value="<?php echo $riga_elenca_dati_produttore['email']; ?>"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Email Pec</label>
		                            <input name="email_pec" type="text" id="email_pec" value="<?php echo $riga_elenca_dati_produttore['email_pec']; ?>"/>
		                        </li><br /><br />
		                        
		                        <li>
		                            <label class="clear-label">Sito Web</label>
		                            <input name="sito_web" type="text" id="sito_web" value="<?php echo $riga_elenca_dati_produttore['sito_web']; ?>"/>
		                        </li><br /><br />
                        
                                               
                       <li>
                        <label class="clear-label" style="width: 200px;">Note</label> <br /> <br />
                        <textarea id="note" name="note"><?php echo $riga_elenca_dati_produttore['note'];?></textarea>
                        
                   	  </li>
                   	  
                   	  <!-- Allegati -->
                
                <fieldset class="field_set_interno_galleria">
               		<legend class="field_set_interno_galleria" ><strong>Allegati</strong></legend> 	
                    
                     <div class="sortable">
                     <?php                                 
                        $seleziona_associazione_allegati_tutti = mysql_query("SELECT associazione_allegati.*, allegati.*
                                                                                FROM associazione_allegati								
                                                                                JOIN allegati ON associazione_allegati.id_allegato = allegati.id_allegato
                                                                                WHERE associazione_allegati.riferimento_id = '$id_produttore' 
																				AND associazione_allegati.riferimento = 'produttore'
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
                   
                   <fieldset class="field_set_interno_galleria">
               		<legend class="field_set_interno_galleria" ><strong>Immagini</strong></legend> 	
                    
                     <div id="sortable">
                     <?php                                 
                        $seleziona_associazione_immagini_tutte = mysql_query("SELECT associazione_immagini.*, immagini.*
                                                                                FROM associazione_immagini								
                                                                                JOIN immagini ON associazione_immagini.immagine_id = immagini.immagine_id 
                                                                                WHERE associazione_immagini.riferimento_id = '$id_produttore' AND associazione_immagini.riferimento = 'produttore'
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
                                <img src="<?php echo   $righe_immagini_associate['percorso_thumb']; ?>"  width="100" height="100" class="bordo"/>                                   		 </div>                                    
                            
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
                                <img src="<?php echo  $righe_immagini_non_associate['percorso_thumb']; ?>"  width="100" height="100" class="bordo"/>                                 		 </div>                                    
                            
                        </div> <!-- chiusura div immagine -->
                    <?php 
                        }
                    ?>
                    </div><!-- chiusura div sortable -->
                    </fieldset><br />
                   	  
                   	  <li>
							<input class="bt_modifica" name="modifica" type="submit"  value="modifica"/>
                            <input type="hidden" name="riferimento" value="produttore" />
                            <input type="hidden" name="id_produttore" value="<?php echo $riga_elenca_dati_produttore['id_produttore']; ?>" />
                        </li><br /><br /><br />
                        
                    </ul>
               
    	</div>
    </div>
    	 
</div>
<?php
	    }
	  } 		 
	} else {
		echo "Si &egrave; verificato un errore, contattare il supporto tecnico .";
	}
?>
