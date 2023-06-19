<?php 
	session_start();
	include_once('includes/header.php');
	include_once('sql/migration.php');
	$files = getMigrationFiles();
	executeMigration($files);
?>
	
<?php include('includes/footer.php')?>