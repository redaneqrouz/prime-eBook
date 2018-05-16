
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
            
            
           

							<div id="content">
                                <div class="main_body">
								<div class="post">
									<div class="entry">
								<div class="main_body_top top">
                                     <div class="main_body_pagination">
                                <div class="pagination">
                                      	<?php
											if($page_current_page>1)
											{	
												echo '<a href="booklist.php?cat='.$_GET['cat'].'&catnm='.$_GET['catnm'].'&catsubnm='.$_GET['catsubnm'].'&page='.($page_current_page-1).'">«</a>';
											}
											
											
											for($i=1;$i<=$page_total_page;$i++)
											{
												echo '&nbsp;&nbsp;<a href="booklist.php?cat='.$_GET['cat'].'&catnm='.$_GET['catnm'].'&catsubnm='.$_GET['catsubnm'].'&page='.$i.'">'.$i.'</a>&nbsp;&nbsp;';
											}
											
											if($page_total_page>$page_current_page)
											{
												echo '<a href="booklist.php?cat='.$_GET['cat'].'&catnm='.$_GET['catnm'].'&catsubnm='.$_GET['catsubnm'].'&page='.($page_current_page+1).'">»</a>';
											}
											
										?>                            
                                </div>
                            </div>
                                 <div align=center><a><?php 
                                     /*@mysql_connect("localhost","root","")or die("can't connect to server");
                                     @mysql_select_db("shop") or die("can't connect to database");
                                     $a=$_GET["cat"];
                                     $b="select cat_sub_nm from genres where cat_id='$a'";
                                     $ba=mysql_query($b);
                                     $bb=mysql_fetch_assoc($ba);
                                     echo $bb['cat_sub_nm'];
                                     mysql_close();*/
                                     echo $_GET['catsubnm'];
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
                   <table class="table_contenu">	
                   <tr><td rowspan="2">
                   <a href="detail.php? id='.$row['b_id'].'&cat='.$_GET['catsubnm'].'">
                   <img src="'.$row['b_img'].'"></a></td>
                   <td style="text-align:justify;left:60px;">
                   <a href="detail.php? id='.$row['b_id'].'&cat='.$_GET['catsubnm'].'">
                   Titre du livre  :'.$row['b_nm'].'<br>                                                
                   Auteur :'.$row['b_publisher'].'<br>                                                    
                   Edition   :'.$row['b_edition'].'<br> 
                   Page :'.$row['b_page'].' <br>
                   <div class="pri">Prix:'.$row['b_price'].'dh</div><br>
                   </a></td></tr>
                   <tr>
                   <td><a href="detail.php?id='.$row['b_id'].'&cat='.$_GET['catsubnm'].'">
                    <div class="plusdedetail">Plus de détail </div></a></td>
                  
           <td><a href="process_cart.php?nm='.$row['b_nm'].'&cat='.$_GET['catsubnm'].'&rate='.$row['b_price'].'">
                   <div class="ajouteraupanier">ajouter au panier</div></a></td></tr>
                </table>
                         </div>';
                                                    /*<a href="process_cart.php?nm='                                                                                                                   .$row['b_nm'].'&cat='.$_GET['cat'].'&rate='.$row['b_price'].'"><div          
                                                         class="classajout"><center>plus de detail</center></div></a>   
                                                         <a href="detail.php?id='.$row['b_id'].'&cat='.$_GET['catnm'].'"><div                                                                               class="classdetail"><center>ajouter au panier</center></div></a>*/
                                                    
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
