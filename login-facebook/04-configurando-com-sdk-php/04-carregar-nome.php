<?php

require "app/boot.php";

if (!isset($_SESSION['fbAccessToken'])) {
    echo "<p>O fbAccessToken não foi encontrado!</p>";
    echo "<p><a href='$url/'>Retornar</a></p>";
    exit;
}

try {
  // Carrega somente o nome
  $response = $fb->get('/me', $_SESSION['fbAccessToken']);
} catch(\Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Erro da API: ' . $e->getMessage();
  exit;
} catch(\Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Erro no Facebook SDK: ' . $e->getMessage();
  exit;
}

$me = $response->getGraphUser();
var_dump($me);

echo '<p>Bem vindo ' . $me->getName() . '</p>';
echo "<p><a href='$url/'>Retornar</a></p>";