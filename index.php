<?php
$mysqli = new mysqli('localhost', 'root', 'easy', 'report');
$sql = 'SELECT * FROM `reports`';
$reports = $mysqli->query($sql);
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

<body>
  <header class="header header-expand fixed-top form-group" style="background-color: teal">
    <a href="index.php">
      <h2 class="text-center text-white">Weekly Report</h2>
    </a>
  </header>
  <div class="col-md-12 container form-group">
    <div class="col-md-12 container form-group">
      &nbsp;
      <div class="form-group"></div>
      <div class="col-md-12 form-group" style="background-color: whitesmoke">
        <br>
        <?php if (isset($_GET['type']) && $_GET['type'] == 'success') { ?>
        <div class="text-center col-md-12 text-capitalize  bg-success">
          <?php if (isset($_GET['message'])) {
              echo ($_GET['message']);
            } ?>
        </div>
        <?php } elseif (isset($_GET['type']) && $_GET['type'] == 'fail') { ?>
        <div class="text-center col-md-12 text-capitalize  bg-warning">
          <?php if (isset($_GET['message'])) {
              echo ($_GET['message']);
            } ?>
        </div> <?php } ?>
        <div class="col-md-12">
          <div class="card form-group">
            <div class="card-header"><span class="text-capitalize">weekly report</span><span class="text-capitalize font-italic">&nbsp;list</span>
              <i class="text-right text-capitalize pull-right"></i>
            </div>
            <div class="card-body form-group">
              <div class="form-group">
                <table class="table table-striped table-bordered" id="many">
                  <thead>
                    <tr>
                      <th>S.No</th>
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
                    <tr ondblclick="show(<?php echo ($report['id']) ?>)">
                      <td><?php echo ($sno) ?></td>
                      <td><?php echo ($report['date_from']) ?></td>
                      <td><?php echo ($report['date_to']) ?></td>
                      <td><?php echo ($report['subject']) ?></td>
                      <td><?php echo ($report['status']) ?></td>
                      <td><?php echo ($report['completed_this_week']) ?></td>
                      <td class="text-center">
                        <!-- <a href="receipt.php?id=<?php echo ($report['id']) ?>" class="btn btn-sm btn-outline-dark" onclick="return confirm('Print this report?')"><i class="fa fa-print"></i></a> -->
                        <a href="edit.php?id=<?php echo ($report['id']) ?>" class="btn btn-sm btn-outline-info" onclick="return confirm('Edit this report?')"><i class="fa fa-edit"></i></a>
                        <a href="remove.php?id=<?php echo ($report['id']) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this report?')"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php  } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer fixed-bottom">
      footer
    </footer>
    <script>
      function show(report) {
        window.location.replace("show.php?id=" + report);
      }
    </script>
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