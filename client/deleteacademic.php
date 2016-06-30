<?php
include('httpful.phar');

session_start();

$url = "http://localhost/location/academic/idacademic=".$_GET['idacademic'];
$response = \Httpful\Request::delete($url)->send();
//print_r($response);
header('location:profile.php');