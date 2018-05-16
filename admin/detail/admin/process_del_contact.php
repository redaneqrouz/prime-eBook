<?php session_start();?>
<?php

	$link=mysql_connect("localhost","root","")or die("Can't Connect...");
			
			mysql_select_db("shop",$link) or die("Can't Connect to Database...");
		
			
			
			$query="delete  from contact where con_id =".$_GET['id'];
		
			mysql_query($query,$link) or die("can't Execute...");
			
			
			header("location:contact.php");

?>