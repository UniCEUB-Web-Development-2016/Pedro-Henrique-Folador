<?php
// Point to where you downloaded the phar
include('httpful.phar');


$url = "http://localhost/location/user/?firstName=".$_POST['firstName']
    ."&lastName=".$_POST['lastName']
    ."&email=".$_POST['email']
    ."&password=".$_POST['password'];

$response = \Httpful\Request::post($url)->send();

if($response->body == 'false'){
    echo('Erro ao cadastrar');
}
else{
    header('location:index.html');

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
