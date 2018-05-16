
               


<ul>
			<!--<li id="login">--->
		<?php
											if(isset($_GET['erro']))
											{
												echo '<font color="red">'.$_GET['erro'].'</font>';
												echo '<br><br>';
											}
											
											if(isset($_GET['Login']))
											{
												echo '<font color="blue">Vous êtes inscrit avec succès ..</font>';
												echo '<br><br>';
											}
										
										?>
									
						<?php
							if(isset($_SESSION['status']))
							{
								echo '<h2>bienvenu :  '.$_SESSION['unm'].'</h2>';
							}
							else
							{ 
								echo '
									
											
																
										
										
								<div class="center3"><form action="process_login.php" method="POST">
										
											<b style="color:white;">Username:</b>
											<br><input type="text" name="usernm"><br>
											<br>
											
											
											<b style="color:white;">Password:</b>
											<br><input type="password" name="pwd"><br><br>
											<div class="center3"><input type="submit" id="x" value="Login" /></div>
										</form></div>';
							}
						
						?>
			<!--</li>--->
			
			
			
			<!--<li>--->
				
</ul>
		