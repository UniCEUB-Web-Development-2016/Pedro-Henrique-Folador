<?php
  session_start();
  include('httpful.phar');

$response = \Httpful\Request::get('http://localhost/location/user/?email=' . $_POST['email'])->send();
if ($response->code == 200) {
    $request_response = json_decode($response->body);
    if ($request_response->email == $_POST['email'] && $request_response->password == $_POST['password']) {
        $_SESSION['email'] = $request_response->email;
        $_SESSION['firstName'] = $request_response->firstName;
        $_SESSION['lastName'] = $request_response->lastName;
        $_SESSION['phone'] = $request_response->phone;
        $_SESSION['password'] = $request_response->password;
        $_SESSION['iduser'] = $request_response->iduser;
        header("Location: profile.php");

    } else {
        header('location:error.html');
    }
}