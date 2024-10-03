# Dockerfile for PHP Website
FROM php:7.4-apache


# php depencies for mongodb and graphic draws
RUN apt-get update && apt-get install -y \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
        unzip \
        git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the PHP application to the container
COPY src/ /var/www/html/
COPY init-mongo.js /docker-entrypoint-initdb.d/


WORKDIR /var/www/html

# RUN cd /var/www/html \
#     && composer install


RUN chown -R www-data:www-data /var/www/html \
    && find /var/www/html -type d -exec chmod 755 {} \; \
    && find /var/www/html -type f -exec chmod 644 {} \;

# Expose port 80 for the web server
EXPOSE 80


