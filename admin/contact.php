

<?php 
session_start();
@mysql_connect("localhost","root","")or die("Can't Connect...");
			
	@mysql_select_db("shop") or die("Can't Connect to Database...");
	$q="select * from contact";
	 $res=mysql_query($q) or die("Can't Execute Query...");

	
	
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
                                                                                echo '<br><li><a href="booklist.php?cat='.$nb['cat_id'].'&catnm='.$nb["cat_nm"].'&catsubnm='.$nb["cat_sub_nm"].'">'.$nb["cat_sub_nm"].'</a></li>';
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
        
<section class="content">
<div class="main_body">
    <div class="main_body_top top">
	
		
        <div align="center"> <a>Contact</a></div>
    </div>
		<div class="main_body_inside">		 
					   <center>
					   <form action="process_del_contact.php" method="GET">
					<table border='1' WIDTH='100%'>
						<tr>
								<td WIDTH='10%'><b><u>Numéro</u></b>
								<TD WIDTH='20%'><b><u>Nom</u></b>
								<TD WIDTH='20%'><b><u>Email</u></b>
								<TD WIDTH='50%'><b><u>Message</u></b>
								<TD WIDTH='25%'><b><u>Supprimer</u></b>
							
						</tr>
						<?php
							$count=1;
							while($row=mysql_fetch_assoc($res))
							{
							echo '<tr>
										<td>'.$row['con_id'].'
										
										<td>'.$row['con_nm'].'
										<td>'.$row['con_email'].'
										<td>'.$row['con_query'].'
			';
										
	

	
										
			echo '<td><a href="process_del_contact.php?sid='.$row['con_id'].'"><img src="images/drop.png" ></a>
												
									
									</tr>';
									$count++;
							}
						?>

					
			
                                    
                                    </div>
                                    </div>
                           </table>
                           </form></center></section>

</body>
</html>
