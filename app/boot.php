<?php

#
# Facebook app
#
$app_id     = "{seu-app-id}";
$app_secret = "{seu-app-secret}";

#
#
#
$client_id     = "{seu-client-id}";
$client_secret = "{seu-client-secret}";
$permissions   = "r_basicprofile r_emailaddress";


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
# url home
#
$home = getUrl();
// var_dump($url);


#
# retorna a url
#
function getUrl() {
    // var_dump($_SERVER); die();

    $path = explode("/", $_SERVER['REQUEST_URI']);
    array_pop($path);

    $uri = implode("/", $path);
    // var_dump($uri);


    return $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . $uri;
}