# Utiliser l'image officielle PHP avec Apache
FROM php:8.2-apache

# Copier notre application dans le répertoire web d'Apache
COPY index.php /var/www/html/

# Donner les bonnes permissions
RUN chown -R www-data:www-data /var/www/html

# Exposer le port 80 (port web standard)
EXPOSE 80

# Commande par défaut : démarrer Apache
CMD ["apache2-foreground"]