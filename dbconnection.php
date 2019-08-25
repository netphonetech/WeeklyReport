<?php
$mysqli = new mysqli('localhost', 'emma', 'emmanuel', 'report');

if ($mysqli->connect_error) {
    echo 'The following MYSQL error occured: ' . $mysqli->connect_error;
    return 0;
}
