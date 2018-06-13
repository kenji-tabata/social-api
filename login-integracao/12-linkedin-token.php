<?php

#
# boot
#
require "../app/boot.php";

# recebe o código de autorização e state pela url
echo "<h3>Get params</h3>";
var_dump($_GET);

# se o usuário cancelou a autorização do seu acesso
if (isset($_GET['error'])) {
    echo "<p>{$_GET['error_description']}</p>";
    exit;
}

# se o código de autorização não foi enviado
if (!isset($_GET['code'])) {
    echo "<p>Nenhum código foi enviado!</p>";
    exit;
}

# se o código de state for diferente
if ($_GET['state'] != "Qualquer-valor-para-conferencia") {
    echo "<p>Código do state inválido!</p>";
    exit;
}


$redirect = $home . "/12-linkedin-token.php";

$requisicao = "grant_type=authorization_code&"
            . "code={$_GET['code']}&"
            . "redirect_uri={$redirect}&"
            . "client_id={$client_id}&"
            . "client_secret={$client_secret}";

# url da requisição do token de acesso
$url = "https://www.linkedin.com/oauth/v2/accessToken";

#
# requisição do token de acesso via POST
#
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $requisicao);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
$resultado = curl_exec($curl);
curl_close($curl);

# converte o resultado em objeto Json
$resultado = json_decode($resultado);

# se ocorrer um erro
if (isset($resultado->error)) {
    echo "<h3>Ocorreu um erro</h3>";
    var_dump($resultado);
    echo "<p><a href='$home/'>Retornar para o indice</a></p>";
    exit;
}

# session
$_SESSION['ldAccessToken'] = $resultado->access_token;
var_dump($_SESSION);

header("Location: 13-linkedin-perfil.php");