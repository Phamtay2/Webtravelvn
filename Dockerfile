FROM php:8.2-fpm

# Cài thêm thư viện
RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-install pdo pdo_mysql gd

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy mã nguồn
COPY . /var/www/html
WORKDIR /var/www/html

# Cài đặt Laravel
RUN composer install --no-dev --optimize-autoloader \
    && php artisan config:clear

# Mở port 8000 cho Laravel serve
EXPOSE 8000

# Start Laravel với PHP built-in server
CMD php artisan serve --host=0.0.0.0 --port=8000
