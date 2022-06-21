# PHP + Apache
FROM php:8.1-apache

# Update OS and install common dev tools
RUN apt-get update
RUN apt-get install -y wget vim git zip unzip zlib1g-dev libzip-dev libpng-dev
RUN a2enmod rewrite

RUN docker-php-ext-install mysqli pdo_mysql gd zip pcntl exif
RUN docker-php-ext-enable mysqli
