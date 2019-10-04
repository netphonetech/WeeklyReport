<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="GsLAamOWp6kSn0E8gr71inxbC6JgcJ3L4xnI6RzX">

    <script src="http://127.0.0.1:8000/js/app.js" defer></script>

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
    <header class="header row header-expand fixed-top form-group" style="background-color: teal">
        <div class="col-md-10">
            <a href="index.php">
                <h2 class="text-center text-white">Weekly Report</h2>
            </a></div>
        <div class="col-md-2">
            <a id="navbarDropdown" class="nav-link dropdown-toggle  text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <span class="text-capitalize"><?php echo ($user['fname'] . ' ' . $user['lname']) ?></span> <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <?php if ($user['access_level'] == 'admin') : ?>
                    <a class="dropdown-item" href="viewUsers.php">Users</a>
                    <hr>
                <?php endif ?>
                <a class="dropdown-item" href="password_change.php">Change Password</a>
                <hr>
                <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
    </header>
    </div>
    <div class="col-md-12 form-group" style="background-color: whitesmoke">
        <?php if (isset($_GET['type']) && $_GET['type'] == 'success') { ?> <div class="form-group"></div><br>
            <div class="text-center col-md-12 text-capitalize  bg-success">
                <?php if (isset($_GET['message'])) {
                        echo ($_GET['message']);
                    } ?>
            </div>
        <?php } elseif (isset($_GET['type']) && $_GET['type'] == 'fail') { ?>
            <div class="form-group"></div><br>
            <div class="text-center col-md-12 text-capitalize  bg-warning">
                <?php if (isset($_GET['message'])) {
                        echo ($_GET['message']);
                    } ?>
            </div> <?php } ?>
        <div class="form-group"></div><br><br>