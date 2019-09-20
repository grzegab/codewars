FROM php:7.3-fpm

MAINTAINER Grzegorz Gabryel <greg@grzegab.eu>

RUN apt-get update && apt-get install -y libpq-dev libcurl4 libcurl4-openssl-dev libxml2-dev libpng-dev \
    libfreetype6-dev libjpeg62-turbo-dev libzip-dev zlib1g-dev smbclient cifs-utils unzip libaio1 \
    gnupg2 apt-transport-https git-all xfonts-75dpi xfonts-base wget \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install -j$(nproc) pdo pdo_pgsql pgsql soap gd zip
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

# Override with custom opcache settings
COPY xdebug.ini $PHP_INI_DIR/conf.d/
COPY php-additional.ini $PHP_INI_DIR/conf.d/

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

## Install node from nodesource
#RUN curl -sL https://deb.nodesource.com/setup_11.x | bash -
#RUN apt-get install -y nodejs

## Install yarn
#RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
#RUN echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list
#RUN apt-get update && apt-get install -y yarn

WORKDIR /var/www/html
