<?php session_start();
@mysql_connect("localhost","root","")or die("Can't Connect...");
	@mysql_select_db("shop") or die("Can't Connect to Database...");
	mysql_query("SET NAMES UTF8");
	?>
<html>
    <head>
        <title>A propos de nous</title>
        <link rel="stylesheet" type="text/css" href="styleRIM.css">
    </head>
    <body>
        <header> 
            
                <div style="margin:auto;width:100%;max-width:1088px">
                           <a href="RIM.php" title="Home">
               	              <img src="logo.jpg" width="70" height="70">
                           </a>
                   
                            <div class="top_menu">
                		
					           <div id="sidebar">
							         <?php
								        include("includes/menu.php");
							         ?>
					           </div>
                            </div>
                    
                </div>     
         </header>
        <section class="menu">
                     
                  <div style="margin:auto;width:100%;max-width:1088px"> 
                    <div class="genre">
                        
                       <nav class="genre_info">
                           
                              <ul class="genre_menu">
                         
					 <h1 class="title">
			
							</h1> 
		
             			        
				                                     <?php

									                             	@mysql_connect("localhost","root","")or die("Can't Connect to server...");
			
									                             	@mysql_select_db("shop") or die("Can't Connect to Database...");
			                                                         $g="SELECT DISTINCT cat_nm FROM `genres`";
                                                                    $ga=mysql_query($g);
                                                                    while($gb=mysql_fetch_array($ga))
                                                                    {
                                                                        echo '<li class="'.$gb["cat_nm"].'">
                                                                                    <a title="'.$gb["cat_nm"].'"><span style="cursor:pointer">'.$gb["cat_nm"].'</span></a>
                                                                                        <div class="submenu">
                                                                                         
                                                                                                    ';
                                                                    
                                                            
                                                                            $i=$gb["cat_nm"];
									                             	     $s=sprintf("SELECT DISTINCT cat_sub FROM `genres` WHERE cat_nm= '%s'",mysql_real_escape_string($i));
                                                                        $sa=mysql_query($s);
									                              	    while($sb=mysql_fetch_assoc($sa))
										                              	{
										 	                          	     echo '<div class="submenu_block">
                                                                                    <div class="subcategory_title">'.$sb["cat_sub"].'</div><ul>';
                                                                            $j=$sb["cat_sub"];
											                         	   $n=sprintf("SELECT cat_id,cat_nm,cat_sub_nm FROM `genres` WHERE cat_sub='%s'",mysql_real_escape_string($j));
                                                                            $na=mysql_query($n);
                                                                            while($nb=mysql_fetch_assoc($na))
                                                                            {
                                                                                echo '<li><a href="booklist.php?cat='.$nb['cat_id'].'&catnm='.$nb["cat_nm"].'&catsubnm='.$nb["cat_sub_nm"].'">'.$nb["cat_sub_nm"].'</a></li>';
                                                                            }
                                                                            echo '</ul></div>';
											                           }
                                                                    echo '</div>
							                                             </li>';}
			
											                         mysql_close();
								                                 ?>
			                                             
							                     
                           </ul>			   
                       	  
                       

                        </nav>
                     
       
    
				</div>
		
                           
                            <?php
                                    $tot=0;
    
                                    if(isset($_SESSION['cart']))
									   {
                                            
									       foreach($_SESSION['cart'] as $id=>$x)
									       {	
										  $tot = $tot + $x['qty'];
										
										
									       }
                                            
									   }
                                    echo '<div class="cart" style="float:right"><a href="viewcart.php"><div style="padding:14 0 0 28;width:10px;height:15px"><font color="white">'.$tot.'</font></div></a></div>';
    
    
    
    
                            ?>
                 
                </div>
			 </section>
        <h1 class="title"><center>Bienvenue à la bibliothéque en ligne</center></h1>   
        <div class="plan">
            <br><br>
        <div class="grandtitre"><h1>Commander un livre</h1></div>
            <hr width=80% size=5 color=blue >
            <div class="text">Si vous souhaitez commander un livre scientifique ,littérature ou autre, nous avons prévu pour vous la possibilité de le faire sur ce site. </div>
            <br><br>
            <div class="grandtitre"><h1>Comment gérer son panier ?</h1></div>
            <hr width=80% size=5 color=blue >
            <br><br>
            <div class="text">Plusieurs livres vous plaisent et vous aimeriez les commander ? Connectez-vous à votre compte, faites une recherche sur chacun des livres que vous aimeriez commander et cliquez systématiquement sur le bouton “ajouter au panier”. Une fois votre liste constituée, cliquez sur le bouton “ajouter au panier” situé au bas de celle-ci.
Vous obtenez un aperçu de votre panier. Retirez des livres si vous avez changé d’avis,
Votre panier est envoyé à la Bibliothèque de la Ligne qui rajoutera ces livres dans votre panier de resérvation. </div>
        
            <div class="grandtitre"><h1>Faire une recherche</h1></div>
            <hr width=80% size=5 color=blue >
            <br><br>
            <div class="text">Vous cherchez un roman policier ? Votre enfant raffole de romans d’aventure? Vous cherchez le dernier livre d’Amélie Nothomb ? La Bibliothèque en ligne vous offre plusieurs possiblités pour trouver le livre que vous recherchez.           <br>
                <div class="grandtitre"><h3>&#9679;Vous savez exactement ce que vous recherchez ? </h3></div>
                    <br>
<div class="text">Faites une recherche directement sur un titre, un mot  au départ de la page d’accueil. vous obtiendrez des résultats encore plus précis.</div>
                <div class="grandtitre"><h3>&#9679;Vous ne savez pas exactement ce que vous recherchez ?  </h3></div>
                    <br>
<div class="text">Rendez-vous directement dans le catalogue, où les possibilités de recherche sont plus étendues. Les filtres vous permettront de mieux préciser votre recherche : par type ,cat"gorie et sous catégorie.</div>
                <div class="grandtitre"><h3>&#9679;Présentation des résultats </h3></div>
                    <br>

            <div class="text">le résultat est présenté avec, pour chaque livre :<br>

    &#42;L'image de couverture<br>
    &#42;Le titre<br>
    &#42;L’auteur<br>
    &#42;Le support<br>
    &#42;La date de parution<br>
    &#42;Un résumé du livre<br></div>

        </div>
            <div class="grandtitre"><h1>Gérer son compte</h1></div>
            <hr width=80% size=5 color=blue >
            <br><br>
            <div class="text">Cette section vous permet de gérer les informations relatives à votre compte. Vous pourrez y changer votre adresse e-mail, modifier votre mot de passe ou encore consulter vos téléchargements et votre panier </div>
            <div class="grandtitre"><h3>&#9679;Vos données</h3></div>
            <br>
            <div class="text">Dans cette partie, vous retrouverez vos données personnelles comme votre nom, prénom, adresse e-mail et numéro de membre. Si vous désirez modifier ces données,tout simplement consulter votre profil et l'editer ou modifier. </div>
            <div class="grandtitre"><h3>&#9679;votre panier</h3></div>
            <br>
            <div class="text">Cette liste représente tous les livres que vous avez commandé auprès de nos bibliothécaires. Que ce soit par par e-mail ou en commandant un livre via la Bibliothèque en ligne. </div>
            <div class="grandtitre"><h3>&#9679;Votre mot de passe</h3></div>
            <br>
            <div class="text">Dès validation de votre inscription à la Bibliothèque en ligne, vous recevrez vos codes d’accès (numéro de membre et mot de passe) à la Bibliothèque en ligne. Dans cette section vous pourrez modifier votre mot de passe.  </div>
            
            
            <div class="grandtitre"><h1>Accessibilité de ce site web</h1></div>
            <hr width=80% size=5 color=blue >
            <br><br>
            <div class="text">La Bibliothèque en ligne est directement accessible aux personnes de toute age et différent génération ,quel que soit le programme et les moyens techniques qu'elles utilisent, mais a également comme but d'être utile et agréable pour le public en général.</div>
            
            <div class="grandtitre"><h1>Contacter la Bibliothèque</h1></div>
            <hr width=80% size=5 color=blue >
            <br><br>
            <div class="text">Vous avez encore une question ? Contactez sans tarder la Bibliothèque !<br>
            via "contactez nous" situé en haut a droit.</div>
        </div>
    </body>
</html>