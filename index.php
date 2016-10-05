<?PHP 
	ob_start(); 
	include("include/autorizzazione.php");
		
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
		<?php include("include/header_admin.php"); ?>
			
			<div id="contenuto">
            
				<?php		
					
					if (empty($_GET["page"])) { 
						include("include/dashboard.php"); 
					} else {
						$page = $_GET['page'] ;						
						switch ($page) {
							case  "home" :
								include("include/home_admin.php"); 
								break;
							case  "dashboard" :
								include("include/dashboard.php"); 
								break;
							case  "cliente_elenco" :
								include("include/cliente_elenco.php"); 
								break;
							case  "cliente_scheda" :
								include("include/cliente_scheda.php"); 
								break;
							case  "cliente_inserisci" :
								include("include/cliente_inserisci.php"); 
								break;
							case  "cliente_modifica" :
								include("include/cliente_modifica.php");
								break;
							case  "produttore_elenco" :
								include("include/produttore_elenco.php"); 
								break;
							case  "produttore_inserisci" :
								include("include/produttore_inserisci.php"); 
								break;
							case  "produttore_modifica" :
								include("include/produttore_modifica.php");
								break;
							case  "nota_elenco" :
								include("include/nota_elenco.php"); 
								break;
							case  "nota_inserisci" :
								include("include/nota_inserisci.php"); 
								break;
							case  "nota_modifica" :
								include("include/nota_modifica.php");
								break;
							case  "categoria_elenco" :
								include("include/categoria_elenco.php"); 
								break;
							case  "categoria_inserisci" :
								include("include/categoria_inserisci.php"); 
								break;
							case  "categoria_modifica" :
								include("include/categoria_modifica.php");
								break;
							case  "account" :
								include("include/account_modifica.php"); 
								break;						
							case  "login" :
								include("../login.php"); 
								break;							
							case  "immagini_elenco" :
								include("include/immagini_elenco.php"); 
								break;
							case  "immagini_inserisci" :
								include("include/immagini_inserisci.php"); 
								break;
							case  "allegati_elenco" :
								include("include/allegati_elenco.php"); 
								break;
							case  "allegati_inserisci" :
								include("include/allegati_inserisci.php"); 
								break;
							case  "getpwd" :
								include("include/forget_password.php"); 
								break;
							case  "preventivo_elenco" :
								include("include/preventivo_elenco.php"); 
								break;
							case  "preventivo_scheda" :
								include("include/preventivo_scheda.php"); 
								break;
							case  "preventivo_inserisci" :
								include("include/preventivo_inserisci.php"); 
								break;
							case  "preventivo_modifica" :
								include("include/preventivo_modifica.php");
								break;
												
						}  
							}
				?> 
			
			</div>
		
		
	
	</div>
	<?php //include("include/footer_admin.php"); ?>
	</body>
</html>


