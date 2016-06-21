<?php
// Point to where you downloaded the phar
include('httpful.phar');


$url = "http://localhost/location/academic/?institution=".$_POST['institution']
    ."&period=".$_POST['period']
    ."&email=".$_POST['email']
    ."&formation=".$_POST['formation']
    ."&studyArea=".$_POST['studyArea']
    ."&note=".$_POST['note']
    ."&activitiesGroups=".$_POST['activitiesGroups']
    ."&codAcademic=".$_POST['codAcademic']
    ."&description=".$_POST['description'];

$response = \Httpful\Request::post($url)->send();

if($response->body == 'false'){
    include('signup2.html');
}
else{
    header('location:index.html');
}
