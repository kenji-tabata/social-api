<?php

require "boot.php";

echo "<h3>Session</h3>";
var_dump($_SESSION);

if (!isset($_SESSION['code'])) {
    echo "<p>Nenhum parametro encontrado!</p>";
    echo "<p><a href='$home/'>Retornar</a></p>";
    exit;
}

$redirect = getUrl() . "/02-conectar.php";

$url = "https://graph.facebook.com/v3.0/oauth/access_token?"
     . "client_id={$app_id}&"
     . "redirect_uri={$redirect}&"
     . "client_secret={$app_secret}&"
     . "code={$_SESSION['code']}";

echo "<h3>Url</h3>";
var_dump($url);

// header("Location: $url");

#
# converte o `code` em `AccessToken`
#
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
$resultado = curl_exec($curl);
curl_close($curl);

echo "<h3>Access Token</h3>";
$resultado = json_decode($resultado);

# se ocorrer um erro
if (isset($resultado->error)) {
    var_dump($resultado);
    echo "<p><a href='04-debug.php'>Debug</a></p>";
    echo "<p><a href='$home/'>Retornar</a></p>";
    exit;
}

foreach ($resultado as $key => $value) {
    echo "<p>$key: $value</p>";
}

$_SESSION['access_token'] = $resultado->access_token;
// var_dump($_SESSION);

echo "<p><a href='04-debug.php'>Debug</a></p>";
echo "<p><a href='05-carregar-nome.php'>Carregar dados básicos</a></p>";
echo "<p><a href='06-carregar-perfil.php'>Carregar dados do perfil</a></p>";
echo "<p><a href='$home/'>Retornar</a></p>";


