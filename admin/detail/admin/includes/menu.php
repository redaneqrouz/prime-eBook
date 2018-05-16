<ul>
			<li class="top_menu_info"><a href="RIM.php">Home</a></li>
			<li  class="top_menu_info"><a  href="category.php">Category</a></li>
			<li class="top_menu_info" ><a  href="addbook.php">Books</a></li>
			<li class="top_menu_info"><a href="contact.php">Contact</a></li>
			
			<?php
				if(isset($_SESSION['status'])&& $_SESSION['unm']=="admin")
				{
					echo '<li  class="top_menu_info" ><a href="../logout.php">Logout</a></li>';
				}
				else
				{
					echo '<li class="top_menu_info" ><a href="../register.php">Register</a></li>';
				}
			?>
			
		</u