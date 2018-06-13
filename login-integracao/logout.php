<?php

require "../app-facebook/boot.php";
require "../app-facebook/sdk-php/boot.php";

#
# caso o usuário tenha acessado o sistema pelo o login do Facebook
#
if (isset($_SESSION['fbAccessToken'])) {
    # desconectamos o usuário do Facebook
    # normalmente não se desconecta o usuário do Facebook ao fazer o logout no sistema, somente se destroi a session.
    $helper = $fb->getRedirectLoginHelper();
    $home = $helper->getLogoutUrl($_SESSION['fbAccessToken'], "$home/");
    echo $url;
}

session_destroy();

header("Location: $home");