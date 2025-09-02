# Use an official PHP image as the base
FROM php:8.3-fpm-alpine

# Install system dependencies, including Git for Composer
RUN apk add --no-cache git

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy your application files to the container
COPY . .

# Install Composer and project dependencies
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Expose port 9000 for PHP-FPM
EXPOSE 9000

# Start the PHP-FPM server
CMD ["php-fpm"]