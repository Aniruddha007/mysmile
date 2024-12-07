# Use an official PHP runtime as a parent image
FROM php:8.2-apache

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get upgrade -y \
    && apt-get install -y \
        nano \
        vim \
        libicu-dev \
        git \
        unzip \
        libmemcached-dev \
        zlib1g-dev \
        libssl-dev \
        libzip-dev \
        zip \
    && pecl install memcached \
    && docker-php-ext-enable memcached

# Install PHP extensions
RUN docker-php-ext-configure intl \
    && docker-php-ext-install intl mysqli pdo_mysql \
    && docker-php-ext-enable mysqli \
    && a2enmod headers \
    && a2enmod rewrite

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the contents of your project into the container at /var/www/html
COPY ./MySmilePro/ /var/www/html/MySmilePro/

# Change ownership and permissions of the writable directory
RUN chown -R www-data:www-data /var/www/html

# Run Composer install to install the dependencies
WORKDIR /var/www/html/MySmilePro
RUN composer install --prefer-source --no-interaction --no-dev --optimize-autoloader

# Set terminal environment variable
ENV TERM xterm

# Copy the custom entrypoint script
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Copy spark
COPY spark /var/www/html
RUN chmod +x /var/www/html/spark

# Expose port 80
EXPOSE 8080

RUN a2enmod rewrite

# Use the custom entrypoint script as the CMD
CMD ["docker-entrypoint.sh"]
