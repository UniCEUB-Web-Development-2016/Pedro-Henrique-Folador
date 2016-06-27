<?php
include('httpful.phar');

session_start();
$url = "http://localhost/location/user/?firstName=".$_POST['firstName']
    ."&lastName=".$_POST['lastName']
    ."&email=".$_POST['email']
    ."&phone=".$_POST['phone']
    ."&password=".$_POST['password'];

$response = \Httpful\Request::post($url)->send();

$response = \Httpful\Request::get('http://localhost/location/user/?id='.$_SESSION['id'])->send();
$request_response = json_decode($response->body);
$_SESSION['firstName']=$request_response[0]->firstName;
$_SESSION['lastName']=$request_response[0]->lastName;
$_SESSION['email']=urldecode($request_response[0]->email);
$_SESSION['phone']=$request_response[0]->phone;
$_SESSION['password']=$request_response[0]->password;

include('login.html');
