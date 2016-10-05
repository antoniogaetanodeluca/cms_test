<?php 
	
	include("config.php") ;  
	include("funzioni.php") ;
	include("meta.php") ;
	//include("jquery.php") ;
	//include("SmartImage.class.php");
    include 'wideimage/WideImage.php';

					
			
		 	switch ($_GET['azione']) {
				
					
			/* ########################################### AGGIORNA CLIENTE ##################################################### */	
	
			case "cliente_modifica" :
			
				if(isset($_POST['modifica']) && ($_POST['modifica'] == 'modifica')  ){
						/* $inserisci_associazione_immagini = ""; */
						$id_cliente = mysql_real_escape_string($_POST['id_cliente']);
						$riferimento = mysql_real_escape_string($_POST['riferimento']);
						$nome = mysql_real_escape_string($_POST['nome']);
						$cognome = mysql_real_escape_string($_POST['cognome']);
						$ragione_sociale = mysql_real_escape_string($_POST['ragione_sociale']);
						$indirizzo = mysql_real_escape_string($_POST['indirizzo']);
						$citta = mysql_real_escape_string($_POST['citta']);
						$cap = mysql_real_escape_string($_POST['cap']);
						$piva = mysql_real_escape_string($_POST['piva']);
						$banca = mysql_real_escape_string($_POST['banca']);
						$iban = mysql_real_escape_string($_POST['iban']);
						$codice_fiscale = mysql_real_escape_string($_POST['codice_fiscale']);
						$telefono = mysql_real_escape_string($_POST['telefono']);
						$fax = mysql_real_escape_string($_POST['fax']);
						$cellulare = mysql_real_escape_string($_POST['cellulare']);				
						$email = mysql_real_escape_string($_POST['email']);
						$email_pec = mysql_real_escape_string($_POST['email_pec']);
						$sito_web = mysql_real_escape_string($_POST['sito_web']);
						$note = mysql_real_escape_string($_POST['note']);					
						$query_aggiorna = mysql_query("UPDATE cliente SET 
															nome = '$nome',
															cognome = '$cognome',
															ragione_sociale = '$ragione_sociale',
															indirizzo = '$indirizzo',
															citta = '$citta',
															cap = '$cap',
															piva = '$piva',
															banca = '$banca',
															iban = '$iban',
															codice_fiscale = '$codice_fiscale',
															telefono = '$telefono',
															fax = '$fax',
															cellulare = '$cellulare',
															email = '$email',
															email_pec = '$email_pec',
															sito_web = '$sito_web',
															note = '$note'															
														WHERE id_cliente = id_cliente" ) or die (mysql_error());
						
						/*
$cancella_associazione_categoria = mysql_query("DELETE FROM associazione_categoria WHERE id_prodotto = '$id_prodotto'") 
															or die (mysql_error());
						
						if (isset($check_sezione)) {
							$check_sezione = ($_POST['check_sezione']);
							for ($j=0; $j < count($_POST['check_sezione']); $j++) {
								$associazione_check_sezione = $_POST['check_sezione'][$j];						
								$inserisci_associazione_sezioni = mysql_query("INSERT INTO associazione_categoria (id_prodotto, id_categoria)
																			VALUES ('$id_prodotto','$associazione_check_sezione')") 
																	or die(mysql_error());
							}
						}
*/
						
						
							
						
							// se ho modificato un'associazione immagine esistente
							/*
$cancella_associazione_immagini = mysql_query("DELETE FROM associazione_immagini WHERE riferimento = '$riferimento' 
																			AND riferimento_id = '$id_prodotto'") or die (mysql_error());
						
							if (isset($_POST['check_immagine'])  ){
									$check_immagine = $_POST['check_immagine']; 
									for ($i=0; $i < count($check_immagine); $i++) {									
										$associazione_immagine_check = $_POST['check_immagine'][$i];
										$ordine = $i+1;
										$inserisci_associazione_immagini = mysql_query("INSERT INTO associazione_immagini (immagine_id, riferimento, riferimento_id, ordine)			
																				VALUES ('$associazione_immagine_check', '$riferimento', '$id_prodotto', '$ordine' )") 
																				or die(mysql_error());
										
									} 
								
								} else {
									$inserisci_associazione_immagini = "ok";
							}
*/
						
						// se ho modificato un'associazione allegato esistente
						$cancella_associazione_allegati = mysql_query("DELETE FROM associazione_allegati WHERE riferimento = '$riferimento' 
																		AND riferimento_id = '$id_cliente'") or die (mysql_error());
						if (isset($_POST['check_allegato'])  ){
								$check_allegato = $_POST['check_allegato']; 
								for ($j=0; $j < count($check_allegato); $j++) {									
									$associazione_allegato_check = $_POST['check_allegato'][$j];
									$ordine = $j+1;
									$inserisci_associazione_allegati = mysql_query("INSERT INTO associazione_allegati (id_allegato, riferimento, riferimento_id, ordine)			
																			VALUES ('$associazione_allegato_check', '$riferimento', '$id_cliente', '$ordine' )") 
																			or die(mysql_error());
								} 
							
							} else {
								$inserisci_associazione_allegati = "ok";
						
							
						}
						
						
						if ($query_aggiorna){
							echo " 
						<script>
  							$(document).ready(function() {
   							  $( \"#finestra\" ).dialog( {
									draggable : false, 
									width : 400,
									minHeight: 200,
									resizable : false,
									title : 'Attenzione',
										buttons: {
											\"OK\" : function() {
												window.open(\"../index.php?page=cliente_elenco\", \"_self\");
												}
										}
								} );
							 });
  						</script>

						<div id=\"finestra\"><p>Operazione effettuata con successo .</p></div>
					" ;	
					
									
					break ;
				} else { 
					echo " 
						
						<script>
  							$(document).ready(function() {
   							  $( \"#finestra\" ).dialog( {
									draggable : false, 
									width : 400,
									minHeight: 200,
									resizable : false,
									title : 'Attenzione',
										buttons: {
											\"OK\" : function() {
												window.open(\"../index.php?page=cliente_elenco\", \"_self\");
}
										}
									
									
								} );
								
								
							 });
  						</script>

						<div id=\"finestra\"><p><span class=\"ui-icon ui-icon-alert\"></span>Hai compilato tutti i campi correttamente, ma il sistema ha rilevato un errore, riprova .</p></div>
						
						" ;		
						
				}
				
				}
					
					break;	
				
			/* ########################################### INSERISCI CLIENTE ##################################################### */	
	
					case "cliente_inserisci" :
					
					if (isset($_POST['inserisci']) && ($_POST['inserisci'] == 'inserisci')){ 
					
						$riferimento = mysql_real_escape_string($_POST['riferimento']);
						$nome = mysql_real_escape_string($_POST['nome']);
						$cognome = mysql_real_escape_string($_POST['cognome']);
						$ragione_sociale = mysql_real_escape_string($_POST['ragione_sociale']);
						$indirizzo = mysql_real_escape_string($_POST['indirizzo']);
						$citta = mysql_real_escape_string($_POST['citta']);
						$cap = mysql_real_escape_string($_POST['cap']);
						$piva = mysql_real_escape_string($_POST['piva']);
						$banca = mysql_real_escape_string($_POST['banca']);
						$iban = mysql_real_escape_string($_POST['iban']);
						$codice_fiscale = mysql_real_escape_string($_POST['codice_fiscale']);
						$telefono = mysql_real_escape_string($_POST['telefono']);
						$fax = mysql_real_escape_string($_POST['fax']);
						$cellulare = mysql_real_escape_string($_POST['cellulare']);				
						$email = mysql_real_escape_string($_POST['email']);
						$email_pec = mysql_real_escape_string($_POST['email_pec']);
						$sito_web = mysql_real_escape_string($_POST['sito_web']);
						$note = mysql_real_escape_string($_POST['note']);
						
						$query_inserisci = mysql_query("INSERT INTO cliente (nome, cognome, ragione_sociale, indirizzo, citta, cap, piva, banca, iban, codice_fiscale, telefono, fax, cellulare, email, email_pec, sito_web, note) 
														VALUES (
															'$nome',
															'$cognome',
															'$ragione_sociale',
															'$indirizzo',
															'$citta',
															'$cap',
															'$piva',
															'$banca',
															'$iban',
															'$codice_fiscale',
															'$telefono',
															'$fax',
															'$cellulare',
															'$email',
															'$email_pec',
															'$sito_web',
															'$note') ") or die (mysql_error());
							
						
						$ultimo_id_cliente = mysql_insert_id();
						$codice_cliente = 'CL' . $ultimo_id_cliente;
						$query_aggiorna = mysql_query("UPDATE cliente SET codice_cliente = '$codice_cliente' WHERE id_cliente = $ultimo_id_cliente") or die(mysql_error());
						// inserisco associazione allegati-cliente
										
						if (isset($_POST['check_allegato'])  ){
								$check_allegato = $_POST['check_allegato']; 
								for ($j=0; $j < count($check_allegato); $j++) {									
									$associazione_allegato_check = $_POST['check_allegato'][$j];
									$ordine = $j+1;
									$inserisci_associazione_allegati = mysql_query("INSERT INTO associazione_allegati (id_allegato, riferimento, riferimento_id, ordine)			
																			VALUES ('$associazione_allegato_check', '$riferimento', '$id_cliente', '$ordine' )") 
																			or die(mysql_error());
								} 
							
							} else {
								$inserisci_associazione_allegati = "ok";						
						}
						
						if(($query_inserisci) && ($query_aggiorna)){
								
						echo " 
						<script>
  							$(document).ready(function() {
   							  $( \"#finestra\" ).dialog( {
									draggable : false, 
									width : 400,
									minHeight: 200,
									resizable : false,
									title : 'Attenzione',
										buttons: {
											\"OK\" : function() {
												window.open(\"../index.php?page=cliente_elenco\", \"_self\");
												}
										}
								} );
							 });
  						</script>

						<div id=\"finestra\"><p>Operazione effettuata con successo .</p></div>
					" ;	
					
									
					break ;
				} else { 
					echo " 
						
						<script>
  							$(document).ready(function() {
   							  $( \"#finestra\" ).dialog( {
									draggable : false, 
									width : 400,
									minHeight: 200,
									resizable : false,
									title : 'Attenzione',
										buttons: {
											\"OK\" : function() {
												window.open(\"../index.php?page=cliente_elenco\", \"_self\");
}
										}
									
									
								} );
								
								
							 });
  						</script>

						<div id=\"finestra\"><p><span class=\"ui-icon ui-icon-alert\"></span>Hai compilato tutti i campi correttamente, ma il sistema ha rilevato un errore, riprova .</p></div>
						
						" ;		
						
				}
				}
				
					
					break;
			
			
					
			/* ########################################### CANCELLA CLIENTE ##################################################### */	
			case "cliente_cancella" :
				
	
    			if (isset($_GET['id_cliente'])  && (is_numeric($_GET['id_cliente']))) {
	
				$id_cliente = mysql_real_escape_string($_GET['id_cliente']) ;			
				
				
					$query_cancella = mysql_query("DELETE FROM cliente WHERE id_cliente = '$id_cliente' ") or die (mysql_error()) ;
							
					echo " 
						<script>
  							$(document).ready(function() {
   							  $( \"#finestra\" ).dialog( {
									draggable : false, 
									width : 400,
									minHeight: 200,
									resizable : false,
									title : 'Attenzione',
										buttons: {
											\"OK\" : function() {
												window.open(\"../index.php?page=cliente_elenco\", \"_self\");
												}
										}
								} );
							 });
  						</script>

						<div id=\"finestra\"><p>Operazione effettuata con successo .</p></div>
					" ;	
					
									
					break ;
				} else { 
					echo " 
						
						<script>
  							$(document).ready(function() {
   							  $( \"#finestra\" ).dialog( {
									draggable : false, 
									width : 400,
									minHeight: 200,
									resizable : false,
									title : 'Attenzione',
										buttons: {
											\"OK\" : function() {
												window.open(\"../index.php?page=cliente_elenco\", \"_self\");
}
										}
									
									
								} );
								
								
							 });
  						</script>

						<div id=\"finestra\"><p><span class=\"ui-icon ui-icon-alert\"></span>Hai compilato tutti i campi correttamente, ma il sistema ha rilevato un errore, riprova .</p></div>
						
						" ;		
						
				}
				
				
					
					break;
					
			
			
		
		/* ########################################### INSERISCI PRODUTTORE ##################################################### */	
	
					case "produttore_inserisci" :
					
					if (isset($_POST['inserisci']) && ($_POST['inserisci'] == 'inserisci')){ 
					
						$riferimento = mysql_real_escape_string($_POST['riferimento']);
						$nome = mysql_real_escape_string($_POST['nome']);
						$cognome = mysql_real_escape_string($_POST['cognome']);
						$ragione_sociale = mysql_real_escape_string($_POST['ragione_sociale']);
						$indirizzo = mysql_real_escape_string($_POST['indirizzo']);
						$citta = mysql_real_escape_string($_POST['citta']);
						$cap = mysql_real_escape_string($_POST['cap']);
						$piva = mysql_real_escape_string($_POST['piva']);
						$banca = mysql_real_escape_string($_POST['banca']);
						$iban = mysql_real_escape_string($_POST['iban']);
						$codice_fiscale = mysql_real_escape_string($_POST['codice_fiscale']);
						$telefono = mysql_real_escape_string($_POST['telefono']);
						$fax = mysql_real_escape_string($_POST['fax']);
						$cellulare = mysql_real_escape_string($_POST['cellulare']);				
						$email = mysql_real_escape_string($_POST['email']);
						$email_pec = mysql_real_escape_string($_POST['email_pec']);
						$sito_web = mysql_real_escape_string($_POST['sito_web']);
						$note = mysql_real_escape_string($_POST['note']);
						
						$query_inserisci = mysql_query("INSERT INTO produttore (nome, cognome, ragione_sociale, indirizzo, citta, cap, piva, banca, iban, codice_fiscale, telefono, fax, cellulare, email, email_pec, sito_web, note) 
														VALUES (
															'$nome',
															'$cognome',
															'$ragione_sociale',
															'$indirizzo',
															'$citta',
															'$cap',
															'$piva',
															'$banca',
															'$iban',
															'$codice_fiscale',
															'$telefono',
															'$fax',
															'$cellulare',
															'$email',
															'$email_pec',
															'$sito_web',
															'$note') ") or die (mysql_error());
							
						// modifico il codice produttore aggiungendo all'id la stringa PR
						$ultimo_id_produttore = mysql_insert_id();
						$codice_produttore = 'PR' . $ultimo_id_produttore;
						$query_aggiorna = mysql_query("UPDATE produttore SET codice_produttore = '$codice_produttore' WHERE id_produttore = $ultimo_id_produttore") 
							or die(mysql_error());
						
						// associo le immagini al produttore
						if (isset($check_immagine)) {
							$check_immagine = $_POST['check_immagine'];
							for ($i=0; $i < count($_POST['check_immagine']); $i++) {
								$associazione_immagine_check = $_POST['check_immagine'][$i];
								$inserisci_associazione_immagini = mysql_query("INSERT INTO associazione_immagini (immagine_id, riferimento, riferimento_id)																		VALUES ('$associazione_immagine_check', '$riferimento', '$ultimo_id_produttore')") 
																		or die(mysql_error());
							}
						}
						
						// associo gli allegati al produttore
						if (isset($check_allegato)) {
							$check_allegato = $_POST['check_allegato'];
							for ($j=0; $j < count($_POST['check_allegato']); $j++) {
								$associazione_allegato_check = $_POST['check_immagine'][$i];
								$inserisci_associazione_allegato = mysql_query("INSERT INTO associazione_allegato (id_allegato, riferimento, riferimento_id)																		VALUES ('$associazione_allegato_check', '$riferimento', '$ultimo_id_produttore')") 
																		or die(mysql_error());
							}
						}
						
						if(($query_inserisci) && ($query_aggiorna)){
								
						echo " 
						<script>
  							$(document).ready(function() {
   							  $( \"#finestra\" ).dialog( {
									draggable : false, 
									width : 400,
									minHeight: 200,
									resizable : false,
									title : 'Attenzione',
										buttons: {
											\"OK\" : function() {
												window.open(\"../index.php?page=produttore_elenco\", \"_self\");
												}
										}
								} );
							 });
  						</script>

						<div id=\"finestra\"><p>Operazione effettuata con successo .</p></div>
					" ;	
					
									
					break ;
				} else { 
					echo " 
						
						<script>
  							$(document).ready(function() {
   							  $( \"#finestra\" ).dialog( {
									draggable : false, 
									width : 400,
									minHeight: 200,
									resizable : false,
									title : 'Attenzione',
										buttons: {
											\"OK\" : function() {
												window.open(\"../index.php?page=produttore_elenco\", \"_self\");
}
										}
									
									
								} );
								
								
							 });
  						</script>

						<div id=\"finestra\"><p><span class=\"ui-icon ui-icon-alert\"></span>Hai compilato tutti i campi correttamente, ma il sistema ha rilevato un errore, riprova .</p></div>
						
						" ;		
						
				}
				}
				
					
					break;
					
			/* ########################################### AGGIORNA PRODUTTORE ##################################################### */	
	
			case "produttore_modifica" :
			
				if(isset($_POST['modifica']) && ($_POST['modifica'] == 'modifica')  ){
						/* $inserisci_associazione_immagini = ""; */
						$id_produttore = mysql_real_escape_string($_POST['id_produttore']);
						$riferimento = mysql_real_escape_string($_POST['riferimento']);
						$nome = mysql_real_escape_string($_POST['nome']);
						$cognome = mysql_real_escape_string($_POST['cognome']);
						$ragione_sociale = mysql_real_escape_string($_POST['ragione_sociale']);
						$indirizzo = mysql_real_escape_string($_POST['indirizzo']);
						$citta = mysql_real_escape_string($_POST['citta']);
						$cap = mysql_real_escape_string($_POST['cap']);
						$piva = mysql_real_escape_string($_POST['piva']);
						$banca = mysql_real_escape_string($_POST['banca']);
						$iban = mysql_real_escape_string($_POST['iban']);
						$codice_fiscale = mysql_real_escape_string($_POST['codice_fiscale']);
						$telefono = mysql_real_escape_string($_POST['telefono']);
						$fax = mysql_real_escape_string($_POST['fax']);
						$cellulare = mysql_real_escape_string($_POST['cellulare']);				
						$email = mysql_real_escape_string($_POST['email']);
						$email_pec = mysql_real_escape_string($_POST['email_pec']);
						$sito_web = mysql_real_escape_string($_POST['sito_web']);
						$note = mysql_real_escape_string($_POST['note']);					
						$query_aggiorna = mysql_query("UPDATE produttore SET 
															nome = '$nome',
															cognome = '$cognome',
															ragione_sociale = '$ragione_sociale',
															indirizzo = '$indirizzo',
															citta = '$citta',
															cap = '$cap',
															piva = '$piva',
															banca = '$banca',
															iban = '$iban',
															codice_fiscale = '$codice_fiscale',
															telefono = '$telefono',
															fax = '$fax',
															cellulare = '$cellulare',
															email = '$email',
															email_pec = '$email_pec',
															sito_web = '$sito_web',
															note = '$note'															
														WHERE id_produttore = $id_produttore" ) or die (mysql_error());
						
						/*
$cancella_associazione_categoria = mysql_query("DELETE FROM associazione_categoria WHERE id_prodotto = '$id_prodotto'") 
															or die (mysql_error());
						
						if (isset($check_sezione)) {
							$check_sezione = ($_POST['check_sezione']);
							for ($j=0; $j < count($_POST['check_sezione']); $j++) {
								$associazione_check_sezione = $_POST['check_sezione'][$j];						
								$inserisci_associazione_sezioni = mysql_query("INSERT INTO associazione_categoria (id_prodotto, id_categoria)
																			VALUES ('$id_prodotto','$associazione_check_sezione')") 
																	or die(mysql_error());
							}
						}
*/
						
						
							
						
							// se ho modificato un'associazione immagine esistente
							
						$cancella_associazione_immagini = mysql_query("DELETE FROM associazione_immagini WHERE riferimento = '$riferimento' 
																			AND riferimento_id = '$id_produttore'") or die (mysql_error());
						
						if (isset($_POST['check_immagine'])  ){
								$check_immagine = $_POST['check_immagine']; 
								for ($i=0; $i < count($check_immagine); $i++) {									
									$associazione_immagine_check = $_POST['check_immagine'][$i];
									$ordine = $i+1;
									$inserisci_associazione_immagini = mysql_query("INSERT INTO associazione_immagini (immagine_id, riferimento, riferimento_id, ordine)			
																		VALUES ('$associazione_immagine_check', '$riferimento', '$id_produttore', '$ordine' )") 
																		or die(mysql_error());
									
								} 
							
							} else {
								$inserisci_associazione_immagini = "ok";
						}

						
						// se ho modificato un'associazione allegato esistente
						$cancella_associazione_allegati = mysql_query("DELETE FROM associazione_allegati WHERE riferimento = '$riferimento' 
																		AND riferimento_id = '$id_produttore'") or die (mysql_error());
						if (isset($_POST['check_allegato'])  ){
								$check_allegato = $_POST['check_allegato']; 
								for ($j=0; $j < count($check_allegato); $j++) {									
									$associazione_allegato_check = $_POST['check_allegato'][$j];
									$ordine = $j+1;
									$inserisci_associazione_allegati = mysql_query("INSERT INTO associazione_allegati (id_allegato, riferimento, riferimento_id, ordine)			
																		VALUES ('$associazione_allegato_check', '$riferimento', '$id_produttore', '$ordine' )") 
																		or die(mysql_error());
								} 
							
							} else {
								$inserisci_associazione_allegati = "ok";
						
							
						}
						
						
						if ($query_aggiorna){
							echo " 
						<script>
  							$(document).ready(function() {
   							  $( \"#finestra\" ).dialog( {
									draggable : false, 
									width : 400,
									minHeight: 200,
									resizable : false,
									title : 'Attenzione',
										buttons: {
											\"OK\" : function() {
												window.open(\"../index.php?page=produttore_elenco\", \"_self\");
												}
										}
								} );
							 });
  						</script>

						<div id=\"finestra\"><p>Operazione effettuata con successo .</p></div>
					" ;	
					
									
					break ;
				} else { 
					echo " 
						
						<script>
  							$(document).ready(function() {
   							  $( \"#finestra\" ).dialog( {
									draggable : false, 
									width : 400,
									minHeight: 200,
									resizable : false,
									title : 'Attenzione',
										buttons: {
											\"OK\" : function() {
												window.open(\"../index.php?page=produttore_elenco\", \"_self\");
}
										}
									
									
								} );
								
								
							 });
  						</script>

						<div id=\"finestra\"><p><span class=\"ui-icon ui-icon-alert\"></span>Hai compilato tutti i campi correttamente, ma il sistema ha rilevato un errore, riprova .</p></div>
						
						" ;		
						
				}
				
				}
					
					break;
					
		/* ########################################### CANCELLA PRODUTTORE ##################################################### */	
			case "produttore_cancella" :
				
	
    			if (isset($_GET['id_produttore'])  && (is_numeric($_GET['id_produttore']))) {
	
				$id_produttore = mysql_real_escape_string($_GET['id_produttore']) ;			
				
				
					$query_cancella = mysql_query("DELETE FROM produttore WHERE id_cliente = '$id_produttore' ") or die (mysql_error()) ;
							
					echo " 
						<script>
  							$(document).ready(function() {
   							  $( \"#finestra\" ).dialog( {
									draggable : false, 
									width : 400,
									minHeight: 200,
									resizable : false,
									title : 'Attenzione',
										buttons: {
											\"OK\" : function() {
												window.open(\"../index.php?page=produttore_elenco\", \"_self\");
												}
										}
								} );
							 });
  						</script>

						<div id=\"finestra\"><p>Operazione effettuata con successo .</p></div>
					" ;	
					
									
					break ;
				} else { 
					echo " 
						
						<script>
  							$(document).ready(function() {
   							  $( \"#finestra\" ).dialog( {
									draggable : false, 
									width : 400,
									minHeight: 200,
									resizable : false,
									title : 'Attenzione',
										buttons: {
											\"OK\" : function() {
												window.open(\"../index.php?page=produttore_elenco\", \"_self\");
}
										}
									
									
								} );
								
								
							 });
  						</script>

						<div id=\"finestra\"><p><span class=\"ui-icon ui-icon-alert\"></span>Hai compilato tutti i campi correttamente, ma il sistema ha rilevato un errore, riprova .</p></div>
						
						" ;		
						
				}
				
				
					
					break;
					
		/* ########################################### INSERISCI NOTA ##################################################### */	
	
					case "nota_inserisci" :
					
					if (isset($_POST['inserisci']) && ($_POST['inserisci'] == 'inserisci')){ 
					
						$riferimento = mysql_real_escape_string($_POST['riferimento']);
						$titolo = mysql_real_escape_string($_POST['titolo']);
						$data = mysql_real_escape_string($_POST['data']);
						$referente = mysql_real_escape_string($_POST['referente']);
						$note = mysql_real_escape_string($_POST['note']);
						
						$query_inserisci = mysql_query("INSERT INTO note (titolo, data, nota) 
														VALUES (
															'$titolo',
															'$data',
															'$note') ") or die (mysql_error());
						$ultimo_id_nota = mysql_insert_id();
						
						// associo la nota						
						$inserisci_associazione_nota = mysql_query("INSERT INTO associazione_note (id_nota, riferimento, riferimento_id)																		VALUES ('$ultimo_id_nota', '$riferimento', '$referente')") 
																or die(mysql_error());
							
						
						if(($query_inserisci) && ($inserisci_associazione_nota)){
								
						echo " 
						<script>
  							$(document).ready(function() {
   							  $( \"#finestra\" ).dialog( {
									draggable : false, 
									width : 400,
									minHeight: 200,
									resizable : false,
									title : 'Attenzione',
										buttons: {
											\"OK\" : function() {
												window.open(\"../index.php?page=nota_elenco\", \"_self\");
												}
										}
								} );
							 });
  						</script>

						<div id=\"finestra\"><p>Operazione effettuata con successo .</p></div>
					" ;	
					
									
					break ;
				} else { 
					echo " 
						
						<script>
  							$(document).ready(function() {
   							  $( \"#finestra\" ).dialog( {
									draggable : false, 
									width : 400,
									minHeight: 200,
									resizable : false,
									title : 'Attenzione',
										buttons: {
											\"OK\" : function() {
												window.open(\"../index.php?page=nota_elenco\", \"_self\");
}
										}
									
									
								} );
								
								
							 });
  						</script>

						<div id=\"finestra\"><p><span class=\"ui-icon ui-icon-alert\"></span>Hai compilato tutti i campi correttamente, ma il sistema ha rilevato un errore, riprova .</p></div>
						
						" ;		
						
				}
				}
				
					
					break;
					
		/* ########################################### MODIFICA NOTA ##################################################### */	
	
					case "nota_modifica" :
					
					if (isset($_POST['modifica']) && ($_POST['modifica'] == 'modifica')){					
						$id_nota = mysql_real_escape_string($_POST['id_nota']);
						$riferimento = mysql_real_escape_string($_POST['riferimento']);
						$titolo = mysql_real_escape_string($_POST['titolo']);
						$referente = mysql_real_escape_string($_POST['referente']);
						$note = mysql_real_escape_string($_POST['note']);
						
						// cancello eventuali associazioni esistenti
						$query_cancella_associazione = mysql_query("DELETE FROM associazione_note WHERE id_nota = $id_nota") or die(mysql_error());
						// aggiorno i dati relativi alla nota
						$query_aggiorna = mysql_query("UPDATE note SET titolo = '$titolo', nota = '$note' WHERE id_nota = $id_nota") or die (mysql_error());	
						// aggiorno i dati relativi all'associazione della nota						
						$inserisci_associazione_nota = mysql_query("INSERT INTO associazione_note (id_nota, riferimento, riferimento_id)																		VALUES ('$id_nota', '$riferimento', '$referente')") 
																or die(mysql_error());
							
						
						if(($query_cancella_associazione) && ($$query_aggiorna) && ($inserisci_associazione_nota)){
								
							echo " 
							<script>
	  							$(document).ready(function() {
	   							  $( \"#finestra\" ).dialog( {
										draggable : false, 
										width : 400,
										minHeight: 200,
										resizable : false,
										title : 'Attenzione',
											buttons: {
												\"OK\" : function() {
													window.open(\"../index.php?page=nota_elenco\", \"_self\");
													}
											}
									} );
								 });
	  						</script>
	
							<div id=\"finestra\"><p>Operazione effettuata con successo .</p></div>
							" ;									
							break ;
						} else { 
							echo " 
								
								<script>
		  							$(document).ready(function() {
		   							  $( \"#finestra\" ).dialog( {
											draggable : false, 
											width : 400,
											minHeight: 200,
											resizable : false,
											title : 'Attenzione',
												buttons: {
													\"OK\" : function() {
														window.open(\"../index.php?page=nota_elenco\", \"_self\");
														}
												}
											
											
										} );
										
										
									 });
		  						</script>
		
								<div id=\"finestra\"><p><span class=\"ui-icon ui-icon-alert\"></span>Hai compilato tutti i campi correttamente, ma il sistema ha rilevato un errore, riprova .</p></div>
								
								" ;		
								
						}
					}				
					break;
		/* ########################################### CANCELLA NOTA ##################################################### */	
	
				case "nota_cancella" :	
    			if (isset($_GET['id_nota'])  && (is_numeric($_GET['id_nota']))) {	
				$id_nota = mysql_real_escape_string($_GET['id_nota']) ;				
					$query_cancella = mysql_query("DELETE FROM note WHERE id_nota = '$id_nota' ") or die (mysql_error()) ;
							
					echo " 
						<script>
  							$(document).ready(function() {
   							  $( \"#finestra\" ).dialog( {
									draggable : false, 
									width : 400,
									minHeight: 200,
									resizable : false,
									title : 'Attenzione',
										buttons: {
											\"OK\" : function() {
												window.open(\"../index.php?page=nota_elenco\", \"_self\");
												}
										}
								} );
							 });
  						</script>

						<div id=\"finestra\"><p>Operazione effettuata con successo .</p></div>
					" ;	
					
									
					break ;
				} else { 
					echo " 
						
						<script>
  							$(document).ready(function() {
   							  $( \"#finestra\" ).dialog( {
									draggable : false, 
									width : 400,
									minHeight: 200,
									resizable : false,
									title : 'Attenzione',
										buttons: {
											\"OK\" : function() {
												window.open(\"../index.php?page=nota_elenco\", \"_self\");
}
										}
									
									
								} );
								
								
							 });
  						</script>

						<div id=\"finestra\"><p><span class=\"ui-icon ui-icon-alert\"></span>Hai compilato tutti i campi correttamente, ma il sistema ha rilevato un errore, riprova .</p></div>
						
						" ;		
						
				}
				
				
					
					break;
					
		/* ############################################################### IMMAGINE SEZIONI INSERISCI ################################################# */
		
		case "immagini_inserisci" :
		
			// controlli sull'immagine
						
						if (!empty($_FILES['immagine'])  && ($_FILES['immagine']['error'] == 0 ) ) {
						 		
								$descrizione_immagine = mysql_real_escape_string($_POST['descrizione_immagine']);
								
								$altezza_immagine = mysql_real_escape_string($_POST['altezza_immagine']);
								
								$larghezza_immagine = mysql_real_escape_string($_POST['larghezza_immagine']);
								
								$nome_immagine = basename($_FILES['immagine']['name']);								
								
								$estensione_img = substr($nome_immagine, strpos($nome_immagine, '.') +1);		
								
								$estensione_img = strtolower($estensione_img);
								
								$nome_immagine_senza_estensione = substr($nome_immagine, 0, -4 );
																					
								$destinazione_img_parziale = "../upload/immagini/full_size/";
								
								$time = time();
																																		
								$nome_immagin_db = $nome_immagine_senza_estensione . $time;
								
								$nome_immagine = $nome_immagine_senza_estensione . $time . '.' . $estensione_img;
								
								$destinazione_img_finale = $destinazione_img_parziale . $nome_immagine ;
								
								$destinazione_thumb_parziale =  "../upload/immagini/thumb/";
																
								$destinazione_thumb_finale = $destinazione_thumb_parziale . $nome_immagine; 
																
								$max_kb = 1024;
											
									if (($_FILES['immagine']['type'] == "image/gif") 
											|| ($_FILES['immagine']['type'] == "image/png") 
											|| ($_FILES['immagine']['type'] == "image/jpeg")
											|| ($_FILES['immagine']['type'] == "image/jpg")
											&& ($_FILES['immagine']['size'] <= $max_kb ) 
											&& ($estensione_img == "jpg") || ($estensione_img == "png") || ($estensione_img == "gif") 
											|| ($estensione_img == "jpeg") ){
											move_uploaded_file ($_FILES['immagine']['tmp_name'], $destinazione_img_finale ) ; 
											
											// creo la miniatura e riduco eventualmente l'originale
											list($width, $height, $type, $attr) = getimagesize($destinazione_img_finale);
											$img = WideImage::load($destinazione_img_finale);
											//if( ($width > 1000) || ($height > 768) ){
												$resized = $img->resize($larghezza_immagine,null);
												$resized->saveToFile($destinazione_img_finale);
											//}
											
											if ($width < $height) {
												$cropped = $resized->/*resize(350, 350)->*/crop('center', '0', 350, 350);											
												$cropped->saveToFile($destinazione_thumb_finale);
												//echo "primo";
											} else {
												$cropped = $resized->crop('center','middle', '350','350');
												$cropped->saveToFile($destinazione_thumb_finale);
												//echo "secondo";
											}
											/*} else {
												$img->saveToFile($destinazione_img_finale);
											} */
											
											// salvo l'immagine nel Database
											$destinazione_img_finale = substr($destinazione_img_finale,3); // ,3 per via del path iniziale ../
											$destinazione_thumb_finale = substr($destinazione_thumb_finale,3);
											//$destinazione_thumb_finale_secondo_formato = substr($destinazione_thumb_finale_secondo_formato, 6);
											/*$inserisci = "INSERT INTO immagini (percorso_fullsize, percorso_thumb, percorso_thumb_secondario, nome_immagine, descrizione_immagine) 
																VALUES ('$destinazione_img_finale', '$destinazione_thumb_finale', '$destinazione_thumb_finale_secondo_formato','$nome_immagine', '$descrizione_immagine')" ;*/
											$inserisci = "INSERT INTO immagini (percorso_fullsize, percorso_thumb, nome_immagine, descrizione_immagine) 
											VALUES ('$destinazione_img_finale', '$destinazione_thumb_finale', '$nome_immagine', '$descrizione_immagine')" ;
											$esegui = mysql_query($inserisci) or die(mysql_error());
											
											echo " 
						<script>
  							$(document).ready(function() {
   							  $('#finestra').dialog({
									draggable : false, 
									width : 400,
									minHeight: 200,
									resizable : false,
									title : 'Attenzione',
										buttons: {
											'OK' : function() {
												window.open('../index.php?page=immagini_elenco', '_self');
												}
										}
								} );
							 });
  						</script>

						<div id='finestra'><p>Operazione effettuata con successo .</p></div>
					" ;	
					
									
					break ;
				} else { 
					echo " 
						
						<script>
  							$(document).ready(function() {
   							  $( \"#finestra\" ).dialog( {
									draggable : false, 
									width : 400,
									minHeight: 200,
									resizable : false,
									title : 'Attenzione',
										buttons: {
											\"OK\" : function() {
												window.open(\"../index.php?page=immagini_elenco\", \"_self\");
}
										}
									
									
								} );
								
								
							 });
  						</script>

						<div id=\"finestra\"><p><span class=\"ui-icon ui-icon-alert\"></span>Hai compilato tutti i campi correttamente, ma il sistema ha rilevato un errore, riprova .</p></div>
						
						" ;		
						
				}
								
								}
		
		break;
		
		/* ############################################################### IMMAGINE SEZIONI INSERISCI ################################################# */
		
		/*case "immagini_inserisci" :
		
			// controlli sull'immagine
						
						if (!empty($_FILES['immagine'])  && ($_FILES['immagine']['error'] == 0 ) ) {
						 		
								$descrizione_immagine = mysql_real_escape_string($_POST['descrizione_immagine']);
								
								$altezza_immagine = mysql_real_escape_string($_POST['altezza_immagine']);
								
								$larghezza_immagine = mysql_real_escape_string($_POST['larghezza_immagine']);
								
								$nome_immagine = basename($_FILES['immagine']['name']);								
								
								$estensione_img = substr($nome_immagine, strpos($nome_immagine, '.') +1);		
								
								$estensione_img = strtolower($estensione_img);
								
								$nome_immagine_senza_estensione = substr($nome_immagine, 0, -4 );
																					
								$destinazione_img_parziale = $dominio .  "upload/immagini/full_size/";
								
								$time = time();
																																		
								$nome_immagin_db = $nome_immagine_senza_estensione . $time;
								
								$nome_immagine = $nome_immagine_senza_estensione . $time . '.' . $estensione_img;
								
								$destinazione_img_finale = $destinazione_img_parziale . $nome_immagine ;
								
								$destinazione_thumb_parziale = $dominio . "upload/immagini/thumb/";
								
								//$destinazione_thumb_parziale_secondo_formato = "../../upload/immagini/thumb_secondo_formato/";
								
								$destinazione_thumb_finale = $destinazione_thumb_parziale . $nome_immagine; 
								
								//$destinazione_thumb_finale_secondo_formato = $destinazione_thumb_parziale_secondo_formato . $nome_immagine; 
								
								$max_kb = 1024;
											
									if ( ($_FILES['immagine']['type'] == "image/gif") 
											|| ($_FILES['immagine']['type'] == "image/png") 
											|| ($_FILES['immagine']['type'] == "image/jpeg")
											|| ($_FILES['immagine']['type'] == "image/jpg")
											&& ($_FILES['immagine']['size'] <= $max_kb ) 
											&& ($estensione_img == "jpg") || ($estensione_img == "png") || ($estensione_img == "gif") || ($estensione_img == "jpeg") ){
											move_uploaded_file ($_FILES['immagine']['tmp_name'], $destinazione_img_finale ) ; 
											
											// creo la miniatura
											list($width, $height, $type, $attr) = getimagesize($destinazione_img_finale);
											$img = new SmartImage($destinazione_img_finale);
											if( ($width > 1000) || ($height > 1000 ) ){
												$img->resize($larghezza_immagine,$altezza_immagine);
												$img->saveImage($destinazione_img_finale);
												$img->resize(350,350, true);
												/*$img->saveImage($destinazione_thumb_finale_secondo_formato);
												$img->resize(300,300, true);*/
											/*	$img->saveImage($destinazione_thumb_finale);
												} else {
													$img->resize(350,350, true);
													/*$img->saveImage($destinazione_thumb_finale_secondo_formato);
													$img->resize(300,300, true);*/
										/*			$img->saveImage($destinazione_thumb_finale);
											}
											
											// salvo l'immagine nel Database
											$destinazione_img_finale = substr($destinazione_img_finale,6);
											$destinazione_thumb_finale = substr($destinazione_thumb_finale, 6);
											$destinazione_thumb_finale_secondo_formato = substr($destinazione_thumb_finale_secondo_formato, 6);
											/*$inserisci = "INSERT INTO immagini (percorso_fullsize, percorso_thumb, percorso_thumb_secondario, nome_immagine, descrizione_immagine) 
																VALUES ('$destinazione_img_finale', '$destinazione_thumb_finale', '$destinazione_thumb_finale_secondo_formato','$nome_immagine', '$descrizione_immagine')" ;*/
									/*		$inserisci = "INSERT INTO immagini (percorso_fullsize, percorso_thumb, nome_immagine, descrizione_immagine) 
											VALUES ('$destinazione_img_finale', '$destinazione_thumb_finale', '$nome_immagine', '$descrizione_immagine')" ;
											$esegui = mysql_query($inserisci) or die(mysql_error());
											
											echo " 
						<script>
  							$(document).ready(function() {
   							  $('#finestra').dialog({
									draggable : false, 
									width : 400,
									minHeight: 200,
									resizable : false,
									title : 'Attenzione',
										buttons: {
											'OK' : function() {
												window.open('../index.php?page=immagini_elenco', '_self');
												}
										}
								} );
							 });
  						</script>

						<div id='finestra'><p>Operazione effettuata con successo .</p></div>
					" ;	
					
									
					break ;
				} else { 
					echo " 
						
						<script>
  							$(document).ready(function() {
   							  $( \"#finestra\" ).dialog( {
									draggable : false, 
									width : 400,
									minHeight: 200,
									resizable : false,
									title : 'Attenzione',
										buttons: {
											\"OK\" : function() {
												window.open(\"../index.php?page=immagini_elenco\", \"_self\");
}
										}
									
									
								} );
								
								
							 });
  						</script>

						<div id=\"finestra\"><p><span class=\"ui-icon ui-icon-alert\"></span>Hai compilato tutti i campi correttamente, ma il sistema ha rilevato un errore, riprova .</p></div>
						
						" ;		
						
				}
								
								}
		
		break;
		*/
		
		/* ############################################################### IMMAGINE SEZIONI CANCELLA ################################################# */
		
		case "immagini_cancella" :
			
			if (isset($_GET['immagine_id'])  && (is_numeric($_GET['immagine_id']))       ) {
	
				$immagine_id = mysql_real_escape_string($_GET['immagine_id']) ;			
				
				
					$seleziona_immagine_da_cancellare = mysql_query("SELECT nome_immagine FROM immagini WHERE immagine_id = '$immagine_id'");
					$estrai = mysql_fetch_assoc($seleziona_immagine_da_cancellare);
					$nome = $estrai['nome_immagine'];
					
					
					$destinazione_img_parziale =  $doc_root . $dominio . "/upload/immagini/full_size/";
					$destinazione_thumb_parziale = $doc_root . $dominio . "/upload/immagini/thumb/";
					//$destinazione_thumb_parziale_secondo_formato = "../../upload/immagini/thumb_secondo_formato/";
					
					if(unlink($destinazione_img_parziale.$nome) && unlink($destinazione_thumb_parziale.$nome) 
						/*&& unlink($destinazione_thumb_parziale_secondo_formato.$nome)*/){
					
						$query_cancella = mysql_query("DELETE FROM immagini WHERE immagine_id = '$immagine_id' ") or die (mysql_error()) ;							
							
						
						$query_cancella_associazione = mysql_query("DELETE FROM associazione_immagini WHERE immagine_id = '$immagine_id'") or die(mysql_error());
						
						
						
						if ( ($query_cancella) && ($query_cancella_associazione) ) {						
						
							echo " 
						<script>
  							$(document).ready(function() {
   							  $( \"#finestra\" ).dialog( {
									draggable : false, 
									width : 400,
									minHeight: 200,
									resizable : false,
									title : 'Attenzione',
										buttons: {
											\"OK\" : function() {
												window.open(\"../index.php?page=immagini_elenco\", \"_self\");
												}
										}
								} );
							 });
  						</script>

						<div id=\"finestra\"><p>Operazione effettuata con successo .</p></div>
					" ;	
					
									
					break ;
				} else { 
					echo " 
						
						<script>
  							$(document).ready(function() {
   							  $( \"#finestra\" ).dialog( {
									draggable : false, 
									width : 400,
									minHeight: 200,
									resizable : false,
									title : 'Attenzione',
										buttons: {
											\"OK\" : function() {
												window.open(\"../index.php?page=immagini_elenco\", \"_self\");
}
										}
									
									
								} );
								
								
							 });
  						</script>

						<div id=\"finestra\"><p><span class=\"ui-icon ui-icon-alert\"></span>Hai compilato tutti i campi correttamente, ma il sistema ha rilevato un errore, riprova .</p></div>
						
						" ;		
						
				}
					}
				}				
		
		
		break;
		
		
		/* ############################################################### ALLEGATO INSERISCI ################################################# */
		
		case "allegato_inserisci" :
		
			// controlli sull'immagine
						
			if (!empty($_FILES['nome_allegato'])  && ($_FILES['nome_allegato']['error'] == 0 ) ) {
					
					
					
					/*$riferimento = mysql_real_escape_string($_POST['riferimento']);*/
					
					$titolo_allegato = mysql_real_escape_string($_POST['titolo_allegato']);
					
					$descrizione_allegato = mysql_real_escape_string($_POST['descrizione_allegato']);
					
					$nome_allegato = basename($_FILES['nome_allegato']['name']);								
					
					$estensione_allegato = substr($nome_allegato, strpos($nome_allegato, '.') +1);		
					
					$estensione_allegato = strtolower($estensione_allegato);
					
					$nome_allegato_senza_estensione = substr($nome_allegato, 0, -4 );
																		
					$destinazione_allegato_parziale = "../upload/allegati/";
					
					$time = time();
																															
					$nome_allegato = $nome_allegato_senza_estensione . $time . '.' . $estensione_allegato;
					
					$destinazione_allegato_finale = $destinazione_allegato_parziale . $nome_allegato ;
					
					$max_kb = 5000;
								
						if (($_FILES['nome_allegato']['type'] == "application/msword") 
								|| ($_FILES['nome_allegato']['type'] == "application/pdf") 
								|| ($_FILES['nome_allegato']['type'] == "application/rtf")
								&& ($_FILES['nome_allegato']['size'] <= $max_kb ) 
								&& ($estensione_allegato == "doc") || ($estensione_allegato == "pdf") || ($estensione_allegato == "rtf") 
								|| ($estensione_allegato == "docx") ){
								move_uploaded_file ($_FILES['nome_allegato']['tmp_name'], $destinazione_allegato_finale ) ; 
								
								$inserisci = "INSERT INTO allegati (percorso_fullsize, nome_allegato, titolo_allegato, descrizione_allegato, estensione) 
													VALUES ('$destinazione_allegato_finale', '$nome_allegato', '$titolo_allegato', '$descrizione_allegato', '$estensione_allegato')" ;
								$esegui = mysql_query($inserisci) or die(mysql_error());
								
								echo "Operazione avvenuta correttamente .";
								
							break;	
							} else {
								echo "Si &egrave; verificato un errore .";
						}	
					
					}
		
		break;
		
		/* ############################################################### ALLEGATO CANCELLA ################################################# */
		
		case "allegati_cancella" :
			
			if (isset($_GET['id_allegato'])  && (is_numeric($_GET['id_allegato']))){
				$id_allegato = mysql_real_escape_string($_GET['id_allegato']);
				$seleziona_allegato_da_cancellare = mysql_query("SELECT nome_allegato FROM allegati WHERE id_allegato = '$id_allegato'");
				$estrai = mysql_fetch_assoc($seleziona_allegato_da_cancellare);
				$nome = $estrai['nome_allegato'];
				$destinazione_allegato = "../upload/allegati/";				
				if(unlink($destinazione_allegato.$nome)){				
					$query_cancella = mysql_query("DELETE FROM allegati WHERE id_allegato = '$id_allegato' ") or die (mysql_error());
					if ( $query_cancella ){				
						echo "Operazione avvenuta con succeso ." ;
						break;
					} else { 
						echo "Si &egrave; verificato un problema durante l'operazione, riprovare ." ;					
					}
				}				
			}		
		break;
		
		/* ############################################################### ALLEGATO MODIFICA ################################################# */
		case "allegato_modifica" :
		
		if(isset($_POST['galleria_id'])){
			$galleria_id = $_POST['galleria_id'];
			for($i=0; $i < count($galleria_id); $i++) {
				$galleria_id_array = $_POST['galleria_id'][$i];
				$ordine=$i+1;
				$aggiorna_ordine_galleria = mysql_query("UPDATE galleria SET ordine = $ordine WHERE galleria_id = $galleria_id_array") or die(mysql_error());
			}
			if($aggiorna_ordine_galleria) {
				echo "Operazione avvenuta con successo.";
				} else {
					echo "Si è verificato un errore .";
			}
		}
		
		
		
		
		/* ################################################################# end switch ###################################################################  */ 
		} 

?>