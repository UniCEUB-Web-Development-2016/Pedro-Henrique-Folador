<?php
    session_start();
// Point to where you downloaded the phar
include('httpful.phar');



$url = "http://localhost/location/endereco/?logradouro=".$_POST['logradouro']
    ."&cidade=".$_POST['cidade']
    ."&estado=".$_POST['estado']
    ."&bairro=".$_POST['bairro'];

$responseendereco = \Httpful\Request::post($url)->send();
$retorno = json_decode($responseendereco->body);
$idendereco = $retorno->uid;


$url = "http://localhost/location/experience/?companyName=".$_POST['companyName']
    ."&title=".$_POST['title']
    ."&period=".$_POST['period']
    ."&description=".$_POST['description']
    ."&iduser=".$_SESSION['iduser']
    ."&idendereco=".$idendereco;


$response = \Httpful\Request::post($url)->send();

if($response->body == 'false'){
    echo('Erro ao cadastrar');
}
else{
    header('location:profile.php');
}
