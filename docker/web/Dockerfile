FROM php:5.6.29-apache

MAINTAINER Jorge Nuñez <jorge.nunez@opinapanel.com>

### OS Packages
RUN apt-get update && \
    apt-get install -y git vim wget curl libcurl3-dev zlib1g-dev \
        libmcrypt-dev libfreetype6-dev libjpeg62-turbo-dev

### Composer
RUN cd /root && \
    wget https://getcomposer.org/composer.phar && \
    chmod +x composer.phar && \
    mv composer.phar /usr/local/bin/composer

### Symfony
RUN mkdir -p /usr/local/bin && \
    curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony && \
    chmod a+x /usr/local/bin/symfony

### Enable Apache Modules
RUN a2enmod rewrite

### PHP Extensions
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/  &&  \
    docker-php-ext-install curl gd mcrypt mysqli pdo pdo_mysql zip

### PECL PHP Extensions
RUN pecl install xdebug-2.5.5 && \
    docker-php-ext-enable xdebug

### Add parameters to php.ini
RUN echo "date.timezone=America/Argentina/Buenos_Aires" >> /usr/local/etc/php/php.ini

