<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Login">
    <meta name="author" content="Pedro">
    <link rel="icon" href="img/favicon.ico">

    <title>Location</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="css/singin.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link href="css/toolkit.css" rel="stylesheet">
    <link href="css/application.css" rel="stylesheet">

<body class="ang">

<nav class="ck pc os app-navbar">
    <div class="container">
        <div class="or">
            <button type="button" class="ou collapsed" data-toggle="collapse" data-target="#navbar-collapse-main">
                <span class="cv">Toggle navigation</span>
                <span class="ov"></span>
                <span class="ov"></span>
                <span class="ov"></span>
            </button>
        </div>
        <div class="f collapse" id="navbar-collapse-main">
            <ul class="nav navbar-nav ss">
                <li class="active">
                    <a href="login.php">Home</a>
                </li>
                <?php if (!empty($_SESSION['firstName'])){ ?>
                    <li>
                        <a href="profile.php">Meu Perfil</a>
                    </li>
                <?php } ?>
                <li>
                    <a href="chart.php">Viwer Experiences Locations</a>
                </li>
            </ul>
            <?php if (!empty($_SESSION['firstName'])){ ?>
                <p class="navbar-text navbar-right"> <a href="profile.php" class="navbar-link"> <?php echo $_SESSION['firstName'] . ' ' . $_SESSION['lastName']; ?></a>&emsp;
                <a href="logout.php" class="navbar-link">Logout</a>
            <?php } ?>
            </p>
        </div>
    </div>
</nav>