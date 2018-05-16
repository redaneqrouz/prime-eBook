

<?php 
session_start();
@mysql_connect("localhost","root","")or die("Can't Connect...");
			
	@mysql_select_db("shop") or die("Can't Connect to Database...");
	$q="select * from contact";
	 $res=mysql_query($q) or die("Can't Execute Query...");

	mysql_close();
	?>


	
	
	
	
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
			
	<br><br><br>
<section class="content">
<div class="main_body">
    <div class="main_body_top top">
	
		
        <div align="center"> <a>Contact</a></div>
    </div>
		<div class="main_body_inside">		 
					   <center>
					   <form action="process_del_contact.php" method="GET">
					<table border='1' WIDTH='100%'>
						<tr>
								<td WIDTH='10%'><b><u>NO</u></b>
								<TD WIDTH='20%'><b><u>NAME</u></b>
								<TD WIDTH='20%'><b><u>EMAIL</u></b>
								<TD WIDTH='50%'><b><u>QUERY</u></b>
								<TD WIDTH='50%'><b><u>TRAITER</u></b>
								<TD WIDTH='25%'><b><u>DELETE</u></b>
							
						</tr>
						<?php
							$count=1;
							while($row=mysql_fetch_assoc($res))
							{
							echo '<tr>
										<td>'.$row['con_id'].'
										
										<td>'.$row['con_nm'].'
										<td>'.$row['con_email'].'
										<td>'.$row['con_query'].'
										
			<td><p id="demo" style="display:none">Hello JavaScript!</p>

<button type="button" onclick="echo "bien";">Click Me!</button>';
										
	

	
										
			echo '<td><a href="process_del_contact.php?sid='.$row['con_id'].'"><img src="images/drop.png" ></a>
												
									
									</tr>';
									$count++;
							}
						?>

					
			
                                    
                                    </div>
                                    </div>
                           </table>
                           </form></center></section>

</body>
</html>
