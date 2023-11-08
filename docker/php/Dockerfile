FROM php:8.1-fpm

# Set working directory
WORKDIR /var/www/backend


RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

CMD ["sh", "-c", "chown -R 775 /var/www/backend/storage && cd /var/www/backend && php-fpm"]

EXPOSE 9000
