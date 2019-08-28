<?php
include('dbconnection.php');
// remove all session variables
session_unset();

// destroy the session 
session_destroy();
return header('location: index.php');
