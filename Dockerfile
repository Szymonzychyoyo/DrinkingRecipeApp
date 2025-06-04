# syntax=docker/dockerfile:1
FROM php:8.3-fpm-alpine

# Install system dependencies and PHP extensions needed by Laravel
RUN apk add --no-cache \
        git bash curl icu-dev oniguruma-dev libzip-dev zlib-dev sqlite sqlite-dev \
        nodejs npm build-base && \
    docker-php-ext-install intl mbstring pdo pdo_sqlite pdo_mysql zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy application code
COPY . .

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Build frontend assets
RUN npm ci && npm run build

# Copy .env and generate APP_KEY
RUN cp .env.example .env && php artisan key:generate --ansi

# (Optional) Run migrations (can be removed in production)
# RUN php artisan migrate --force || true

# Expose port and start the development server
EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
