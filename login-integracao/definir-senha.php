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
                <div class="row">
                    <div class="col-md-offset-4 col-md-4 login-box">
                        <div class="page-header">
                            <h3 class="text-center">Define sua senha de acesso</h3>
                        </div>

                        <form class="form" action="post-definir-senha.php" method="POST">
                            <div class="form-group">
                                <label for="inputPassword" class="sr-only">Senha</label>
                                <input type="password" id="inputPassword" class="form-control" name="senha" placeholder="Digite uma nova senha" required>
                            </div>
                            <div class="form-group">
                                <label for="inputPasswordConfirm" class="sr-only">Confirme sua senha</label>
                                <input type="password" id="inputPasswordConfirm" class="form-control" name="c_senha" placeholder="Digite novamente sua senha" required>
                            </div>

                            <p class="text-right">
                                <button class="btn btn-lg btn-primary" type="submit">Salvar</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- /container -->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <!-- App id do Facebook -->
        <script type="text/javascript" src="../app-facebook/boot.js"></script>

        <!-- Facebook SDK -->
        <script type="text/javascript" src="sdk.js"></script>
    </body>
</html>