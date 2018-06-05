<?php

# Exibe o botão do conectar com o Linkedin
#
# https://developer.linkedin.com/docs/oauth2

#
# boot
#
require "boot.php";

# url para qual o usuário será redirecionado após conectar ou não ao Linkedin
$redirect = getUrl() . "/02-conectar.php";
echo "<h3>Redirecionar após o conectar:</h3><p>$redirect</p>";

# permissões para exibir informações do perfil
#
#   r_basicprofile:   nome, titulo, cargo, foto do perfil e link do perfil
#   r_emailaddress:   e-mail principal da conta
#   rw_company_admin: gerenciar a página e publicar atualizações da empresa do usuário
#   w_share:          publicar atualizações no LinkedIn pelo nome do usuário
#
$permissoes = "r_basicprofile r_emailaddress";

# envie o state como um código de verificação ao receber o código de autorização, o state é mais
# utilizado para prevenir ataques CSRF
$state      = "Qualquer-valor-para-conferencia";

# url de solicitação de conexão com o Linkedin
#
#   response_type: a resposta sempre será do tipo code
#   client_id: conhecido também como api_key, é a chave de autorização do aplicativo e pode ser obtido nos detalhes da aplicação
#   redirect_url: url que recebe a resposta após a autorização no Linkedin
#   state: código gerado para prevenir ataques CSRF
#   scope: permissões necessárias para exibir as informaçẽos do usuário
#
# Em detalhes do aplicativo é preciso adicionar a url do `redirect_url` no campo `URLs de redirecionamento autorizadas`
# para a solicitação do login funcionar corretamente. O uso do HTTPS não é obrigatório, mas é recomendado.
$url = "https://www.linkedin.com/oauth/v2/authorization?"
     . "response_type=code&"
     . "client_id={$client_code}&"
     . "redirect_uri={$redirect}&"
     . "state={$state}&"
     . "scope={$permissoes}";

echo "<h3>URL</h3>";
echo "<p>$url</p>";

echo "<p><a href='$url'><img src='https://content.linkedin.com/content/dam/developer/global/en_US/site/img/signin-button.png'></a>";
echo "<p><a href='$home'>Retornar para o indice</p>";