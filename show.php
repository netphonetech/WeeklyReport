<?php
if (!isset($_GET['id']) && $_GET['id'] != '') {
    return header('location: index.php?message=something went wrong');
}
$mysqli = new mysqli('localhost', 'root', 'easy', 'report');
$report = $mysqli->query("SELECT * FROM reports WHERE id='" . $_GET['id'] . "'")->fetch_assoc();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="GsLAamOWp6kSn0E8gr71inxbC6JgcJ3L4xnI6RzX">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/app.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <title>Weekly Report</title>
</head>

<body onload="message()">
    <header class="header header-expand fixed-top form-group" style="background-color: teal">
        <a href="index.php">
            <h2 class="text-center text-white">Weekly Report</h2>
        </a>
    </header>
    &nbsp;
    <div class="form-group"></div>
    <div class="col-md-12 form-group" style="background-color: whitesmoke">
        <br>
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
    </div>
    </div>
    <footer class="footer fixed-bottom">
        footer
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
</body>

</html>