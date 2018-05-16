<?php

	/*if(empty($_POST['sub_cat_nm']))
		{
			echo "No Selected Category";
			
		}
		else
		{*/
	
			@mysql_connect("localhost","root","") or die("Wrong connection");
			
			@mysql_select_db("shop");
			
			
            $catnm= $_POST['cat_nm'];
            $catsub=$_POST['cat_sub'];
			$catsubnm=$_POST['cat_sub_nm'];
			
			$q="delete from genres where cat_nm = '$catnm' and cat_sub='$catsub' and cat_sub_nm='$catsubnm'";
			
			mysql_query($q) or die("Can't Execute DELETE SUB CATEGORY....");	
			
			/*$q = "delete from book where b_subcat = ".$cid;
			mysql_query($q);*/
			
			header("location:category.php");
		/*}*/
?>
	
	