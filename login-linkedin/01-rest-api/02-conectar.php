<?php

# Exibe o código de autorização ou a mensagem de erro se o usuário não autorizar a aplicação
#
# https://developer.linkedin.com/docs/oauth2

#
# boot
#
require "boot.php";

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

# registra na session para prosseguir para o próximo passo...
$_SESSION['code'] = $_GET['code'];

# o código de acesso é apenas temporário e é utilizado para idendificar que o aplicativo foi autorizado a se
# conectar com o Linkedin.
# para confirmar a autorização do acesso e obter as informações do usuário é preciso ter o token da acesso, que é obtido no próximo passo...
echo "<h3>OAuth 2.0 authorization Code</h3>";
echo "<p>{$_SESSION['code']}</p>";

$url = getUrl() . "/03-access-token.php";
echo "<p><a href='$url'>Obter o token de acesso</a></p>";
echo "<p><a href='$home'>Retornar para o indice</p>";