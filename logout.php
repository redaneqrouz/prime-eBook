<?php session_start();

		$_SESSION=array();		//session_destroy();
		@mysql_connect("localhost","root","")or die("Can't Connect to server...");
		@mysql_select_db("shop") or die("Can't Connect to Database...");	
        $k="UPDATE `user` SET `u_con` = '0' WHERE `u_con` =1";
        mysql_query($k);
        mysql_close();
		header("location:RIM.php");
	
					
?>

	
	
	
