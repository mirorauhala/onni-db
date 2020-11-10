FROM composer:1 AS builder
COPY ./src /usr/share/onnidb
WORKDIR /usr/share/onnidb
RUN ls -la
RUN composer install --no-dev
RUN ls -la


FROM php:7.4-fpm-alpine
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
COPY ./docker/php-fpm/php-ini-overrides.ini "$PHP_INI_DIR/99-overrides.ini"
WORKDIR /usr/share/onnidb
COPY --from=builder /usr/share/onnidb .
