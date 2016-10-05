<?php
	ob_start();
	if(!isset($_SESSION)) {
		session_start();
	}
	if (isset($_COOKIE['username']) AND isset($_SESSION['username'])){
	//if (isset($_SESSION['username']) ){
	 //ok autorizzato
	} else {
		header("location: login.php");
		//header("location: index.php?page=login");
	}
	
?>