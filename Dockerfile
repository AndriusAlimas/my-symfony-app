# Symfony Development Dockerfile
FROM php:8.2-cli

# Set working directory
WORKDIR /var/www/html

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libicu-dev \
    && docker-php-ext-install intl \
    && rm -rf /var/lib/apt/lists/*

# Copy project files
COPY . .

# Install PHP dependencies (if composer.json exists)
RUN if [ -f composer.json ]; then composer install --optimize-autoloader; fi

# Set permissions
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Expose port
EXPOSE 8000

# Start development server
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]