FROM php:8.1-apache
RUN docker-php-ext-install mysqli
WORKDIR /var/www/html

COPY . /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install
RUN chmod -R 775 .
RUN a2enmod rewrite

EXPOSE 80

CMD ["apache2-foreground"]