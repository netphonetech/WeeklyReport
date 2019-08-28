<?php
session_start();
$mysqli = new mysqli('localhost', 'emma', 'emmanuel', 'report');

if ($mysqli->connect_error) {
    echo 'The following MYSQL error occured: ' . $mysqli->connect_error;
    return 0;
}
$user = '';
if (isset($_SESSION["user_email"])) {
    $user = $mysqli->query("SELECT * FROM user WHERE email='" . $_SESSION["user_email"] . "' LIMIT 1")->fetch_assoc();
} else {
    return header('location:login.php');
}
