<?php session_start();
	  @mysql_connect("localhost","root","")or die("Can't Connect to server...");
			                             @mysql_select_db("shop") or die("Can't Connect to Database...");
mysql_query("SET NAMES UTF8");

?>

<html>
    <head>
        <title>BIBLIOTHEQUE R.I.M</title>
        <link href="styleRIM.css" media="screen" rel="stylesheet" type="text/css" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
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
			
				<br>
				<br>
				<br>
				            <section class="content">
                   
                        <div class="main_body">
                            <div class="main_body_top top">
                        	   
                                <div align="center"><a>Panier</a></div>
                            
                            </div>
						
							<div class="main_body_inside">
						
							<form action="process_cart.php" method="POST">
							<table width="100%" border="1">
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
											<td> <input type="text" size="2" value="'.$x['qty'].'" name="'.$id.'"></td>
											<td> '.$x['rate'].'</td>
											<td> '.($x['qty']*$x['rate']).'</td>
											<td> <a href="process_cart.php?id='.$id.'" text-decoration:underline">Supprimer</a></td>
										</tr>
										';
										
										$tot = $tot + ($x['qty']*$x['rate']);
										$i++;
									}
									}
								
								?>
                                <tr><td colspan="7"><hr style="border:1px Solid #a1a1a1;"></td></tr>
								
							<tr>
							<td colspan="6" align="right">
							<h3>Total:</h3>
							
							</td>
							<td> <h3><?php echo $tot; ?> </h3></td>
							</tr>
                                <tr><td colspan="7"><hr style="border:1px Solid #a1a1a1;"></td></tr>
                                <!--<tr><td clospan="7" align="rignt"><input type="submit" value=" Re-Calculer " ></td></tr>-->
							<tr>
                                <td colspan="6"></td>
							<td>
							
							<input type="submit" value=" Re-Calculer " >
							</td>
							
							</tr>
								</table>						

								<br><br>
							<center>
							
							</center>
							
							</form>
							
							
							
						
						<a href="RIM.php" type="button" value=" continue-shopping " >Continuer mes achats</a>
							
							<?php
							 if(isset($_SESSION['status']))
												 {
													   echo ' 
                                         <div class="mention"> <a href="checkout.php"> <img src="commande.png" width="60px" align="center">
													</a></div>';
												}
												else
												{
												echo '<br><a href="register.php"><div class="mention"><img src="commande.png"></div>                                                              </a>';
												};
							?>
                            </div>
					</div>
				
                            </section>
					</div>
</body>
</html>
