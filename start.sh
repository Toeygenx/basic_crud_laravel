#!/bin/bash

echo "Clearing caches..."
php artisan config:clear
php artisan cache:clear

echo "Running Database Migrations..."
php artisan migrate --force

echo "Starting Apache server..."
apache2-foreground
