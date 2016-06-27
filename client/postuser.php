<?php
// Point to where you downloaded the phar
include('httpful.phar');


$url = "http://localhost/location/user/?firstName=".$_POST['firstName']
    ."&lastName=".$_POST['lastName']
    ."&email=".$_POST['email']
    ."&phone=".$_POST['phone']
    ."&password=".$_POST['password'];

$response = \Httpful\Request::post($url)->send();

if($response->body == 'false'){
    echo('Erro ao cadastrar');
}
else{
    header('location:login.php');

}