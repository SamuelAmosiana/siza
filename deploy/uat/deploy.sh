#!/bin/sh
# Updates UAT to the latest main branch. Run on the server as the app's owner.
set -eu
cd "$(dirname "$0")/../.."

git pull --ff-only
cd deploy/uat
docker compose up -d --build
docker compose ps
