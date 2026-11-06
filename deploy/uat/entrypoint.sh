#!/bin/sh
set -e

php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force

# The artisan commands above ran as root; Apache's workers run as www-data.
chown -R www-data:www-data storage bootstrap/cache

exec apache2-foreground
