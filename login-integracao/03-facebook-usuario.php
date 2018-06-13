<?php

require "../app-facebook/boot.php";
require "../app-facebook/db.php";

if (!isset($_SESSION['fbPerfil'])) {
    echo "<p>O fbPerfil não foi encontrado!</p>";
    echo "<p><a href='$home/'>Retornar</a></p>";
    exit;
}

# carrega o perfil do Facebook da session
$me = $_SESSION['fbPerfil'];

# remove o perfil do Facebook da session
unset($_SESSION['fbPerfil']);
var_dump($me);

#
# procura um usuário do sistema que tenha o mesmo id do Facebook
#
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE facebook_id = {$me['id']}");
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
var_dump($usuario);

#
# se um usuário for encontrado...
#
if ($usuario) {
    echo "Encontramos um usuário com esse facebook_id";

    # registra o usuario na session
    $_SESSION['usuario'] = $usuario;

    # se sua senha não foi definida...
    if (!$usuario['senha']) {
        # redireciona o usuário para definir uma senha
        header("Location: definir-senha.php");
    }

    # redireciona o usuário para sua área
    header("Location: logado.php");
    exit;
}

#
# se nenhum usuário for encontrado pelo facebook_id
#

#
# procura um usuário do sistema que tenha o mesmo email do Facebook
#
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = '{$me['email']}'");
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
var_dump($usuario);

# se nenhum usuário for encontrado...
if (!$usuario) {
    # faz um novo cadastro do usuário
    echo "O usuário não foi encontrado! Realizando um novo cadastro...";

    $insert = $pdo->prepare("INSERT INTO usuarios (email, nome, facebook_id, url_avatar) VALUES (:email, :nome, :fb_id, :fb_url)");
    $insert->bindParam(":email", $me['email']);
    $insert->bindParam(":nome", $me['nome']);
    $insert->bindParam(":fb_id", $me['id']);
    $insert->bindParam(":fb_url", $me['url-foto']);

    if(!$insert->execute()) {
        var_dump($insert->errorInfo());
        exit;
    }
}

# se o usuário for encontrado...
else {
    echo "Um usuário com o e-mail do Facebook solicitado foi encontrado";

    # vincula a conta do sistema, com o id do Facebook
    $update = $pdo->prepare("UPDATE usuarios SET facebook_id = :facebook_id WHERE id = :usuario_id");
    $update->bindParam(":facebook_id", $me['id']);
    $update->bindParam(":usuario_id", $usuario['id']);

    if(!$update->execute()) {
        var_dump($update->errorInfo());
        exit;
    }
}

#
# carrega os dados do usuário
#
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE facebook_id = '{$me['id']}'");
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

# registra o usuario na session
$_SESSION['usuario'] = $usuario;
var_dump($_SESSION);

# se sua senha não foi definida...
if (!$usuario['senha']) {
    # redireciona o usuário para definir uma senha
    header("Location: definir-senha.php");
}

# redireciona o usuário para sua área
header("Location: logado.php");
exit;