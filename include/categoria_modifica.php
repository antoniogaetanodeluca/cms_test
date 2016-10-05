<?php 
	include("autorizzazione.php");
	include("config.php") ;  
	include("funzioni.php") ;
	
	if(isset($_GET['id_categoria'])) {
	
		$id_categoria = $_GET['id_categoria'] ;
		
		$elenca= "SELECT * FROM categoria WHERE id_categoria = $id_categoria" ;
			$risultato = mysql_query ($elenca) or die(mysql_error()) ;
			
			while ($row = mysql_fetch_array($risultato)) { 
				
			
	
?>

<div class="pgn-admin">
	<div class="struttura_tab">
    	<div class="titolo_tab">
        	
            <p class="nuova_news">Modifica una Categoria </p>
        </div>
       
      <div class="contenuto_tab"> 
        	<form name="inserisci_news" action="include/azione.php?azione=categoria_modifica" method="post" class="validateform" enctype="multipart/form-data" id="form"><br />
                <fieldset class="nuova_news">
                    <legend class="nuova_news">categoria</legend>
                    <ul id="nuova_news">
                     
                      <fieldset class="field_set_interno">
                           <legend class="field_set_interno">categoria</legend>                           
                        
                        
                        
                        <li>
                            <label class="clear-label">Titolo</label>
                            <input name="titolo_categoria" type="text" id="titolo_categoria"  class="required" value="<?php echo $row['titolo_categoria']; ?>"/>
                        </li><br />
                        
                        
                      <li>
							<input class="bt" name="modifica" type="submit"  value="modifica"/>
					 	</li>
                        <li>
                            <input type="hidden" value="<?php echo $row['id_categoria']; ?>" name="id_categoria" id="id_categoria" />
                            <input type="hidden" name="riferimento" value="categoria" />
                     	</li>
                        <br />
                        
                    </ul>
                </fieldset>
    	</div>
    </div>
    	 
</div>

<?php

	}}
	
?>