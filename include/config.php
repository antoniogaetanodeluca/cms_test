<?php
	$db_host = "localhost";
	$db_name = "quote";
	$db_user = "root"; 
	$db_pass = "root";
	$db_conn = mysql_connect($db_host,$db_user,$db_pass) ;
	$connection_string = mysql_select_db($db_name);
	
	
	/* connessione */
	
	mysql_connect($db_host,$db_user,$db_pass) or die ("Errore di connessione al database .") ;
	mysql_select_db($db_name);
	
	/* URL BASE */
	$dominio = "Quote";
	$http_host = 'http://'.$_SERVER['HTTP_HOST'].'/';
	$doc_root = $_SERVER['DOCUMENT_ROOT'].'/';  
	$sito = $doc_root . $dominio .'/';
	$immagini = 'upload/immagini/';
	$file = 'upload/allegati/';	
	setlocale(LC_TIME, 'ita', 'it_IT');
	ob_start();
?>