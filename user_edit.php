<?php
require('dbconnection.php');
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $access_level = $_POST['access_level'];

    $sql = "UPDATE user SET fname='$fname', lname='$lname',email='$email',phone_No='$phone',access_level='$access_level' WHERE Id='$id' LIMIT 1";
    if ($mysqli->query($sql)) {
        return header('location: viewUsers.php?message=User updated successfully&type=success');
    } else {
        return header('location: viewUsers.php?message=something went wrong, user not updated&type=fail');
    }
}

if (!isset($_GET['id']) && $_GET['id'] != '') {
    return header('location: viewUsers.php?message=something went wrong&type=fail');
}
$user_account = $mysqli->query("SELECT * FROM user WHERE Id='" . $_GET['id'] . "'")->fetch_assoc();
if (!$user_account) {
    return header('location: viewUsers.php?message=User not exist, refresh and try again&type=fail');
}
require('header.php');
?>
<div class="col-md-8 offset-2">
    <div class="card form-group">
        <div class="card-header"><span class="text-capitalize">System User</span><span class="text-capitalize font-italic">&nbsp;edit</span>
            <i class="text-right text-capitalize pull-right"></i>
        </div>
        <div class="card-body form-group">
            <form action="user_edit.php" method="post">
                <input type="hidden" name="id" value="<?php echo ($user_account['Id']) ?>">
                <div class="row form-group">
                    <label class="col-md-4 text-right">First Name:</label>
                    <div class="col-md-6">
                        <input type="text" name="fname" class="form-control" value="<?php echo $user_account['fname'] ?>" required>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-right">Last Name:</label>
                    <div class="col-md-6">
                        <input type="text" name="lname" class="form-control" value="<?php echo $user_account['lname'] ?>" required>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-right">Phone No:</label>
                    <div class="col-md-6">
                        <input type="text" placeholder="eg. 0785984678" pattern="0[0-9]{9}" name="phone" class="form-control" value="0<?php echo $user_account['phone_No'] ?>" required>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-right">Email Address:</label>
                    <div class="col-md-6">
                        <input type="email" name="email" class="form-control" value="<?php echo $user_account['email'] ?>" required>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-right">Access Level:</label>
                    <div class="col-md-6">
                        <select name="access_level" class="form-control" required>
                            <option selected value="<?php $user_account['access_level'] ? print($user_account['access_level']) : '' ?>"><?php $user_account['access_level'] ? print($user_account['access_level']) : '-- Select access level here --' ?></option>
                            <option value="Admin">Admin</option>
                            <option value="Normal">Normal</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary col-md-4 offset-5" type="submit" name="update">Update</button>
            </form>
        </div>
    </div>
</div>
<?php require('footer.php');
