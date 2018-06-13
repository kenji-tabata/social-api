<?php

#
# SDK PHP
#
require "vendor/autoload.php";

#
# Configuração do Facebook Graph
#
$fb = new Facebook\Facebook([
    'app_id'                => $app_id,
    'app_secret'            => $app_secret,
    'default_graph_version' => 'v2.2',
]);
