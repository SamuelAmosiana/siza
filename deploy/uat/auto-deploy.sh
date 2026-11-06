#!/bin/sh
# Deploys when origin/main has new commits. Run by cron on the server:
#   */2 * * * * sh /opt/siza-uat/deploy/uat/auto-deploy.sh >> $HOME/siza-uat-deploy.log 2>&1
#
# It prints nothing when there is nothing to deploy. A failed build is not
# retried until the next push, and the running site stays up.
set -eu
cd "$(dirname "$0")/../.."

# Skip this run if the previous deploy is still going.
exec 9> "$HOME/.siza-uat-deploy.lock"
flock -n 9 || exit 0

git fetch -q origin main
[ "$(git rev-parse HEAD)" = "$(git rev-parse origin/main)" ] && exit 0

echo "=== $(date -u '+%Y-%m-%d %H:%M:%S UTC') deploying $(git rev-parse --short origin/main)"
if nice -n 10 sh deploy/uat/deploy.sh; then
    echo "=== deployed OK"
else
    echo "=== DEPLOY FAILED"
    exit 1
fi
