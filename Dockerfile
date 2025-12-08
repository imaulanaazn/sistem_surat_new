FROM php:8.4-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip libicu-dev libzip-dev libpng-dev \
    && docker-php-ext-install intl pdo pdo_mysql gd zip

# Enable Apache rewrite
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project
COPY . .

# ✅ WAJIB: install dependencies termasuk PhpSpreadsheet
RUN composer install --no-dev --optimize-autoloader

# Set Apache document root to CI4 public/
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

EXPOSE 80
