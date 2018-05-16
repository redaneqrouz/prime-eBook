<ul>        <div class="cart"><a href="viewcart.php"></a></div>
			<div class="top_menu_info">
			
			<?php 
					if(isset($_SESSION['status']))
					{
						echo '<a>|</a><a href="profil.php">Profil</a>';
							echo '<a>|</a><a href="logout.php">Logout</a>'; 
						      }
						
					
					else {
						
						echo '<a>|</a><a href="register.php">Se Connecter</a>';
					}
					
			?>
				
             <a>|</a>   
			 <a href="contact.php">Contacter  nous</a>
                <a>|</a>
			 <a href="aboutus.php">A propos de nous</a>
                <a>|</a>
                
            </div>
</ul>