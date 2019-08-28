<!DOCTYPE html>
<html>

<head>
	<title>registration</title>
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
		<form action="registrationDB.php" method="post" class="col-md-6">
			<div class="card mt-4">
				<div class="card-header">
					<span class="float-left">Registration</span> <a href="login.php" class="btn btn-sm float-right">Login</a>
				</div>
				<div class="card-body">
					<?php if (isset($_GET['error'])) {
						echo ('<span class="text-danger bg-warning">' . $_GET['error'] . '</span>');
					} ?>
					<div class="row form-group">
						<label class="col-md-4 text-right">First Name:</label>
						<div class="col-md-6">
							<input type="text" name="fname" class="form-control" required>
						</div>
					</div>
					<div class="row form-group">
						<label class="col-md-4 text-right">Last Name:</label>
						<div class="col-md-6">
							<input type="text" name="lname" class="form-control" required>
						</div>
					</div>
					<div class="row form-group">
						<label class="col-md-4 text-right">Phone No:</label>
						<div class="col-md-6">
							<input type="number" min="0" name="phone" class="form-control" required>
						</div>
					</div>
					<div class="row form-group">
						<label class="col-md-4 text-right">Email Address:</label>
						<div class="col-md-6">
							<input type="email" name="email" class="form-control" required>
						</div>
					</div>
					<div class="row form-group">
						<label class="col-md-4 text-right">Password:</label>
						<div class="col-md-6">
							<input type="Password" name="password" class="form-control" required>
						</div>
					</div>
					<button class="btn btn-primary btn-sm col-md-4 offset-2" type="submit">Register</button>
				</div>
			</div>
		</form>
	</center>
</body>

</html>