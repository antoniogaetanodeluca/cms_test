<?php 
	$user = $_SESSION['username'];
	$estrai_dati_utente = mysql_query("SELECT * FROM utenti WHERE username = '$user' ") or die(mysql_error());
?>
<div class="header_admin">
	<div class="logo">
    	<h1>Quote</h1>
    	<h2 class="grigio">simplify your office</h2>
    </div>
    
    <div class="info_admin">
    	<p><?php echo utf8_encode(strftime('%d %B %Y'));?></p>
    	<p>Bentornato <strong>
    		<span class="arancio">
    		<?php 
    			while($riga = mysql_fetch_array($estrai_dati_utente)){ 
    				if($user == 'admin'){ echo $_SESSION['username']; 
	    			} else { 
	    				echo $riga['nome']; 
	    			} 
	    		}
	    	?>
    		</span>
    	</strong>, <a href="include/logout.php">disconnetti</a></p>
    	
    </div>

    <div class="clear"></div>      
	<div class="menu">    
	        <ul id="nav">
	          	
	            <li ><a href="index.php?page=dashboard" alt="torna alla Dashboard" title="torna alla Dashboard">Dashboard</a></li>
	           
	            
	            <li ><a href="#">File</a>
	            <ul>
	                
	               <li><a href="index.php?page=cliente_elenco">Clienti</a></li>
	               <li><a href="index.php?page=produttore_elenco">Produttori</a></li>
	               <li><a href="index.php?page=preventivi_elenco">Preventivi</a></li>
	               <li><a href="index.php?page=nota_elenco">Note</a></li>
	                              
	            </ul>        
	            <div class="clear"></div>
	            </li>
	           
	           <li ><a href="#" >Multimedia</a>
	                <ul>
	                    <li><a href="index.php?page=immagini_elenco">Immagini</a></li>
	                    <li><a href="index.php?page=allegati_elenco">Allegati</a></li>            
	                </ul>
	                <div class="clear"></div>
	            </li>
	            
	            <li ><a href="#" >Configurazione</a>
	                <ul>
	                    <li><a href="index.php?page=account">Account</a></li>                    
	                </ul>
	                <div class="clear"></div>
	            </li>
	            
	            <li ><a href="#" >? Guida</a>
	                <ul>
	                    <li><a href="index.php?page=guida">Guida in linea</a></li> 
	                    <li><a href="index.php?page=supporto">Richiedi supporto</a></li>
	                    <li><a href="index.php?page=supporto">Licenza</a></li>                    
	                </ul>
	                <div class="clear"></div>
	            </li>
	            
	            
	        </ul>
	         
	             
	    
	</div>
	<!--
<div class="ricerca">
		<form name="ricerca" action="azione.php?azione=ricerca" method="post">
			<input name="ricerca" class="seachbox" placeholder="ricerca ...">
		</form>
	</div>
-->
</div>
<div class="clear"></div> 