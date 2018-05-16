ç'r<?php session_start();

@mysql_connect("localhost","root","")or die("Can't Connect...");
	@mysql_select_db("shop") or die("Can't Connect to Database...");
	mysql_query("SET NAMES UTF8");
mb_internal_encoding('UTF-8');
?>






<html>
    <head>
        <title>BIBLIOTHEQUE R.I.M</title>
        <link href="styleRIM.css" media="screen" rel="stylesheet" type="text/css" />
        <meta charset="utf-8">
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
             <h1 class="title">Bienvenue Admin
			
							</h1>   
				   <br>
					
			
           
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
                               <caption><b>Ajouter Une Catégorie</b></caption>
                               <tr><td><a>catégorie principale</a></td><td><input type='text' name= 'cat_nm' size='25'></td></tr>
                               <tr><td><a>sous-catégorie</a></td><td><input type='text' name= 'cat_sub' size='25'></td></tr>
                               <tr><td><a>Sous-sous-catégorie</a></td><td><input type='text' name= 'cat_sub_nm' size='25'></td></tr>
                               <tr><td colspan="2" style="text-align:center;padding-top:3px"><input type='submit'  value='Ajouter'></td></tr>
                               </table></center>
							<br><br>
				</form>
				<hr>
				
				<form action='process_addsubcategory.php' method='POST'>
				
					   <center>
                           <table>
                               <caption><b>Ajouter Une sous-sous-Catégorie </b></caption>
							
                               <tr><td >catégorie principale</td>
									
                                        <td><select style="width: 170px;" name="cat_nm">
											<?php
                        mb_internal_encoding('UTF-8');
								echo "<meta charset=\"utf-8\">";
												    @mysql_connect("localhost","root","")or die("Can't Connect...");
					
													@mysql_select_db("shop") or die("Can't Connect to Database...");
					
													$a="select distinct cat_nm from genres ";
					
													$aa=mysql_query($a);
													
													while($ab=mysql_fetch_assoc($aa))
													{
														echo "<option value='".$ab['cat_nm']."'>".$ab['cat_nm'];
														
													}
                                    mysql_query("SET NAMES UTF8");
								                    mysql_close();
                                            ?>
                                            </select></td></tr>
                                            
											
											
											
											
											
											
											

									
                                        <tr><td>Sous-catégorie</td><td><select style="width: 170px;" name="cat_sub">
											<?php
mb_internal_encoding('UTF-8');
                                        echo "<meta charset=\"utf-8\">";
					                               @mysql_connect("localhost","root","")or die("Can't Connect...");
					
													@mysql_select_db("shop") or die("Can't Connect to Database...");
													
													
									               $b="SELECT DISTINCT cat_sub FROM `genres`";
                                                     $ba=mysql_query($b);
													while($bb=mysql_fetch_assoc($ba))
													{
														echo "<option value='".$bb['cat_sub']."'>".$bb['cat_sub'];
														
													}
									
									   mysql_query("SET NAMES UTF8");		
										
													mysql_close();
											?>
                                            </select></td></tr>
									
									
                               <tr><td>Sous-sous-catégorie</td>
									
                                   <td><input type='text' name= 'cat_sub_nm' size='20'></td></tr>
										
                               <tr><td colspan="2" style="text-align:center;padding-top:3px"><input type='submit'  value='Ajouter'></td></tr>
                           </table>
									</center>
									<br><br>	
				</form>
				<hr>
				

				
                <form action='process_delsubcategory3.php' method='POST'>
				
					   <center>
							<table>
                                <caption><b>Effacer Sous-sous-catégorie </b></caption>						
							     <tr><td><b>Effacer ctégorie principale</b></td>
                                        <td><select style="width: 170px;" name="cat_nm">
											<?php
											mb_internal_encoding('UTF-8');
												    @mysql_connect("localhost","root","")or die("Can't Connect...");
					
													@mysql_select_db("shop") or die("Can't Connect to Database...");
					
													$a="select distinct cat_nm from genres ";
					
													$aa=mysql_query($a);
													
													while($ab=mysql_fetch_assoc($aa))
													{
														echo "<option value='".$ab['cat_nm']."'>".$ab['cat_nm'];
														
													}
mysql_query("SET NAMES UTF8");
								                    mysql_close();
                                            ?>
                                            </select></td></tr>
											<tr><td colspan="2" style="text-align:center;padding-top:3px"><input type='submit'  value='Supprimer'></td></tr>
											</table>
											</center>
                                </form>            
								
								
									<form action='process_delsubcategory1.php' method='POST'>
									<center>
									<table>
                                        <tr><td>Effacer Sous-catégorie:</td><td><select style="width: 170px;" name="cat_sub">
											<?php
echo "<meta charset=\"utf-8\" />";
					                               @mysql_connect("localhost","root","")or die("Can't Connect...");
					
													@mysql_select_db("shop") or die("Can't Connect to Database...");
													
													
									               $b="SELECT DISTINCT cat_sub FROM `genres`";
                                                     $ba=mysql_query($b);
													while($bb=mysql_fetch_assoc($ba))
													{
														echo "<option value='".$bb['cat_sub']."'>".$bb['cat_sub'];
														
													}
									
											
							mysql_query("SET NAMES UTF8");			
													mysql_close();
											?>
                                            </select></td></tr>
											<tr><td colspan="2" style="text-align:center;padding-top:3px"><input type='submit'  value='Supprimer'></td></tr>
											
											</table>
											</center>
									</form>
				<form action='process_delsubcategory2.php' method='POST'>
				<center>
				<table>
                                <tr><td><b>Sous-sous-catégorie</b></td>
									
										<td><select style="width: 170px;" name="cat_sub_nm">
											<?php
mb_internal_encoding('UTF-8');
echo "<meta charset=\"utf-8\" />";
					                               @mysql_connect("localhost","root","")or die("Can't Connect...");
					
													@mysql_select_db("shop") or die("Can't Connect to Database...");
													
													
									               $c="SELECT cat_sub_nm FROM `genres`";
                                                     $ca=mysql_query($c);
													while($cb=mysql_fetch_assoc($ca))
													{
														echo "<option value='".$cb['cat_sub_nm']."'>".$cb['cat_sub_nm'];
														
													}
									
											mysql_query("SET NAMES UTF8");
										
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
