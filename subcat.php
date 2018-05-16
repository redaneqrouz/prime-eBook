<?php session_start();


	@mysql_connect("localhost","root","")or die("Can't Connect...");
	@mysql_select_db("shop") or die("Can't Connect to Database...");
	//$cat=$_GET['cat_nm'];
	
	$q = "select * from subcat where parent_id = ".$_GET['cat'];
	$res = mysql_query($q);
	
	$row1 = mysql_fetch_assoc($res);
	
	if($_GET['catnm']==$row1['subcat_nm'])
	{
		header("location:booklist.php?subcatid=".$row1['subcat_id']."&subcatnm=".$row1["subcat_nm"]);
		
	}
	mysql_query("SET NAMES UTF8");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">


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
			
			
			<!-- end header -->
			
			
			
			<!-- start page -->

				<div id="page">
					<!-- start content -->
					<div id="content">
						<div class="post">
							<h1 class="title"><?php echo $_GET['catnm'];?></h1>
							<div class="entry">
						
								<?php
									Do
									{
										
										echo '<li><a href="booklist.php?subcatid='.$row1['subcat_id'].'&subcatnm='.$row1["subcat_nm"].'">'.$row1['subcat_nm'].'</a></li>';
										//&subcatnm='.$row1["subcat_nm"].'
									}while($row1 = mysql_fetch_assoc($res))
										
								?>
							
							</div>
							
						</div>
						
					</div>
					<!-- end content -->
					
				
			
            </div>
            </header>
        </div>
</body>
</html>
