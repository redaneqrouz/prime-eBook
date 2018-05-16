<?php session_start();?>







<html>
    <head>
        <title>BIBLIOTHEQUE R.I.M</title>
        <link href="styleRIM.css" media="screen" rel="stylesheet" type="text/css" />
        <style>td{height:50px}</style>
        
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
			
			

<section class="content">
                   
                        <div class="main_body">
                            <div class="main_body_top top">
                        	   <div class="best_seller"></div>
                                <div align=center><a>Modifier La Bibliotheque</a></div></div>
                                <div class="main_body_inside">
                                    <center>
				<form action='process_addbook.php' method='POST' enctype="multipart/form-data">
				<table>
                    <tr><td><b>Book Name:</b></td>
                        <td><input type='text' name='name' size='40'></td></tr>
						
						
                    <tr><td><b>Category:</b></td>
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
						
						
                    <tr><td><b>Publisher:</b></td>
                        <td><input type='text' name='publisher' size='40'></td></tr>
						
						
                    <tr><td><b>Edition:</b></td>
                        <td><input type='text' name='edition' size='40'></td></tr>
						
						
                    <tr><td><b>ISBN:</b></td>
                        <td><input type='text' name='isbn' size='40'></td></tr>
						
						
						<tr><td><b>PAGES:</b></td>
                            <td><input type='text' name='pages' size='40'></td></tr>
						
						
						<tr><td><b>PRICE:</b></td>
						<td><input type='text' name='price' size='40'></td></tr>
						
						
						<tr><td><b>Image:</b></td>
						<td><input type='file' name='img' size='35'></td></tr>
						
						
						
						<!--<tr><td style="color:white"><b>E-Book:</b></td>
						<td><input type='file' name='ebook'  size='35'></td></tr>-->
						
						
                    <tr><td colspan="2" style="text-align:center"><input  type='submit'  value='   OK   '  ></td></tr>
                    </table>
				</form>
                                        </center>
			</div>
			
		</div>
		
	
	
    </section>
        </div>
</body>
</html>
