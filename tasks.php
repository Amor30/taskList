<?php 
	session_start();
	include_once('printFunction/printTasks.php');
	include_once('queryFunction/tasks.php');
	addTask();
	deleteAllTasks();
	readyAllTasks();
	statusTask();
	deleteTask();
	include_once('includes/header.php');
?>
	<div class="tasklist-wrap">
	<hr>
		<div class="tasklist__first-block">
			<form method="post" class="add-task__block">
				<input type="text" placeholder="Enter text..." class="form-control" id="exampleInputEmail1" name="description" required>
				<button class="btn btn-primary" name="addTask-form">Add task</button>
			</form>
			<div class="all-task__block">
				<form method="post">
					<button class="btn btn-primary" name="removeAll-form">Remove all</button>
				</form>
				<form method="post">
					<button class="btn btn-primary" name="readyAll-form">Ready all</button>
				</form>
			</div>
		</div>
		<hr>
		<?php printTask()?>
	</div>
<?php include('includes/footer.php')?>