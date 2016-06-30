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
<section class="ck pc " id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Welcome to work Locator</h2>
                <hr class="star-light">
            </div>
        </div>
        <div class="row">
            <div class="text-center">
                <p>Welcome to the locator of jobs, here you will find all the professionals to know which place seek employment</p>
            </div>
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <a href="postuser.html" class="btn btn-lg btn-outline">
                    <i class="fa fa-download"></i> Sign Up
                </a>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row" id="pwd-container">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <section class="login-form">
                <form method="post" action="validLogin.php" role="login">
                    <img src="http://identityview.net/wp-content/themes/identityview/templates/-6544-single.jpg"
                         class="img-responsive" alt=""/>
                    <h2 class="form-signin-heading text-center">Log into</h2>
                    <input type="email" name="email" class="form-control input-lg" placeholder="Email" required
                           autofocus/>
                    <input type="password" class="form-control input-lg" name="password" placeholder="Password"
                           required/>
                    <div class="checkbox2">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <div class="pwstrength_viewport_progress"></div>
                    <button type="submit" class="btn btn-lg btn-success btn-block">Sign in</button>
                </form>
            </section>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
</body>
<script src="js/ie10-viewport-bug-workaround.js"></script>
</html>