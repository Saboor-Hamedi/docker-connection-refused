FROM php:8.2-apache

ENV COMPOSER_ALLOW_SUPERUSER =1
# Copy virtual host into container
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
RUN rm -rf /etc/apache2/sites-enabled/000-default.conf

# Enable rewrite mode
RUN a2enmod rewrite

# Install necessary packages
RUN apt-get update && \
    apt-get install \
    libzip-dev \
    wget \
    git \
    unzip \
    -y --no-install-recommends

# install mysql terminal

RUN apt-get update && apt-get install -y mariadb-client

# Install PHP Extensions
RUN docker-php-ext-install zip pdo_mysql

# COPY xdebug-3.1.5.tgz /tmp/xdebug.tgz
# RUN pecl install /tmp/xdebug.tgz \
#     && docker-php-ext-enable xdebug

#     && rm -rf /tmp/pear

# Copy composer installable
COPY ./install-composer.sh ./


# Copy php.ini
COPY ./php.ini /usr/local/etc/php/

# Cleanup packages and install composer
RUN apt-get purge -y g++ \
    && apt-get autoremove -y \
    && rm -r /var/lib/apt/lists/* \
    && rm -rf /tmp/* \
    && sh ./install-composer.sh \
    && rm ./install-composer.sh

# Copy the .env file to the container
WORKDIR /var/www

COPY .env /var/www/.env

# Change the current working directory


# Change the owner of the container document root
RUN chown -R www-data:www-data /var/www


# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

 COPY . /app
# Start Apache in foreground
CMD ["apache2-foreground"]
