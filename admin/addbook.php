<?php session_start();


@mysql_connect("localhost","root","")or die("Can't Connect...");
	@mysql_select_db("shop") or die("Can't Connect to Database...");
	mysql_query("SET NAMES UTF8");?>







<html>
    <head>
        <title>BIBLIOTHEQUE R.I.M</title>
        <link href="styleRIM.css" media="screen" rel="stylesheet" type="text/css" />
        <style>td{height:50px}</style>
        
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
        
			
			

<section class="content">
                   
                        <div class="main_body">
                            <div class="main_body_top top">
                                <div align=center><a>Modifier La Bibliotheque</a></div></div>
                                <div class="main_body_inside">
                                    <center>
									<?php
											if(isset($_GET['error']))
											{
												echo '<font color="red">'.$_GET['error'].'</font>';
												echo '<br><br>';
											}
											
											if(isset($_GET['ok']))
											{
												echo '<font color="blue">Vous êtes inscrit avec succès ..</font>';
												echo '<br><br>';
											}
										
										?>
									
				<form action='process_addbook.php' method='POST' enctype="multipart/form-data">
				<table>
                    <tr><td><b>Nom du livre:</b></td>
                        <td><input type='text' name='name' size='40'></td></tr>
						
						
                    <tr><td><b>Catégorie:</b></td>
						<td><select style="width: 200px;" name="cat">
								<?php
									
										$link=mysql_connect("localhost","root","")or die("Can't Connect...");
			
											mysql_select_db("shop") or die("Can't Connect to Database...");
			
											$query="select distinct * from genres ";
			
											$res=mysql_query($query,$link);
											
											while($row=mysql_fetch_assoc($res))
											{
												/*echo "<option disabled>".$row['cat_nm'];*/
												
												$q2 = "select distinct * from genres where cat_id = ".$row['cat_id'];
												
												$res2 = mysql_query($q2,$link) or die("Can't Execute Query..");
												while($row2 = mysql_fetch_assoc($res2))
												{	
													echo '<option value="'.$row2['cat_id'].'">  '.$row2['cat_sub_nm'];
									
													
												}
												
											}
											mysql_close($link);
								?>
                            </select></td></tr>
						
						
                    <tr><td><b>Description:</b></td>
                        <td><textarea cols="40" rows="6" name='description' ></textarea></td></tr>
						
						
                    <tr><td><b>L'auteur:</b></td>
                        <td><input type='text' name='publisher' size='40'></td></tr>
						
						
                    <tr><td><b>Date d'Édition:</b></td>
                        <td><input type='text' name='edition' size='40'></td></tr>
						
						
                    <tr><td><b>ISBN:</b></td>
                        <td><input type='text' name='isbn' size='40'></td></tr>
						
						
						<tr><td><b>Page:</b></td>
                            <td><input type='text' name='pages' size='40'></td></tr>
						
						
						<tr><td><b>Prix:</b></td>
						<td><input type='text' name='price' size='40'></td></tr>
						
						
						<tr><td><b>Image:</b></td>
						<td><input type='file' name='img' size='35'></td></tr>
						
						
						
						<!--<tr><td style="color:white"><b>E-Book:</b></td>
						<td><input type='file' name='ebook'  size='35'></td></tr>-->
						
						
                    <tr><td colspan="2" style="text-align:center"><input  type='submit'  value=' Enregistrer '  ></td></tr>
                    </table>
				</form>
                                        </center>
			</div>
			
		</div>
		
	
	
    </section>
        </div>
</body>
</html>
