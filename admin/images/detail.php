<?php session_start();
	@mysql_connect("localhost","root","")or die("Can't Connect...");
			
	@mysql_select_db("shop") or die("Can't Connect to Database...");
	
	$id=$_GET['id'];
	
	$q="select * from book where b_id=$id";
	
	$res=mysql_query($q) or die("Can't Execute Query..");
	$row=mysql_fetch_assoc($res);
?>

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
			
		
        
				<h1 class="title"> 
							<?php 
								if(isset($_SESSION['status']))
								{
									echo 'Bienvenue : ' .$_SESSION['unm']; 
								}
								else
								{	
									
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
                         
					
		
             			        
				                                     <?php

									                             	@mysql_connect("localhost","root","")or die("Can't Connect to server...");
			
									                             	@mysql_select_db("shop") or die("Can't Connect to Database...");
			                                                         $g="SELECT DISTINCT cat_nm FROM `genres`";
                                                                    $ga=mysql_query($g);
                                                                    while($gb=mysql_fetch_array($ga))
                                                                    {
                                                                        echo '<li class="'.$gb["cat_nm"].'">
                                                                                    <a title="'.$gb["cat_nm"].'">'.$gb["cat_nm"].'</a>
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
                                                                                echo '<li><a href="booklist.php?cat='.$nb['cat_id'].'&catnm='.$nb["cat_nm"].'">'.$nb["cat_sub_nm"].'</a></li>';
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
		
                 <div class="search">
                    
                    
                        <div id="sidebar">
							<?php
								include("includes/search.php");
							?>
					</div>
                                          
                </div>
             
			 </section>
        </header>  
	<!-- start page -->
        
                    <section class="content">
                         <div class="main_body">
                             <div class="main_body_top top">
                            <div class="main_body_pagination">
                                <div class="pagination">                       
                                </div>
                            </div>
                                 <a><?php echo $row['b_nm'];?></a>
                                </div>
									 <div class="main_body_inside">
                                         <div class="main_body_book2">
										<?php
											echo '	
												<a href="'.$row['b_img'].'"><img src="'.$row['b_img'].'"></a>
                                                            <p>
                                                            <br><br><br><br>
															nom du livre :'.$row['b_nm'].'<br>
				                                            isbn :'.$row['b_isbn'].'<br>
												            publisher: '.$row['b_publisher'].'<br>
															edition: '.$row['b_edition'].'<br>
                                                            page :'.$row['b_page'].'<br>
                                                            prix:'.$row['b_price'].'
                                                            <br><br><br><br><br><br><br><br><br><br><br>
                                                            <r>Description:'.$row['b_desc'].'</r>       
                                                            </p>';


                                               
													   echo ' 
                                         <div class="mention"> <a href="process_cart.php?nm='.$row['b_nm'].'&cat='.$_GET['cat'].'&rate='.$row['b_price'].'">                                                <img src="images/addtocart.png" width="60px" align="center">
													</a></div>';
												
												                                                        
												
										?>
                                         </div>
									</div>
								</div>
				</section>
</div>
</body>
</html>
