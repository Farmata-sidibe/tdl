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
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Ajouter le dépôt NodeSource pour installer la version LTS de Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Installer npx et tailwindcss globalement
RUN npm install -g --force npx tailwindcss

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier le contenu du projet dans le conteneur
COPY . .

# Installer les dépendances Composer
RUN composer install --no-dev --optimize-autoloader

# Installer les dépendances npm
RUN npm install && npm install vite --save-dev

# Compiler les assets avec npm
RUN npm run build

# Fixer les permissions sur les dossiers critiques
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

# Exposer le port 8000
EXPOSE 8000 5173

# Lancer l'application Laravel
# CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
CMD ["sh", "-c", "php artisan serve --host=0.0.0.0 --port=8000 & npm run dev --host=0.0.0.0"]
