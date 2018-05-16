<?php session_start();?>






<html>
    <head>
        <title>BIBLIOTHEQUE R.I.M</title>
        <link href="styleRIM.css" media="screen" rel="stylesheet" type="text/css" />
  
        
    </head>
	
	
    <body>
	
	
					
	
        <div id="wrapper_inside">
        <header> 
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
						
					<!-- start sidebar -->
					<div id="sidebar">
							<?php
								include("includes/menu.php");
							?>
					</div>
					<!-- end sidebar -->
					
					
			                        
            </div>
			

<div id="page">
	<!-- start content -->
	<div id="content">
		<div class="post">
			<h1 class="title"></h1>
			<div class="entry">
				<form action='process_addcategory.php' method='POST'>
				 <section class="menu"> 
					   <center>
						<b>ADD CATEGORY </b>
							<br><br>
							Genre      :<input type='text' name= 'cat_nm' size='25'><br><br>
							genre-titre:<input type='text' name= 'cat_sub' size='25'><br><br>
                            Sous-Genre :<input type='text' name= 'cat_sub_nm' size='25'>
							<input type='submit'  value='  ADD  '>
							</center></section>
							<br><br>
				</form>
				<hr>
				<form action='process_addsubcategory.php' method='POST'>
				<section class="menu"> 
					   <center>
							<b>ADD SUB-CATEGORY </b>
							<br><br>
							<u>PARENT CATEGORY :</u>
									<br><br>
                                        <select style="width: 170px;" name="cat_nm">
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
                                            </select>
                                            
									<br><br> 
                                        <select style="width: 170px;" name="cat_sub">
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
										</select>
									
									<br><br>
							<u>SUB-CATEGORY:</u>
									<br><br>
										<input type='text' name= 'cat_sub_nm' size='25'>
										
										<input type='submit'  value='  ADD  '>
									</center></section>
									<br><br>	
				</form>
				<hr>
				

				
                <form action='process_delsubcategory.php' method='POST'>
				<section class="menu"> 
					   <center>
							<hr>
						<b>DELETE SUB CATEGORY </b>						
							<br><br>
                                        <select style="width: 170px;" name="cat_nm">
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
                                            </select>
                                            
									<br><br> 
                                        <select style="width: 170px;" name="cat_sub">
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
										</select>
									
									<br><br>
							<u>SUB-CATEGORY:</u>
									<br><br>
										<select style="width: 170px;" name="cat_sub_nm">
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
										</select>
										
										<input type='submit'  value='  DELETE  '>
									</center></section>
									<br><br>	
				</form>
			</div>
			
		</div>
		
	</div>
	<!-- end content -->
	<!-- start sidebar -->
	
	<!-- end sidebar -->
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end page -->

</body>
</html>
