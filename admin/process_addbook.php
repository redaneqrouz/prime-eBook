<?php
mb_internal_encoding('UTF-8');
	if(!empty($_POST))
	{
		$msg="";
		if(empty($_POST['name']) || empty($_POST['description']) || empty($_POST['publisher'])|| empty($_POST['edition']) || empty($_POST['isbn']) || empty($_POST['pages']) || empty($_POST['price']))
		{
			$msg.="S'il vous plaît remplir toutes les exigences";
		}
		if(!(is_numeric($_POST['price'])))
		{
			$msg.="Le prix doit être en format numérique...";
		}
		if(!(is_numeric($_POST['pages'])))
		{
			$msg.="Page doit être en format numérique...";
		}
		
		if(empty($_FILES['img']['name']))
		$msg.="S'il vous plaît fournir un fichier";
	
		if($_FILES['img']['error']>0)
		$msg.="erreur de L'ajout d'un fichier";
		
				
		if(!(strtoupper(substr($_FILES['img']['name'],-4))==".JPG" || strtoupper(substr($_FILES['img']['name'],-5))==".JPEG"|| strtoupper(substr($_FILES['img']['name'],-4))==".GIF"))
			$msg.= "wrong file  type";
			
		if(file_exists("../upload_image/".$_FILES['img']['name']))
			$msg.="File already uploaded. Please do not updated with same name";
		
		
		
		if(!empty($msg))
		{
			header("location:addbook.php?error=".$msg);
		}
		
		else
		{/*move_uploaded_file($_FILES['img']['tmp_name'],"upload_image/".$_FILES['img']['name']);*/
			move_uploaded_file($_FILES['img']['tmp_name'],"../upload_image/".$_FILES['img']['name']);
            
			$b_img = "upload_image/".$_FILES['img']['name'];	
			
			/*move_uploaded_file($_FILES['ebook']['tmp_name'],"../upload_ebook/".$_FILES['ebook']['name']);
			$b_pdf = "upload_ebook/".$_FILES['ebook']['name'];	*/
		
			$b_nm=$_POST['name'];
			$b_cat=$_POST['cat'];
			$b_desc=$_POST['description'];
			$b_edition=$_POST['edition'];
			$b_publisher=$_POST['publisher'];			
			$b_isbn=$_POST['isbn'];
			$b_pages=$_POST['pages'];
			$b_price=$_POST['price'];
			
			
		
			$link=mysql_connect("localhost","root","")or die("Can't Connect...");
			
			mysql_select_db("shop",$link) or die("Can't Connect to Database...");
			
			$query="insert into book(b_nm,b_subcat,b_desc,b_edition,b_publisher,b_isbn,b_page,b_price,b_img,b_pdf)
			values('$b_nm','$b_cat','$b_desc','$b_edition','$b_publisher','$b_isbn',$b_pages,$b_price,'$b_img','$b_pdf')";
			
			mysql_query($query,$link) or die($query."Can't Connect to Query...");
			header("location:addbook.php?ok=1");
			
		mysql_query("SET NAMES UTF8");
		}
	}
	else
	{
		header("location:RIM.php");
	}
?>
	
	