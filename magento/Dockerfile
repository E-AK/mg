FROM php:8.2-fpm

RUN apt-get update \
    && apt-get install -y \
        libpng-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libxml2-dev \
        libxslt1-dev \
        libmemcached-dev \
        sendmail-bin \
        sendmail \
        libicu-dev \
        libzip-dev \
        libonig-dev \
    && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
    && docker-php-ext-install \
        opcache \
        bcmath \
        gd \
        intl \
        mysqli \
        pdo_mysql \
        soap \
        xsl \
        zip \
        sockets \
    && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
    && echo 'memory_limit = 2048M' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini; \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer