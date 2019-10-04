<!DOCTYPE html>
<html>

<head>
	<title>login</title>
	<meta charset="utf-8">
	<meta name="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/app.css">
	<script src="bootstrap-4.3.1-dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
	<style>
		body {
			background-color: #f2f2f2;
		}
	</style>
</head>

<body>
	<center>
		<form action="loginDB.php" method="post" class="col-md-6">
			<div class="card rounded mt-4">
				<div class="card-header text-center">
					<span class="float-left">Login</span>
				</div>
				<?php if (isset($_GET['error'])) {
					echo ('<span class="text-danger bg-warning">' . $_GET['error'] . '</span>');
				} ?>
				<div class="card-body">
					<div class="row form-group">
						<label class="col-md-4 text-right">Email Address:</label>
						<div class="col-md-7">
							<input type="email" name="email" class="form-control" required>
						</div>
					</div>
					<div class="row form-group">
						<label class="col-md-4 text-right">Password:</label>
						<div class="col-md-7">
							<input type="Password" name="password" class="form-control" required>
						</div>
					</div>
					<button class="btn btn-primary btn-sm col-md-4 offset-2" type="submit">Login</button><br>
				</div>
			</div>
		</form>
	</center>
</body>

</html>