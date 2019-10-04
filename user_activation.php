<?php

require_once('dbconnection.php');
print_r($user);
$message = '';
$type = '';
if (isset($_POST['id']) && $_POST['id']!='') {
	$id = $_POST['id'];
	if ($id == $user['Id']) {
		$message = 'You can\'t disable your account!';
		$type = 'fail';
	} else{
		if (isset($_POST['activate'])) {
			$sql = "UPDATE user SET status=1 WHERE Id='$id'";
			if ($mysqli->query($sql)) {
				$message = 'Successful activated user';
				$type = 'success';
			} else {
				$message = 'Something went wrong, refresh and try again!';
				$type = 'fail';
			}
		}else if(isset($_POST['deactivate'])) {
			$sql = "UPDATE user SET status=0 WHERE Id='$id'";
			if ($mysqli->query($sql)) {
				$message = 'Successful deactivated user';
				$type = 'success';
			} else {
				$message = 'Something went wrong, refresh and try again!';
				$type = 'fail';
			}
		}
	}
}
else{
	$message = 'Something went wrong, refresh and try again!';
	$type = 'fail';
} 
return header("location: viewUsers.php?message=$message&type=$type");
