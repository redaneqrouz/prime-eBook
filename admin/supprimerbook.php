<?php
@mysql_connect("localhost","root","")or die("Can't Connect...");
			
			@mysql_select_db("shop") or die("Can't Connect to Database...");
    $id=$_GET['id'];
    $query="delete from book where b_id ='$id' ";
			mysql_query($query) or die("can't Execute...");
    header("location:RIM.php");
    mysql_close();
	
	mysql_query("SET NAMES UTF8");
?>