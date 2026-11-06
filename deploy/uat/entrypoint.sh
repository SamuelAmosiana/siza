#!/bin/sh
set -e

htpasswd -bc /etc/apache2/uat.htpasswd "$UAT_BASIC_USER" "$UAT_BASIC_PASSWORD"
chown root:www-data /etc/apache2/uat.htpasswd
chmod 640 /etc/apache2/uat.htpasswd

php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force

# The artisan commands above ran as root; Apache's workers run as www-data.
chown -R www-data:www-data storage bootstrap/cache

exec apache2-foreground
