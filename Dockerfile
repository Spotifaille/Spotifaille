FROM php:7.4-apache

RUN apt-get update \
    && apt-get upgrade -y \
    && apt-get install git libssl-dev -y \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

# Copy the PHP application to the container
COPY src/ /var/www/html/

WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN composer require mongodb/mongodb \ 
    && composer install \ 
    && chown -R www-data:www-data /var/www/html \
    && find /var/www/html -type d -exec chmod 755 {} \; \
    && find /var/www/html -type f -exec chmod 644 {} \;

# Expose port 80 for the web server
EXPOSE 80


