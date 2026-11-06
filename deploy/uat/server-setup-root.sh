#!/usr/bin/env bash
# One-time server setup for the SIZA UAT site. Run by the server admin, as root:
#   sudo bash server-setup-root.sh
#
# It does only the following, and does not touch other sites' config:
#   1. Adds APP_USER to the docker group (this is equivalent to root access).
#   2. Creates /opt/siza-uat, owned by APP_USER and closed to other non-root users.
#   3. Adds an nginx site for DOMAIN that proxies to 127.0.0.1:PORT.
#   4. Issues a Let's Encrypt certificate for DOMAIN and turns on HTTPS.
#
# nginx is only reloaded after `nginx -t` passes. If the test fails, the new
# site is removed again so that other sites are not affected.
set -euo pipefail

APP_USER=sianamates
DOMAIN=siza-uat.samuelsianamate.com
PORT=8005
APP_DIR=/opt/siza-uat
AVAILABLE=/etc/nginx/sites-available/$DOMAIN
ENABLED=/etc/nginx/sites-enabled/$DOMAIN

[ "$(id -u)" -eq 0 ] || { echo "Please run as root." >&2; exit 1; }
id "$APP_USER" >/dev/null

if ss -ltn | awk '{print $4}' | grep -qE ":${PORT}\$"; then
    echo "Port $PORT is already in use. Nothing has been changed." >&2
    exit 1
fi

remove_site_if_new() {
    rm -f "$ENABLED" "$AVAILABLE"
}

test_and_reload() {
    if ! nginx -t; then
        echo "nginx config test failed. Removing the new site and stopping." >&2
        remove_site_if_new
        nginx -t && systemctl reload nginx
        exit 1
    fi
    systemctl reload nginx
}

proxy_locations() {
    cat <<EOF
    client_max_body_size 10M;
    add_header X-Robots-Tag "noindex, nofollow" always;

    location / {
        proxy_pass http://127.0.0.1:$PORT;
        proxy_http_version 1.1;
        proxy_set_header Connection        "";
        proxy_set_header Host              \$host;
        proxy_set_header X-Real-IP         \$remote_addr;
        proxy_set_header X-Forwarded-For   \$proxy_add_x_forwarded_for;
        proxy_set_header X-Forwarded-Proto \$scheme;
        proxy_set_header X-Forwarded-Host  \$host;
        proxy_set_header X-Forwarded-Port  \$server_port;
        proxy_read_timeout 60s;
    }
EOF
}

echo "==> Docker access and app directory"
usermod -aG docker "$APP_USER"
install -d -m 750 -o "$APP_USER" -g "$APP_USER" "$APP_DIR"

echo "==> nginx site, HTTP only for now"
{
    echo "server {"
    echo "    listen 80;"
    echo "    listen [::]:80;"
    echo "    server_name $DOMAIN;"
    proxy_locations
    echo "}"
} > "$AVAILABLE"
ln -sf "$AVAILABLE" "$ENABLED"
test_and_reload

echo "==> Certificate dry run"
certbot certonly --nginx --dry-run -d "$DOMAIN" --agree-tos

echo "==> Certificate"
certbot certonly --nginx -d "$DOMAIN" --agree-tos --keep-until-expiring

echo "==> nginx site, with HTTPS"
{
    echo "server {"
    echo "    listen 80;"
    echo "    listen [::]:80;"
    echo "    server_name $DOMAIN;"
    echo "    return 301 https://$DOMAIN\$request_uri;"
    echo "}"
    echo
    echo "server {"
    echo "    listen 443 ssl;"
    echo "    listen [::]:443 ssl;"
    echo "    http2 on;"
    echo "    server_name $DOMAIN;"
    echo "    ssl_certificate     /etc/letsencrypt/live/$DOMAIN/fullchain.pem;"
    echo "    ssl_certificate_key /etc/letsencrypt/live/$DOMAIN/privkey.pem;"
    echo "    include /etc/letsencrypt/options-ssl-nginx.conf;"
    proxy_locations
    echo "}"
} > "$AVAILABLE"
test_and_reload

if ! ls /etc/letsencrypt/renewal-hooks/deploy/* >/dev/null 2>&1; then
    echo "NOTE: no certbot deploy hook found, so nginx may not pick up renewed"
    echo "      certificates automatically. See section 5 of 04-README-SSL-Certbot-v1.md."
fi

cat <<EOF

Done. Please also add this to the port registry in /opt/apps/docs/01-README-Purpose-v1.md:
| $PORT | siza-uat | Docker | $DOMAIN |

$APP_USER must log out and back in for docker access to take effect.
Visitors will get a 502 from https://$DOMAIN until the app is deployed.
EOF
