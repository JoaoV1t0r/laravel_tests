FROM alpine:latest

# Essentials
RUN echo "UTC" > /etc/timezone
RUN apk add --no-cache zip unzip curl bash nginx
RUN sed -i 's/bin\/ash/bin\/bash/g' /etc/passwd

# Installing PHP
RUN apk add php \
    php-common \
    php-fpm \
    php-pdo \
    php-opcache \
    php-zip \
    php-phar \
    php-iconv \
    php-cli \
    php-curl \
    php-pdo_mysql \
    php-mysqli \
    php-openssl \
    php-mbstring \
    php-tokenizer \
    php-fileinfo \
    php-json \
    php-xml \
    php-gd \
    php-xmlwriter \
    php-xmlreader \
    php-simplexml \
    php-dom \
    php-session \
    php-pcntl \
    php-posix 

# Installing composer
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && rm -rf composer-setup.php

COPY ./docker/php/php.ini /etc/php/php.ini
COPY ./docker/php/php-fpm.conf /etc/php/php-fpm.conf
COPY ./docker/php/www.conf /etc/php/php-fpm.d/www.conf

WORKDIR /app
COPY . /app
RUN composer install
RUN php artisan key:generate \
    && php artisan cache:clear \
    && php artisan route:clear\
    && php artisan optimize\
    && php artisan config:clear
RUN chmod 777 -R /app/storage bootstrap/cache

RUN chown -R nginx:nginx /app

COPY ./docker/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./docker/nginx/app.conf /etc/nginx/conf.d/app.conf
COPY ./docker/docker-entrypoint.sh /docker-entrypoint.sh
RUN chmod +x /docker-entrypoint.sh
ENTRYPOINT ["/docker-entrypoint.sh"]