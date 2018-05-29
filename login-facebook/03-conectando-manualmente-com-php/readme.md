# Conectando ao Facebook manualmente com PHP

__Fluxo do login__

+ solicite conectar com o Facebook, através de uma url de redirecionamento [exemplo 1](01-botao-login.php);

+ será aberto uma janela com a tela de login, caso não estaja logado no Facebook;

+ solicita ao usuário a permissão de acesso aos dados do Facebook; [exemplo 2](02-conectar.php)

    + caso o usuário aceite se conectar com o Facebook, é retornado o codigo de acesso do Facebook,
     a partir deste momento o usuário já está logado no Facebook e no aplicativo;

    + caso o usuário não aceite se conectar com o Facebook, é retornado um erro de acesso negado;

    + caso o usuário aceita se conectar, mas não da a permissão de acesso a algumas indormações do perfil,
     é retornado o código de acesso de acesso do Facebook, sem o acesso de algumas informações.

+ É preciso gerar o Access Token do Facebook, para carregar as informações do login [exemplo 3](03-token.php);

+ A partir do Access Token é possível obter as informações do usuário e criar uma session do usuário
 logado no aplicativo [exemplo 5](05-carregar-nome.php), [exemplo 6](06-carregar-perfil.php);

+ Ao efetuar o logout no aplicativo, podemos efetuar o logout também no Facebook [exemplo 8](08-logout.php);



__Informações do Access Token__

No [exemplo 4](04-debug.php) é possível visualizar as informações do Access Token, como data de expiração,
 id do app, permissões solicitadas, id do usuário logado e etc...

No [exempo 7](07-permissoes.php) é possível visualizar as permissões do aplicativo que o usuário permitiu
 o seu acesso.



Saiba mais em https://developers.facebook.com/docs/facebook-login/manually-build-a-login-flow/?translation