FROM php:8.4-fpm as dev

RUN apt-get update && apt-get install -y \
    curl \
    libmcrypt-dev \
    libmpc-dev \
    libxml2-dev \
    libzip-dev \
    libpq-dev \
    libpng-dev \
    git \
    zip \
    unzip \
    openssl \
    nginx \
    libonig-dev \
    libicu-dev

RUN git clone https://github.com/php/pecl-encryption-mcrypt.git /tmp/mcrypt \
    && cd /tmp/mcrypt \
    && phpize \
    && ./configure \
    && make \
    && make install

RUN docker-php-ext-install gd pdo pdo_mysql mbstring opcache zip intl sockets gmp bcmath \
    && docker-php-ext-enable mcrypt \
    && docker-php-ext-configure gmp

COPY . /app
WORKDIR /app

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --optimize-autoloader

EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
