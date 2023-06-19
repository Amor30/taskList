<?php 
	session_start();
	include_once('queryFunction/login.php');
	LoginSignUp();
	include_once('includes/header.php');
?>
<div class="login-wrap">
	<form class="w-25" method="post">
		<div class="mb-3">
			<label for="exampleInputEmail1" class="form-label">Login</label>
			<input name="login" type="text" class="form-control" id="exampleInputEmail1" required>
		</div>
		<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Password</label>
			<input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
		</div>
		<button type="submit" class="btn btn-primary" name="login-form">Log-in</button>
	</form>
</div>
<?php include('includes/footer.php')?>