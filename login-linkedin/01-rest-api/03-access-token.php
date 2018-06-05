<?php

# Obtem o token de acesso da aplicação, nesta etapa é confirmado a autorização de acesso para a aplicação
#
# https://developer.linkedin.com/docs/oauth2

#
# boot
#
require "boot.php";

# se o código de acesso não existir
if (!isset($_SESSION['code'])) {
    echo "<p>É preciso do código de autorização (authorization Code) para obter o access token</p>";
    exit;
}

# o redirecionamento deve ser o mesmo utilizado para obter o código de acesso
$redirect = $home . "/02-conectar.php";

# parametros para solicitar o token de acesso
#
#   grant_type:    tipo da requisição
#   code:          código de acesso obtido
#   redirect_uri:  mesma url utilizado para obter o código de acesso
#   client_id:     conhecido também como api_key, é a chave de autorização do aplicativo e pode ser obtido nos detalhes da aplicação
#   client_secret: chave secreta de autorização do aplicativo e pode ser obtido nos detalhes da aplicação
#
$requisicao = "grant_type=authorization_code&"
            . "code={$_SESSION['code']}&"
            . "redirect_uri={$redirect}&"
            . "client_id={$client_code}&"
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

echo "<h3>Access Token</h3>";
echo "<p>{$resultado->access_token}</p>";
echo "<p>Expira em: {$resultado->expires_in}</p>";

# session
$_SESSION['access_token'] = $resultado->access_token;
unset($_SESSION['code']);
var_dump($_SESSION);

echo "<p><a href='$home/04-get-perfil.php'>Obter perfil do usuário</a></p>";
echo "<p><a href='$home/'>Retornar para o indice</a></p>";