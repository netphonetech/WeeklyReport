<?php
require('dbconnection.php');
require('header.php');
?>
<div class="col-md-8 offset-2">
	<div class="card form-group">
		<div class="card-header"><span class="text-capitalize">System User</span><span class="text-capitalize font-italic">&nbsp;Add new</span>
			<i class="text-right text-capitalize pull-right"></i>
		</div>
		<div class="card-body form-group">
			<form action="registrationDB.php" method="post">
				<div class="row form-group">
					<label class="col-md-4 text-right">First Name:</label>
					<div class="col-md-6">
						<input type="text" name="fname" class="form-control" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 text-right">Last Name:</label>
					<div class="col-md-6">
						<input type="text" name="lname" class="form-control" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 text-right">Phone No:</label>
					<div class="col-md-6">
						<input type="text" placeholder="eg. 0785984678" pattern="0[0-9]{9}" name="phone" class="form-control" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 text-right">Email Address:</label>
					<div class="col-md-6">
						<input type="email" name="email" class="form-control" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 text-right">Access Level:</label>
					<div class="col-md-6">
						<select name="access_level" class="form-control" required>
							<option selected>-- Select access level here --</option>
							<option value="Admin">Admin</option>
							<option value="Normal">Normal</option>
						</select>
					</div>
				</div>
				<button class="btn btn-primary col-md-4 offset-5" type="submit" name="update">Register</button>
			</form>
		</div>
	</div>
</div>
<?php require('footer.php');
