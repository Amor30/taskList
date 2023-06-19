<?php 
	include_once('printFunction/printLogout.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<script href="bootstrap.min.js"></script>
</head>
<body>
	<header>
		<div class="header__first-block">
			<a class="btn btn-primary <?php if(empty($_SESSION['user_id'])) echo'block-class' // Ссылка недоступна, если пальзователь неавторизован?>
			" href="tasks.php" role="button">Tasks</a>
			<a class="btn btn-primary" href="migration.php" role="button">Migration</a>
		</div>
		<h1>Task List</h1>
		<div class="header__second-block">
			<?php 
			printLogOut(); // Кнопка выйти
			?>
		</div>
	</header>