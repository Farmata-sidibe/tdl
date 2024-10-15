#!/bin/bash

# Arrêter le script immédiatement en cas d'erreur
set -e

# Vérifier si Laravel est installé correctement (vérifier la présence du fichier artisan)
if [ -f "artisan" ]; then
    echo "Laravel détecté, démarrage des configurations."

    # Installer Laravel UI si nécessaire
    if ! composer show laravel/ui > /dev/null 2>&1; then
        echo "Installation de Laravel UI..."
        composer require laravel/ui
    else
        echo "Laravel UI est déjà installé."
    fi

    # Installer les dépendances NPM et compiler les assets avec Vite
    echo "Installation des dépendances NPM et compilation des assets..."
    npm uninstall sass@latest
    npm install sass@latest
    npm install -g --force npx tailwindcss
    npm install
    npm run build
    npm run dev -- --host --port 5174 &

else
    echo "Le fichier artisan est introuvable, Laravel n'est pas installé correctement."
fi

# Démarrer Apache en mode premier plan
echo "Démarrage du serveur avec php..."


# Garder le processus Apache actif au premier plan
exec php artisan serve --host=0.0.0.0 --port=8000
