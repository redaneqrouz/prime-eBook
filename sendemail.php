<?php
$con = @mysql_connect("localhost","root","")or die ("cante connect");


@mysql_select_db("shop", $con)or die ("cante connect");

		$email = $_POST['email'];
		$user = $_POST['user'];
		$result1 = mysql_query("SELECT * FROM user where u_unm='$user'");
while($row = mysql_fetch_array($result1))
  {
  $password=$row['u_pwd'];
  }
$to=$email_to;
$subject="Your password here";

$header="from: your name <tameraplazain@gmail.com>";

$messages= "Your password for login to our website \r\n";
$messages.="Your password is $password \r\n";
$messages.="more message... \r\n";

$sentmail = mail($email,$subject,$messages,$header);

		
		header('register.php');
?>