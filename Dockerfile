# Stage 1: PHP dependencies
FROM composer:2 AS composer
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-interaction --no-scripts

# Stage 2: frontend build
FROM node:18 AS node
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm install
COPY resources resources
COPY vite.config.js tailwind.config.js postcss.config.js ./
RUN npm run build

# Stage 3: runtime image
FROM php:8.2-cli
RUN apt-get update \
    && apt-get install -y --no-install-recommends libpng-dev zip unzip git sqlite3 libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite gd \
    && rm -rf /var/lib/apt/lists/*
WORKDIR /app
COPY . .
COPY --from=composer /app/vendor /app/vendor
COPY --from=node /app/public/build /app/public/build
RUN cp .env.example .env \
    && mkdir -p storage/app/public \
        storage/framework/cache/data \
        storage/framework/sessions \
        storage/framework/testing \
        storage/framework/views \
        storage/logs \
        bootstrap/cache \
    && php artisan key:generate --force \
    && touch database/database.sqlite \
    && php artisan migrate --force \
    && php artisan storage:link --force
EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]