<?php

#
# Facebook app
#
$app_id     = "{seu-app-id}";
$app_secret = "{seu-app-secret}";

#
# Timezone
#
date_default_timezone_set("America/Sao_Paulo");

#
# Session
#
if (!session_id()) {
    session_start();
}

$home = getUrl();

#
# retorna a url
#
function getUrl() {
    // var_dump($_SERVER); die();

    $path = explode("/", $_SERVER['REQUEST_URI']);

    if (end($path) != "03-conectando-manualmente-com-php") {
        array_pop($path);
    }
    // var_dump($path); die();

    $uri = implode("/", $path);
    // var_dump($uri);


    return $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . $uri;
}