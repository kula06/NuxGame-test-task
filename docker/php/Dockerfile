FROM php:8.2-fpm

ARG PUID=1000
ARG PGID=1000

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN groupmod -o -g ${PGID} www-data && \
    usermod -o -u ${PUID} -g www-data www-data && \
    mkdir -p /home/www-data/.composer && \
    chown -R www-data:www-data /home/www-data && \
    usermod -d /home/www-data www-data

WORKDIR /var/www

COPY --chown=www-data:www-data . /var/www

EXPOSE 9000
CMD ["php-fpm"]