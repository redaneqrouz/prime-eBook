<?php
                                        @mysql_connect("localhost","root","")or die("Can't Connect to server...");
			                             @mysql_select_db("shop") or die("Can't Connect to Database...");
             $id=$_GET['id'];                           
			$b_nm=$_POST['name'];
			$b_cat=$_POST['cat'];
			$b_desc=$_POST['description'];
			$b_edition=$_POST['edition'];
			$b_publisher=$_POST['publisher'];			
			$b_isbn=$_POST['isbn'];
			$b_pages=$_POST['pages'];
			$b_price=$_POST['price'];
            $cat_id="select * from genres where cat_sub_nm='$b_cat'";
            $fuck=mysql_query($cat_id);
            $doog=mysql_fetch_assoc($fuck);

           /* move_uploaded_file($_FILES['img']['tmp_name'],"../upload_image/".$_FILES['img']['name']);
			$b_img = "upload_image/".$_FILES['img']['name'];*/
            $update="update book set b_nm='$b_nm',b_subcat='$b_cat',b_desc='$b_desc',b_edition='$b_edition',b_publisher='$b_publisher',b_isbn='$b_isbn',b_page='$b_pages',b_price='$b_price' where b_id='$id'";
            mysql_query($update);
            header("location:RIM.php");
            mysql_close();
            ?>