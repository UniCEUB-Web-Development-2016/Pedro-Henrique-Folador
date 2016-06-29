<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.ico">

    <title>Location</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/singin.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
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
                <li>
                    <a href="profile.php">Meu Perfil</a>
                </li>
            </ul>
            <p class="navbar-text navbar-right"> <a href="profile.php" class="navbar-link"> <?php echo $_SESSION['firstName'] . ' ' . $_SESSION['lastName']; ?></a>&emsp;
                <a href="logout.php" class="navbar-link">Logout</a>
            </p>
        </div>
    </div>
</nav>

<div class="row">asd</div>
<div class="jumbotron2">
    <div class="container">
        <div class="row">
            <div class="page-header">
                <h1>Create Academic Education
                    <small></small>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="panel col-md-12">
                <form class="form-signin" action="postacademic.php" method="post">
                    <div class="form-group">
                        <label>Institution</label>
                        <input type="text" name="institution" id="institution" class="form-control" placeholder="Institution" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Period</label>
                        <input type="date" name="period" id="period" class="form-control" placeholder="Period" required >
                    </div>
                    <div class="form-group">
                        <label>Formation</label>
                        <input type="text" name="formation" id="formation" class="form-control" placeholder="Formation" required >
                    </div>
                    <div class="form-group">
                        <label>StudyArea</label>
                        <input type="text" name="studyArea" id="studyArea" class="form-control" placeholder="studyArea" required >
                    </div>
                    <div class="form-group">
                        <label>Note</label>
                        <input type="text" name="note" id="note" class="form-control" placeholder="Note" required>
                    </div>
                    <div class="form-group">
                        <label>Activities Groups</label>
                        <input type="text" name="activitiesGroups" id="activitiesGroups" class="form-control" placeholder="Activities Groups" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" id="description" class="form-control" placeholder="Description" required>
                    </div>
                    <div class="form-group">
                        <label>Logradouro</label>
                        <input type="text" name="logradouro" id="logradouro" class="form-control"
                               placeholder="Logradouro" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>