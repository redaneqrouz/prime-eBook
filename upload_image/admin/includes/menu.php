<ul>        <div class="top_menu_info">
            <a>|</a>
			<a href="RIM.php">Home</a>
            <a>|</a>
			<a  href="category.php">Category</a>
            <a>|</a>
			<a  href="addbook.php">Books</a>
            <a>|</a>
			<a href="contact.php">Contact</a>
            <a>|</a>
			
			<?php
				if(isset($_SESSION['status'])&& $_SESSION['unm']=="admin")
				{
					echo '<a href="../logout.php">Logout</a><a>|</a>';
				}
				else
				{
					echo '<a href="../register.php">Register</a><a>|</a>';
				}
			?>
            </div>
			
</ul>

