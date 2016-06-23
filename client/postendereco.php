<?php
// Point to where you downloaded the phar
include('httpful.phar');


$url = "http://localhost/location/endereco/?bairro=".$_POST['bairro']
    ."&cidade=".$_POST['cidade']
    ."&estado=".$_POST['estado']
    ."&logradouro=".$_POST['logradouro'];

$response = \Httpful\Request::post($url)->send();

if($response->body == 'false'){
    echo('Erro ao cadastrar');
}
else{
    header('location:postexperience.html');

}


//if($response->code == 200){
//    $request_response = json_decode($response->body);
//
//    ($request_response);
//
//    session_start();
//    $_SESSION['iduser']=$request_response->iduser;
//    $_SESSION['email']=$request_response->email;
//    $_SESSION['firstName']=$request_response->firstName;
//    $_SESSION['lastName']=$request_response->lastName;
//    include 'postexperience.html';
//}
//else{
//    header('location:error.html');
//}
