<!DOCTYPE html>
<html>

<head>
	<title>View Users</title>
	<meta charset="utf-8">
	<meta name="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/app.css">
	<script src="bootstrap-4.3.1-dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
	</script>
	<script src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		});
	</script>
	<style>
		body {
			background-color: #f2f2f2;
		}
	</style>
</head>

<body class="container">
	<center>
		<div class="card-header text-center" id="header">
			<h4>User Information</h4>
		</div>
	</center>
	<br><br>
	<?php
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'emma';

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die("connection failed :");
		mysql_connect_error($conn);
	}

	$query = "SELECT * FROM user";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) > 0) {
		echo '<table id="example" class="mb-7 display" style="width:90%">
	        <thead>
	            <tr>
	            	<th>User ID</th>
	            	<th>First Name</th>
	            	<th>Last Name</th>
	            	<th>Phone No.</th>
	                <th>Email Address</th>
	            </tr>
	        </thead>';
		while ($row = mysqli_fetch_assoc($result)) {
			echo '
				<tbody>
					<tr>
						<td>' . $row['Id'] . '</td>
						<td>' . $row['fname'] . '</td>
						<td>' . $row['lname'] . '</td>
						<td>' . $row['phone_No'] . '</td>
						<td>' . $row['email'] . '</td>
					</tr>
				</tbody>';
		}
		echo ('<table>');
	} else { }
	mysqli_close($conn);
	?>
</body>

</html>