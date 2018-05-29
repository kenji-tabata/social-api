<?php

require "boot.php";

$redirect = getUrl() . "/02-conectar.php";
$state    = '{"st":"identificado-criado","ds":"numeracao-ramdom"}';

$url = "https://www.facebook.com/v3.0/dialog/oauth?"
     . "app_id={$app_id}&"
     . "redirect_uri={$redirect}&"
     . "state={$state}&"
     . "scope=email"; # opcional, adicione as permissões que o aplicativo necessite

var_dump($url);

header("Location: $url");