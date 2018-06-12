<?php

require "../../app-facebook/boot.php";
require "../../app-facebook/sdk-php/boot.php";

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

$me = $response->getGraphUser();
// var_dump($me);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Login Facebook</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- FontAwesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

        <!-- Css -->
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
    </head>
    <body>

        <div class="container">
            <h1 class="page-header">Login do Facebook</h1>
            <div class="row">
                <div class="col-md-offset-4 col-md-4 login-box">
                    <h3>Bem vindo <?php echo $me->getName(); ?></h3>
                    <p><strong>Id: </strong><?php echo $me->getId(); ?></p>
                    <p><strong>E-mail: </strong><?php echo $me->getEmail(); ?></p>
                    <p><img class="thumbnail" src="<?php echo $me->getPicture()->getUrl(); ?>"></p>
                    <p class="text-right">
                        <a href="../02-php-sdk/" class="pull-left">Retornar</a>
                        <a href="04-logout.php">Sair</a>
                      </p>
                </div>
            </div>
        </div> <!-- /container -->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>