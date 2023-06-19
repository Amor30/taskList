<?php
	function printLogOut()
	{
		if(isset($_SESSION['user_id']))
		{
			echo '<a class="btn btn-primary" href="logout.php" role="button">Logout</a>';
		}
		else
		{
			echo '<a class="btn btn-primary" href="index.php" role="button">login</a>';
		}
	}
?>