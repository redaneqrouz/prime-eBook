<?php session_start();@mysql_connect("localhost","root","")or die("Can't Connect...");
	@mysql_select_db("shop") or die("Can't Connect to Database...");
	mysql_query("SET NAMES UTF8");
	
	/*@mysql_connect("localhost","root","")or die("Can't Connect...");
	
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
	}*/
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
<section class="content_right">
            <div class="main_body">
                <div class="main_body_top top" style="text-align:center"><a>Modifier Livre</a></div>
                <div class="main_body_inside">
                    
                    <div class="center2">
                        
						<!-- start content -->
				
							<div id="content">
					
								<div class="post">
									
						
									<div class="entry" align="center">
									<br><br>
										<?php
											if(isset($_GET['error']))
											{
												echo '<font color="red">'.$_GET['error'].'</font>';
												echo '<br><br>';
											}
											
											if(isset($_GET['ok']))
											{
												echo '<font color="blue">Vous êtes ajouter un livre  avec succès ..</font>';
												echo '<br><br>';
											}
										
										?>
									   <?php
                                        @mysql_connect("localhost","root","")or die("Can't Connect to server...");
			                             @mysql_select_db("shop") or die("Can't Connect to Database...");
                                        $z=$_GET['id'];
                                        $u="SELECT * FROM `book` where b_id='$z'";
											$ua=mysql_query($u);
                                            $ub=mysql_fetch_array($ua);
                                            $name=$ub['b_nm'];
                                            $desc=$ub['b_desc'];
                                            $publisher=$ub['b_publisher'];
                                            $edition=$ub['b_edition'];
                                            $isbn=$ub['b_isbn'];
                                            $page=$ub['b_page'];
                                            $price=$ub['b_price'];
                                            $img=$ub['b_img'];
                                        
										echo '
											<form action="enregistrer-book.php?id='.$z.'" method="POST">
                                            <table>
												<tr>
                                                    <td><b>Titre du livre : </b></td>
                                                    <td><input type="text" name="name" size="40" value="'.$name.'"></td>
                                                </tr>
						
						
                                                <tr>
                                                    <td><b>Catégorie : </b></td>
						                            <td>
                                                        <select style="width: 200px;" name="cat">';
								                        
									
										                      
			
											                     $query="select distinct * from genres ";
			
											                     $res=mysql_query($query);
											
											                     while($row=mysql_fetch_assoc($res))
											                         {
												                        /*echo "<option disabled>".$row['cat_nm'];*/
												
												                        $q2 = "select distinct * from genres where cat_id = ".$row['cat_id'];
												
												                        $res2 = mysql_query($q2) or die("Can't Execute Query..");
												                        while($row2 = mysql_fetch_assoc($res2))
												                            {	
													                           echo '<option value="'.$row2['cat_id'].'">  '.$row2['cat_sub_nm'];
									
													
												                            }
												
											                         }
								                        
                                         echo '          </select>
                                                    </td>
                                                </tr>
						
						
                                                <tr>
                                                    <td><b>Description : </b></td>
                                                    <td><textarea cols="40" rows="6" name="description">'.$desc.'</textarea></td>
                                                </tr>
						
						
                                                <tr>
                                                    <td><b>Auteur : </b></td>
                                                    <td><input type="text" name="publisher" size="40" value="'.$publisher.'"></td>
                                                </tr>
						
						
                                                <tr>
                                                    <td><b>Edition : </b></td>
                                                    <td><input type="text" name="edition" size="40" value="'.$edition.'"></td>
                                                </tr>
						
						
                                                <tr>
                                                    <td><b>Isbn : </b></td>
                                                    <td><input type="text" name="isbn" size="40" value="'.$isbn.'"></td>
                                                </tr>
						
						
						                        <tr>
                                                    <td><b>Page : </b></td>
                                                    <td><input type="text" name="pages" size="40" value="'.$page.'"></td>
                                                </tr>
						
						
						                        <tr>
                                                    <td><b>Prix : </b></td>
						                            <td><input type="text" name="price" size="40" value="'.$price.'"></td>
                                                </tr>
						
						
						                        <tr>
                                                    <td><b>Image : </b></td>
						                            <td><div class="main_body_book1"><img src="../'.$img.'"></div><input type="file" name="img" size="35" value="../'.$img.'"></td>
                                                </tr>
												
												
												
												<tr>
													<td colspan="2" align="center">
														<input type="submit" value="Enregistrer">
                                                        <a href="RIM.php"><button type="button" >Annuler</button></a>
													</td>
												</tr>
                                                </table>
											</form>
										';
                                        mysql_close();
                                        ?>
                                        
									</div>
									
								</div>
					
					
							</div>
				
						<!-- end content -->
        </div>
                </div>
            </div>    
        </section>
</div>
    </body>
</html>