<?php
session_start();

// Point to where you downloaded the phar
include('httpful.phar');

if (@$_POST['acao'] =='editar'){
    $url = "http://localhost/location/academic/?institution=".$_POST['institution']
        ."&period=".$_POST['period']
        ."&formation=".$_POST['formation']
        ."&studyArea=".$_POST['studyArea']
        ."&note=".$_POST['note']
        ."&activitiesGroups=".$_POST['activitiesGroups']
        ."&description=".$_POST['description']
        ."&iduser=".$_SESSION['iduser']
        ."&idacademic=".$_POST['idacademic'];

    $response = \Httpful\Request::put($url)->send();
} else {


    $url = "http://localhost/location/academic/?institution=".$_POST['institution']
        ."&period=".$_POST['period']
        ."&formation=".$_POST['formation']
        ."&studyArea=".$_POST['studyArea']
        ."&note=".$_POST['note']
        ."&activitiesGroups=".$_POST['activitiesGroups']
        ."&description=".$_POST['description']
        ."&iduser=".$_SESSION['iduser'];

    $response = \Httpful\Request::post($url)->send();
}
if($response->body == 'false'){
    echo('Erro ao cadastrar');
}
else{
    header('location:profile.php');
}