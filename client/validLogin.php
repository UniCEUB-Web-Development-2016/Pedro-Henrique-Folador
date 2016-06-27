<?php
include('httpful.phar');

$response = \Httpful\Request::get('http://localhost/location/user/?email=' . $_POST['email'])->send();

if ($response->code == 200) {
    $request_response = json_decode($response->body);
    if ($request_response[0]->email == $_POST['email'] && $request_response[0]->password == $_POST['password']) {
        session_start();
        $_SESSION['email'] = $request_response[0]->email;
        $_SESSION['firstName'] = $request_response[0]->firstName;
        $_SESSION['lastName'] = $request_response[0]->lastName;
        $_SESSION['phone'] = $request_response[0]->phone;
        $_SESSION['password'] = $request_response[0]->password;
        include 'login.html';

    } else {
        empty($request_response);
        $_SESSION['loginErro'] = "User or Password Invalid";
        header("Location: login.html");
    }
}