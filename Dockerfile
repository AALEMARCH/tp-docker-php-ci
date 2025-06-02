FROM php:8.2-apache

# Copier TOUS les fichiers du projet
COPY . /var/www/html/

# Donner les bonnes permissions
RUN chown -R www-data:www-data /var/www/html

# Exposer le port 80
EXPOSE 80

# Commande par défaut : démarrer Apache
CMD ["apache2-foreground"]