<?php 
	include("autorizzazione.php");
	include("config.php");
	
	if(isset($_POST['nome']) && ($_POST['cognome']) &&  ($_POST['email']) &&  ($_POST['username']) &&  ($_POST['password']) && ($_POST['ripeti_password']) ){
	
	$nuovo_nome = mysql_real_escape_string($_POST['nome']);
	$nuovo_cognome = mysql_real_escape_string($_POST['cognome']);
	$nuova_email = mysql_real_escape_string($_POST['email']);
	$nuovo_username = mysql_real_escape_string($_POST['username']);
	$nuova_password = mysql_real_escape_string($_POST['password']);
	$ripeti_password = mysql_real_escape_string($_POST['ripeti_password']);		
	$user_attuale = $_SESSION['username'];	
	
	
		if ($nuova_password != $ripeti_password) {
			echo "
				<script>
  							$(document).ready(function() {
   							  $( \"#finestra\" ).dialog( {
									draggable : false, 
									width : 420,
									minHeight: 100,
									resizable : false,
									title : 'Attenzione',
										buttons: {
											\"OK\" : function() {
												window.open(\"index.php?page=account\", \"_self\");
												}
										}
								} );
							 });
  						</script>

						<div id=\"finestra\"><p>Le password inserite non coincidono, riprova !</p></div>			
			";
			
		} else {
			$nuova_password = sha1($nuova_password);
			$aggiorna_username = mysql_query("UPDATE utenti SET nome = '$nuovo_nome', cognome = '$nuovo_cognome', email = '$nuova_email' ,
																			username = '$nuovo_username', password = '$nuova_password' 
																				WHERE username =  '$user_attuale' ") 	or die(mysql_error()); 
			echo "
				<script>
  							$(document).ready(function() {
   							  $( \"#finestra\" ).dialog( {
									draggable : false, 
									width : 420,
									minHeight: 100,
									resizable : false,
									title : 'Modifica avvenuta',
										buttons: {
											\"OK\" : function() {
												window.open(\"index.php?page=account\", \"_self\");
												}
										}
								} );
							 });
  						</script>

						<div id=\"finestra\"><p>Dati modificati correttamente, si prega di loggarsi nuovamente .</p></div>			
			";
			ob_end_flush();
			session_destroy();
		}
	}
?>



<div class="pgn-admin">
	<div class="struttura_tab">
    	<div class="titolo_tab">
        	
            <p class="account">Gestione Account</p>
        </div>
        
		<?php       
            $ricava_dati_utente = mysql_query("SELECT * FROM utenti" ) or die(mysql_error());
            while ($riga = mysql_fetch_array($ricava_dati_utente) ) {
        ?>

       
       <div class="contenuto_tab"> 
        	<form name="inserisci_news" action="#" method="post" class="validateform"><br />
                <fieldset class="nuova_news">
                    <legend class="nuova_news">Gestisci il tuo Account</legend>
                    <ul id="nuova_news">
                       
                        
                        <li>
                            <label class="clear-label">Nome</label>
                            <input name="nome" type="text" id="nome"  class="required" value="<?PHP echo $riga['nome']; ?>"/>
                        </li><br />
                        <li>
                            <label class="clear-label">Cognome</label>
                            <input name="cognome" type="text" id="cognome"  class="required" value="<?PHP echo $riga['cognome']; ?>"/>
                        </li><br />                        
                       <li>
                            <label class="clear-label">Email</label>
                            <input name="email" type="text" id="email"  class="required" value="<?PHP echo $riga['email'];?> "/>
                        </li><br />
                        <li>
                            <label class="clear-label">Username</label>
                            <input name="username" type="text" id="username"  class="required" value="<?PHP echo $riga['username']; ?> "/>
                        </li><br />
                        <li>
                            <label class="clear-label">Password</label>
                            <input name="password" type="password" id="password"  class="required" />
                        </li><br />
                        <li>
                            <label class="clear-label"  >Ripeti Password</label>
                            <input name="ripeti_password" type="password" id="ripeti_password"  class="required" />
                        </li><br /><br />

                        <li>
							<input class="bt_modifica" name="aggiorna" type="submit"  value="aggiorna"/>
					 	</li><br />
                        
                    </ul>
                </fieldset>
    	</div>
           <?php } ?>
    </div>

    	 
</div>