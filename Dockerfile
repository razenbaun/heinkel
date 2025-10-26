FROM php:8.2-alpine

RUN apk add --no-cache postgresql-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql

COPY . /var/www/html
WORKDIR /var/www/html

EXPOSE 10000

CMD ["php", "-S", "0.0.0.0:10000"]