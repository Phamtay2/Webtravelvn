FROM php:8.2-fpm

# Cài extension và các công cụ
RUN apt-get update && apt-get install -y \
    libpng-dev zip unzip git curl libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Sao chép mã nguồn
COPY . /var/www/html

# Cài thư viện PHP
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader

# Set quyền
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Mở cổng 8080
EXPOSE 8080

# Chạy Laravel
CMD php artisan serve --host=0.0.0.0 --port=8080
