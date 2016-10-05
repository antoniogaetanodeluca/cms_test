<?php
	$db_host = "localhost" ;
	$db_name = "redrappresentanze" ;
	$db_user = "root" ;
	$db_pass = "root" ;
	$db_conn = mysql_connect($db_host,$db_user,$db_pass) ;
	$connection_string = mysql_select_db($db_name);
	
	/* connessione */
	
	mysql_connect($db_host,$db_user,$db_pass) or die ("Errore di connessione al database .") ;
	mysql_select_db($db_name);
	
	/* URL BASE */
	
	$url_produzione = "http://www.redrappresentanze.it" ;
	$url_immagini = 	"immagini_caricate";
	$url_documenti = "documenti_caricati";
	
	$url_base = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ;
	
	ob_start();
?>