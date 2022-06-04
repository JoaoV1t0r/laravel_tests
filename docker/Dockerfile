FROM php:8.1.1-fpm-alpine


RUN apk update
RUN apk upgrade

RUN apk add zip unzip curl oniguruma oniguruma-dev

RUN apk add \
    libpng-dev \
    libjpeg \
    libzip \
    libzip-dev

RUN apk add --no-cache --virtual .phpize_deps $PHPIZE_DEPS

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets

RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

RUN curl -sS https://getcomposer.org/installer -o composer-setup.php \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && rm -rf composer-setup.php

RUN apk del --purge \
    libpng-dev \
    libjpeg \
    libzip \
    libzip-dev

WORKDIR /app
COPY . /app
RUN composer install
RUN php artisan key:generate
RUN php artisan cache:clear
RUN php artisan route:clear
RUN php artisan optimize
RUN php artisan config:clear
RUN chmod -R 777 storage bootstrap/cache
RUN apk del --purge .phpize_deps $PHPIZE_DEPS && rm -rf /var/cache/apk/*
CMD php-fpm
EXPOSE 9000