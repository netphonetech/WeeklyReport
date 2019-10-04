<?php
require('dbconnection.php');
if (isset($_POST['password'])) {
    $id = $user['Id'];
    $password = sha1($_POST['password']);

    $sql = "UPDATE user SET password='$password' WHERE Id='$id' LIMIT 1";
    if ($mysqli->query($sql)) {
        echo 'success';
    } else {
        echo 'fail';
    }
    return;
}
require('header.php');
?>
<div class="col-md-8 offset-2">
    <div class="card form-group">
        <div class="card-header"><span class="text-capitalize">Change my Password</span><span class="text-capitalize font-italic">&nbsp;</span>
            <i class="text-right text-capitalize pull-right"></i>
        </div>
        <div class="card-body form-group">
            <!-- <form action="user_edit.php" method="post"> -->
            <div class="row form-group">
                <label class="col-md-4 text-right">Password:</label>
                <div class="col-md-6">
                    <input type="password" id="password" min="4" max="20" class="form-control" required> <small>characters min 4, max 20</small>
                </div>
            </div>
            <div class="row form-group">
                <label class="col-md-4 text-right">Confirm:</label>
                <div class="col-md-6">
                    <input type="password" id="confirm_password" class="form-control" required>
                </div>
            </div>
            <button class="btn btn-primary col-md-4 offset-5" onclick="password_confirm()">Change</button>
        </div>
    </div>
</div>
<?php require('footer.php');
