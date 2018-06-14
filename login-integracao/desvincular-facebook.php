<?php

#
# https://stackoverflow.com/questions/6634212/remove-the-application-from-a-user-using-graph-api
#

require "../app/boot.php";
require "../app/db.php";

$update = $pdo->prepare("UPDATE usuarios SET facebook_id = NULL WHERE id = :usuario_id");
$update->bindParam(":usuario_id", $_SESSION['usuario']['id']);

if(!$update->execute()) {
    var_dump($update->errorInfo());
    exit;
}

$_SESSION['usuario']['facebook_id'] = null;

if (isset($_SESSION['fbAccessToken'])) {
    unset($_SESSION['fbAccessToken']);
}


header("Location: logado.php");