FROM php:7.4-cli

RUN apt-get update && apt-get install -y git libmcrypt-dev libpq-dev librabbitmq-dev libssl-dev libicu-dev libxslt-dev zip unzip wait-for-it \
    && pecl install xdebug amqp redis \
    && docker-php-ext-configure intl && docker-php-ext-install intl \
    && docker-php-ext-install pdo pdo_pgsql pcntl bcmath xsl \
    && docker-php-ext-enable xdebug amqp redis

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN mkdir /app
WORKDIR /app


