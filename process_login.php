<?php session_start();
	
	if(!empty($_POST))
	{
		$msg="";
		
		if(empty($_POST['usernm']))
		{
			$msg.="Aucun utilisateur";
		}
		
		if(empty($_POST['pwd']))
		{
			$msg.="Mot de passe incorrect........";
		}
		
		
		if(!empty($msg))
		{
			//echo '<b>Error:-</b><br>';
			
			/*foreach($msg as $k)
			{
				echo '<li>'.$k;
			}*/
			header("location:register.php?erro=".$msg);

		}
		else
		{
			
			
		
			@mysql_connect("localhost","root","")or die("Impossible de se connecter...");
			
			@mysql_select_db("shop") or die("Impossible de se connecter à la base de données...");
			
			$unm=$_POST['usernm'];
			
			$q="select * from user where u_unm='$unm'";
			
			$res=mysql_query($q) or die("mauvaise requête");
			
			$row=mysql_fetch_assoc($res);
			
					
			if(!empty($row))
			{
				if($_POST['pwd']==$row['u_pwd'])
				{
					/*$_SESSION=array();*/
					$_SESSION['unm']=$row['u_unm'];
					$_SESSION['uid']=$row['u_pwd'];
					$_SESSION['status']=true;
                    $a=$row['u_id'];
                    $k="UPDATE `user` SET `u_con` = '1' WHERE `u_id` ='$a'";
                    mysql_query($k);
					if($_SESSION['unm']!="admin")
					{
						header("location:RIM.php");
					}
					else
					{
						header("location:admin/RIM.php");
					}
				}
				
				else
				{
					header("location:register.php?erro=".$msg);
				}
			}
			else
			{
				header("location:register.php?erro=".$msg);
			}
		}
	
	}
	else
	{
		header("location:RIM.php");
	}
			
?>