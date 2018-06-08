<?php

require "../sdk-php/boot.php";


if (!isset($_SESSION['fbAccessToken'])) {
    echo "<p>O fbAccessToken não foi encontrado!</p>";
    echo "<p><a href='$home/'>Retornar</a></p>";
    exit;
}

$helper = $fb->getRedirectLoginHelper();
$home = $helper->getLogoutUrl($_SESSION['fbAccessToken'], "$home/");
// echo $home; die();

session_destroy();

header("Location: 01-botao-login.php");