<?php
require('dbconnection.php');
$sql = 'SELECT * FROM user';
$system_users = $mysqli->query($sql);
require('header.php');
?>
<div class="col-sm-12 form-group">
	<div class="card form-group">
		<div class="card-header"><span class="text-capitalize">System Users</span><span class="text-capitalize font-italic">&nbsp;list</span>
			<a href="registration.php" class="btn btn-outline-success col-md-2 float-right">Add user</a>
		</div>
		<div class="card-body form-group">
			<div class="form-group">
				<?php if ($system_users->num_rows < 1) {
					?>
					<h4 class="text-center">No User added yet</h4>
				<?php
				} else { ?>
					<table class="table table-sm table-striped table-bordered" id="many">
						<thead>
							<tr>
								<th>S.No</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Access Level</th>
								<th>Status</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php $sno = 0;
								while ($system_user = $system_users->fetch_assoc()) {
									$sno++;
									?>
								<tr>
									<td><?php echo ($sno) ?></td>
									<td class="text-capitalize"><?php echo ($system_user['fname']) ?></td>
									<td class="text-capitalize"><?php echo ($system_user['lname']) ?></td>
									<td><?php echo '+255 ' . number_format($system_user['phone_No'], 0, '', ' ') ?></td>
									<td><?php echo ($system_user['email']) ?></td>
									<td><?php echo ($system_user['access_level']) ?></td>
									<td><form method="post" action="user_activation.php">
											<input type="hidden" name="id" value="<?php echo $system_user['Id'] ?>">
											<?php if($system_user['status']): ?>
												<span class="badge badge-primary">ACTIVE</span>
												<input type="submit" class="btn btn-light btn-sm float-right" name="deactivate" value="Deactivate">
											<?php else: ?>
												<span class="badge badge-warning">NOT ACTIVE</span>
												<input type="submit" class="btn btn-light btn-sm float-right" name="activate" value="Activate">
											<?php endif ?>
										</form>
									</td>
									<td class="text-center">
										<a href="user_edit.php?id=<?php echo ($system_user['Id']) ?>" class="btn btn-sm btn-outline-info" onclick="return confirm('Edit this user?')"><i class="fa fa-edit"></i></a>
										<a href="user_remove.php?id=<?php echo ($system_user['Id']) ?>&action=remove" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this user?')"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
							<?php  } ?>
						</tbody>
					</table> <?php } ?>
			</div>
		</div>
	</div>
	<?php require('footer.php');
