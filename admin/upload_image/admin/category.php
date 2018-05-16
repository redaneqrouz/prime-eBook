<?php session_start();?>






<html>
    <head>
        <title>BIBLIOTHEQUE R.I.M</title>
        <link href="styleRIM.css" media="screen" rel="stylesheet" type="text/css" />
        <style>td{height:40px}</style>
        
    </head>
	
	
    <body>
	
	
					
	
        <div id="wrapper_inside">
        <header> 
            <div class="top_menu">
					<div id="sidebar">
							<?php
								include("includes/menu.php");
							?>
					</div>
					<!-- end sidebar -->
                
            </div>
             <h1 class="title">Bienvenue a
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
                        <form>
                            <div class="row">
                                <input placeholder="search" name="keyword_search" id="keyword" type="text" value="" autocomplete="off">            
                                <input class="btngui" value="" type="button" name="" onclick="do_search();">
                                <input id="key_pres" name="key_pres" value="" type="hidden" />
                                <input id="link_alias" name="link_alias" value="" type="hidden" />
                                <input id="keyword_search_replace" name="keyword_search_replace" value="" type="hidden" />
                            </div>
                            <div id="header_search_autocomplete"> 
				
                            </div>
                        </form>
                    </div>
                    <div class="clr"></div>                        
                </div>
             
			 </section>
        </header>
			
<section class="content">
                   
                        <div class="main_body">
                            <div class="main_body_top top">
                        	   <div class="best_seller"></div>
                                <div align=center><a>Modifier Categorie</a></div></div>
                                <div class="main_body_inside">

				<form action='process_addcategory.php' method='POST'>
				 
					   <center>
                           <table>
                               <caption><b style="color:white">ADD CATEGORY </b></caption>
                               <tr><td><a style="color:white">Genre</a></td><td><input type='text' name= 'cat_nm' size='25'></td></tr>
                               <tr><td><a style="color:white">genre-titre</a></td><td><input type='text' name= 'cat_sub' size='25'></td></tr>
                               <tr><td><a style="color:white">Sous-Genre</a></td><td><input type='text' name= 'cat_sub_nm' size='25'></td></tr>
                               <tr><td colspan="2" style="text-align:center;padding-top:3px"><input type='submit'  value='Ajouter'></td></tr>
                               </table></center>
							<br><br>
				</form>
				<hr>
				<form action='process_addsubcategory.php' method='POST'>
				
					   <center>
                           <table>
                               <caption><b style="color:white">ADD SUB-CATEGORY </b></caption>
							
                               <tr><td rowspan="2"><b style="color:white">Parent Category</b></td>
									
                                        <td><select style="width: 170px;" name="cat_nm">
											<?php
											
												    @mysql_connect("localhost","root","")or die("Can't Connect...");
					
													@mysql_select_db("shop") or die("Can't Connect to Database...");
					
													$a="select distinct cat_nm from genres ";
					
													$aa=mysql_query($a);
													
													while($ab=mysql_fetch_assoc($aa))
													{
														echo "<option value='".$ab['cat_nm']."'>".$ab['cat_nm'];
														
													}
								                    mysql_close();
                                            ?>
                                            </select></td></tr>
                                            
									
                                        <tr><td><select style="width: 170px;" name="cat_sub">
											<?php
					                               @mysql_connect("localhost","root","")or die("Can't Connect...");
					
													@mysql_select_db("shop") or die("Can't Connect to Database...");
													
													
									               $b="SELECT DISTINCT cat_sub FROM `genres`";
                                                     $ba=mysql_query($b);
													while($bb=mysql_fetch_assoc($ba))
													{
														echo "<option value='".$bb['cat_sub']."'>".$bb['cat_sub'];
														
													}
									
											
										
													mysql_close();
											?>
                                            </select></td></tr>
									
									
                               <tr><td><a style="color:white">SUB-Category</a></td>
									
                                   <td><input type='text' name= 'cat_sub_nm' size='20'></td></tr>
										
                               <tr><td colspan="2" style="text-align:center;padding-top:3px"><input type='submit'  value='Ajouter'></td></tr>
                           </table>
									</center>
									<br><br>	
				</form>
				<hr>
				

				
                <form action='process_delsubcategory.php' method='POST'>
				
					   <center>
							<table>
                                <caption><b style="color:white">DELETE SUB CATEGORY </b></caption>						
							     <tr><td rowspan="2"><b style="color:white">Parent Category</b></td>
                                        <td><select style="width: 170px;" name="cat_nm">
											<?php
											
												    @mysql_connect("localhost","root","")or die("Can't Connect...");
					
													@mysql_select_db("shop") or die("Can't Connect to Database...");
					
													$a="select distinct cat_nm from genres ";
					
													$aa=mysql_query($a);
													
													while($ab=mysql_fetch_assoc($aa))
													{
														echo "<option value='".$ab['cat_nm']."'>".$ab['cat_nm'];
														
													}
								                    mysql_close();
                                            ?>
                                            </select></td></tr>
                                            
									
                                        <tr><td><select style="width: 170px;" name="cat_sub">
											<?php
					                               @mysql_connect("localhost","root","")or die("Can't Connect...");
					
													@mysql_select_db("shop") or die("Can't Connect to Database...");
													
													
									               $b="SELECT DISTINCT cat_sub FROM `genres`";
                                                     $ba=mysql_query($b);
													while($bb=mysql_fetch_assoc($ba))
													{
														echo "<option value='".$bb['cat_sub']."'>".$bb['cat_sub'];
														
													}
									
											
										
													mysql_close();
											?>
                                            </select></td></tr>
									
									
                                <tr><td><b style="color:white">SUB-CATEGORY</b></td>
									
										<td><select style="width: 170px;" name="cat_sub_nm">
											<?php
					                               @mysql_connect("localhost","root","")or die("Can't Connect...");
					
													@mysql_select_db("shop") or die("Can't Connect to Database...");
													
													
									               $c="SELECT cat_sub_nm FROM `genres`";
                                                     $ca=mysql_query($c);
													while($cb=mysql_fetch_assoc($ca))
													{
														echo "<option value='".$cb['cat_sub_nm']."'>".$cb['cat_sub_nm'];
														
													}
									
											
										
													mysql_close();
											?>
                                            </select></td></tr>
										
                                <tr><td colspan="2" style="text-align:center;padding-top:3px"><input type='submit'  value='Supprimer'></td></tr>
                           </table>
									</center>
										
				</form>
			</div>
			
		</div>
		
	

                                
            </section>
        </div>

</body>
</html>
