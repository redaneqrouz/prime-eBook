<div class="ilyas">
<ul>        
    
    
    <li>
			<div class="top_menu_info">
			
			<?php 
					if(isset($_SESSION['status']))
					{
						echo '<a>|</a><a href="profil.php" style="text-transform:uppercase;color:#fff;display:inline-block;font-family:Ubuntu Condensed ,arial,sans-serif;font-size:18px;font-size:.9rem">Profil</a>';
							echo '<a>|</a><a href="logout.php" style="text-transform:uppercase;color:#fff;display:inline-block;font-family:Ubuntu Condensed ,arial,sans-serif;font-size:18px;font-size:.9rem">Se Deconnecter</a>'; 
						      }
						
					
					else {
						
						echo '<a>|</a><a href="register.php" style="text-transform:uppercase;color:#fff;display:inline-block;font-family:Ubuntu Condensed ,arial,sans-serif;font-size:18px;font-size:.9rem">Se Connecter</a>';
					}
					
			?>
				
             <a>|</a>   
			 <a href="contact.php" style="text-transform:uppercase;color:#fff;display:inline-block;font-family:Ubuntu Condensed ,arial,sans-serif;font-size:18px;font-size:.9rem">Contacter  nous</a>
                <a>|</a>
			 <a href="aproposdenous.php" style="text-transform:uppercase;color:#fff;display:inline-block;font-family:Ubuntu Condensed ,arial,sans-serif;font-size:18px;font-size:.9rem">A propos de nous</a>
                <a>|</a>
                
            </div>
    </li>
    
    <li>
        <div class="search">
                     <?php 
								/*if(isset($_SESSION['status']))
								{
									echo 'Bienvenu   :  '  .$_SESSION['unm']; 
								}
								else
								{	
									
								}*/
							?> 
                    <div id="sidebar">
							<?php
								include("search.php");
							?>
					</div>
                                          
                </div> 
    </li>
</ul>
</div>