<?php
// Point to where you downloaded the phar
include('httpful.phar');


$url = "http://localhost/location/experience/?companyName=".$_POST['companyName']
    ."&title=".$_POST['title']
    ."&period=".$_POST['period']
    ."&description=".$_POST['description']
    ."&iduser=".$_POST['iduser']
    ."&idendereco=".$_POST['idendereco'];


$response = \Httpful\Request::post($url)->send();
if($response->body == 'false'){
    echo('Erro ao cadastrar');
}
else{
    header('location:postacademic.html');
}
