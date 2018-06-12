<?php

require "../../app-facebook/boot.php";

if (!isset($_SESSION['access_token'])) {
    echo "<p>Nenhum parametro encontrado!</p>";
    echo "<p><a href='$home/'>Retornar</a></p>";
    exit;
}

$url = "https://graph.facebook.com/me?"
     . "access_token={$_SESSION['access_token']}";

echo "<h3>Url</h3>";
var_dump($url);

// header("Location: $url");

#
# solicita os dados do usuário
#
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
$resultado = curl_exec($curl);
curl_close($curl);

echo "<h3>Resposta</h3>";
$resultado = json_decode($resultado);
var_dump($resultado);

echo "<p><a href='$home/'>Retornar</a></p>";