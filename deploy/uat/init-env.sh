#!/bin/sh
# Creates deploy/uat/.env.uat with fresh random secrets. Run once on the server.
set -eu
cd "$(dirname "$0")"

if [ -e .env.uat ]; then
    echo ".env.uat already exists; leaving it unchanged." >&2
    exit 1
fi

umask 077
DB_PASSWORD=$(openssl rand -hex 24)
DB_ROOT_PASSWORD=$(openssl rand -hex 24)

cat > .env.uat <<EOF
APP_NAME="SIZA"
APP_ENV=uat
APP_KEY=base64:$(openssl rand -base64 32)
APP_DEBUG=false
APP_URL=https://siza-uat.samuelsianamate.com

LOG_CHANNEL=stderr
LOG_LEVEL=info

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=siza_uat
DB_USERNAME=siza_uat
DB_PASSWORD=$DB_PASSWORD

MARIADB_DATABASE=siza_uat
MARIADB_USER=siza_uat
MARIADB_PASSWORD=$DB_PASSWORD
MARIADB_ROOT_PASSWORD=$DB_ROOT_PASSWORD

SESSION_DRIVER=database
SESSION_SECURE_COOKIE=true
CACHE_STORE=database
QUEUE_CONNECTION=sync
MAIL_MAILER=log
EOF

chmod 600 .env.uat
echo "Created $(pwd)/.env.uat"
