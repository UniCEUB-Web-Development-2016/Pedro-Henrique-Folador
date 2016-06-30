<?php
  session_start();
  include('httpful.phar');
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
    <link href="build/nv.d3.css" rel="stylesheet" type="text/css">
    <script src="build/d3.min.js" charset="utf-8"></script>
    <script src="build/nv.d3.js"></script>

    <style>
        text {
            font: 12px sans-serif;
        }
        svg {
            display: block;
        }
        html, body, #chart1, svg {
            margin: 0px;
            padding: 0px;
            height: 700px;
            width: 100%;
        }
    </style>

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
<br>
<br>
<br>

<?php
$response = \Httpful\Request::get('http://localhost/location/experience/?1=1')->send();
$request_response = json_decode($response->body);

?>


<form method="POST">
    <div class="row">
        <div class="col-md-3 col-md-offset-2">
            <div class="form-group">
                &emsp;<label>Bairro</label>
                <input name="bairro" type="text" class="form-control" placeholder="Bairro">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Employment</label>
                <select name="description" class="form-control">
                        <option value="">Tudo</option>
                   <?php
                   $companyNameanterio = null;
                foreach ($request_response as $key => $value) {
                    

                    if (strtoupper($value->description) != strtoupper($companyNameanterio)){?>

                        <option value="<?php echo $value->description ?>"><?php echo strtoupper($value->description) ?></option>
                    <?php }


                    $companyNameanterio = $value->description;
                    ?>

                <?php }  ?>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <br>
                <input name="acao" class="btn" type="submit">
                
            </div>
        </div>
    </div>
</form>

<?php 
    if (!empty($_POST['bairro']) ) { ?>
        <div class="row">
            <div class="col-md-12 col-md-offset-3"><b>Filtrado por Bairro:</b> <?php echo $_POST['bairro'] ?></div>
        </div>
    <?php }
?>
<?php 
    if (!empty($_POST['companyName']) ) { ?>
        <div class="row">
            <div class="col-md-12 col-md-offset-3"><b>Filtrado por Campanhia:</b> <?php echo $_POST['companyName'] ?></div>
        </div>
    <?php }
?>
<div class="jumbotron2">
    <div class="container">
        <div id="chart1">
    <svg></svg>
</div>
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


$response = \Httpful\Request::get('http://localhost/location/experienceChart/'.$urlpametro)->send();
$request_response = json_decode($response->body);

?>      


<script>

    historicalBarChart = [
        {
            key: "Cumulative Return",
            values: <?php echo ($response->body); ?>
        }
    ];

    nv.addGraph(function() {
        var chart = nv.models.discreteBarChart()
            .x(function(d) { return d.label })
            .y(function(d) { return d.value })
            .staggerLabels(true)
            //.staggerLabels(historicalBarChart[0].values.length > 8)
            .showValues(true)
            .duration(250)
            ;

        d3.select('#chart1 svg')
            .datum(historicalBarChart)
            .call(chart);

        nv.utils.windowResize(chart.update);
        return chart;
    });


</script>


  

    </div>

</div> <!-- /container -->

    
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>

</body>
</html>