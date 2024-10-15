# Utiliser l'image PHP
FROM php:8.2-fpm

# Installe les dépendances requises
RUN apt-get update && apt-get install -y \
    libonig-dev \
    libjpeg-dev \
    libpng-dev \
    libxml2-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    git \
    curl \
    unzip \
    supervisor \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Ajouter le dépôt NodeSource pour installer la version LTS de Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Installer npx et tailwindcss globalement
# RUN npm install -g --force npx tailwindcss

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier le contenu du projet dans le conteneur
COPY . .

# Installer les dépendances Composer
RUN composer install --no-dev --optimize-autoloader

# Installer les dépendances npm
RUN npm install

# Compiler les assets avec npm
RUN npm run build

# Fixer les permissions sur les dossiers critiques
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

# Exposer les ports utilisés
EXPOSE 8000
EXPOSE 5174
EXPOSE 5173

# # Copier la configuration supervisord
# COPY ./supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# # Lancer supervisord
# CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]

# Copier le script de démarrage
COPY ./scripts/init.sh /init.sh
RUN chmod +x /init.sh

# Exécuter le script de démarrage au démarrage du conteneur
#CMD ["/init.sh"]
ENTRYPOINT ["/init.sh"]
