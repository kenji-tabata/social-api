<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Login Facebook</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

        <style type="text/css">
            .login-box {
                border: 1px solid #ccc;
                margin-top: 5%;
                border-radius: 10px;
            }
            .divisao {
                display: block;
                margin: 32px auto 5px;
                border-top: 1px solid #e9e9ec;
                text-align: center;
            }
            .ou {
                position: relative;
                bottom: 11px;
                z-index: 2;
                margin-top: 0px;
                margin-right: 11px;
                margin-left: 11px;
                padding: 0px 8px;
                background-color: #fff;
            }
            .texto {
                display: inline-block;
                margin-right: 9px;
                color: #79808b;
                font-size: 16px;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <h1 class="page-header">Login do Facebook</h1>
            <div class="row">
                <div class="col-md-offset-4 col-md-4 login-box">
                    <form class="form">
                        <div class="page-header">
                            <h3 class="text-center">Cadastra-se</h3>
                        </div>

                        <!-- botão de login do facebook -->
                        <div class="form-group">
                            <p>
                                <button id="btn-login" class="btn btn-lg btn-primary btn-block">
                                    <i class="fab fa-facebook"></i> Entrar com Facebook
                                </button>
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

                        <p class="text-center">
                            <button class="btn btn-lg btn-primary" type="submit">Cadastrar</button>
                        </p>
                    </form>
                </div>
            </div>
        </div> <!-- /container -->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <!-- Facebook SDK -->
        <script type="text/javascript" src="boot.js"></script>
    </body>
</html>