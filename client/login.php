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
</head>
<body id="page-top" class="index">

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Location</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="login.php">Home</a>
        </div>
    </div>
</nav>
<section class="success" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Welcome to Job Finder</h2>
                <hr class="star-light">
            </div>
        </div>
        <div class="row">
            <div class="text-center">
                <p>Welcome to the finder of jobs, here you will find all professionals in your are to know which place to look for jobs</p>
            </div>
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <a href="postuser.html" class="btn btn-lg btn-outline">
                    <i class="fa fa-download"></i> Create Account
                </a>
            </div>
        </div>
    </div>
</section>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/cbpAnimatedHeader.js"></script>
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>
<script src="js/freelancer.js"></script>
<div class="container">
    <div class="row" id="pwd-container">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <section class="login-form">
                <form method="post" action="validLogin.php" role="login">
                    <img src="http://identityview.net/wp-content/themes/identityview/templates/-6544-single.jpg" class="img-responsive" alt="" />
                    <h2 class="form-signin-heading text-center">Log into</h2>
                    <input type="email" name="email" class="form-control input-lg" placeholder="Email" required autofocus />
                    <input type="password" class="form-control input-lg" name="password" placeholder="Password" required />
                    <div class="checkbox2">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <div class="pwstrength_viewport_progress"></div>
                    <button type="submit" class="btn btn-lg btn-success btn-block">Sign in</button>

                    <div>
                        <a href="#">reset password</a>
                    </div>

                </form>
            </section>
        </div>

        <div class="col-md-4"></div>


    </div>



</div>
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>