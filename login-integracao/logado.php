<?php

require "../app/boot.php";
include "../app/sdk-php/boot.php";

if (!isset($_SESSION['usuario']['id'])) {
    var_dump($_SESSION);
    echo "<p>O usuario não esta logado!</p>";
    echo "<p><a href='$home/'>Retornar</a></p>";
    exit;
}

// var_dump($_SESSION);

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Login Facebook</title>

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
                <div class="col-md-offset-1 col-md-4 login-box">
                    <h3>Bem vindo <?php echo $_SESSION['usuario']['nome']; ?></h3>
                    <p><strong>Id sistema: </strong><?php echo $_SESSION['usuario']['id']; ?></p>
                    <?php if ($_SESSION['usuario']['facebook_id']) { ?>
                        <p><strong>Id Facebook: </strong><?php echo $_SESSION['usuario']['facebook_id']; ?></p>
                    <?php } ?>
                    <?php if ($_SESSION['usuario']['linkedin_id']) { ?>
                        <p><strong>Id Linkedin: </strong><?php echo $_SESSION['usuario']['linkedin_id']; ?></p>
                    <?php } ?>
                    <p><strong>E-mail: </strong><?php echo $_SESSION['usuario']['email']; ?></p>
                    <?php if ($_SESSION['usuario']['url_avatar']) { ?>
                        <p><img class="thumbnail" src="<?php echo $_SESSION['usuario']['url_avatar']; ?>"</p>
                    <?php } ?>
                    <p class="text-right"><a href="logout.php">Sair</a></p>
                </div>

                <div class="col-md-offset-2 col-md-4 login-box">
                    <div class="form-group">
                        <p>
                            <button id="btn-facebook-disconect" class="btn btn-lg btn-primary btn-block">
                                <i class="fab fa-facebook"></i>
                                <?php echo $_SESSION['usuario']['facebook_id'] ? "Desvincular Facebook" : "Vincular Facebook"; ?>
                            </button>
                        </p>
                        <p>
                            <button id="btn-linkedin-disconnect" class="btn btn-lg btn-info btn-block">
                                <i class="fab fa-linkedin"></i>
                                <?php echo $_SESSION['usuario']['linkedin_id'] ? "Desvincular Linkedin" : "Vincular Linkedin"; ?>
                            </button>
                        </p>
                        <p>
                            <button id="btn-google" class="btn btn-lg btn-danger btn-block">
                                <i class="fab fa-google"></i> Vincular com Google
                            </button>
                        </p>
                    </div>
                </div>
                <div class="col-md-1"></div>
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