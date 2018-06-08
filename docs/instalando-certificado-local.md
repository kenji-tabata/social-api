# Instalando certificado na máquina local

Para utilizar os recursos do login por redes sociais, é preciso que o domínio do site tenha instalado um certificado
 digital (SSL) para as requisições e redirecionamentos da API funcionarem corretamente, isso vale também quando estiver
 testando no ambiênte de desenvolvimento (máquina local ou virtual).


__Instalando no Centos__

    // instalando mod_ssl
    # yum install mod_ssl

    // reinicie o apache
    # service httpd restart



__Criando certificado__

    # mkdir /etc/httpd/ssl

    # cd /etc/httpd/ssl

    # openssl genrsa -out matriz.key 1024

    # openssl req -new -key matriz.key -x509 -out matriz.crt

    // insira os dados conforme solicitados...



__Configurando ssl__

    # cd /etc/httpd/conf/

    # cp httpd.conf ssl.conf

    // altere a porta 80 para 443
    Listen 80   ->  Listen 443

    // no final do arquivo adicione...
    <VirtualHost *:443>
        SSLEngine on
        SSLCertificateFile /etc/httpd/ssl/matriz.ctr
        SSLCertificateKeyFile /etc/httpd/ssl/matriz.key
    </VirtualHost>

    // reinicie o apache
    # service httpd restart



__Testando__

No navegador digite https://[ip-da-maquina-virtual]

Adicione a excessão do certificado para confiar no site.
