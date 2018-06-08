<?php

require "../boot.php";

if (!isset($_SESSION['access_token'])) {
    echo "<p>Nenhum parametro encontrado!</p>";
    echo "<p><a href='$home/'>Retornar</a></p>";
    exit;
}

$_url = [
    "https://graph.facebook.com/me?",
    "fields=id,name,email,picture",
    "&access_token={$_SESSION['access_token']}"
 ];

$url = implode("", $_url);

#
# solicita os dados do usuário
#
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
$resultado = curl_exec($curl);
curl_close($curl);

$resultado = json_decode($resultado);

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
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
    <body>

        <div class="container">
            <h1 class="page-header">Login do Facebook</h1>
            <div class="row">
                <div class="col-md-offset-4 col-md-4 login-box">
                    <h3>Bem vindo <?php echo $resultado->name; ?></h3>
                    <p><strong>Id: </strong><?php echo $resultado->id; ?></p>
                    <p><strong>E-mail: </strong><?php echo $resultado->email; ?></p>
                    <p><img class="thumbnail" src="<?php echo $resultado->picture->data->url; ?>"</p>
                    <p class="text-right">
                        <a href="../01-php-oauth2/" class="pull-left">Retornar</a>
                        <a href="04-logout.php">Sair</a>
                    </p>
                </div>
            </div>
            <h3>URI: Get perfil</h3>
            <?php var_dump($_url); ?>

            <h3>GET: perfil</h3>
            <?php var_dump($resultado); ?>
        </div> <!-- /container -->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>