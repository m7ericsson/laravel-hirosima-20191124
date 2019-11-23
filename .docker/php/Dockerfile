FROM php:7.3-fpm-alpine

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer

RUN set -eux \
    && apk update \
    && apk add --no-cache --virtual .build-deps ${PHPIZE_DEPS} \
        tzdata \
        autoconf \
        gcc \
        g++ \
        make \
        git \
    && apk add --update --no-cache \
        curl-dev \
        libxml2-dev \
        libpng-dev \
        libjpeg-turbo-dev \
        icu-dev \
        zip \
        libzip-dev \
        unzip \
        tzdata \
        gmp-dev

RUN cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime \
    && echo Asia/Tokyo > /etc/timezone

RUN pecl install xdebug
RUN git clone https://github.com/phpredis/phpredis.git /usr/src/php/ext/redis
RUN docker-php-source extract \
    && cp /usr/src/php/ext/openssl/config0.m4 /usr/src/php/ext/openssl/config.m4 \
    && docker-php-ext-configure gd --with-png-dir=/usr/include --with-jpeg-dir=/usr/include \
    && docker-php-ext-install pdo \
        pdo_mysql \
        mbstring \
        curl \
        ctype \
        xml \
        json \
        intl \
        tokenizer \
        openssl \
        gd \
        zip \
        gmp \
        bcmath \
        exif \
        redis \
    && docker-php-ext-enable xdebug \
    && apk del .build-deps

RUN  curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer \
    && composer config -g repos.packagist composer https://packagist.jp

WORKDIR /var/www/html