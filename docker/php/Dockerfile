FROM php:8.1.18-fpm
COPY php.ini /usr/local/etc/php/

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql

# Composer
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php \
    && HASH="$(curl -sS https://composer.github.io/installer.sig)" \
    && echo "$HASH composer-setup.php" | sha384sum -c - \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && rm composer-setup.php

WORKDIR /var/www
