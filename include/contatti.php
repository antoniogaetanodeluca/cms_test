<?php 
	include("autorizzazione.php");
	include("config.php") ;  
	include("funzioni.php") ;
?>

<div class="pgn-admin">
	<div class="struttura_tab">
    	<div class="titolo_tab">        	
            <p class="nuova_news">Modifica la sezione "Contatti" </p>
        </div>
       
      	<div class="contenuto_tab">
          	<form name="inserisci_news" action="include/azione.php?azione=contatti_modifica" method="post" class="validateform" enctype="multipart/form-data" id="form">
            
            
                <?php 
					$elenca = mysql_query("SELECT * FROM contatti_multilingua") or die(mysql_error());
					while($righe = mysql_fetch_array($elenca)) {
				?>
				
                
                <br />
                    <fieldset class="nuova_news">
                        <legend class="nuova_news">Aggiorna o compila i seguenti campi</legend>
                        <ul id="nuova_news">     
                                                          
                            <li>
                                <label class="clear-label">Titolo</label>
                                <input name="titolo" type="text" class="required" value="<?php echo $righe['titolo'];?>"/>
                             </li><br />    <br />
                              <li>
                                <label class="clear-label" style="width: 200px;">Descrizione</label> <br />
                                <textarea id="descrizione" name="descrizione"><?php echo $righe['descrizione'];?></textarea>
                              </li> 
                                                                             
                        </ul>
                               
                 </fieldset>  
				
			
          		
            
           <input class="bt_modifica" name="modifica" type="submit"  value="modifica"/>
           <?php } ?>
           </form>         
        	
    	</div><!-- end contenuto_tab -->
    </div>
    	 
</div>

