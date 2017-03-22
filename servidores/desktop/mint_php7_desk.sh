#!/bin/bash
# Automatização de instalação de pacotes (apache, php, mysql, postgresql, etc)
# Criado/adaptado por Ribamar FS - http://ribafs.org
#
apt-get install dialog;
#
while :
 do
    clear
servico=$(dialog --stdout --backtitle 'Instalação de pacotes no Ubuntu Server 16.04 LTS - 64' \
                --menu 'Selecione a opção com a seta ou o número e tecle Enter\n' 0 0 0 \
                1 'Atualizar repositórios' \
                2 'Instalar Servidor Web e cia' \
                3 'Efetuar o Upgrade da distribuição' \
                0 'Sair' )
    case $servico in
      1) apt-get update;;
      2) clear;
echo "Instalar pacotes básicos. Tecle Enter para instalar!";
apt-get -y install aptitude unzip ntp ntpdate git samba;

clear;
echo "Instalar Apache e módulos. Tecle Enter para instalar!";
apt-get -y install apache2 libapache2-mod-php7.0;
a2enmod rewrite;

clear;
# Instalar SGBDs somente para testes locais. Visto que o servidor é outro: 10.0.0.60
apt-get -y install postgresql postgresql-contrib;
apt-get -y install mysql-server;
apt-get -y install sqlite3;
apt-get -y install adminer;

clear;
echo "Instalar PHP 7 e extensões. Tecle Enter para instalar!";
apt-get -y install php7.0 mcrypt php7.0-mcrypt php7.0-gd php7.0-mysql php7.0-sqlite3 php7.0-pgsql php7.0-ldap;
apt-get -y install php7.0-mcrypt php-pear php7.0-xsl curl php7.0-curl phpunit php-xdebug php7.0-intl composer;
apt-get -y install php7.0-zip php7.0-mbstring php-gettext php-mbstring php7.0-fpm php-auth phpmyadmin;

clear;
echo "Instalar suporte a cache no PHP. Tecle Enter para instalar!";
# Cache de php
apt-get -y install php-apcu;

wget http://ftp.ussg.iu.edu/linux/ubuntu/pool/main/m/memcached/memcached_1.4.25-2ubuntu1_amd64.deb;
dpkg -i memcached_1.4.25-2ubuntu1_amd64.deb;
apt-get -y install php7-memcache;

clear;
echo "Configurar php (display_errors = On)
date.timezone = America/Fortaleza
Aperte ENTER para abrir o php.ini
Comentar xdebug
";

nano /etc/php/7.0/cli/conf.d/20-xdebug.ini;

nano /etc/php/7.0/apache2/php.ini;
service apache2 restart;

read n;
echo "Configurar .htaccess no Apache 2.4 trocando None por All
e /var/www por /backup/www.
Aperte ENTER para configurar.
No apache2.conf:
<Directory />
    Options Indexes FollowSymLinks Includes ExecCGI
    AllowOverride All
    Order deny,allow
    Allow from all
</Directory>

Atalho para Desligar e reiniciar com CTRL+ALT+DEL
gnome-session-quit --power-off
";

nano /etc/apache2/apache2.conf;
nano /etc/apache2/sites-available/000-default.conf;

clear;
apt-get -y install rar unrar zip unzip p7zip-full aptitude ubuntu-restricted-extras k3b kolourpaint4 gnome-search-tool gedit-plugins;;

	  3) clear;
echo "Efetuar update e upgrade do Sistema. Algumas vezes é necessário reboot";

apt-get -y update;
apt-get -y upgrade;;
      0) clear;exit;;
   esac
done
