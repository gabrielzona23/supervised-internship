# Doc https://github.com/kool-dev/docker-php
FROM kooldev/php:8.0-nginx

COPY . .

RUN composer install --ignore-platform-reqs --no-interaction --no-dev --prefer-dist --optimize-autoloader

RUN chown -R kool:kool .

RUN php artisan config:cache && \
    php artisan route:cache && \
    composer dump-autoload

