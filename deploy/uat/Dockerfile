# SIZA UAT image. Build context is the repository root:
#   docker compose -f deploy/uat/docker-compose.yml build

# --- PHP dependencies -------------------------------------------------------
FROM composer:2 AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --no-interaction \
    --prefer-dist --ignore-platform-reqs
COPY . .
RUN composer dump-autoload --no-dev --optimize --no-scripts --ignore-platform-reqs

# --- Front-end assets (Ziggy is imported from vendor) -----------------------
FROM node:22-alpine AS assets
WORKDIR /app
COPY package.json package-lock.json vite.config.js postcss.config.js tailwind.config.js jsconfig.json ./
COPY resources ./resources
COPY --from=vendor /app/vendor ./vendor
ENV VITE_APP_NAME="SIZA"
ENV VITE_SHOW_DEMO_BANNER=true
# The host is short on memory, so keep the build from competing with live sites.
ENV NODE_OPTIONS=--max-old-space-size=512
RUN npm ci --no-audit --no-fund && npm run build

# --- Runtime ----------------------------------------------------------------
FROM php:8.3-apache
RUN docker-php-ext-install pdo_mysql opcache \
    && a2enmod rewrite \
    && sed -ri 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf \
    && mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY deploy/uat/apache.conf /etc/apache2/conf-enabled/zz-siza-uat.conf
COPY deploy/uat/php.ini "$PHP_INI_DIR/conf.d/zz-siza-uat.ini"
COPY deploy/uat/entrypoint.sh /usr/local/bin/siza-entrypoint

WORKDIR /var/www/html
COPY . .
COPY --from=vendor /app/vendor ./vendor
COPY --from=assets /app/public/build ./public/build

ENTRYPOINT ["sh", "/usr/local/bin/siza-entrypoint"]
