# Sites que utilizam o recurso do Login das redes sociais

http://www.mindmeister.com/

__Login de rede social:__ Facebook, Google, Office 365, Twitter, Biggerplate

- ao acessar pela primeira vez por rede social, é criado a conta do sistema;
- uma vez que a conta foi criada por rede social, o e-mail não pode ser utilizado novamente para criar uma nova conta;
- tem a opção para conectar outras redes sociais em Minha conta;
- opção para desconectar a conta da rede social, após definir uma senha;
- a sistema pode ser acessado com o e-mail da conta e com o e-mail do Facebook, mesmo que diferentes, após conectar
 a conta do Facebook em Minhas configurações;
- mesmo se a conta do Facebook não esteja vinculada na conta do sistema, é possível fazer o login do Facebook na conta,
 desde que permita o seu acesso (isso tanto no cadastrar quanto em login).


http://www.powtoon.com/

__Login de rede social:__ Facebook, Google, Linkedin

- após o logar pela primeira vez com o Linkedin, não consigo logar novamente com a conta. É preciso remover o app no
 Linkedin para acessar novamente. Isso ocorreu somente nas primeiras tentativas;
- foi possível cadastrar as duas contas (Linkedin e Facebook) com o mesmo e-mail, mas não permite criar uma nova conta
 do sistema com o mesmo e-mail;
- ao criar uma conta com o Linkedin e definindo uma senha, mas o acesso não é liberado, só funcionou com o Facebook;
- não tem a opção de desconectar contas das redes sociais;

- desenvolvido em Python, abaixo está a sequência de como foi descoberto;
    - acesse a conta com o e-mail do linkedin e a senha definida nas configurações, será retornado um erro de conta inválida;
    - clique em redefinir a senha com o mesmo e-mail do linkedin, será retornado o erro de e-mail inexistente;
    - atualize a página e será retornado o erro 403 (CSRF);



https://www.hotmart.com/pt/

__Login de rede social:__ Facebook

- criar uma nova conta com o e-mail do Facebook;
- após o login do Facebook, os dados são adicionado no formulário. Isso obriga o usuário adicionar uma senha;
- mesmo cadastrando com o Facebook, é preciso vincular manualmente a conta do Facebook para acessar com ela;
- depois de criar a conta pelo Entrar com o Facebook, não é possível acessar o sistema pelo Facebook, o acesso só é
 permitido após vincular Facebook na conta;
- permite desconectar e conectar do Facebook nas configurações;



https://bubbl.us

__Login de rede social:__ Facebook, Google

- cria uma nova conta com o e-mail da rede social;
- faz o login do sistema pela conta do Facebook;
- não tem a opção para desconectar da rede social
- pode acessar a conta com o e-mail, após definir uma senha;



https://www.catarse.me/pt

__Login de rede social:__ Facebook

- cria uma conta no sistema com o perfil do Facebook
- é possível redefinir a senha com uma conta criada pelo Facebook
- o acesso pode realizado pelo Facebook ou pelo sistema (depois de redefinir a senha)
- logout do sistema não desconecta na conta do Facebook
- é possível conectar com o facebook mesmo quando já está cadastrado no sistema com o e-mail
- se a conta é desativada, não é possível logar com o facebook caso o e-mail seja o mesmo
- não mostra o nome ou foto do perfil quando conectado ao Facebook



https://br.pinterest.com/

__Login de rede social:__ Facebook e Google

- mostra a foto do perfil e o nome do Facebook, caso conectado (função do gerador de botões do Facebook)
- possui botões que mostram quais contas o login esta associado (Google+, Facebook, Twitter, Gmail entre outros)
- a conta do sistema fica associada ao cadastro do Facebook
- caso desconecte a conta do Facebook, pede para criar uma nova senha (a app também é removido do Facebook)
- se temos uma conta criada e tentamos se conectar com o Facebook com o mesmo endereço de e-mail (na tela do login),
 a conta do sistema é vinculada com o perfil do Facebook
- se temos uma conta criada e tentamos se conectar com o Facebook com um endereço de e-mail diferente (na tela do login),
 é criado uma nova conta
- para associar uma conta existente a uma conta do Facebook com o e-mail diferente, a conexão deve ser feita pelas
 configurações do usuário
- ao remover uma conta associada, o app é excluido do Facebook



https://www.pixiv.net/

__Login de rede social:__ Facebook, Google e Twitter

- ao conectar com qualquer rede social pela primeira vez, não é feito um login automático, é preciso se cadastrar no sistema
- ao tentar criar uma conta com o Facebook, é solicitado criar uma senha de acesso
- além da senha é necessário cadastrar as informações obrigatórias do site
- pode desconectar qualquer conta e conectar novamente
- a associação com o Facebook é efetuado pelo e-mail que foi cadastrado
- a conta precisa esta associada com a conta do Facebook para o login pelo Facebook funcionar
- se a associação não for definida no settings, e tentar fazer o login pelo Facebook com o mesmo e-mail, ao criar conta
 ocorre um erro (This email has already been registered)



https://www.instagram.com/

__Login de rede social:__ Facebook

- logo após conectar com o Facebook, é solicitado o cadastro do nome do usuário e senha
- não é possível desconectar ou desvincular a conta do Facebook



https://www.catho.com.br/

__Login de rede social:__ Facebook, Google e Linkedin (indisponível)

- após o login com o Facebook, as informações do perfil serão mostradas no formulário de cadastro do site
- mesmo sem confirmar o cadastro, o seu acesso é criado e liberado, mesmo sem criar uma senha
- se criamos um acesso pelo Facebook e tentamos criar novamente é exibido o perfil cadastrado para efetuar o login
- não tem opção para desvincular ou desconectar com o Facebook



https://www.patreon.com/

__Login de rede social:__ Facebook

- após o login com o Facebook solicita o e-mail para cadastrar a conta
- o nome e a foto do perfil são adicionadas nos dados da conta
- ao cadastrar com o login do Facebook, o acesso pode ser feito por ele
- para acessar com a conta do sistema é preciso definir a senha em settings (não mostra nenhum informação para
 definir uma senha)
- somente após definir uma senha é possível desconectar a conta do Facebook
- é possível conectar a conta com o Facebook e logar por ele depois
- ao dar a permissão de conexão com o Facebook, a conta é vinculada com o Facebook pelo AccessToken obtido
