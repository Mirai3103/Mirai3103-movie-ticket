FROM php:8.1-apache
RUN docker-php-ext-install mysqli
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libwebp-dev \
    libxpm-dev \
    && rm -rf /var/lib/apt/lists/*
RUN apt-get update && apt-get install -y libonig-dev \
    && rm -r /var/lib/apt/lists/*
# Install PHP extensions
RUN docker-php-ext-install \
    mbstring \
    zip \
    gd

WORKDIR /var/www/html

COPY . /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install
RUN chmod -R 775 .
RUN a2enmod rewrite

EXPOSE 80

CMD ["apache2-foreground"]