# Dockerfile for PHP Website
FROM php:7.4-apache

# Install necessary PHP extensions
# RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy the PHP application to the container
COPY . /var/www/html/

WORKDIR /var/www/html

# Expose port 80 for the web server
EXPOSE 80

