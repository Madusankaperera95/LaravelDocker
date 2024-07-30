FROM php:8.1-fpm


# Install PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer



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

CMD php artisan serve
