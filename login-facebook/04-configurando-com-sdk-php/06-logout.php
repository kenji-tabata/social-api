<?php

require "app/boot.php";


if (!isset($_SESSION['fbAccessToken'])) {
    echo "<p>O fbAccessToken não foi encontrado!</p>";
    echo "<p><a href='$url/'>Retornar</a></p>";
    exit;
}

$helper = $fb->getRedirectLoginHelper();
$url = $helper->getLogoutUrl($_SESSION['fbAccessToken'], "$url/");
// echo $url; die();


session_destroy();

header("Location: $url");