<?php
require('dbconnection.php');
if (isset($_GET['action']) && $_GET['action'] == 'remove') {
    $id = $_GET['id'];

    $sql = "DELETE FROM user WHERE Id='$id' LIMIT 1";
    if ($mysqli->query($sql)) {
        return header('location: viewUsers.php?message=User removed successfully&type=success');
    } else {
        return header('location: viewUsers.php?message=something went wrong, user not removed&type=fail');
    }
}
