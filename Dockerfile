FROM php:8.2-fpm

# Cài các extension cần thiết
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev zip unzip git curl \
    && docker-php-ext-install pdo pdo_mysql gd

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy source code
COPY . /var/www/html

# Cài thư viện PHP
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader

# Chmod và quyền
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# (Tuỳ theo app, có thể thêm CMD hoặc ENTRYPOINT ở đây)
