<?php

# Para exibir informações que não constam no perfil básico, é preciso adicionar os dados solicitados como parâmetro
# na url de solicitação do perfil
#
# https://developer.linkedin.com/docs/oauth2
# https://developer.linkedin.com/docs/fields/basic-profile

#
# boot
#
require "boot.php";

# se o token de acesso não existir
if (!isset($_SESSION['access_token'])) {
    echo "<p>É preciso do access token</p>";
    exit;
}

# endreço de solicitação do perfil
# carrega somente as informações do perfil solicitadas por parâmetro
#
#   id, numero de conexões, foto do perfil, e-mail
$url = "https://api.linkedin.com/v1/people/~:"
     . "(id,num_connections,picture-url,email-address)?" # adicione os campos necessários
     . "oauth2_access_token={$_SESSION['access_token']}&"
     . "format=json";

# com o redirecionamento obtemos o resultado no formato json
// header("Location: $url");
// exit;

#
# get perfil com curl
#
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
$resultado = curl_exec($curl);
curl_close($curl);

# se ocorrer um erro
if (isset($resultado->error)) {
    echo "<h3>Ocorreu um erro</h3>";
    var_dump($resultado);
    echo "<p><a href='$home/'>Retornar para o indice</a></p>";
    exit;
}

echo "<h3>Resultado</h3>";
var_dump(json_decode($resultado));

echo "<p><a href='$home/'>Retornar para o indice</a></p>";