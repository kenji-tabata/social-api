<?php

require "../../app/boot.php";

$redirect = getUrl() . "/02-login-callback.php";
$state    = 'indentificador-csrf';

$url = "https://www.facebook.com/v3.0/dialog/oauth?"
     . "app_id={$app_id}&"
     . "redirect_uri={$redirect}&"
     . "state={$state}&"
     . "scope=email"; # opcional, adicione as permissões que o aplicativo necessite

//var_dump($url);

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Facebook: OAuth 2.0</title>

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
            <div class="row">
                <div class="col-md-offset-4 col-md-4 login-box">
                    <form class="form">
                        <div class="page-header">
                            <h3 class="text-center">Cadastra-se</h3>
                        </div>

                        <!-- botão de login do facebook -->
                        <div class="form-group">
                            <p>
                                <a href="<?php echo $url; ?>" class="btn btn-lg btn-primary btn-block">
                                    <i class="fab fa-facebook pull-left"></i> Entrar com Facebook
                                </a>
                            </p>
                            <div id="error-div" class="alert alert-danger" role="alert" style="display: none;"></div>
                        </div>

                        <div class="divisao">
                            <h4 class="texto ou">Ou</h4>
                        </div>

                        <div class="form-group">
                            <label for="inputNome" class="sr-only">Nome</label>
                            <input type="email" id="inputNome" class="form-control" placeholder="Nome" required>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="sr-only">E-mail</label>
                            <input type="email" id="inputEmail" class="form-control" placeholder="E-mail" required>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="sr-only">Senha</label>
                            <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
                        </div>

                        <p class="text-right">
                            <a href="../01-php-oauth2/" class="btn pull-left">Retornar</a>
                            <button class="btn btn-lg btn-primary" type="submit">Cadastrar</button>
                        </p>
                    </form>
                </div>
            </div>
        </div> <!-- /container -->
    </body>
</html>