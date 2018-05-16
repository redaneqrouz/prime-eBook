<?php session_start();
	
	@mysql_connect("localhost","root","")or die("Can't Connect...");
	
	@mysql_select_db("shop") or die("Can't Connect to Database...");
	
	$search=$_GET['s'];
	$query="select * from book where b_nm like '%$search%'";
	
	$res=mysql_query($query) or die("Can't Execute Query...");
	
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
		
                           
                            <div style="float:right">
                                <a href="category.php">
                                    <div style="position:relative;z-index:3;">
                                        <font color="white">Modifier Catégorie</font>
                                    </div>
                                </a>
                            </div>
                 
                </div>
			 </section>
        
   <div id="wrapper_inside"> 

				<div id="page">
					<!-- start content -->
							<div id="content">
								<div class="post">
									<h3 class="title"><?php echo "Résultat pour : ".$_GET['s'];?></h3>
									<div class="entry">
										
										<table border="3" width="100%" >
											<?php
                                            @mysql_connect("localhost","root","")or die("Can't Connect to server...");
			
									                             	@mysql_select_db("shop") or die("Can't Connect to Database...");
												$count=0;
												while($row=mysql_fetch_assoc($res))
												{
													if($count==0)
													{
														echo '<tr>';
													}
													$b=$row['b_subcat'];
                                                    $a="select cat_sub_nm from `genres` where cat_id='$b'";
                                                    $subnm=mysql_query($a);
                                                    $catsubnm=mysql_fetch_assoc($subnm);
													echo '<td valign="top" width="20%" align="center">
														<a href="detail.php?id='.$row['b_id'].'&cat='.$catsubnm['cat_sub_nm'].'">
														<img src="../'.$row['b_img'].'" width="80" height="100">
														<br>'.$row['b_nm'].'</a>
													</td>';
													$count++;							
													
													if($count==4)
													{
														echo '</tr>';
														$count=0;
													}
												}
                                            mysql_close();
											?>
											
										</table>
									</div>
									
								</div>
								
							</div>
					<!-- end content -->
					
					
				</div>
        </div>
</body>
</html>
