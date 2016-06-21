<?php
// Point to where you downloaded the phar
include('httpful.phar');

$response = \Httpful\Request::get('http://localhost/location/user/?email='.$_POST['email'])->send();

if($response->code == 200){
    $request_response = json_decode($response->body);
    if($request_response[0]->email == $_POST['email'] && $request_response[0]->password == $_POST['password']){
        session_start();
        $_SESSION['firstName']=$request_response[0]->firstName;
        $_SESSION['lastName']=$request_response[0]->lastName;
        include 'postexperience.html';

    }
    else{
        header('location:error.html');
    }
}
else{
    header('location:error.html');
}
