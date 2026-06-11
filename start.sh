#!/bin/bash

echo "Running Database Migrations..."
php artisan migrate --force

echo "Starting Apache server..."
apache2-foreground
