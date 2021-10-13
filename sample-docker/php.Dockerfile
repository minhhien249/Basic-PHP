#FROM php:7.3-fpm-alpine
FROM php:7.3-fpm-alpine

# Update OS and install common dev tools
RUN apt-get update
RUN apt-get install -y wget vim git zip unzip zlib1g-dev libzip-dev libpng-dev

# Install PHP extensions needed
RUN docker-php-ext-install -j$(nproc) mysqli pdo_mysql gd zip pcntl exif

# Enable apache rewrite
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

# Set working directory to workspace
WORKDIR /var/www/html
#Copy php ini
COPY php.ini /usr/local/etc/php/php.ini
RUN a2enmod rewrite