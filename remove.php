<?php
$mysqli = new mysqli('localhost', 'root', 'easy', 'report');
if ($mysqli->connect_error) {
    echo 'The following MYSQL error occured: ' . $mysqli->connect_error;
    return 0;
}
$sql = "DELETE FROM reports WHERE id=" . $_GET['id'];
$message = '';
$type = '';

if ($mysqli->query($sql)) {
    $type = 'success';
    $message = 'successful deleted report';
} else {
    $type = 'fail';
    $message = 'failed to delete report';
}

return header('location: index.php?message=' . $message . '&type=' . $type);
