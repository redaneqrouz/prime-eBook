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
                               <caption><b>ADD CATEGORY </b></caption>
                               <tr><td><a>Genre</a></td><td><input type='text' name= 'cat_nm' size='25'></td></tr>
                               <tr><td><a>genre-titre</a></td><td><input type='text' name= 'cat_sub' size='25'></td></tr>
                               <tr><td><a>Sous-Genre</a></td><td><input type='text' name= 'cat_sub_nm' size='25'></td></tr>
                               <tr><td colspan="2" style="text-align:center;padding-top:3px"><input type='submit'  value='Ajouter'></td></tr>
                               </table></center>
							<br><br>
				</form>
				<hr>
				<form action='process_addsubcategory.php' method='POST'>
				
					   <center>
                           <table>
                               <caption><b>ADD SUB-CATEGORY </b></caption>
							
                               <tr><td rowspan="2"><b>Parent Category</b></td>
									
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
									
									
                               <tr><td><a>SUB-Category</a></td>
									
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
                                <caption><b>DELETE SUB CATEGORY </b></caption>						
							     <tr><td rowspan="2"><b>Parent Category</b></td>
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
									
									
                                <tr><td><b>SUB-CATEGORY</b></td>
									
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
