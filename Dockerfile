
FROM php:8.2-apache

# Copier tous les fichiers du projet
COPY . /var/www/html/

# Configurer Apache pour utiliser le dossier public
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Donner les bonnes permissions
RUN chown -R www-data:www-data /var/www/html

# Exposer le port 80
EXPOSE 80

# Démarrer Apache
CMD ["apache2-foreground"]

