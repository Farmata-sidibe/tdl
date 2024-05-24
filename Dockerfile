FROM php:8.2-fpm

ARG user
ARG uid

RUN apt update && apt install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev

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

RUN useradd -G www-data,root -u $uid -d /home/$user $user

RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

WORKDIR /var/www
USER $user
