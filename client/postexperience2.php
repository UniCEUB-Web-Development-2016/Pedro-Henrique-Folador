<?php
    include('httpful.phar');
    if (@$_GET['acao']=='editar'){
        $idexperience = $_GET['idexperience'];

        $response = \Httpful\Request::get('http://localhost/location/experience/?idexperience='.$idexperience)->send();
        $request_response = json_decode($response->body);
    }
    ?>
<?php include_once('header.php'); ?>
<div class="row"></div>
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
                        <input type="hidden" value="<?php echo @$request_response[0]->idexperience;?>" name="idexperience">
                        <input type="hidden" value="<?php echo @$request_response[0]->idendereco;?>" name="idendereco">
                        <input type="text" value="<?php echo @$request_response[0]->companyName;?>" name="companyName" id="companyName" class="form-control"
                               placeholder="Company Name" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" value="<?php echo @$request_response[0]->title;?>" name="title" id="title" class="form-control" placeholder="Title" required>
                    </div>
                    <div class="form-group">
                        <label>Period</label>
                        <input type="date" value="<?php echo @$request_response[0]->period;?>" name="period" id="period" class="form-control" placeholder="Period" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" value="<?php echo @$request_response[0]->description;?>" name="description" id="description" class="form-control"
                               placeholder="Description" required>
                    </div>
                    <div class="form-group">
                        <label>Neighborhood</label>
                        <input type="text" value="<?php echo @$request_response[0]->bairro;?>" name="bairro" id="bairro" class="form-control" placeholder="Neighborhood" required>
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" value="<?php echo @$request_response[0]->cidade;?>" name="cidade" id="cidade" class="form-control" placeholder="City" required>
                    </div>
                    <div class="form-group">
                        <label>State</label>
                        <input type="text" value="<?php echo @$request_response[0]->estado;?>" name="estado" id="estado" class="form-control" placeholder="State" required>
                    </div>
                    <div class="form-group">
                        <label>Public Place</label>
                        <input type="text" value="<?php echo @$request_response[0]->logradouro;?>" name="logradouro" id="logradouro" class="form-control"
                               placeholder="Public Place" required>
                    </div>
                    <div class="form-group">
                        <?php if (@$_GET['acao']=='editar'){ ?>
                            <button class="btn btn-success" name="acao" value="editar" type="submit">Save</button>
                        <?php } else { ?>
                            <button class="btn btn-success" value="salvar"  type="submit">Save</button>
                        <?php } ?>
                    </div>
            </div>
        </div>
    </div>

</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
