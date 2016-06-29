<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
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
                <h1>Create Experience
                    <small></small>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="panel col-md-12">
                <form class="form-singin" action="postexperience.php" method="post">
                    <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" name="companyName" id="companyName" class="form-control"
                               placeholder="Company Name" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Title" required>
                    </div>
                    <div class="form-group">
                        <label>Period</label>
                        <input type="date" name="period" id="period" class="form-control" placeholder="Period" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" id="description" class="form-control"
                               placeholder="Description" required>
                    </div>
                    <div class="form-group">
                        <label>Neighborhood</label>
                        <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Neighborhood" required>
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" name="cidade" id="cidade" class="form-control" placeholder="City" required>
                    </div>
                    <div class="form-group">
                        <label>State</label>
                        <input type="text" name="estado" id="estado" class="form-control" placeholder="State" required>
                    </div>
                    <div class="form-group">
                        <label>Public Place</label>
                        <input type="text" name="logradouro" id="logradouro" class="form-control"
                               placeholder="Public Place" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
