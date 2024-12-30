#!/bin/sh

set -e

echo "Running Laravel optimizations..."
#php artisan cache:clear
#php artisan config:cache
#php artisan route:cache
#php artisan view:cache

echo "Starting PHP-FPM..."
exec php-fpm
exec "$@"
