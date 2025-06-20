FROM php:8.2-fpm

# Cài các extension cần thiết
RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libjpeg-dev libfreetype6-dev sqlite3 libsqlite3-dev libonig-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring gd


# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Sao chép source code
COPY . /var/www/html
WORKDIR /var/www/html

# Cấp quyền cho Laravel
RUN chown -R www-data:www-data /var/www/html \
 && chmod -R 755 storage bootstrap/cache

# Copy .env nếu chưa có (chỉ dùng khi dev)
RUN if [ ! -f .env ]; then cp .env.example .env; fi

# Cài đặt & tối ưu Laravel
RUN composer install --no-dev --optimize-autoloader \
 && php artisan config:clear \
 && php artisan key:generate \
 && php artisan migrate --force \
 && php artisan config:cache

# Expose port Laravel Serve
EXPOSE 8000
CMD php artisan serve --host=0.0.0.0 --port=8000
