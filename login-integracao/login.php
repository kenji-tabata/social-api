<?php

require "../app/boot.php";
require "../app/db.php";

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = '{$_POST['l-email']}'");
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    echo "A conta deste e-mail não foi encontrada!";
    exit;
}

if ($usuario['senha'] != $_POST['l-senha']) {
    echo "Senha incorreta!";
    exit;
}

var_dump($usuario);
$_SESSION['usuario'] = $usuario;

header("Location: logado.php");