<?php
	include_once('includes/config.php');
	function LoginSignUp()
	{
		if(isset($_POST['login-form']))
		{
			$conn = connectDB();
			$login = $_POST['login'];
			$password = $_POST['password'];
			$hash = password_hash($password,PASSWORD_BCRYPT);
			$query = $conn->prepare("SELECT id,password FROM users WHERE login=:login");
			$query->bindParam("login", $login, PDO::PARAM_STR);
			$query->execute();
			if($query->rowCount() > 0) // Проверка на уникальность логина
			{
				$result = $query->fetch(PDO::FETCH_ASSOC);
				if(password_verify($password,$result['password'])) // Проверка пароля
				{
					$_SESSION['user_id'] = $result['id'];
					header('Location: tasks.php');
				}
				else
				{
					echo '<p>Неверный пароль</p>';
				}
			}
			else // Создание нового пользователя
			{
				$query = $conn->prepare("INSERT INTO users(login,password) VALUES (:login,:password)");
				$query->bindParam("login", $login, PDO::PARAM_STR);
				$query->bindParam("password", $hash, PDO::PARAM_STR);
				$result = $query->execute();

				$query = $conn->prepare("SELECT id FROM users WHERE login=:login AND password=:password");
				$query->bindParam("login", $login, PDO::PARAM_STR);
				$query->bindParam("password", $hash, PDO::PARAM_STR);
				$query->execute();
				$result = $query->fetch(PDO::FETCH_ASSOC);

				if (isset($result))
				{
					$_SESSION['user_id'] = $result['id'];
					header('Location: tasks.php');
				}
				else
				{
					echo '<p>Неверные данные</p>';
				}
			}
		}
	}
?>