
<?php session_start();
	
	@mysql_connect("localhost","root","")or die("Can't Connect...");
	
	@mysql_select_db("shop") or die("Can't Connect to Database...");
	
	$cat=$_GET['cat'];
	
	$totalq="select count(*) \"total\" from book where b_subcat='$cat'";
	
	$totalres=mysql_query($totalq) or die("Can't Execute Query...");
	$totalrow=mysql_fetch_assoc($totalres);
	
	
	$page_per_page=6;
	
	$page_total_rec=$totalrow['total'];
	
	$page_total_page=ceil($page_total_rec/$page_per_page);
	
	
	if(!isset($_GET['page']))
	{
		$page_current_page=1;
	}
	else
	{
		$page_current_page=$_GET['page'];
	}
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
                           <a href="RIM.php" title="Home">
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
                    
                    <div class="form">
                        <div id="sidebar">
							<?php
								include("includes/search.php");
							?>
					</div>
                    </div>
                    <div class="clr"></div>                        
                </div>
             
			 </section>
        </header> 
            
            
           

							<div id="content">
                                <div class="main_body">
								<div class="post">
									<div class="entry">
								<div class="main_body_top top">
                                     <div class="main_body_pagination">
                                <div class="pagination">
                                      	<?php
											
											if($page_total_page>$page_current_page)
											{
												echo '<a href="booklist.php?subcatid='.$_GET['cat'].'&subcatnm='.$_GET['catnm'].'&page='.($page_current_page+1).'">Next</a>';
											}
											
											for($i=1;$i<=$page_total_page;$i++)
											{
												echo '&nbsp;&nbsp;<a href="booklist.php?subcatid='.$_GET['cat'].'&subcatnm='.$_GET['catnm'].'&page='.$i.'">'.$i.'</a>&nbsp;&nbsp;';
											}
											
											if($page_current_page>1)
											{	
												echo '<a href="booklist.php?subcatid='.$_GET['cat'].'&subcatnm='.$_GET['catnm'].'&page='.($page_current_page-1).'">Previous</a>';
											}
											
										?>                            
                                </div>
                            </div>
                                 <div align=center><a><?php 
                                     @mysql_connect("localhost","root","")or die("can't connect to server");
                                     @mysql_select_db("shop") or die("can't connect to database");
                                     $a=$_GET["cat"];
                                     $b="select cat_sub_nm from genres where cat_id='$a'";
                                     $ba=mysql_query($b);
                                     $bb=mysql_fetch_assoc($ba);
                                     echo $bb['cat_sub_nm'];
                                     mysql_close();
                                     ?></a></div>
                                </div>
                                        
                        
										<div class="main_body_inside">
                                            
											<?php
                                                @mysql_connect("localhost","root","")or die("Can't Connect to server...");
			
									           @mysql_select_db("shop") or die("Can't Connect to Database...");
												
												$k=($page_current_page-1)*$page_per_page;
											
												$query="select *from book where b_subcat='$cat' LIMIT ".$k .",".$page_per_page;
	
												$res=mysql_query($query) or die("Can't Execute Query...");
	
												$count=0;
												while($row=mysql_fetch_assoc($res))
												{
													echo '<div class="main_body_book1">
														<a href="detail.php?id='.$row['b_id'].'&cat='.$_GET['catnm'].'">
														<img src="'.$row['b_img'].'">
                                                        <p>
                                                        <br>Nom du livre  :'.$row['b_nm'].'<br>publisher :'.$row['b_publisher'].'                                                                         <br> Edition   :'.$row['b_edition'].'<br> nombre de page :'.$row['b_page'].'
                                                        <br><div class="pri"><center>Prix  :'.$row['b_price'].'dh</center></div>
                                                    
                                                       </p>
                                                       </a>
                                                       <a href="process_cart.php?nm='                                                                                                                   .$row['b_nm'].'&cat='.$_GET['cat'].'&rate='.$row['b_price'].'"><div          
                                                         class="classajout"><center>ajouter au panier</center></div></a>   
                                                         <a href="detail.php?id='.$row['b_id'].'&cat='.$_GET['catnm'].'"><div                                                                               class="classdetail"><center>plus de detail</center></div></a>
                                                         </div>   
                                                         ';
                                                    
                                                    //<br><div class="ima"><img src="images/plusinfo.png"></div><br>
                                                    /*<div class="imo"><a href="process_cart.php?nm='                                                                                               .$row['b_nm'].'&cat='.$_GET['cat'].'&rate='.$row['b_price'].'"><img                                                                                src="images/ajouterpanier.png"></a></div>
                                                    <br><div class="classimg">ajouter au panier</div><br>*/
													$count++;	
												}
                                            mysql_close();
											?>  
									</div>
                                    </div>
                           
                                    
									</div>
									
								</div>
				</div>      
							</div>
					<!-- end content -->
					
					
				
			<!-- end page -->
			
</body>
</html>
