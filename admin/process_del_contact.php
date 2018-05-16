<?php

	@mysql_connect("localhost","root","")or die("Can't Connect...");
			
			@mysql_select_db("shop") or die("Can't Connect to Database...");
		
			$a=$_GET['sid'];
			
			$query="delete  from contact where con_id ='$a'";
		
			@mysql_query($query) or die("can't Execute...");
			
			
			header("location:contact.php");

?>