# Use the official PHP image with Apache
FROM php:8.3-apache

COPY . /var/www/html

# Install MySQL extension for PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Running the image.
# docker run -d -p 7000:80 mbogodigital
