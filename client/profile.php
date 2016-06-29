<?php
session_start();

?>
<?php

include('httpful.phar');

if (!empty($_POST['acao']) and $_POST['acao'] == "Atualizar") {

    $url = "http://localhost/location/user/?firstName=" . $_POST['firstName']
        . "&lastName=" . $_POST['lastName']
        . "&email=" . $_POST['email']
        . "&phone=" . $_POST['phone']
        . "&password=" . $_POST['password'];

    $response = \Httpful\Request::put($url)->send();

    echo "<script>alert('Dados Atulizados Com Sucesso!!!')</script>";
}

if (!empty($_SESSION['email'])) {
    $response = \Httpful\Request::get('http://localhost/location/user/?email=' . $_SESSION['email'])->send();
    $dados = array();
    if ($response->code == 200) {
        $request_response = json_decode($response->body);
        $dados['email'] = $request_response->email;
        $dados['firstName'] = $request_response->firstName;
        $dados['lastName'] = $request_response->lastName;
        $dados['phone'] = $request_response->phone;
        $dados['password'] = $request_response->password;

    }
} else {
    header('location:error2.html');
}


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
                <li>
                    <a href="viewpostexperience.php">Viwer Experiences Locations</a>
                </li>
            </ul>
            <p class="navbar-text navbar-right"> <a href="profile.php" class="navbar-link"> <?php echo $_SESSION['firstName'] . ' ' . $_SESSION['lastName']; ?></a>&emsp;
                <a href="logout.php" class="navbar-link">Logout</a>
            </p>
        </div>
    </div>

</nav>
<div class="container ang">
    <div class="row">
        <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
        </div>
        <div
            class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">


            <div class="panel panel-info">
                <div class="panel-heading">
                    <p class="panel-info"> <?php
                        $mydate = getdate(date("U"));
                        echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
                        ?> </p>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center"><img alt="User Pic"
                                                                            src="https://cdn0.iconfinder.com/data/icons/large-glossy-icons/512/User_login.png"
                                                                            class="img-circle img-responsive"></div>
                        <div class=" col-md-9 col-lg-9 ">
                            <form action="profile.php" method="post">
                                <table class="table table-user-information">

                                    <tr>
                                        <td>First Name:</td>
                                        <td><input onClick="this.select();" type="text" name="firstName"
                                                   value="<?php echo $dados['firstName']; ?>" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Last Name:</td>
                                        <td><input onClick="this.select();" type="text" name="lastName"
                                                   value="<?php echo $dados['lastName']; ?>" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td><input onClick="this.select();" type="email" name="email"
                                                   value="<?php echo $dados['email']; ?>" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Phone:</td>
                                        <td><input onClick="this.select();" type="text" name="phone"
                                                   value="<?php echo $dados['phone']; ?>" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Password:</td>
                                        <td><input onClick="this.select();" type="password" name="password"
                                                   value="<?php echo $dados['password']; ?>" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <button onclick="myFunction()" type="submit" class="btn btn-success"
                                                    name="acao" value="Atualizar">Update
                                                information
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <a href="postexperience2.php" class="btn btn-warning">CREATE EXPERIENCE</a>
                            <a href="postacademic2.php" class="btn btn-info ">CREATE ACADEMIC</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

</body>
</html>