<?php session_start();?>
<?php

	if(!empty($_POST))
	{
		$msg=array();
		if(empty($_POST['cat_nm']))
		{
			$msg[]="Please full fill all requirement";
		}
		
		if(!empty($msg))
		{
			echo '<b>Error:-</b><br>';
			
			foreach($msg as $k)
			{
				echo '<li>'.$k;
			}
		}
		else
		{
		
			mysql_connect("localhost","root","")or die("Can't Connect...");
			
			mysql_select_db("shop") or die("Can't Connect to Database...");
		
			$catnm=$_POST['cat_nm'];
			
			$query="delete from genres where cat_nm ='$catnm' ";
		
			mysql_query($query) or die("can't Execute...");
			
			mysql_close();
			header("location:category.php");
		}
	}
	else
	{
		header("location:RIM.php");
	}
?>
	
	