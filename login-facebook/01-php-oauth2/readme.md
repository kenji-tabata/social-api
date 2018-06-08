# Conectando ao Facebook manualmente com PHP

Saiba mais em https://developers.facebook.com/docs/facebook-login/manually-build-a-login-flow/?translation



__Fluxo do login__

+ Criar um botão Login com Facebook, com o endereço do OAuth do Facebook [exemplo 1](01-botao-login.php);
    + o endereço deve conter o app id, url do redirecionamento, código para prevenir CSRF e permissões;
    + a url de redirecionamento deve estar em um dominio com certificado digital (SSL);
    + a url de redirecionamento deve ser adicionada no campo `URIs de redirecionamento do OAuth válidos`
    das configurações do app Login do Facebook.

+ O usuário será redirecionado a tela de login do Facebook, para realizar o login ou cadastrar;

+ Após o login, o usuário confirma ou não o acesso a suas informações do Facebook;
    + ao aceitar o usuário é redirecionado para o site de origem;
    + caso o usuário não aceite se conectar com o Facebook, é retornado um erro de acesso negado.

+ Com o acesso confirmado, o usuário será redirecionado para o site de origem com o código de acesso [exemplo 2](02-login-callback.php);
    + valida o código state, para verificar se o código de acesso obtido é o mesmo (prevenir ataques CSRF);
    + com o código de acesso, o servidor requisita o token de acesso (accessToken);
    + após obter o token de acesso é preciso validar o token, para verificar se o token pertence a aplicação;
    + com o token de acesso válido, salva na session do PHP e redireciona o usuário.

+ Com Access Token é possível obter as informações do usuário [exemplo 3](03-get-perfil.php);

+ Ao efetuar o logout no aplicativo, podemos efetuar o logout também no Facebook [exemplo 4](04-logout.php);



__Informações do Access Token__

No [exemplo 10](10-carregar-somente-nome.php) é um exemplo do que será retornado quando não enviamos o parâmetro fields.

No [exempo 11](11-permissoes.php) é um exemplo para visualizar as permissões do aplicativo do usuário.