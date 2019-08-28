<?php
require('dbconnection.php');
$sql = 'SELECT * FROM reports,user WHERE reports.user=user.Id';
$reports = $mysqli->query($sql);
require('header.php');
?>
<div class="col-sm-12 form-group">
  <div class="card form-group">
    <div class="card-header"><span class="text-capitalize">weekly report</span><span class="text-capitalize font-italic">&nbsp;list</span>
      <a href="add.php" class="btn btn-outline-success col-md-2 float-right">Add report</a>
    </div>
    <div class="card-body form-group">
      <div class="form-group">
        <?php if ($reports->num_rows < 1) {
          ?>
          <h4 class="text-center">No report added yet</h4>
        <?php
        } else { ?>
          <table class="table table-sm table-striped table-bordered" id="many">
            <thead>
              <tr>
                <th>S.No</th>
                <th>Posted By</th>
                <th>From</th>
                <th>To</th>
                <th>Subject</th>
                <th>Status</th>
                <th>Task Completed This week</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php $sno = 0;
                while ($report = $reports->fetch_assoc()) {
                  $sno++;
                  ?>
                <tr ondblclick="show(<?php echo ($report['id']) ?>)" title="Double click to show whole report">
                  <td><?php echo ($sno) ?></td>
                  <td class="text-capitalize"><?php echo ($report['fname'] . ' ' . $report['lname']) ?></td>
                  <td><?php echo ($report['date_from']) ?></td>
                  <td><?php echo ($report['date_to']) ?></td>
                  <td><input class="form-control" readonly value="<?php echo ($report['subject']) ?>"></td>
                  <td><?php echo ($report['status']) ?></td>
                  <td><input class="form-control" readonly value="<?php echo ($report['completed_this_week']) ?>"></td>
                  <td class="text-center">
                    <!-- <a href="receipt.php?id=<?php echo ($report['id']) ?>" class="btn btn-sm btn-outline-dark" onclick="return confirm('Print this report?')"><i class="fa fa-print"></i></a> -->
                    <a href="edit.php?id=<?php echo ($report['id']) ?>" class="btn btn-sm btn-outline-info" onclick="return confirm('Edit this report?')"><i class="fa fa-edit"></i></a>
                    <a href="remove.php?id=<?php echo ($report['id']) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this report?')"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
              <?php  } ?>
            </tbody>
          </table> <?php } ?>
      </div>
    </div>
  </div>
  <?php require('footer.php');
