<?php
require('dbconnection.php');

$message = '';
$type = '';
if (!isset($_GET['id']) && $_GET['id'] != '') {
    return header('location: index.php?message=something went wrong&type=fail');
}
$report = $mysqli->query("SELECT * FROM reports WHERE id='" . $_GET['id'] . "'")->fetch_assoc();

if ($report['user'] != $user['Id']) {
    return header('location: index.php?message=This is not your report, so you cant delete it&type=fail');
}
$sql = "DELETE FROM reports WHERE id=" . $report['id'];

if ($mysqli->query($sql)) {
    $type = 'success';
    $message = 'successful deleted report';
} else {
    $type = 'fail';
    $message = 'failed to delete report';
}

return header('location: index.php?message=' . $message . '&type=' . $type);
