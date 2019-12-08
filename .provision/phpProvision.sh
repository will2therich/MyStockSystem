#!/usr/bin/env bash

apt install software-properties-common python-software-properties
LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php -y
apt update
apt-get install php7.2 php7.2-cli php7.2-common -y
apt-get install php-pear php7.2-curl php7.2-dev php7.2-redis php7.2-pgsql php7.2-gd php7.2-mbstring php7.2-zip php7.2-mysql php7.2-xml php7.2-fpm libapache2-mod-php7.2 php7.2-imagick php7.2-recode php7.2-tidy php7.2-xmlrpc php7.2-intl -y
su -c vagrant
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
mv composer.phar /usr/local/bin/composer
php -r "unlink('composer-setup.php');"
sudo su
apt install redis-server -y