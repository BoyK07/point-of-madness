# Use official PHP with extensions required by Laravel
FROM php:8.3-cli

# Set working directory
WORKDIR /var/www/html

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy app code
COPY . .

# Install dependencies
RUN composer install --no-scripts --no-autoloader && \
    composer dump-autoload && \
    composer run-script post-root-package-install && \
    composer run-script post-create-project-cmd || true

# Expose port
EXPOSE 8000

# Run Laravel with built-in server
CMD php artisan serve --host=0.0.0.0 --port=8000
