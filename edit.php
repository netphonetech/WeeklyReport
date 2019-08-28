<?php
require('dbconnection.php');
if (!isset($_GET['id']) && $_GET['id'] != '') {
    return header('location: index.php?message=something went wrong&type=fail');
}
$report = $mysqli->query("SELECT * FROM reports WHERE id='" . $_GET['id'] . "'")->fetch_assoc();
if ($report['user'] != $user['Id']) {
    return header('location: index.php?message=This is not your report, so you cant edit it&type=fail');
}
require('header.php');
?>
<div class="col-md-12">
    <div class="card form-group">
        <div class="card-header"><span class="text-capitalize">weekly report</span><span class="text-capitalize font-italic">&nbsp;edit</span>
            <i class="text-right text-capitalize pull-right"></i>
        </div>
        <div class="card-body form-group">
            <form method="POST" action="save.php">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="id" value="<?php echo ($report['id']) ?>">
                <div class="row form-group">
                    <label for="from" class="col-md-2 text-right">From</label>
                    <div class="col-md-3">
                        <input name="from" type="date" class="form-control" value="<?php echo ($report['date_from']) ?>" autofocus required>
                    </div>
                    <label for="to" class="col-md-2 text-right">To</label>
                    <div class="col-md-3">
                        <input name="to" type="date" class="form-control" value="<?php echo ($report['date_to']) ?>" autofocus required>
                    </div>
                </div>
                <div class="row form-group">
                    <label for="subject" class="col-md-2 text-right">Subject</label>
                    <div class="col-md-4">
                        <input name="subject" placeholder="eg. adding payment module in easyStore" type="text" class="form-control" value="<?php echo ($report['subject']) ?>" autofocus required>
                    </div>
                    <label for="status" class="col-md-1 text-right">Status</label>
                    <div class="col-md-4">
                        <input name="status" placeholder="eg. on progress" type="text" value="<?php echo ($report['status']) ?>" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="row form-group">
                    <label for="ending" class="col-md-2 text-right">Period Ending</label>
                    <div class="col-md-4">
                        <input name="ending" type="date" class="form-control" value="<?php echo ($report['period_ending']) ?>" autofocus required>
                    </div>
                </div>
                <div class="row form-group">
                    <label for="this_week" class="col-md-2 text-right">Activity completed this week</label>
                    <div class="col-md-4">
                        <textarea name="this_week" placeholder="eg. creating payment form" class="form-control" autofocus required><?php echo ($report['completed_this_week']) ?></textarea>
                    </div>
                    <label for="progress" class="col-md-1 text-right">Activity in progress</label>
                    <div class="col-md-4">
                        <textarea name="progress" placeholder="eg. implementing back end for payment details validation" class="form-control" autofocus required><?php echo ($report['activity_in_progress']) ?></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <label for="next" class="col-md-2 text-right">Next Activity</label>
                    <div class="col-md-4">
                        <textarea name="next" placeholder="eg. integrating with payment API" rows="1" class="form-control" autofocus required><?php echo ($report['next_activity']) ?></textarea>
                    </div>
                    <label for="due" class="col-md-1 text-right">Due date</label>
                    <div class="col-md-4">
                        <input name="due" type="date" class="form-control" value="<?php echo ($report['due_date']) ?>" autofocus required>
                    </div>
                </div>
                <div class="row form-group">
                    <label for="next_week" class="col-md-2 text-right">Activity to be started next week</label>
                    <div class="col-md-9">
                        <textarea name="next_week" class="form-control" placeholder="eg. testing, including adding test data and training users" autofocus required><?php echo ($report['activity_next_week']) ?></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6 offset-3">
                        <button class="btn btn-lg btn-outline-success btn-block" autofocus>Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require('footer.php');
