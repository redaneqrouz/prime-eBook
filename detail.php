<?php session_start();
	@mysql_connect("localhost","root","")or die("Can't Connect...");
			
	@mysql_select_db("shop") or die("Can't Connect to Database...");
	
	$id=$_GET['id'];
	
	$q="select * from book where b_id=$id";
	
	$res=mysql_query($q) or die("Can't Execute Query..");
	$row=mysql_fetch_assoc($res);
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
                             <div class="main_body_top top">
                            <div class="main_body_pagination">
                                <div class="pagination">                       
                                </div>
                            </div>
                                 <div align="center"><a><?php echo $row['b_nm'];?></a></div>
                                </div>
									 <div class="main_body_inside">
                                         <div class="main_body_book2">
										<?php
											echo '	
												<a href="'.$row['b_img'].'"><img src="'.$row['b_img'].'"></a>
                                                            <p>
                                                            <br><br><br><br>
                                                            <frame style="background-color:#efefef;">
															Titre du livre : '.$row['b_nm'].'<br>
				                                            Isbn : '.$row['b_isbn'].'<br>
												            Auteur : '.$row['b_publisher'].'<br>
															Edition : '.$row['b_edition'].'<br>
                                                            Page : '.$row['b_page'].'<br>
<mo style="color:red;font-family:Tahoma,Geneva,sans-serif;font-size:20px;">Prix:'.$row['b_price'].' Dh </mo>
                                                            </frame>
                                                            </p>
                                                            <br><br><br><br><br><br><br>
                                                            
                                                            <p><fieldset style="background-color:white;font-family:Ubuntu Condensed ,arial,sans-serif;width:98%"><legend><h3>Description:</h3></legend>'.$row['b_desc'].' </fieldset>      </p>
                                                            
                                                            
                                                            
                                                            ';

													   echo ' 
                                         <div class="mention"> <a href="process_cart.php?nm='                                                                                               .$row['b_nm'].'&cat='.$_GET['cat'].'&rate='.$row['b_price'].'">                                                                                        <img src="images/addtocart.png" width="60px" align="center">
													</a></div>';
																						                                  
												
										?>
                                         </div>
									</div>
								</div>
				</section>
</div>
</body>
</html>
