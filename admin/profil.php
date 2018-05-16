<?php session_start();
@mysql_connect("localhost","root","")or die("Can't Connect...");
	@mysql_select_db("shop") or die("Can't Connect to Database...");
	mysql_query("SET NAMES UTF8");?>
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
        
        <section class="content">
                   
                        <div class="main_body">
                            <div class="main_body_top top" style="text-align:center">
                        	   
                        	   <a>Profil</a>
                            
                            </div>
                            <div class="main_body_inside">
                         
                                <?php
                                            @mysql_connect("localhost","root","")or die("Can't Connect to server...");
			
									        @mysql_select_db("shop") or die("Can't Connect to Database...");
												
                                            $u="SELECT * FROM `user` where u_con='1'";
											$ua=mysql_query($u);
                                            $ub=mysql_fetch_array($ua);
                                            $nom=$ub['u_fnm'];
                                            $prenom=$ub['u_unm'];
                                            $pwd=$ub['u_pwd'];
                                            $gender=$ub['u_gender'];
                                            $email=$ub['u_email'];
                                            $contact=$ub['u_contact'];
                                            $city=$ub['u_city'];
                                            echo '<table style="width:100%;height:45%;text-align:center;padding-top:50px;" ><tr style="background-color:rgba(0, 0, 0,0.25)"><td><a ">Nom</a></td><td><a>'.$nom.'</a></td></tr>
                                                <tr><td><a>Prenom</a></td><td><a>'.$prenom.'</a></td></tr>
                                                <tr style="background-color:rgba(0, 0, 0,0.25)"><td><a>Mot De Passe</a></td><td><a>'.$pwd.'</a></td></tr>
                                                <tr><td><a>Sexe</a></td><td><a>'.$gender.'</a></td></tr>
                                                <tr style="background-color:rgba(0, 0, 0,0.25)"><td><a>E-mail</a></td><td><a>'.$email.'</a></td></tr>
                                                <tr><td><a>Numéro de téléphone</a></td><td><a>'.$contact.'</a></td></tr>
                                                <tr style="background-color:rgba(0, 0, 0,0.25)"><td><a>Ville</a></td><td><a>'.$city.'</a></td></tr>
                                                  </table><br>
                                                  <a href="editer-profil.php"><img src="editer.png" style="width:107.6px;height:37px;float:right;padding: 0 20 20 0;"></a>';
                                            /*echo '<a style="color:white;">nom= '.$nom.'</a><br>
                                                <a style="color:white;">prenom= '.$prenom.'</a><br>
                                                <a style="color:white;">mot de passe= '.$pwd.'</a><br>
                                                <a style="color:white;">sexe= '.$gender.'</a><br>
                                                <a style="color:white;">email= '.$email.'</a><br>
                                                <a style="color:white;">contact= '.$contact.'</a><br>
                                                <a style="color:white;">ville= '.$city.'</a><br>';*/	
                                                
                                            
                                            mysql_close();
											?>  
                       
                                
                                
                                
                                 
                            </div>
                        </div>
                    
            </section>
        
        
        
        
        
        
        
        
        
        
        </div>
    </body>
</html>