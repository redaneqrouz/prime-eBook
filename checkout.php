
					
					
					<?php session_start();
					@mysql_connect("localhost","root","")or die("Can't Connect...");
	@mysql_select_db("shop") or die("Can't Connect to Database...");
	mysql_query("SET NAMES UTF8");
					?>
<html>
    <head>
        <title>BIBLIOTHEQUE R.I.M</title>
        <link href="styleRIM.css" media="screen" rel="stylesheet" type="text/css" />
        
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
        
   <div id="wrapper_inside"> 
        
        <section class="content">
                   
                        <div class="main_body">
                            <div class="main_body_top top" style="text-align:center">
                        	   
                        	   <a>Profil</a>
                            
                            </div>
                            <div class="main_body_inside">
                         
                                <?php
                                           /* @mysql_connect("localhost","root","")or die("Can't Connect to server...");
			
									        @mysql_select_db("shop") or die("Can't Connect to Database...");
												
                                            $u="SELECT * FROM `user` where u_con='1'";
											$ua=mysql_query($u);
                                            $ub=mysql_fetch_array($ua);
                                            $nom=$ub['u_fnm'];
                                            $prenom=$ub['u_unm'];
                                            $pwd=$ub['u_pwd'];
                                            $gender=$ub['u_gender'];
                                            $email=$ub['u_email'];
                                            $contact=$ub['u_contact'];
                                            $city=$ub['u_city'];
                                            echo '<table style="width:100%;height:45%;text-align:center;" border="1"><tr><td><a style="color:white;">nom</a></td><td><a style="color:white;">'.$nom.'</a></td></tr>
                                                <tr><td><a style="color:white;">prenom</a></td><td><a style="color:white;">'.$prenom.'</a></td></tr>
                                                <tr><td><a style="color:white;">mot de passe</a></td><td><a style="color:white;">'.$pwd.'</a></td></tr>
                                                <tr><td><a style="color:white;">sexe</a></td><td><a style="color:white;">'.$gender.'</a></td></tr>
                                                <tr><td><a style="color:white;">email</a></td><td><a style="color:white;">'.$email.'</a></td></tr>
                                                <tr><td><a style="color:white;">contact</a></td><td><a style="color:white;">'.$contact.'</a></td></tr>
                                                <tr><td><a style="color:white;">ville</a></td><td><a style="color:white;">'.$city.'</a></td></tr>
                                                  </table><br>
                                                 ';
                                            /*echo '<a style="color:white;">nom= '.$nom.'</a><br>
                                                <a style="color:white;">prenom= '.$prenom.'</a><br>
                                                <a style="color:white;">mot de passe= '.$pwd.'</a><br>
                                                <a style="color:white;">sexe= '.$gender.'</a><br>
                                                <a style="color:white;">email= '.$email.'</a><br>
                                                <a style="color:white;">contact= '.$contact.'</a><br>
                                                <a style="color:white;">ville= '.$city.'</a><br>';*/	
                                                
                                            
                                           /* mysql_close();*/
											?>  
                       
					   
					   <hr>
					   <br><br>
					  <center> <h2>Produit</h2></center>
					   <form action="checkout1.php" method="POST">
							<table width="100%" border="0">
								<tr >
                                    <td> <b>No</b></td>
									<td> <b>Catégorie</b></td>
									<td> <b>Produit</b></td>
									<td> <b>Quantité</b></td>
									<td> <b>Taux</b></td>
									<td> <b>Prix</b></td>
									<td> <b>Effacer</b></td>
								</tr>
								<tr><td colspan="7"><hr style="border:1px Solid #a1a1a1;"></tr>
							
								<?php
									$tot = 0;
									$i = 1;
									if(isset($_SESSION['cart']))
									{

									foreach($_SESSION['cart'] as $id=>$x)
									{	
										echo '
											<tr>
											<td> '.$i.'</td>
											<td> '.$x['cat'].'</td>
											<td> '.$x['nm'].'</td>
											<td> '.$x['qty'].'</td>
											<td> '.$x['rate'].'</td>
											<td> '.($x['qty']*$x['rate']).'</td>
											<td> <a href="process_cart.php?id='.$id.'">Supprimer</a></td>
										</tr>
										';
										
										$tot = $tot + ($x['qty']*$x['rate']);
										$i++;
									}
									}
								
								?>
							<tr><td colspan="7"><hr style="border:1px Solid #a1a1a1;"></tr>
								
							<tr>
							<td colspan="6" align="right">
							<h3>Total:</h3>
							
							</td>
							<td> <h3><?php echo $tot; ?> </h3></td>
							</tr>
							<tr><td colspan="7"><hr style="border:1px Solid #a1a1a1;"></tr>
							
							<Br>
							
								</table>			
							<Br><Br><Br><Br>	
								<center><h1>choix de mode de paiement</h1></center>
								<table width=100% border="3">
								<tr style="color:grey; font-size:30;text-align:center"><td  width="800px"><center>mode</center></td><td><center>choix</center></td></tr>
								
								<tr><td style=" font-size:20" width="800px">par chéque </td><td><center><input type="radio"name="mode_de_paiement" value="par chéque"></center></td></tr>
								
								<tr><td style=" font-size:20" width="800px">par cach </td><td><center><input type="radio" name="mode_de_paiement" value="par cach"></center></td></tr>
								
								<tr><td style=" font-size:20" width="800px">passé par PAYPAL</td><td><center><input type="radio" name="mode_de_paiement" value="passé par PAYPAL"></center></td></tr>
								
								<tr><td style=" font-size:20v" width="800px">passé par l'intermidiaire de credit carte</td><td><center><input type="radio" name="mode_de_paiement" value="passé par l'intermidiaire de credit carte" ></center></td></tr>
								</table>
							
							<center><h1>choix de mode de livraison</h1></center>
							<table width=100% border="3">
								<tr style="color:grey; font-size:30"><td width="300px"><center>mode</center></td>
								<td style="text-align:center">livraison à domicile<br><font color="red" align="center" size="5px">( taxe=24 Dh )</font></td>
								<td style="text-align:center">au point de vente</td></tr>
								<tr style="color:grey; font-size:30"><td><center>choix</center></td>
								<td><center><input type="radio" value="livrason domicile" name=" mode_de_livraison"></center></td>
								<td><center><input type="radio" value="au point de vente" name=" mode_de_livraison"></center></td>
								</tr>
								
								</table>
<br><br>
                      <center>        <input type="submit" value="Valider" ></center>
                                
                                
                              </form>  
                            </div>
                        </div>
                    
            </section>
        
        
        
        
        
        
        
        
        
        
        </div>
    </body>
</html>