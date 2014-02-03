sadmincom
=========


Para poder instalar correctamento el sistema primero habilitar la extension soap del php.ini de ahi hablitar los puertos 26
27 28 del apacache viendo la donfiguracion del archivo vhost en la carpeta desing, 

<VirtualHost *:26>
    ServerAdmin webmaster@dummy-host.example.com
    DocumentRoot "d:/webapps/sadmincom/dbs"
    ServerName sadmincom.dbs
    ServerAlias www.sadmincom.dbs.com
    ErrorLog "c:/wamp/www/logs/sadmincom-dbs-error.log"
    CustomLog "c:/wamp/www/logs/sadmincom-dbs-access.log" common
    <Directory d:/webapps/sadmincom/dbs>
        Options Indexes FollowSymLinks ExecCGI
        AllowOverride all
        Order Deny,Allow
        Deny from all
        Allow from 127.0.0.1
        Allow from ::1
        Allow from localhost
    </Directory>
</VirtualHost>


configurar el DocumentoRoot error log costumlog y directory de los tres vhost que apunten a la carpeta correspondiente

verificar todo entrando a localhost:28/subir.php
