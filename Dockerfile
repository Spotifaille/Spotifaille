# Dockerfile for PHP Website
FROM php:7.4-apache

# Install necessary PHP extensions
# RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy the PHP application to the container
COPY src/ /var/www/html/

RUN chown -R www-data:www-data /var/www/html \
    && find /var/www/html -type d -exec chmod 755 {} \; \
    && find /var/www/html -type f -exec chmod 644 {} \;


WORKDIR /var/www/html

# Expose port 80 for the web server
EXPOSE 80

#CMD["tail", "-f", "/dev/null"]

