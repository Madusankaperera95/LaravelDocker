FROM php:8.1-fpm


# Install PHP extensions
RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo mbstring

# Install PHP extensions

# Install Composer

# Set working directory
WORKDIR /app

# Copy existing application directory contents
COPY . /app


# Ensure permissions for Laravel
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

# Install PHP dependencies
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Expose port 8000 and start PHP-FPM server
EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000
