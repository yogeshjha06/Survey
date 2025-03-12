FROM php:8.1-apache
RUN apt-get update && \
    apt-get install -y libsqlite3-dev git && \
    docker-php-ext-install pdo pdo_sqlite && \
    apt-get clean && rm -rf /var/lib/apt/lists/*
RUN a2enmod rewrite
WORKDIR /var/www/html
RUN git clone https://github.com/yogeshjha06/Survey.git /var/www/html

RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html
EXPOSE 80

CMD ["apache2-foreground"]
