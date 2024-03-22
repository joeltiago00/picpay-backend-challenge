#Base Image
FROM php:8.3-apache AS APP_SERVER

ENV TZ=America/Sao_Paulo

#Set workdir
WORKDIR /var/www/html/

#Copy specific env files to the destination
COPY .ci/local/php.ini $PHP_INI_DIR/php.ini
COPY .ci/local/xdebug.ini $PHP_INI_DIR/conf.d/

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Installing OS dependencies
RUN   apt-get update -y && \
      apt-get upgrade -y && \
      apt-get install -yq --no-install-recommends wget libyaml-dev libzip-dev libpng-dev unzip libssl-dev pkg-config git nano

RUN a2enmod rewrite
RUN pecl install yaml-2.1.0 zip xdebug && \
    docker-php-ext-install gd pdo pdo_mysql && \
    docker-php-ext-enable gd yaml zip pdo pdo_mysql xdebug

# INSTALL COMPOSER
RUN cd /tmp/ && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# PHPUNIT
RUN cd /tmp/ && wget https://phar.phpunit.de/phpunit.phar && chmod +x phpunit.phar && mv phpunit.phar /usr/local/bin/phpunit

EXPOSE 80
