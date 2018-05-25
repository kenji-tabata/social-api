# Social APIs

## Facebook developers:

Para utilizar os aplicativos do Facebook, é preciso criar uma identificação do app ou site que
irá utilizar qualquer um dos aplicativos do Facebook.



## Facebook login

__Https obrigatório__

O `https` é obrigatório em todas as requisições do app login do Facebook, então para utilizar o
 app de login, o site deve está em um dominio com certificado de segurança instalado, isso vale
 também para a máquina local.

Para instalar o certificado digital na máquina local veja em [docs](/docs/instalando-certificado-local.md)


__Criando uma identificação do aplicativo ou site__

Acesse https://developers.facebook.com/ e entre com o login e senha;

Clique em `Meus Aplicativos` e depois em `Adicionar novo aplicativo`;

No formulário digite as informações sobre o app ou site e confirme.


__Executando pelo servidor PHP__

    $ cd /00-exemplo

    // na máquina local
    $ php -S 127.0.0.1:4000 index.php

    // na máquina virtual
    $ php -S [seu-ip]:4000 index.php


