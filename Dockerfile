FROM composer:2 as builder

COPY composer.json /app
COPY composer.lock /app
RUN composer install --no-dev --no-scripts --optimize-autoloader

FROM library/php:8-fpm-alpine
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY --from=builder /app/vendor /usr/share/nginx/app/vendor
COPY . /usr/share/nginx/app
