<?php

require "../boot.php";

if (!isset($_SESSION['access_token'])) {
    echo "<p>Nenhum parametro encontrado!</p>";
    echo "<p><a href='$home/'>Retornar</a></p>";
    exit;
}

$url = "https://www.facebook.com/logout.php?"
     . "next={$home}&"
     . "access_token={$_SESSION['access_token']}";

echo "<h3>Url</h3>";
var_dump($url);

session_destroy();

header("Location: 01-botao-login.php");