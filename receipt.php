<?php
require('dbconnection.php');
if ($mysqli->connect_error) {
    echo 'The following MYSQL error occured: ' . $mysqli->connect_error;
    return 0;
}
$sql = "INSERT INTO reports(date_from,date_to,subject,period_ending,completed_this_week,activity_in_progress,next_activity,due_date,activity_next_week,status) VALUES('" . $_POST['from'] . "','" . $_POST['to'] . "','" . $_POST['subject'] . "','" . $_POST['ending'] . "','" . $_POST['this_week'] . "','" . $_POST['progress'] . "','" . $_POST['next'] . "','" . $_POST['due'] . "','" . $_POST['next_week'] . "','" . $_POST['status'] . "')";
$message = '';
// if ($mysqli->query($sql)) {
//     $message = 'success';
// } else {
//     $message = 'failed';
// }
header('location: index.php?message=' . $message);
