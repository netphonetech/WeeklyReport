<?php
require('dbconnection.php');

if (!isset($_GET['id']) && $_GET['id'] != '') {
    return header('location: index.php?message=something went wrong');
}
$report = $mysqli->query("SELECT * FROM reports WHERE id='" . $_GET['id'] . "'")->fetch_assoc();
require('header.php');

?>
<div class="col-md-12">
    <div class="card form-group">
        <div class="card-header"><span class="text-capitalize">weekly report</span><span class="text-capitalize font-italic">&nbsp;show</span>
            <i class="text-right text-capitalize pull-right"></i>
        </div>
        <div class="card-body form-group">
            <div class="col-md-12 row form-group">
                <h4 class="col-md-3 text-right">From:</h4>
                <h5 class="col-md-3"><?php echo ($report['date_from']) ?> </h5>
                <h4 class="col-md-3 text-right">To:</h4>
                <h5 class="col-md-3"><?php echo ($report['date_to']) ?> </h5>
            </div>
            <div class="col-md-12 row form-group">
            </div>
            <div class="col-md-12 row form-group">
                <h4 class="col-md-3 text-right">Subject:</h4>
                <textarea readonly class="form-control col-md-3"><?php echo ($report['subject']) ?></textarea>
                <h4 class="col-md-3 text-right">Status:</h4>
                <h5><?php echo ($report['status']) ?> </h5>
            </div>
            <div class="col-md-12 row form-group">
            </div>
            <div class="col-md-12 row form-group">
                <h4 class="col-md-3 text-right">Period Ending:</h4>
                <h5><?php echo ($report['period_ending']) ?> </h5>
            </div>
            <div class="col-md-12 row form-group">
                <h4 class="col-md-3 text-right">Activity completed this week:</h4>
                <textarea readonly class="col-md-8 form-control"><?php echo ($report['completed_this_week']) ?> </textarea readonly cl>
                    </div>
                    <div class="col-md-12 row form-group">
                        <h4 class="col-md-3 text-right">Activity in progress:</h4>
                        <textarea readonly class="col-md-8 form-control"><?php echo ($report['activity_in_progress']) ?> </textarea>
            </div>
            <div class="col-md-12 row form-group">
                <h4 class="col-md-3 text-right">Next activity:</h4>
                <textarea readonly class="col-md-4 form-control"><?php echo ($report['next_activity']) ?> </textarea>
                <h4 class="col-md-2 text-right">Date due:</h4>
                <h5 class="col-md-2"><?php echo ($report['due_date']) ?> </h5>
            </div>
            <div class="col-md-12 row form-group">
            </div>
            <div class="col-md-12 row form-group">
                <h4 class="col-md-3 text-right">Activity to be started next week:</h4>
                <textarea readonly class="col-md-8 form-control"><?php echo ($report['activity_next_week']) ?> </textarea>
            </div>
            <div class="col-md-12 row form-group">
            </div>
        </div>
    </div>
</div>
<?php require('footer.php');
