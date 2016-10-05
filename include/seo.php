<?php 
	include("autorizzazione.php");
	include("config.php") ;  
	include("funzioni.php") ;
?>

<div class="pgn-admin">
	<div class="struttura_tab">
    	<div class="titolo_tab">        	
            <p class="nuova_news">Gestisci SEO</p>
        </div>
       
      	<div class="contenuto_tab">
          	<form name="inserisci_news" action="include/azione.php?azione=seo_modifica" method="post" class="validateform" enctype="multipart/form-data" id="form">
            
            
				
                <?php 
					$query_estrai_seo = mysql_query("SELECT * FROM seo_multilingua") or die(mysql_error());
					while($righe_estrai_seo = mysql_fetch_array($query_estrai_seo)) {
				?>
				
                
                
                    <fieldset class="nuova_news">
                        <legend class="nuova_news">Aggiorna o compila i seguenti campi</legend>
                        <ul id="nuova_news">     
                                                          
                            <li>
                                <label class="clear-label">Title</label><br />
                                <input name="title" type="text" id="title"  class="required" value="<?php echo $righe_estrai_seo['title'];?>"/>
                             </li><br />    <br />
                            
                            <li>
                                <label class="clear-label">H1</label><br />
                                <input name="h1" type="text" id="h1"  class="required" value="<?php echo $righe_estrai_seo['h1'];?>"/>
                             </li><br />    <br />
                             
                             <li>
                                <label class="clear-label">Description</label><br />
                                <input name="description" type="text" id="description"  class="required" value="<?php echo $righe_estrai_seo['description'];?>"/>
                             </li><br />    <br />
                             
                             <li>
                                <label class="clear-label">Keywords</label><br />
                                <input name="keywords" type="text" id="keywords"  class="required" value="<?php echo $righe_estrai_seo['keywords'];?>"/>
                             </li><br />    <br />
                             
                                                                             
                        </ul>
                               
                 
                   </fieldset>
				<?php } ?>	
          </div>	
			
          		
            
           <input class="bt_modifica" name="modifica" type="submit"  value="modifica"/>
           </form>         
        	
    	</div><!-- end contenuto_tab -->
    </div>
    	 
</div>

