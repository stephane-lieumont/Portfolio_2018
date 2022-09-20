FROM php:fpm-alpine
RUN docker-php-ext-install opcache
COPY conf/php/opcache.ini /usr/local/etc/php/conf.d/opcache.ini