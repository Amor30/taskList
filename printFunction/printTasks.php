<?php
	include_once('includes/config.php');
	function printTask() 
		{
			$conn = connectDB();
			$tasks = $conn->query('SELECT id,description,status FROM tasks WHERE user_id = '.$_SESSION['user_id'].''); // Получение всех записей
			foreach($tasks as $task)
			{
				echo '
				<div class="second-block__line">
					<div class="tasklist__second-block">
						<div class="task-description__block">
							<p class="text-std">'.htmlspecialchars($task['description'], ENT_QUOTES, 'UTF-8').'</p>
							<div class="task-action__block">
								<form method="get">
									<button class="btn btn-primary" name="statusTask-form" value='.$task['id'].'>'.($task['status'] ? 'Unready' : 'Ready').'</button>
								</form>
								<form method="get">
									<button class="btn btn-primary" name="deleteTask-form"  value='.$task['id'].'>Delete</button>
								</form>
							</div>
						</div>
						<div class="task-status__block">
							<span class="circle '.($task['status'] ? 'true' : 'false').'"></span>
						</div>
					</div>
					<hr>
				</div>
				';
			}
		}
?>