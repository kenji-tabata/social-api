<?php

require "boot.php";

echo "<h3>Get params</h3>";
var_dump($_GET);

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

echo "<h3>Facebook logado</h3>";
$code  = $_GET['code'];
$state = json_decode($_GET['state']);

echo "<h4>Code:</h4>";
echo "<p>$code</p>";
echo "<h4>State</h4>";
var_dump($state);

$_SESSION = [
    'code'  => $code,
    'state' => $state
];
// var_dump($_SESSION);

echo "<a href='03-token.php'>Gerar Access Token</a>";
echo "<p><a href='$home/'>Retornar</a></p>";