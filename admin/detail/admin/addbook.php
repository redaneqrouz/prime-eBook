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
		<section class="menu"> 
					   <center>
			<h1 class="title"> Book</h1>
			<div class="entry">
				<form action='process_addbook.php' method='POST' enctype="multipart/form-data">
				
						<br><b>Book Name:</b><br>
						<input type='text' name='name' size='40'>
						<br><br>
						
						<b>Category:</b><br>
						<select style="width: 200px;" name="cat">
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
						</select>
						<br><br>
						
						<b>Description:</b><br>
						<textarea cols="40" rows="6" name='description' ></textarea>
						<br><br>
						
						<b>Publisher:</b><br>
						<input type='text' name='publisher' size='40'>
						<br><br>
						
						<b>Edition:</b><br>
						<input type='text' name='edition' size='40'>
						<br><br>
						
						<b>ISBN:</b><br>
						<input type='text' name='isbn' size='40'>
						<br><br>
						
						<b>PAGES:</b><br>
						<input type='text' name='pages' size='40'>
						<br><br>
						
						<b>PRICE:</b><br>
						<input type='text' name='price' size='40'>
						<br><br>
						
						<b>Image:</b><br>
						<input type='file' name='img' size='35'>
						<br><br>
						
						
						<b>E-Book:</b><br>
						<input type='file' name='ebook'  size='35'>
						<br><br>
						
						<input  type='submit'  value='   OK   '  >
						</center></section>
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
<!-- start footer -->
<div id="footer">
			<?php
				include("includes/footer.inc.php");
			?>
</div>
<!-- end footer -->
</body>
</html>
