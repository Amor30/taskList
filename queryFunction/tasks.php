<?php
	include_once('includes/config.php');
	$conn = connectDB();

	function addTask()
	{
		if(isset($_POST['addTask-form']))
		{
			global $conn;
			$description = $_POST['description'];
			$query = $conn->prepare('INSERT INTO tasks(user_id,description) VALUES (:user_id,:description)');
			$query->bindParam("user_id",$_SESSION['user_id'],PDO::PARAM_STR);
			$query->bindParam("description",$description,PDO::PARAM_STR);
			$query->execute();
			header('Location: tasks.php');
		}
	}
	function deleteAllTasks()
	{
		if(isset($_POST['removeAll-form']))
		{
			global $conn;
			$conn->query('DELETE FROM tasks WHERE user_id = '.$_SESSION['user_id'].';');
			header('Location: tasks.php');
		}
	}

	function readyAllTasks()
	{
		if(isset($_POST['readyAll-form']))
		{
			global $conn;
			$conn->query('UPDATE tasks SET status = true WHERE user_id = '.$_SESSION['user_id'].'');
			header('Location: tasks.php');
		}
	}

	function statusTask()
	{
		if(isset($_GET['statusTask-form']))
		{
			global $conn;
			$conn->query('UPDATE tasks SET status = !status WHERE id = '.$_GET['statusTask-form'].'');
			header('Location: tasks.php');
		}
	}

	function deleteTask()
	{
		if(isset($_GET['deleteTask-form']))
		{
			global $conn;
			$conn->query('DELETE FROM tasks WHERE id = '.$_GET['deleteTask-form'].'');
			header('Location: tasks.php');
		}
	}
?>