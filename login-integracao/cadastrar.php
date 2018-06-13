<?php

require "../app/boot.php";
require "../app/db.php";

foreach ($_POST as $key => $value) {
    if (!$value) {
        echo "Todos os campos do formulário são obrigatórios!";
        exit;
    }
}

$stmt = $pdo->prepare("SELECT email FROM usuarios WHERE email = '{$_POST['c-email']}'");
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario) {
    echo "Uma conta com este e-mail já existe, não é possível cadastrar novamente!";
    exit;
}

$insert = $pdo->prepare("INSERT INTO usuarios (email, nome, senha) VALUES (:email, :nome, :senha)");
$insert->bindParam(":email", $_POST['c-email']);
$insert->bindParam(":nome", $_POST['c-nome']);
$insert->bindParam(":senha", $_POST['c-senha']);

if(!$insert->execute()) {
    var_dump($insert->errorInfo());
    exit;
}

$id = $pdo->lastInsertId();

#
# carrega os dados do usuário
#
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = '$id'");
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

var_dump($usuario);
$_SESSION['usuario'] = $usuario;

header("Location: logado.php");