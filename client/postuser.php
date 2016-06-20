<?php
// Point to where you downloaded the phar
include('httpful.phar');


$url = "http://localhost/location/user/?firstName=".$_POST['firstName']
    ."&lastName=".$_POST['lastName']
    ."&email=".$_POST['email']
    ."&password=".$_POST['password']
    ."&codMap=".$_POST['codMap'];

$response = \Httpful\Request::post($url)->send();

if($response->body == 'false'){
    include('signup2.html');
}
else{
    header('location:index.html');
}
