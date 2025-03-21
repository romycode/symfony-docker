FROM php:8.3-fpm-alpine AS php

ADD --chmod=0755 https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
ADD --chmod=0755 https://getcomposer.org/download/latest-stable/composer.phar /usr/local/bin/composer
ADD --chmod=0755 https://cs.symfony.com/download/php-cs-fixer-v3.phar /usr/local/bin/php-cs-fixer

RUN apk update --no-cache       ;\
    apk add --no-cache git bash


FROM php AS dev

ENV XDEBUG_MODE=off

WORKDIR /opt/app

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
COPY ./resources/rootfs/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/99-xdebug.ini

COPY ./composer.lock /opt/app
COPY ./composer.json /opt/app

RUN apk update                                            ;\
    apk add postgresql16-client libpq-dev git openssh     ;\
    install-php-extensions xdebug pdo pdo_pgsql pdo_mysql ;\
    composer i --ignore-platform-reqs --no-scripts        ;\
    git config --global --add safe.directory /opt/app

