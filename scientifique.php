
<html>
    <head>
        <title>BIBLIOTHEQUE R.I.M</title>
        <link href="styleRIM.css" media="screen" rel="stylesheet" type="text/css" />
  
        
    </head>
	
	
    <body>
	
	
					
	
        <div id="wrapper_inside">
        <header> 
            <div class="top_menu">
                		<!--<div class="cart">
                            <a>
                            </a>
                        </div>
                		<div class="top_menu_info">
                            <a>|</a>
                            <a>About Us</a>
                            <a>|</a>
                            <a>Sign up</a>
                            <a>|</a>
                            <a>Profile</a>
                            <a>|</a>
                        </div>-->
						
					<!-- start sidebar -->
					<div id="sidebar">
							<?php
								include("includes/menu.php");
							?>
					</div>
					<!-- end sidebar -->
					
					
			                        
            </div>
			
		
        
				<h1 class="title">Bienvenue à 
							<?php 
								if(isset($_SESSION['status']))
								{
									echo $_SESSION['unm']; 
								}
								else
								{	
									echo 'Book Shop';
								}
							?>
							</h1>   
				   <br>
					
			
            <section class="menu">
                     <div class="logo">
                        <a href="RIM2.html" title="Best Seller">
               	            <img src="logo.jpg" width="70" height="70">
                        </a>
                    </div>
                   
                    <div class="genre">
                    <nav class="genre_info">
                        <ul class="genre_menu">
                            <li class="Scientifique">
                                <a title="Scientifique">Scientifique</a>
                                <div class="submenu">
                                    <div class="submenu_block">
                                        <div  class="subcategory_title">Math</div>
                                        <ul>
                                            <li><a href="scientifique.php">Analyse numérique</a></li>
                                            <li><a href="#">Algebre</a></li>
                                        </ul>
                                    </div>
                                    <div class="submenu_block">
                                        <div class="subcategory_title">Informatique</div>
                                        <ul>
                                            <li><a href="#">Programation C</a></li>
                                            <li><a href="#">JAVA</a></li>
                                        </ul>
                                    </div>
                                    <div class="submenu_block">
                                        <div class="subcategory_title">Physique</div>
                                        <ul>
                                            <li><a href="#">mécanique du point</a></li>
                                            <li><a href="#">Astronomie</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="Lettre">
                                <a title="Lettre">Lettre</a>
                                <div class="submenu">
                                    <div class="submenu_block">
                                        <div class="subcategory_title">Français</div>
                                        <ul>
                                            <li><a href="#">Roman</a></li>
                                            <li><a href="#">Conjugaison</a></li>
                                            <li><a href="#">Vocabulaire</a></li>
                                        </ul>
                                    </div>
                                    <div class="submenu_block">
                                        <div class="subcategory_title">Philosophie</div>
                                        <ul>
                                            <li><a href="#">Decarte</a></li>
                                        </ul>
                                    </div>
                                    <div class="submenu_block">
                                        <div class="subcategory_title">Anglais</div>
                                        <ul>
                                            <li><a href="#">Grammar</a></li>
                                            <li><a href="#">The old man and the sea</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="Fairy tale"><a title="Fairy tale">Fairy tale</a></li>
                            <li class="Populaire"><a title="Populaire">Populaire</a></li>
                        </ul>	
                    </nav>
                    </div>
                    <div class="search">
                    
                    <div class="form">
                        <form>
                            <div class="row">
                                <input placeholder="search" name="keyword_search" id="keyword" type="text" value="" autocomplete="off">            
                                <input class="btngui" value="" type="button" name="" onclick="do_search();">
                                <input id="key_pres" name="key_pres" value="" type="hidden" />
                                <input id="link_alias" name="link_alias" value="" type="hidden" />
                                <input id="keyword_search_replace" name="keyword_search_replace" value="" type="hidden" />
                            </div>
                            <div id="header_search_autocomplete"> 
				
                            </div>
                        </form>
                    </div>
                    <div class="clr"></div>                        
                    </div>
                   
            </section>
        </header>  




		   

            
      
           <section class="content">
                        <div class="main_body">
                            <div class="main_body_top top">
                        	 
                        	   <a>scientifique</a>
                            <div class="main_body_pagination">
                                <div class="pagination">
                                    <ul class="pages">
                                        <li><a class="active" href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">6</a></li>
                                        <li><a href="#">7</a></li>
                                     </ul>                                
                                </div>
                            </div>
                            </div>
                            
                            <div class="main_body_inside">
                                <div class="main_body_book1">
                            		<a title="Précis de nutrition">
                               		   <img src="images/Pr%C3%A9cis%20de%20nutrition.PNG">
                                    </a>
                                    <p>
                                    Precis de nutrition<br>Auteur(s) : Nicole Baudat<br>Editeur(s) : Lamarre<br>
                                    Collection : Etudiants IFSI - Les fondamentaux<br>Nombre de pages : 258 pages <br>
                                    Date de parution : 17/03/2016  (2e edition) <br>
                                    <a href="ab.php">affichier plus de detail...</a>
                                    </p>
                                </div>
                                
                                
                                
                                
                                 <div class="main_body_book1">
                            		<a title="Blender pour l'architecture">
                               		   <img src="images/Blender%20pour%20l'architecture.PNG">
                                    </a>
                                    <p>
                                    Blender pour l architecture<br>Conception, rendu, animation et impression 3D de scenes 
                                    architecturales -Nouvelle edition en couleur<br>Auteur(s) : Matthieu Dupont de Dinechin<br>
                                    Editeur(s) : Eyrolles<br>Collection : Acces libre<br>Nombre de pages : 330 pages <br>
                                    Date de parution : 01/01/2016  (2e edition)  <br>
                                    <a href="ab.php">affichier plus de detail...</a>
                                    </p>
                                </div>
                                
                                
                                
                                 <div class="main_body_book1">
                            		<a title="Une histoire de la biologie">
                               		   <img src="images/Une%20histoire%20de%20la%20biologie.PNG">
                                    </a>
                                    <p>
                                    Auteur(s) : Michel Morange<br>Editeur(s) : Seuil<br>Collection : Points - Sciences<br>
                                    Nombre de pages : 448 pages <br>Date de parution : 14/01/2016  <br>EAN13 : 9782757829172  <br>
                                    <a href="ab.php">affichier plus de detail...</a>
                                    </p>
                                </div>
                                
                                
                                
                                
                                 <div class="main_body_book1">
                            		<a title="Science de la couleur">
                               		   <img src="images/Science%20de%20la%20couleur.PNG">
                                    </a>
                                    <p>
                                    Aspects physiques et perceptifs<br>Auteur(s) : Robert Sève<br>Editeur(s) : Chalagam<br>
                                    Nombre de pages : 380 pages <br>Date de parution : 01/06/2009  <br>EAN13 : 9782951960756 <br>
                                    <a href="ab.php">affichier plus de detail...</a>
                                    </p>
                                </div>
                           
                        </div>
                </div>      
               </div>
            </section>
        </div>
    </body>
</html>