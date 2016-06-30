<?php
// Point to where you downloaded the phar
include('httpful.phar');

$response = \Httpful\Request::get('http://localhost/location/user/?email=' . $_POST['email'])->send();

$dados = array();
        $request_response = (json_decode($response->body));
        if (!empty($request_response->email)){?>
        		<script>
							var r = confirm("Email Já cadastrado!");
							if (r == true) {
							  document.location.href = 'postuser.html'
							} else {
							  document.location.href = 'postuser.html'
							}
						</script>
        <?php
            die();
        }


$url = "http://localhost/location/user/?firstName=".$_POST['firstName']
    ."&lastName=".$_POST['lastName']
    ."&email=".$_POST['email']
    ."&phone=".$_POST['phone']
    ."&password=".$_POST['password'];

$response = \Httpful\Request::post($url)->send();
$retorno = json_decode($response->body);

echo $retorno->uid;

if($response->body == 'false'){
    echo('Erro ao cadastrar');
}
else{
    header('location:login.php');


}