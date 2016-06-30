<?php
include('httpful.phar');

session_start();

$url = "http://localhost/location/experience/idexperience=".$_GET['idexperience'].'&idendereco='.$_GET['idendereco'];
$response = \Httpful\Request::delete($url)->send();
//print_r($response);
header('location:profile.php');