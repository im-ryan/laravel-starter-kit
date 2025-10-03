#!/usr/bin/env bash
#
# Description: Initializes the project for development.
# Usage: Only once, after the first time this project is installed.
#
set -euo pipefail

# First time setup: install Composer dependencies (Sail)
if [ ! -d "./vendor" ]; then
    echo "Downloading development environment files..."
    echo ""

    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v "$(pwd -P):/var/www/html" \
        -w /var/www/html \
        laravelsail/php84-composer:latest sh -lc '\
            cp .env.example .env || echo "Failed to copy environment file" \
                && cp -r ./docker/.devcontainer . || echo "Failed to copy dev container configuration" \
                && composer install --no-scripts --no-progress --ignore-platform-reqs --ansi
        '
fi

# Build the development environment
./vendor/bin/sail build --no-cache
./vendor/bin/sail up -d

./vendor/bin/sail composer install --ansi # Ensure all PHP dependencies are installed
./vendor/bin/sail artisan key:generate --ansi
./vendor/bin/sail artisan migrate:fresh --seed --ansi
./vendor/bin/sail pnpm install --ansi

./vendor/bin/sail down

echo ""
echo "Project initialized. You can now start the development container by pressing 'CTRL' + 'SHFT' + 'P'."
echo ""
