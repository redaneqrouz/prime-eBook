<?php
                                        @mysql_connect("localhost","root","")or die("Can't Connect to server...");
			                             @mysql_select_db("shop") or die("Can't Connect to Database...");
                                        $u="SELECT * FROM `user` where u_con='1'";
											$ua=mysql_query($u);
                                            $ub=mysql_fetch_array($ua);
                                            $id=$ub['u_id'];
                                        $fnm=$_POST['fnm'];
			                             $unm=$_POST['unm'];
			                             $pwd=$_POST['pwd'];
			                             $gender=$_POST['gender'];
			                             $email=$_POST['mail'];
			                             $contact=$_POST['contact'];
			                             $city=$_POST['city'];
                                        $update="update user set u_fnm='$fnm',u_unm='$unm',u_pwd='$pwd',u_gender='$gender',u_email='$email',u_contact='$contact',u_city='$city'where u_id='$id'";
                                        mysql_query($update);
                                        header("location:profil.php");
                                        mysql_close();
                                        ?>