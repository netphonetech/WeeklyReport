<?php
include('dbconnection.php');

if (isset($_POST['email'])) {
	if (isset($_POST['email']) && isset($_POST['password'])) {
		$password = sha1($_POST['password']);
		$email = $_POST['email'];
		$result = $mysqli->query("SELECT * FROM user WHERE email='" . $email . "' AND password ='" . $password . "' limit 1");
		if ($result->num_rows == 1) {
			$_SESSION["user_email"] = $_POST['email'];
			return header('location: index.php');
		} else {
			return header('location:login.php?error=incorrect username or password');
		}
	}
}
