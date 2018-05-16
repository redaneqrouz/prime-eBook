
					
					
					<?php session_start(); @mysql_connect("localhost","root","")or die("Can't Connect...");
	@mysql_select_db("shop") or die("Can't Connect to Database...");
	mysql_query("SET NAMES UTF8"); ?>
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
			mysql_query("SET NAMES UTF8");
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
        <div class="wrapper_inside">
   	<section class="content">
	<div class="main_body">
                            <div align="center" class="main_body_top top">
                        	 <a>  Merci de vos achat</a>
                        	</div>
                              
   <div class="main_body_inside">
   <table width="100%" border="0">
								<tr >
                                    <td> <b>No</b></td>
									<td> <b>Categorie</b></td>
									<td> <b>Produit</b></td>
									<td> <b>Quantite</b></td>
									<td> <b>Taux</b></td>
									<td> <b>Prix</b></td>
									
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
											
										</tr>
										';
										
										$tot = $tot + ($x['qty']*$x['rate']);
										$i++;
									}
									}
									
									
									 

								
								?>
							<tr><td colspan="7"><hr style="border:1px Solid #a1a1a1;"></tr>
								
							<tr>
							
							
							
							
							
							</tr>
							<tr><td colspan="7"><hr style="border:1px Solid #a1a1a1;"></tr>
							
							<Br>
							
								</table>
	 
	<?php
	
	 echo '<fieldset>';
	  echo '<h2 style="text-align:center">Votre Choix </h2>';
	   echo '<table style="margin:auto" border=2 text-align="center">';
	   echo '<tr><td> mode de paiement</td><td>mode de livraison</td></tr>';
	 foreach($_POST as $value){
		 echo '<tr><td rowspan="2">'.$value.'</td></tr>';	 
	 }
	 
	 echo '</table>';
	 if($_POST['mode_de_livraison']=='livrason domicile'){
		 echo '<h2 style="text-align:center">Prix Total : '.($tot+24).'</h2>';
		 
		 
	 }
	 else{
		 echo '<h2 style="text-align:center">Prix Total : '.$tot.'</h2>';
	}
 	 
	 echo '</fieldset>';
	 ?>
	 </div>
	 </section>
	 </div>
	 
	 