FROM php:8.1-fpm-alpine


# Install PHP extensions
RUN docker-php-ext-configure gd --with-jpeg
RUN docker-php-ext-install gd pdo pdo_mysql

# Install PHP extensions

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

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
