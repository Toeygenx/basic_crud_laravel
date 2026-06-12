#!/bin/bash

echo "Clearing caches..."
php artisan config:clear
php artisan cache:clear

echo "Running Database Migrations..."
php artisan migrate --force

echo "Fixing permissions..."
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

echo "Starting Apache server..."
apache2-foreground
