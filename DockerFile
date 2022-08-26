FROM php:8.1-apache

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && install-php-extensions pdo_pgsql intl

COPY ./src /var/www/
COPY ./conf/.htaccess /var/www/
COPY ./conf/apache.conf /etc/apache2/sites-available/000-default.conf
COPY ./conf/docker.sh /var/www/conf/docker.sh

WORKDIR /var/www/

ENTRYPOINT ["bash", "./conf/docker.sh"]

EXPOSE 80