<?php
require('dbconnection.php');

$message = '';
$type = '';
if ($_POST['action'] == 'add') {
    $sql = "INSERT INTO reports(date_from,date_to,subject,period_ending,completed_this_week,activity_in_progress,next_activity,due_date,activity_next_week,status) VALUES('" . $_POST['from'] . "','" . $_POST['to'] . "','" . $_POST['subject'] . "','" . $_POST['ending'] . "','" . $_POST['this_week'] . "','" . $_POST['progress'] . "','" . $_POST['next'] . "','" . $_POST['due'] . "','" . $_POST['next_week'] . "','" . $_POST['status'] . "')";
    if ($mysqli->query($sql)) {
        $type = 'success';
        $message = 'Successfull added report';
    } else {
        $type = 'fail';
        $message = 'Failed to add report';
    }
} else if ($_POST['action'] == 'edit') {
    $sql = "UPDATE reports SET date_from='" . $_POST['from'] . "',date_to='" . $_POST['to'] . "',subject='" . $_POST['subject'] . "',period_ending='" . $_POST['ending'] . "',completed_this_week='" . $_POST['this_week'] . "',activity_in_progress='" . $_POST['progress'] . "',next_activity='" . $_POST['next'] . "',due_date='" . $_POST['due'] . "',activity_next_week='" . $_POST['next_week'] . "',status='" . $_POST['status'] . "' WHERE id='" . $_POST['id'] . "'";
    if ($mysqli->query($sql)) {
        $type = 'success';
        $message = 'Successful update report';
    } else {
        $type = 'fail';
        $message = 'Failed to update report';
    }
}
return header('location: index.php?message=' . $message . '&type=' . $type);
