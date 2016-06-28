<?php
  session_start();
?>
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
                <li>
                    <a href="profile.php">Meu Perfil</a>
                </li>
                <li>
                    <a href="viewpostexperience.php">Viwer Experiences Locations</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="jumbotron2">
    <div class="container">

<table class="table" id="example">
    <thead>
        <tr>
            <th>Companhia</th>
            <th>Descricao</th>
            <th>Bairro</th>
            <th>Estado</th>
        </tr>
        
    </thead>
    <tbody>
        

<?php 
$urlpametro = array();

if (!empty($_POST['bairro'])) $urlpametro[] = 'bairro='.$_POST['bairro'];
if (!empty($_POST['companyName'])) $urlpametro[] = 'companyName='.$_POST['companyName'];

$urlpametro = implode('&', $urlpametro);
if (!empty($urlpametro)) {
    $urlpametro = '?'.$urlpametro;
} else{
    
    $urlpametro = '?1=1';
}

 include('httpful.phar');
$response = \Httpful\Request::get('http://localhost/location/experience/'.$urlpametro)->send();
$request_response = json_decode($response->body);
//print_r($request_response);
?>

  <?php
foreach ($request_response as $key => $value) {?>
      <tr>
        <td><?php echo $value->companyName ?></td>
        <td><?php echo $value->description ?></td>
        <td><?php echo $value->bairro ?></td>
        <td><?php echo $value->estado ?></td>
      </tr>

<?php }
 ?>
    </tbody>
  </table>

    </div>

</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>

<form method="POST">
    bairro<input name="bairro">
    companhia<input name="companyName">
    <input name="acao" type="submit">
</form>

</body>
</html>


<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>

<select name="">
    
   <?php
foreach ($request_response as $key => $value) {?>
     <option value="<?php echo $value->idexperience ?>"><?php echo $value->companyName ?></option>

<?php }  ?>
</select>