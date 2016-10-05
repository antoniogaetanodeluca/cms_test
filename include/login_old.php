<?php 	
	session_start();
	ob_start();
	
	include("config.php");
	$username = stripslashes($_POST['username']);
	$password = stripslashes($_POST['password']);
	$username = mysql_real_escape_string($_POST['username']);
	$password = sha1($_POST['password']);
	if(isset($_POST['login']) && ($_POST['login'] == "login") && ($_POST['username']) && ($_POST['password'])  ){
		$ricava_dati_utente = mysql_query("SELECT username, password FROM utenti WHERE username = '$username' AND password = '$password' ");
		$count = mysql_num_rows($ricava_dati_utente);
		
		if ($count == 1) {
			$_SESSION['username']=$username;
			$_SESSION['password']=$password;
			header("location: ../index.php");
			
		} else {
			echo " username o password non corretti ! .";
		}
	}
	ob_end_flush();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it">
<head>
	
<?php include("include/meta.php") ; ?>
<?php include("include/jquery.php") ; ?>
</head>
<body>
	
	<div id="wrap">
		<?php include_once("include/config.php") ; ?>
		<?php include("include/header-admin.php"); ?>
			
	<div id="contenuto">
        <div class="pgn-admin">
            <div class="box_login">
                
                <form name="login" action="" method="post">
                    <input name="username" type="text" id="username"/>
                    <input name="password" id="password" type="password" />
                    <input name="login" type="submit" value="login" />
                </form>
            </div>
        </div>
</div>
	<?php include("include/footer-admin.php"); ?>
	</body>
</html>