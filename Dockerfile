# Base image with PHP 8.2 and Apache
FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    libpq-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_pgsql pgsql zip exif pcntl gd

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install Node.js for frontend build
RUN curl -sL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs && \
    npm install && \
    npm run build

# Change ownership of our applications
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Update Apache configuration to point to public/
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/0000-default.conf

# Expose port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
