<?php
#
# boot
#
require "../app/boot.php";

# se o token de acesso não existir
if (!isset($_SESSION['ldAccessToken'])) {
    echo "<p>É preciso do access token</p>";
    exit;
}

# endreço de solicitação do perfil
# carrega somente as informações do perfil solicitadas por parâmetro
#
#   id, numero de conexões, foto do perfil, e-mail
$url = "https://api.linkedin.com/v1/people/~:"
     . "(id,first_name,last_name,num_connections,picture-url,email-address)?" # adicione os campos necessários
     . "oauth2_access_token={$_SESSION['ldAccessToken']}&"
     . "format=json";

# com o redirecionamento obtemos o resultado no formato json
// header("Location: $url");
// exit;

#
# get perfil com curl
#
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
$resultado = curl_exec($curl);
curl_close($curl);

# se ocorrer um erro
if (isset($resultado->error)) {
    echo "<h3>Ocorreu um erro</h3>";
    var_dump($resultado);
    echo "<p><a href='$home/'>Retornar para o indice</a></p>";
    exit;
}

$resultado = json_decode($resultado);

# registra na session os dados do perfil do usuário do Facebook
$_SESSION['ldPerfil'] = [
    'id'        => $resultado->id,
    'nome'      => $resultado->firstName . " " . $resultado->lastName,
    'email'     => $resultado->emailAddress,
    // 'url-foto'  => $resultado
];

header("Location: 14-linkedin-usuario.php");