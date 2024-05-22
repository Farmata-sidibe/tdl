FROM php:8.2-fpm

# Définir le répertoire de travail dans le conteneur à /app
WORKDIR /app

# Copier le contenu du répertoire actuel dans le conteneur à /app
COPY . /app

# Exécuter composer pour installer le framework Laravel et les autres dépendances
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-interaction

# Installer les extensions nécessaires
RUN docker-php-ext-install pdo mbstring zip

# Vider le cache
RUN php artisan cache:clear

# Expose le port 8000 pour PHP-FPM
EXPOSE 8000

# Exécute PHP-FPM
CMD ["php-fpm"]
