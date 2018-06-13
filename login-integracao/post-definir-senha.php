<?php

require "../app-facebook/boot.php";
require "../app-facebook/sdk-php/db.php";

var_dump($_POST);

$update = $pdo->prepare("UPDATE usuarios SET senha = :senha WHERE id = :usuario_id");
$update->bindParam(":senha", $_POST['senha']);
$update->bindParam(":usuario_id", $_SESSION['usuario']['id']);

if(!$update->execute()) {
    var_dump($update->errorInfo());
    exit;
}

header("Location: logado.php");