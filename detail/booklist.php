
<?php session_start();
	
	@mysql_connect("localhost","root","")or die("Can't Connect...");
	
	@mysql_select_db("shop") or die("Can't Connect to Database...");
	
	$cat=$_GET['cat'];
	
	$totalq="select count(*) \"total\" from book where b_subcat='$cat'";
	
	$totalres=mysql_query($totalq) or die("Can't Execute Query...");
	$totalrow=mysql_fetch_assoc($totalres);
	
	
	$page_per_page=6;
	
	$page_total_rec=$totalrow['total'];
	
	$page_total_page=ceil($page_total_rec/$page_per_page);
	
	
	if(!isset($_GET['page']))
	{
		$page_current_page=1;
	}
	else
	{
		$page_current_page=$_GET['page'];
	}
	

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
                    //modification start ici
				<div id="page">
					<!-- start content -->
							<div id="content">
                                <h1 class="title"><?php echo $_GET['catnm'];?></h1>
                                <div class="main_body">
								<div class="post">
									<div class="entry">
										
										<div class="main_body_inside">
                                            
											<?php
												
												$k=($page_current_page-1)*$page_per_page;
											
												$query="select *from book where b_subcat='$cat' LIMIT ".$k .",".$page_per_page;
	
												$res=mysql_query($query) or die("Can't Execute Query...");
	
												$count=0;
												while($row=mysql_fetch_assoc($res))
												{
													echo '<div class="main_body_book1">
														<a href="detail.php?id='.$row['b_id'].'&cat='.$_GET['catnm'].'">
														<img src="'.$row['b_img'].'">
                                                        
                                                        <p>
                                                                                                                                                                                                <br>nom du livre  :'.$row['b_nm'].'<br>publisher :'.$row['b_publisher'].'                                                                         <br> edition   :'.$row['b_edition'].'<br> nombre de page :'.$row['b_page'].
                                                        '<br> prix  :'.$row['b_price'].'<br>'.$row['b_pdf'].'
                                                        </p>
                                                     </a>
                                                         </div>';
													$count++;	
												}
											?>  
									</div>
                                    </div>
                            //modification fini ici
										<center>
										<?php
											
											if($page_total_page>$page_current_page)
											{
												echo '<a href="booklist.php?subcatid='.$_GET['cat'].'&subcatnm='.$_GET['catnm'].'&page='.($page_current_page+1).'">Next</a>';
											}
											
											for($i=1;$i<=$page_total_page;$i++)
											{
												echo '&nbsp;&nbsp;<a href="booklist.php?subcatid='.$_GET['cat'].'&subcatnm='.$_GET['catnm'].'&page='.$i.'">'.$i.'</a>&nbsp;&nbsp;';
											}
											
											if($page_current_page>1)
											{	
												echo '<a href="booklist.php?subcatid='.$_GET['cat'].'&subcatnm='.$_GET['catnm'].'&page='.($page_current_page-1).'">Previous</a>';
											}
											
										?>
										</center>
									</div>
									
								</div>
				</div>      
							</div>
					<!-- end content -->
					
					
				</div>
			<!-- end page -->
			
				
			
</body>
</html>
