<?php session_start();
	@mysql_connect("localhost","root","")or die("Can't Connect...");
	@mysql_select_db("shop") or die("Can't Connect to Database...");
	/*$id=$_GET['id'];*/
	//$totalq="select count(*) \"total\" from book  ";	
    $totalq="select count(*) \"total\" from book";/* where b_id='$id'*/
	$totalres=mysql_query($totalq) or die("Can't Execute Query...");
	$totalrow=mysql_fetch_assoc($totalres);
	$page_per_page=12;
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
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
		
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
 <div class="post">
		
            <section class="content">
                   
                        <div class="main_body">
                            <div class="main_body_top top">
                        	   <div class="best_seller"></div>
                        	   <a>-'Populaire</a>
                            <div class="main_body_pagination">
                                <div class="pagination">
                                    	<?php   @mysql_connect("localhost","root","")or die("Can't Connect to server...");
			
									       @mysql_select_db("shop") or die("Can't Connect to Database...");
											$g="SELECT DISTINCT cat_id FROM `genres`";
                                            $ga=mysql_query($g);
                                            while($gb=mysql_fetch_array($ga))
                                             {                           
											
											if($page_current_page>1)
											{	
												echo '<a href="RIM.php?subcatid='.$gb['cat_id'].'&page='.($page_current_page-1).'">«</a>';
											}
											for($i=1;$i<=$page_total_page;$i++)
											{
												echo '&nbsp;&nbsp;<a href="RIM.php?subcatid='.$gb['cat_id'].'&page='.$i.'">'.$i.'</a>&nbsp;&nbsp;';
											}
											
											
                                            if($page_total_page>$page_current_page)
											{
												echo '<a href="RIM.php?subcatid='.$gb['cat_id'].'&page='.($page_current_page+1).'">»</a>';
											}
                                                break;
                                    }
									
										?>  
                                      
                                  	<?php

                                        /*  if($page_total_page>$page_current_page)
											{
												echo '<a href="RIM.php?id='.$_GET['id'].'&page='.($page_current_page+1).'">Next</a>';    
											}
											
											for($i=1;$i<=$page_total_page;$i++)
											{
                                        echo '&nbsp;&nbsp;<a href="RIM.php?id='.$_GET['id'].'&page='.$i.'">'.$i.'</a>&nbsp;&nbsp;';                                              
											}
											
											if($page_current_page>1)
											{	
												echo '<a href="RIM.php?id='.$_GET['id'].'&page='.($page_current_page-1).'">Previous</a>';
											}*/
										?>                                
                                </div>
                            </div>
                            </div>
                            <div class="main_body_inside">
                         
                              	<?php
                                                @mysql_connect("localhost","root","")or die("Can't Connect to server...");
			
									           @mysql_select_db("shop") or die("Can't Connect to Database...");
												
												$k=($page_current_page-1)*$page_per_page;
											
												//$query="select * from book where b_id='$id' LIMIT ".$k .",".$page_per_page;
                                                $query="select * from book LIMIT ".$k .",".$page_per_page;
	
												$res=mysql_query($query) or die("Can't Execute Queryici...");
	
												$count=0;
												while($row=mysql_fetch_assoc($res))
												{
                                                    $b=$row['b_subcat'];
                                                    $a="select cat_sub_nm from `genres` where cat_id='$b'";
                                                    $subnm=mysql_query($a);
                                                    $catsubnm=mysql_fetch_assoc($subnm);
													echo ' <div class="main_body_book">
                                                    
														<a href="detail.php?id='.$row['b_id'].'">
                                                        <a title="'.$row['b_nm'].'">
														<a href="detail.php?id='.$row['b_id'].'&cat='.$catsubnm['cat_sub_nm'].'"><img src="'.$row['b_img'].'"></a>
                                                        </a>
                                                        <div class="bottom">
                                    	               <p class="name">
                                                      <a href="detail.php?id='.$row['b_id'].'&cat='.$catsubnm['cat_sub_nm'].'"> '.$row['b_nm'].'</a></p>
                                                        </div>
                                                     </a>
                                                         </div>';
													$count++;	
												}
												
                                            mysql_close();
											
											?> </div>
                        </div>
                    
            </section>
        </div>
        </div>
		
    </body>
</html>