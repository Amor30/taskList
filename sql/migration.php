<?php
	include_once('includes/config.php');
	
	function getMigrationFiles ()
	{
		$conn = connectDB();
		$sqlFolder = str_replace('\\' , '/' , realpath(dirname(__FILE__)) . '/'); // Путь к миграциям
		$allFiles = glob($sqlFolder . '*.sql');
		$data = $conn->query('SHOW TABLES from '.DB_NAME.' like "'.DB_TABLE_VERSIONS.'"');
		if ($data->rowCount() > 0)
		{
			$versionsFiles = array();
			$data = $conn->query('SELECT name from '.DB_TABLE_VERSIONS.'')->fetchAll(PDO::FETCH_ASSOC); // Какие миграции уже есть
			foreach($data as $row)
			{
				array_push($versionsFiles, $sqlFolder . $row['name']);
			}
			return array_diff($allFiles, $versionsFiles); // Возвращяем миграций, которых нет в таблице versions
		}
		else
		{
			return $allFiles;
		}
	}

	function migrate($file)
	{
		$conn = connectDB();
		$command = sprintf('mysql -u%s -p%s -h %s -D %s < %s', DB_USER, DB_PASSWORD, DB_HOST, DB_NAME, $file);
		shell_exec($command);
		$baseName = basename($file);
		$query = sprintf('insert into `%s` (`name`) values("%s")', DB_TABLE_VERSIONS, $baseName);
		$conn->query($query);
	}

	function executeMigration($files)
	{
		$conn = connectDB();
		if(empty($files))
		{
			echo 'Ваша база данных в актуальном состоянии';
		}
		else
		{
			echo 'Начинаем миграцию...<br>';
			foreach($files as $file)
			{
				migrate($file);
				echo basename($file) . '<br>';
			}
			echo 'Миграция завершена';
		}
	}
?>