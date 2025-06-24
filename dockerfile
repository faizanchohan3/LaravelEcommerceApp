# ---- Base Node image for building assets ----
FROM node:20-alpine AS node_builder
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# ---- Base PHP image for Composer and PHP dependencies ----
FROM composer:2.7 AS composer_builder
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-interaction --prefer-dist

# ---- Production image ----
FROM php:8.2-fpm-alpine
WORKDIR /var/www

# Install system dependencies
RUN apk add --no-cache \
    libpng libpng-dev \
    libjpeg-turbo libjpeg-turbo-dev \
    freetype freetype-dev \
    zip unzip git curl bash icu-dev oniguruma-dev

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql mbstring intl

# Copy built vendor and node assets from previous stages
COPY --from=composer_builder /app/vendor ./vendor
COPY --from=node_builder /app/public ./public
COPY --from=node_builder /app/resources ./resources
COPY --from=node_builder /app/node_modules ./node_modules

# Copy the rest of the application code
COPY . .

# Create storage directories and set permissions
RUN mkdir -p storage/framework/{sessions,views,cache} \
    && mkdir -p storage/logs \
    && mkdir -p bootstrap/cache \
    && chmod -R 755 /var/www/storage \
    && chmod -R 755 /var/www/bootstrap/cache

# Expose port 9000 and start php-fpm
EXPOSE 9000
CMD ["php-fpm"]

# ---- Development image ----
FROM php:8.2-fpm-alpine AS dev
WORKDIR /var/www

RUN apk add --no-cache \
    libpng libpng-dev \
    libjpeg-turbo libjpeg-turbo-dev \
    freetype freetype-dev \
    zip unzip git curl bash icu-dev oniguruma-dev nodejs npm

COPY --from=composer_builder /app/vendor ./vendor
COPY . .

RUN npm install

# Create storage directories and set permissions
RUN mkdir -p storage/framework/{sessions,views,cache} \
    && mkdir -p storage/logs \
    && mkdir -p bootstrap/cache \
    && chmod -R 755 /var/www/storage \
    && chmod -R 755 /var/www/bootstrap/cache

EXPOSE 8000 5173
CMD ["sh", "-c", "php artisan serve --host=0.0.0.0 --port=8000 & npm run dev"]
