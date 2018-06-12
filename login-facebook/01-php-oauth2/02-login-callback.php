<?php

require "../../app-facebook/boot.php";

if (isset($_GET['error'])) {
    echo "<h3>Facebook error</h3>";
    echo "<p>usuário não permitiu o acesso.</p>";
    exit;
}

if (!isset($_GET['code'])) {
    echo "<p>Nenhum parametro encontrado!</p>";
    echo "<p><a href='$home/'>Retornar</a></p>";
    exit;
}

echo "<h2>1. GET: parâmetros</h2>";
var_dump($_GET);
$code  = $_GET['code'];
$state = $_GET['state'];



echo "<h2>2. GET: Access Token</h2>";

// o redirecionamento deve ser o mesmo endereço da solicitação do login do Facebook
$redirect = getUrl() . "/02-login-callback.php";

$url = [
    "https://graph.facebook.com/v3.0/oauth/access_token?",
    "client_id={$app_id}&",
    "redirect_uri={$redirect}&",
    "client_secret={$app_secret}&",
    "code={$code}"
];

echo "<p><strong>URI Access Token:</strong></p>";
var_dump($url);

$url = implode("", $url);

#
# requisição do AccessToken
#
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
$resultado = curl_exec($curl);
curl_close($curl);

$resultado = json_decode($resultado);
var_dump($resultado);

# se ocorrer um erro
if (isset($resultado->error)) {
    echo "<p><a href='$home/'>Retornar</a></p>";
    exit;
}

echo "<h2>3. Get: Inspencionar AccessToken</h2>";

$url = [
    "https://graph.facebook.com/debug_token?",
    "input_token={$resultado->access_token}&",
    "access_token={$resultado->access_token}",
];

echo "<p><strong>URI Debug Access Token:</strong></p>";
var_dump($url);

$url = implode("", $url);

#
# requisição para inspencionar o AccessToken
#
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
$inspencionado = curl_exec($curl);
curl_close($curl);

$inspencionado = json_decode($inspencionado);
var_dump($inspencionado);

#
# salva na session o token de acesso
#
echo "<h2>4. Session:</h2>";
$_SESSION['access_token'] = (string)$resultado->access_token;
var_dump($_SESSION);


echo "<p><a href='03-get-perfil.php'>Continuar</a></p>";
echo "<p><a href='$home/'>Retornar</a></p>";

# redireciona para o perfil
// header("Location: 03-get-perfil.php");