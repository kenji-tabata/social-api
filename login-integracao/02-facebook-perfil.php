<?php

require "../app/boot.php";
require "../app/sdk-php/boot.php";

if (!isset($_SESSION['fbAccessToken'])) {
    echo "<p>O fbAccessToken não foi encontrado!</p>";
    echo "<p><a href='$home/'>Retornar</a></p>";
    exit;
}

try {
    # Carrega o perfil público do usuário.
    # O acesso aos atributos abaixo é publico (desde que o usuário permita o seu acesso) e não precisa enviar o
    # aplicativo para avaliação do Facebook.
    #
    # Caso precise visualizar outras informações é preciso solicitar a permissão do usuário e enviar o aplicativo
    # para a avaliação do Facebook.
    $response = $fb->get('/me?fields=id, name, email, picture', $_SESSION['fbAccessToken']);
} catch(\Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Erro da API: ' . $e->getMessage();
    exit;
} catch(\Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Erro no Facebook SDK: ' . $e->getMessage();
    exit;
}

# dados do usuário do Facebook
$me = $response->getGraphUser();
var_dump($me);

# registra na session os dados do perfil do usuário do Facebook
$_SESSION['fbPerfil'] = [
    'id'        => $me->getId(),
    'nome'      => $me->getName(),
    'email'     => $me->getEmail(),
    'url-foto'  => $me->getPicture()->getUrl()
];

header("Location: 03-facebook-usuario.php");