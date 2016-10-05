<?php 
	include("config.php");
	include("autorizzazione.php");
	include("funzioni.php");
	$elenca_produttore = mysql_query("SELECT * FROM produttore") or die(mysql_error());
	$totale_elenca_produttore = mysql_num_rows($elenca_produttore);
	$elenca_cliente = mysql_query("SELECT * FROM cliente") or die(mysql_error());
	$totale_record_cliente = mysql_num_rows($elenca_cliente);
	$elenca_numero_preventivo = mysql_query("SELECT numero_preventivo FROM preventivo") or die(mysql_error());
	$totale_record_preventivo = mysql_num_rows($elenca_numero_preventivo);
?>

<div class="pgn-admin">
	<div class="struttura_tab">
    	<div class="titolo_tab">
        	
            <p class="nuova_news">Inserisci un nuovo <strong>preventivo</strong></p>
        </div>
       
       <div class="contenuto_tab"> 
        	<form name="inserisci_news" action="include/azione.php?azione=preventivo_inserisci" method="post" class="validateform" enctype="multipart/form-data">
                
                   
                    <ul id="nuova_news">
                     
                      <fieldset class="field_set_interno">
                           <legend class="field_set_interno" >Nuovo Inserimento ( i campi segnati in rosso sono obbligatori, i prezzi si intendono IVA esclusa )</legend>                           
                            
	                        
	                        <li>
	                            <label class="clear-label">Nr. Preventivo</label>
	                            <?php
	                            	if ($totale_record_preventivo > 0){
		                            	while ($righe_numero_preventivo = mysql_fetch_array($elenca_numero_preventivo)){ 
		                            		$numero_preventivo = $righe_numero_preventivo['numero_preventivo'];
		                            		$numero_preventivo = $numero_preventivo + 1;
		                            	}
		                            	                            		
		                        ?>
	                            <input name="numero_preventivo" type="text" id="numero_preventivo" value="<?php echo $numero_preventivo;?>" readonly=""/>
	                            <?php
	                              	} else {
	                              		$numero_preventivo = 1;		                            	
	                            ?>
	                            <input name="numero_preventivo" type="text" id="numero_preventivo" value="<?php echo $numero_preventivo;?>" readonly=""/>
	                            <?php 
	                            	} 
	                            ?>
	                        </li><br /><br />
	                        
	                        <li>
	                            <label class="clear-label">Tipologia</label>
	                            <select name="montaggio">
	                            	<option value="">scegli ...</option>
	                            	<option value="noleggio">noleggio</option>
	                            	<option value="vendita">vendita</option>
	                            	<option value="noleggio_con_riscatto">noleggio con riscatto</option>
	                            </select>
	                        </li>
                            
	                        
	                        <li>
	                            <label class="clear-label">Produttore</label>
	                            <select name="produttore">
	                            	<option value="">scegli ...</option>
	                            	<?php 
	                            		while ($righe_elenca_produttore = mysql_fetch_array($elenca_produttore)){
	                            	?>
	                            	<option value="<?php echo $righe_elenca_produttore['id_produttore']; ?>">
	                            		<?php echo $righe_elenca_produttore['ragione_sociale']; ?>
	                            	</option>
	                            	<?php
	                            		}
	                            	?>
	                            </select>
	                        </li>
	                        
	                        <li>
	                            <label class="clear-label">Qt. Prodotto</label>
	                            <input name="quantita" type="text" id="quantita" class="small"/>
	                            <div class="slider3"></div>
	                        </li><br />                            
                            <li>
	                            <label class="clear-label">Produttore</label>
	                            <select name="produttore">
	                            	<option value="">scegli ...</option>
	                            	<?php 
	                            		while ($righe_elenca_produttore = mysql_fetch_array($elenca_produttore)){
	                            	?>
	                            	<option value="<?php echo $righe_elenca_produttore['id_produttore']; ?>">
	                            		<?php echo $righe_elenca_produttore['ragione_sociale']; ?>
	                            	</option>
	                            	<?php
	                            		}
	                            	?>
	                            </select>
	                        </li>
	                        
	                        <li>
	                            <label class="clear-label">Cliente</label>
	                            <select name="produttore">
	                            	<option value="">scegli ...</option>
	                            	<?php 
	                            		while ($righe_elenca_cliente = mysql_fetch_array($elenca_cliente)){
	                            	?>
	                            	<option value="<?php echo $righe_elenca_cliente['id_cliente']; ?>">
	                            		<?php echo $righe_elenca_cliente['ragione_sociale']; ?>
	                            	</option>
	                            	<?php
	                            		}
	                            	?>
	                            </select>
	                        </li>
	                        
	                        <li>
	                            <label class="clear-label">Data Preventivo</label>
	                            <input name="data" type="text" id="data" class="datepicker"/>
	                        </li><br /><br />
	                        
	                        <li>
	                            <label class="clear-label">Qt. Mesi</label>
	                            <input name="mesi" type="text" id="mesi" class="small"/>
	                            <div class="slider1"></div>
	                        </li><br />
	                        
	                        <li>
	                            <label class="clear-label">Qt. Giorni</label>
	                            <input name="giorni" type="text" id="giorni" class="small"/>
	                            <div class="slider2"></div>
	                        </li><br />
	                        
	                        <li>
	                            <label class="clear-label">nolo/mese</label>
	                            <input name="noleggio_mese" type="text" id="noleggio_mese"  class="required small"/><label>Euro</label>
	                        </li><br /><br />
	                        
	                        <li>
	                            <label class="clear-label">nolo/giorno +/-</label>
	                            <input name="noleggio_giorno" type="text" id="noleggio_giorno"  class="required small"/><label>Euro</label>
	                        </li><br /><br />
	                        
	                        <li>
	                            <label class="clear-label">Consegna</label>
	                            <input name="consegna" type="text" id="consegna"  class="small"/><label> (n. settimane)</label>
	                        </li><br /><br />
	                        
	                        <li>
	                            <label class="clear-label">Resa</label>
	                            <input name="resa" type="text" id="resa"/>
	                        </li><br /><br />
	                        
	                        <li>
	                            <label class="clear-label">Montaggio</label>
	                            <select name="montaggio">
	                            	<option value="">scegli ...</option>
	                            	<option value="incluso">incluso</option>
	                            	<option value="escluso">escluso</option>
	                            </select>
	                        </li>
	                        
	                        <li>
	                            <label class="clear-label">Pagamento</label>
	                            <select name="pagamento">
	                            	<option value="">scegli ...</option>
	                            	<option value="rd">R.D.</option>
	                            	<option value="leasing">leasing</option>
	                            	<option value="ricevuta_bancaria">ricevuta bancaria</option>
	                            </select>
	                        </li>
	                        
	                        
	                        <li>
		                        <label class="clear-label" style="width: 200px;">Oggetto</label> <br /> <br />
		                        <textarea id="note" name="note" ></textarea>                        
	                        </li>
                        <li>
							<input class="bt" name="inserisci" type="submit"  value="inserisci"/>
                            <input type="hidden" name="riferimento" value="produttore" />
                        </li><br /><br /><br />
                        
                    </ul>
               
    	</div>
    </div>
    	 
</div>
