FROM php:8.3-apache

RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN a2enmod rewrite

WORKDIR /var/www/html

COPY composer.json composer.lock ./

RUN composer install --no-scripts --no-autoloader --prefer-dist --verbose

COPY . /var/www/html

RUN cp .env.example .env

RUN composer dump-autoload

COPY site.conf /etc/apache2/sites-available/000-default.conf

RUN chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

EXPOSE 80

CMD ["sh", "-c", "php artisan key:generate && php artisan migrate --seed --force && apache2-foreground"]
