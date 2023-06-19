<?php
	define('DB_HOST', 'localhost'); // Константа имени хоста
	define('DB_USER', 'root'); // Констатнта имени пользователя 
	define('DB_PASSWORD', '123'); // Константа пароля пользователя
	define('DB_NAME', 'tasklist'); // Константа имени БД
	define('DB_TABLE_VERSIONS', 'versions'); // Константа названия таблицы для миграции

	function connectDB() {
		$errorMessage = 'Невозможно подключиться к серверу базы данных. Проверьте данные для подключения к БД по пути includes/config.php';
		try 
		{
			$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
			return $conn;
		}
		catch (Exception $e)
		{
			echo "<h2>$errorMessage</h2>";
			exit;
		}
	}
?>