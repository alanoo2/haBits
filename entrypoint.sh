#!/bin/sh
# Crear base de datos y dar permisos
touch /var/www/html/database/database.sqlite
chown -R www-data:www-data /var/www/html/database /var/www/html/storage
chmod -R 775 /var/www/html/database /var/www/html/storage

# Migrar y sembrar automáticamente
php /var/www/html/artisan migrate --force
php /var/www/html/artisan db:seed --force

# Iniciar servidor
/usr/bin/supervisord -c /etc/supervisor/supervisord.conf