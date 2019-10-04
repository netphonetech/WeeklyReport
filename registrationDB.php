<?php

include('dbconnection.php');

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = sha1($_POST['password']);

$sql = "INSERT INTO `user`(`fname`, `lname`, `phone_No`, `email`, `password`)VALUES ('" . $fname . "','" . $lname . "','" . $phone . "','" . $email . "','" . $password . "')";

if ($mysqli->query($sql)) {
	return header('location: viewUsers.php?message=User added successfully&type=success');
} else {
	return header('location: registration.php?message=something went wrong, try again&type=success');
	echo mysqli_error($mysqli);
}
