<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Login</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- FontAwesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

        <!-- Css -->
        <link rel="stylesheet" type="text/css" href="../css/style.css">

    </head>
    <body>

        <div class="container">
            <h1 class="page-header">Login do Facebook</h1>
            <div class="col-md-12">
                <div class="row login-box">
                    <div class="col-md-4 left">
                        <div class="page-header">
                            <h3 class="text-center">Ainda não tenho conta</h3>
                        </div>
                        <form class="form" action="cadastrar.php" method="POST">
                            <div class="form-group">
                                <label for="inputCadastrarNome" class="sr-only">Nome</label>
                                <input type="text" id="inputCadastrarNome" class="form-control" name="c-nome" placeholder="Nome" required>
                            </div>
                            <div class="form-group">
                                <label for="inputCadastrarEmail" class="sr-only">E-mail</label>
                                <input type="email" id="inputCadastrarEmail" class="form-control" name="c-email" placeholder="E-mail" required>
                            </div>
                            <div class="form-group">
                                <label for="inputCadastrarSenha" class="sr-only">Senha</label>
                                <input type="password" id="inputCadastrarSenha" class="form-control" name="c-senha" placeholder="Senha" required>
                            </div>

                            <p class="text-right">
                                <button class="btn btn-lg btn-primary" type="submit">Cadastrar</button>
                            </p>
                        </form>
                    </div>

                    <div class="col-md-4">
                        <div class="page-header">
                            <h3 class="text-center">Já tenho uma conta</h3>
                        </div>

                        <form class="form" action="login.php" method="POST">
                            <div class="form-group">
                                <label for="inputEmail" class="sr-only">E-mail</label>
                                <input type="email" id="inputEmail" class="form-control" name="l-email" placeholder="E-mail">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="sr-only">Senha</label>
                                <input type="password" id="inputPassword" class="form-control" name="l-senha" placeholder="Senha">
                            </div>

                            <p class="text-right">
                                <a href="#">Esqueceu sua senha?</a>
                            </p>
                            <p class="text-right">
                                <button class="btn btn-lg btn-primary" type="submit">Acessar</button>
                            </p>
                        </form>
                    </div>

                    <div class="col-md-4 right">
                        <div class="page-header">
                            <h3 class="text-center">Conectar por redes sociais</h3>
                        </div>

                        <!-- botão de login do facebook -->
                        <div class="form-group">
                            <p>
                                <button id="btn-facebook" class="btn btn-lg btn-primary btn-block">
                                    <i class="fab fa-facebook"></i> Entrar com Facebook
                                </button>
                            </p>
                            <p>
                                <button id="btn-linkedin" class="btn btn-lg btn-info btn-block">
                                    <i class="fab fa-linkedin"></i> Entrar com Linkedin
                                </button>
                            </p>
                            <p>
                                <button id="btn-google" class="btn btn-lg btn-danger btn-block">
                                    <i class="fab fa-google"></i> Entrar com Google
                                </button>
                            </p>
                            <div id="error-div" class="alert alert-danger" role="alert" style="display: none;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /container -->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <!-- App id do Facebook -->
        <script type="text/javascript" src="../app/boot.js"></script>

        <!-- Facebook SDK -->
        <script type="text/javascript" src="sdk.js"></script>
    </body>
</html>