FROM php:8.2-fpm

# Définir le répertoire de travail dans le conteneur à /app
WORKDIR /app

# Copier le contenu du répertoire actuel dans le conteneur à /app
COPY . .

# Installez les dépendances nécessaires
RUN apt-get update && apt-get install -y \
    curl \
    unzip \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip \
    && apt-get clean

# Téléchargez et installez Composer
RUN curl -o composer-setup.php https://getcomposer.org/installer \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && rm composer-setup.php

# Installez les dépendances PHP avec Composer
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Copiez et configurez le fichier .env
RUN cp .env.example .env \
    && php artisan key:generate

# Vérifiez et fixez les permissions
# RUN chown -R www-data:www-data /app \
#     && chmod -R 755 /app/storage

# Exécutez les commandes Artisan nécessaires
RUN php artisan cache:clear
RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan view:clear

# Expose le port 8000 pour PHP-FPM
EXPOSE 8000

# Exécute PHP-FPM
CMD ["php-fpm"]
