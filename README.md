# osuFrancePlays

# Installer les dépendances PHP
```composer install```

# Copier le fichier .env et générer la clé d'application
```
cp .env.example .env
php artisan key:generate
```

# Mise en place db env etc.

# Installer les dépendances JavaScript
```npm i```

# Démarrer les conteneurs Docker avec Sail
```./vendor/bin/sail up -d```

# Exécuter les migrations
```./vendor/bin/sail artisan migrate```
