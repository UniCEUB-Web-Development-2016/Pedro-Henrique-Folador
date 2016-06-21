<?php
// Point to where you downloaded the phar
include('httpful.phar');


$url = "http://localhost/location/academic/?institution=".$_POST['institution']
    ."&period=".$_POST['period']
    ."&formation=".$_POST['formation']
    ."&studyArea=".$_POST['studyArea']
    ."&note=".$_POST['note']
    ."&activitiesGroups=".$_POST['activitiesGroups']
    ."&description=".$_POST['description']
    ."&iduser=".$_POST['iduser'];

$response = \Httpful\Request::post($url)->send();
echo "cadastrado com sucesso!";