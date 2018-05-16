<?php session_start(); 
@mysql_connect("localhost","root","")or die("Can't Connect...");
	@mysql_select_db("shop") or die("Can't Connect to Database...");
mysql_query("SET NAMES UTF8");  ?>




<html>



	    <head>
        <title>BIBLIOTHEQUE R.I.M</title>
        <!--<link href="styleRIM2.css" media="screen" rel="stylesheet" type="text/css" />-->
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
     
        <section class="content">
        <section class="content_left">
            <div class="main_body">
                <div class="main_body_top top" align="center"><a>Se Connecter</a></div>
                <div class="main_body_inside" align="center" style="padding:130 0 130 0">
                    <?php
					   include("includes/login.php");
				    ?>
                </div>
            </div>    
        </section>
        <section class="content_right">
            <div class="main_body">
                <div class="main_body_top top" align="center"><a>S'inscrire</a></div>
                <div class="main_body_inside" align="center" style="padding:20 0 20 0">                    
                    
                    <div >
                        
						<!-- start content -->
				
							<div id="content">
					
								<div class="post">
									
						
									<div class="entry">
									
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
									
										<table>
											<form action="process_register.php" method="POST" >
												<tr>
													<td><b >Nom complet : </b>&nbsp;&nbsp;</td>
													<td><input type='text' size="30" maxlength="30" name='fnm'></td>
												
												</tr>
												
												<tr><td>&nbsp;</tr>
												
												<tr>
													 <td><b>Nom d'utilisateur : </b>&nbsp;&nbsp;</td>
													 <td><input type='text' size="30" maxlength="30" name='unm'></td>
													 <td>&nbsp;</td>
													
												</tr>
												
												<tr><td>&nbsp;</tr>
												
												<tr>
													<td><b>Mot de passe : </b>&nbsp;&nbsp;</td>
													<td><input type='password' name='pwd' size="30"></td>
													 
												</tr>
												
												<tr><td>&nbsp;</tr>
												
												<tr>
													<td><b>Confirmer le Mot de passe : </b>&nbsp;&nbsp;</td>
													<td><input type='password' name='cpwd' size="30"></td>
													
												</tr>
												
												<tr><td>&nbsp;</tr>
												
												<tr>
													<td><b>Sexe : </b>&nbsp;&nbsp;</td>
													<td><input type="radio"  value="Male" name="gender" id='m'><label> Male</label>&nbsp;&nbsp;&nbsp;
														<input type="radio" value="Female" name="gender" id='f'><label>Female</label></td>
														<td>&nbsp;</td>
												</tr>
												
												<tr><td>&nbsp;</tr>
																				
												<tr>
													<td><b>E-mail : </b>&nbsp;&nbsp;</td>
													<td><input type='text' name='mail' size="30"></td>
													
												</tr>
												
												<tr><td>&nbsp;</tr>
												
												<tr>
													<td><b>Numéro de téléphone : </b>&nbsp;&nbsp;</td>
													<td><input type='text' name='contact' size="30" ></td>
													
												</tr>
												
												<tr><td>&nbsp;</tr>
												
												
												<tr>
													<td><b>Ville : </b>&nbsp;&nbsp;</td>
													<td>
													<select style="width: 195px;" name="city">
														
															
															<option>Oujda
															<option>Tanger
															<option>Rabat
															<option> Frankfurt
															
														
													</select>
												
												</tr>
												
												<tr><td>&nbsp;</tr>
												
												
												
												<tr>
													<td colspan='2' align='center'>
														<input type='submit' value="  Enregistrer  ">
														
														<input type='reset' value=" Annuler ">
													
													</td>
													
												</tr>
											</form>
										</table>
									</div>
									
								</div>
					
					
							</div>
				
						<!-- end content -->
        </div>
                </div>
            </div>    
        </section>
        </section>
        
        
	
					<!-- end sidebar -->
	
        
        <!--<header> 
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
						
						<?php
							/*include("includes/menu.php");*/
						?>
                        
            <!--</div>
			
			<br>
			<br>
			
          <div id="sidebar">
							<?php
								/*include("includes/login.php");*/
							?>
					</div>
					<br>
					
					<br>
					
			

<br>
<br>
<br>
<br>
	<br	>
	
			<!-- start page -->

				<!--<div id="page">
						<!-- start content -->
				
							<!--<div id="content">
					
								<div class="post">
									<h1 class="title">Bienvenu dans  Registeration.</h1>
						
									<div class="entry">
									<br><br>
										<?php
											/*if(isset($_GET['error']))
											{
												echo '<font color="red">'.$_GET['error'].'</font>';
												echo '<br><br>';
											}
											
											if(isset($_GET['ok']))
											{
												echo '<font color="blue">Vous êtes inscrit avec succès ..</font>';
												echo '<br><br>';
											}*/
										
										?>
									
										<table>
											<form action="process_register.php" method="POST">
												<tr>
													<td><b>Nom complet :</b>&nbsp;&nbsp;</td>
													<td><input type='text' size="30" maxlength="30" name='fnm'></td>
												
												</tr>
												
												<tr><td>&nbsp;</tr>
												
												<tr>
													 <td><b>Nom d'utilisateur :</b>&nbsp;&nbsp;</td>
													 <td><input type='text' size="30" maxlength="30" name='unm'></td>
													 <td>&nbsp;</td>
													
												</tr>
												
												<tr><td>&nbsp;</tr>
												
												<tr>
													<td><b>Mot de passe :</b>&nbsp;&nbsp;</td>
													<td><input type='password' name='pwd' size="30"></td>
													 
												</tr>
												
												<tr><td>&nbsp;</tr>
												
												<tr>
													<td><b>Confirmer le Mot de passe :</b>&nbsp;&nbsp;</td>
													<td><input type='password' name='cpwd' size="30"></td>
													
												</tr>
												
												<tr><td>&nbsp;</tr>
												
												<tr>
													<td><b>Le genre:</b>&nbsp;&nbsp;</td>
													<td><input type="radio"  value="Male" name="gender" id='m'><label> Male</label>&nbsp;&nbsp;&nbsp;
														<input type="radio" value="Female" name="gender" id='f'><label>Female</label></td>
														<td>&nbsp;</td>
												</tr>
												
												<tr><td>&nbsp;</tr>
																				
												<tr>
													<td><b>E-mail Address:</b>&nbsp;&nbsp;</td>
													<td><input type='text' name='mail' size="30"></td>
													
												</tr>
												
												<tr><td>&nbsp;</tr>
												
												<tr>
													<td><b>Contact Num.:</b>&nbsp;&nbsp;</td>
													<td><input type='text' name='contact' size="30"></td>
													
												</tr>
												
												<tr><td>&nbsp;</tr>
												
												
												<tr>
													<td><b>Ville:</b>&nbsp;&nbsp;</td>
													<td>
													<select style="width: 195px;" name="city">
														
															
															<option>Oujda
															<option>Tanger
															<option>Rabat
															<option> Frankfurt
															
														
													</select>
												
												</tr>
												
												<tr><td>&nbsp;</tr>
												
												
												
												<tr>
													<td colspan='2' align='center'>
														<input type='submit' value="  OK  ">
													</td>
												</tr>
											</form>
										</table>
									</div>
									
								</div>
					
					
							</div>
				
						<!-- end content -->
        </div>

</body>
</html>
