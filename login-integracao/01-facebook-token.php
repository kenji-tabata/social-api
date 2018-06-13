<?php

require "../app-facebook/boot.php";
require "../app-facebook/sdk-php/boot.php";

$helper = $fb->getJavaScriptHelper();

try {
    $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

if (! isset($accessToken)) {
    echo 'No cookie set or no OAuth data could be obtained from cookie.';
    exit;
}

$_SESSION['fbAccessToken'] = (string) $accessToken;

# callback do perfil do Facebook
header("Location: 02-facebook-perfil.php");