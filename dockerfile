FROM php:7.2.5-fpm
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN apt-get update && apt-get install -y git libpng-dev
RUN docker-php-ext-install zip && docker-php-ext-enable zip
RUN mkdir -p /var/www
COPY ./code/ /var/www/
VOLUME /var/www/