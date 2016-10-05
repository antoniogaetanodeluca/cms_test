
<?php 
	session_start();
	include("config.php");
	
	$nome = mysql_real_escape_string($_POST['nome']);
	$cognome = mysql_real_escape_string($_POST['cognome']);
	$email = mysql_real_escape_string($_POST['email']);
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$ripeti_password = mysql_real_escape_string($_POST['ripeti_password']);	
	$session['username'] = $username;
	$session['password'] = $password;
	if(isset($_POST['nome']) && ($_POST['cognome']) &&  ($_POST['email']) &&  ($_POST['username']) &&  ($_POST['password']) 
		&& ($_POST['ripeti_password']) ){
		if ($password != $ripetipassword) {
			echo "le password inserite non coincidono";
			
		} else {
			$aggiorna_username = mysql_query("UPDATE utente SET nome = '$nome', cognome = '$cognome', email = '$email' ,
														username = '$username', password = '$password' 
		}
	}
?>



<div class="pgn-admin">
	<div class="struttura_tab">
    	<div class="titolo_tab">
        	
            <p class="account">Gestione Account</p>
        </div>
       
       <div class="contenuto_tab"> 
        	<form name="inserisci_news" action="#" method="post" class="validateform"><br />
                <fieldset class="nuova_news">
                    <legend class="nuova_news">Gestisci il tuo Account</legend>
                    <ul id="nuova_news">
                       
                        
                        <li>
                            <label class="clear-label">Nome</label>
                            <input name="nome" type="text" id="nome"  class="required"/>
                        </li><br />
                        <li>
                            <label class="clear-label">Cognome</label>
                            <input name="cognome" type="text" id="cognome"  class="required"/>
                        </li><br />                        
                       <li>
                            <label class="clear-label">Email</label>
                            <input name="email" type="text" id="email"  class="required"/>
                        </li><br />
                        <li>
                            <label class="clear-label">Username</label>
                            <input name="username" type="text" id="username"  class="required"/>
                        </li><br />
                        <li>
                            <label class="clear-label">Password</label>
                            <input name="password" type="passowrd" id="password"  class="required"/>
                        </li><br />
                        <li>
                            <label class="clear-label"  style="width: 250px;">Ripeti Password</label>
                            <input name="password_ripeti" type="passowrd" id="password_ripeti"  class="required"/>
                        </li><br /><br />

                        <li>
							<input class="bt_modifica" name="aggiorna" type="submit"  value="aggiorna"/>
					 	</li><br />
                        
                    </ul>
                </fieldset>
    	</div>
    </div>
    	 
</div>