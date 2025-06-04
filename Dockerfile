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

COPY . .

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Copy the rest of the application code


# Build frontend assets
RUN npm ci && npm run build

# Generate Laravel application key (only if none exists yet)
RUN if [ ! -f .env ]; then cp .env.example .env; fi && \
    if ! grep -q '^APP_KEY=' .env || grep -q '^APP_KEY=$' .env; then \
        php artisan key:generate --ansi; \
    fi

# Expose port and start the development server
EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
