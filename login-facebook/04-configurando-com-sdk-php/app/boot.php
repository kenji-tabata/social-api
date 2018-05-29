<?php

require "vendor/autoload.php";

#
# Facebook app
#
$app_id     = "{seu-app-id}";
$app_secret = "{seu-app-secret}";


#
# Url
#
$url = getUrl();
// var_dump($url);


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

#
# Facebook Graph
#
$fb = new Facebook\Facebook([
    'app_id'                => $app_id,
    'app_secret'            => $app_secret,
    'default_graph_version' => 'v2.2',
]);

#
# retorna a url
#
function getUrl() {
    // var_dump($_SERVER); die();

    $path = explode("/", $_SERVER['REQUEST_URI']);

    if (end($path) != "04-configurando-com-sdk-php") {
        array_pop($path);
    }
    // var_dump($path); die();

    $uri = implode("/", $path);
    // var_dump($uri);


    return $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . $uri;
}