FROM shincoder/homestead:php7.1

MAINTAINER Usama Ahmed <maxpaynestory@gmail.com>


WORKDIR /var/www/html

COPY server/composer.json ./

RUN composer install
