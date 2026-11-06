#!/bin/sh
# Updates UAT to the latest main branch. Run on the server as the app's owner.
set -eu
cd "$(dirname "$0")/../.."

git pull --ff-only
cd deploy/uat

previous_image=$(docker image inspect -f '{{.Id}}' siza-uat-app 2>/dev/null || true)
docker compose up -d --build
docker compose ps

# Each build leaves the old image behind, which would slowly fill a shared disk.
current_image=$(docker image inspect -f '{{.Id}}' siza-uat-app)
if [ -n "$previous_image" ] && [ "$previous_image" != "$current_image" ]; then
    docker image rm "$previous_image" || true
fi
