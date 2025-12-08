FROM php:8.4-apache

# Set ServerName biar tidak warning
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Install ekstensi DB
RUN docker-php-ext-install pdo_mysql mysqli

# Enable rewrite
RUN a2enmod rewrite

# Set document root ke public CI4
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
 && sed -ri 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# ✅ PAKSA APACHE LISTEN KE PORT DARI RAILWAY
RUN sed -i 's/80/${PORT}/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

COPY . /var/www/html
WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html
