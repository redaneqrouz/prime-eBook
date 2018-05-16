<!--<ul>        <div class="top_menu_info">
            <a>|</a>
			<a href="RIM.php">Home</a>
            <a>|</a>
			<a  href="addbook.php">Books</a>
            <a>|</a>
			<a href="contact.php">Contact</a>
            <a>|</a>
			
			<?php
				/*if(isset($_SESSION['status'])&& $_SESSION['unm']=="admin")
				{
					echo '<a href="../logout.php">Logout</a><a>|</a>';
				}
				else
				{
					echo '<a href="../register.php">Register</a><a>|</a>';
				}*/
			?>
            </div>
			
</ul>-->
<div class="ilyas">
<ul>        
    
    
    <li>
			<div class="top_menu_info">
			
			<?php 
					if(isset($_SESSION['status'])&& $_SESSION['unm']=="admin")
					{
						echo '<a>|</a><a href="profil.php" style="text-transform:uppercase;color:#fff;display:inline-block;font-family:Ubuntu Condensed ,arial,sans-serif;font-size:18px;font-size:.9rem">Profil</a>';
							echo '<a>|</a><a href="../logout.php" style="text-transform:uppercase;color:#fff;display:inline-block;font-family:Ubuntu Condensed ,arial,sans-serif;font-size:18px;font-size:.9rem">se déconnecter</a>'; 
						      }
			?>
				
             <a>|</a>
			 <a href="contact.php" style="text-transform:uppercase;color:#fff;display:inline-block;font-family:Ubuntu Condensed ,arial,sans-serif;font-size:18px;font-size:.9rem">Contact</a>
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
								include("../includes/search.php");
							?>
					</div>
                                          
                </div> 
    </li>
</ul>
</div>

