<?php 	
	session_start();
	include("include/config.php");
	$indirizzo_ip = $_SERVER['REMOTE_ADDR'];
	$data_login = date("j F, Y, g:i a");  
	if(isset($_POST['login']) && ($_POST['login'] == "login") && ($_POST['username']) && ($_POST['password'])  ){
		$username = stripslashes($_POST['username']);
		$password = stripslashes($_POST['password']);
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);			
		$password = sha1($password);
	
		$ricava_dati_utente = mysql_query("SELECT * FROM utenti WHERE username = '$username' AND password = '$password' ");
		while($riga = mysql_fetch_array($ricava_dati_utente))
		$count = mysql_num_rows($ricava_dati_utente);
		if (isset($count) && ($count == 1)) {
		
			$_SESSION['username']= $username;
			$_SESSION['password']= $password;
			$_SESSION['nome'] = $riga['nome'];
			$_SESSION['cognome'] = $riga['email'];
			setcookie("username", $username,time()+3600);
			$username = $_COOKIE['username'];	
			$inserisci_log = mysql_query("INSERT INTO log_accessi (indirizzo_ip, data_login) VALUES ('$indirizzo_ip', '$data_login') ") or die (mysql_error()) ;
			header("location: index.php");
			
		} else {
			echo "
				<script>
  							$(document).ready(function() {
   							  $( \"#finestra\" ).dialog( {
									draggable : false, 
									width : 420,
									minHeight: 100,
									resizable : false,
									title : 'Login',
										buttons: {
											\"OK\" : function() {
												window.open(\"index.php?page=login\", \"_self\");
												}
										}
								} );
							 });
  						</script>

						<div id=\"finestra\"><p>La combinazione username/password risulta essere errata, riprovare .</p></div>			
			";
		}
	}
	ob_end_flush();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it">
<head>
<title>Quote - Login Area</title>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="css/login.css" media="screen" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript" /></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Capriola' rel='stylesheet' type='text/css'>
   <!-- Popup -->
  <script>
  $(document).ready(function() {
    $("#finestra").dialog();
  });
  </script>

</head>
<body>
<div id="contenuto">
    
    <div class="box_login">
    <div class="form_login">
        <h1 class="prodotto">Quote</h1>
        <form name="login" action="" method="post">            
            <h2>Login Area</h2>
            <input name="username" type="text" id="username" placeholder="username" class="username"/><br />
            <input name="password" id="password" type="password" placeholder="password"class="password"/><br />
            <div class="input">
	            <input name="login" type="submit" value="login"  class="bt"/>
	            <input name="cancel" type="reset" value="reset"  class="bt"/><br />
	            <label><a href="index.php?page=getpwd">credenziali smarrite ?</a></label>
            </div>         
        </form>	
    </div>
    <div class="ombra_login">
    	<img src="immagini/ombra_login.png">
    </div>
   </div>
</div>
</body>
</html>