FROM francarmona/docker-ubuntu16-apache2-php7

MAINTAINER Usama Ahmed <maxpaynestory@gmail.com>

# Apache site conf
ADD config/apache/apache-virtual-hosts.conf /etc/apache2/sites-enabled/000-default.conf
ADD config/apache/apache2.conf /etc/apache2/apache2.conf