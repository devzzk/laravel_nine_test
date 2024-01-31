#!/bin/bash

# Startup for laravel
if [ -f /var/www/artisan ]; then
    /usr/local/bin/php /var/www/artisan migrate --force
    /usr/local/bin/php /var/www/artisan optimize
fi

# Serve octane
if [[ -f /var/www/artisan && -f /var/www/config/octane.php ]]; then
    /usr/local/bin/php artisan octane:start --host 0.0.0.0 -q &
fi

# Start php-fpm
php-fpm
