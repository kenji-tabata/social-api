<?php include "get-perfil.php" ?>

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
                    <h3>Bem vindo <?php echo $me->getName(); ?></h3>
                    <p><strong>Id: </strong><?php echo $me->getId(); ?></p>
                    <p><strong>E-mail: </strong><?php echo $me->getEmail(); ?></p>
                    <p><img class="thumbnail" src="<?php echo $me->getPicture()->getUrl(); ?>"</p>
                    <p class="text-right"><a href="logout.php">Sair</a></p>
                </div>
            </div>
        </div> <!-- /container -->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>