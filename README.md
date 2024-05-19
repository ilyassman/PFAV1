# École Virtuelle de Formations en Ligne Certifiées

## Table des matières
1. [Docker Image](#docker-image)
2. [Installation](#installation)
3. [Utilisation](#utilisation)

## Docker Image
```yaml
version: '3.8'

services:
  laravel.test:
    build:
      context: ./vendor/laravel/sail/runtimes/8.3
      dockerfile: Dockerfile
      args:
        WWWGROUP: '${WWWGROUP}'
    image: sail-8.3/app
    extra_hosts:
      - 'host.docker.internal:host-gateway'
    ports:
      - '8000:80'
      - '${VITE_PORT:-5173}:${VITE_PORT:-5173}'
    environment:
      WWWUSER: '${WWWUSER}'
      LARAVEL_SAIL: 1
      XDEBUG_MODE: '${SAIL_XDEBUG_MODE:-off}'
      XDEBUG_CONFIG: '${SAIL_XDEBUG_CONFIG:-client_host=host.docker.internal}'
      IGNITION_LOCAL_SITES_PATH: '${PWD}'
      DB_HOST: mysql
      DB_DATABASE: api
      DB_USERNAME: root
      DB_PASSWORD: 
    volumes:
      - '.:/var/www/html'
    networks:
      - sail
    depends_on:
      - mysql
      - redis
      - meilisearch
      - mailpit
      - selenium

  mysql:
    image: mysql:5.7
    environment:
      - MYSQL_DATABASE=api
      - MYSQL_ALLOW_EMPTY_PASSWORD=yes
      - MYSQL_ROOT_PASSWORD=
    volumes:
      - db_data:/var/lib/mysql
    networks:
      - sail

  phpmyadmin:
    image: phpmyadmin/phpmyadmin
    ports:
      - "8082:80"
    environment:
      - PMA_ARBITRARY=1
      - MYSQL_ROOT_PASSWORD=
    depends_on:
      - mysql
    networks:
      - sail

  redis:
    image: 'redis:alpine'
    ports:
      - '${FORWARD_REDIS_PORT:-6379}:6379'
    volumes:
      - 'sail-redis:/data'
    networks:
      - sail
    healthcheck:
      test:
        - CMD
        - redis-cli
        - ping
      retries: 3
      timeout: 5s

  meilisearch:
    image: 'getmeili/meilisearch:latest'
    ports:
      - '${FORWARD_MEILISEARCH_PORT:-7700}:7700'
    environment:
      MEILI_NO_ANALYTICS: '${MEILISEARCH_NO_ANALYTICS:-false}'
    volumes:
      - 'sail-meilisearch:/meili_data'
    networks:
      - sail
    healthcheck:
      test:
        - CMD
        - wget
        - '--no-verbose'
        - '--spider'
        - 'http://localhost:7700/health'
      retries: 3
      timeout: 5s

  mailpit:
    image: 'axllent/mailpit:latest'
    ports:
      - '${FORWARD_MAILPIT_PORT:-1025}:1025'
      - '${FORWARD_MAILPIT_DASHBOARD_PORT:-8025}:8025'
    networks:
      - sail

  selenium:
    image: selenium/standalone-chrome
    extra_hosts:
      - 'host.docker.internal:host-gateway'
    volumes:
      - '/dev/shm:/dev/shm'
    networks:
      - sail

networks:
  sail:
    driver: bridge

volumes:
  db_data:
  sail-mysql:
    driver: local
  sail-redis:
    driver: local
  sail-meilisearch:
    driver: local
```
## Installation

### Commandes Docker :
- Utilisez la commande suivante pour démarrer les services Docker :
    ```sh
    docker-compose up -d
    ```

### Commandes CMD :

1. **Créer une base de données MySQL :**

    Connectez-vous à votre serveur MySQL et exécutez la commande suivante pour créer une nouvelle base de données appelée `api` :

    ```sql
    CREATE DATABASE api;
    ```

2. **Importer la base de données :**

    Importez la base de données fournie dans votre serveur MySQL. Utilisez la commande suivante en remplaçant `path/to/database.sql` par le chemin réel de votre fichier SQL :

    ```sh
    mysql -u root -p api < path/to/database.sql
    ```

3. **Cloner le projet :**

    Utilisez les commandes suivantes pour cloner le projet et naviguer dans le répertoire du projet :

    ```sh
    git clone lien/de/projet/
    cd nom_de_projet
    ```

4. **Installer les dépendances :**

    Assurez-vous d'avoir Composer installé. Ensuite, exécutez la commande suivante pour installer les dépendances PHP :

    ```sh
    composer install
    ```

5. **Configurer l'application :**

    Copiez le fichier `.env.example` en `.env` et mettez à jour les informations de connexion à la base de données :

    ```sh
    cp .env.example .env
    ```

    Ouvrez le fichier `.env` et modifiez les lignes suivantes pour correspondre à votre configuration MySQL :

    ```env
    DB_DATABASE=api
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6. **Générer la clé de l'application :**

    Exécutez la commande suivante pour générer une nouvelle clé d'application :

    ```sh
    php artisan key:generate
    ```

7. **Lancer le serveur de développement :**

    Exécutez la commande suivante pour démarrer le serveur de développement :

    ```sh
    php artisan serve
    ```

8. **Accéder à l'application :**

    Ouvrez votre navigateur et accédez à l'URL suivante :

    ```sh
    http://127.0.0.1:8000/
    ```

    Et voilà !

## Utilisation 

### Authentification :
- **Pour s'authentifier en tant qu'administrateur :**
  - Email : admin@gmail.com
  - Mot de passe : ilyass123
- **Pour s'authentifier en tant que client :**
  - Email : ilyassmandour2002@gmail.com
  - Mot de passe : ilyass123
- **Pour s'authentifier en tant que formateur :**
  - Email : abdo@gmail.com
  - Mot de passe : ilyass123

### Comment utiliser l'application :
- **En tant qu'administrateur :**
  Après authentification, vous pouvez consulter le tableau de bord, naviguer vers les différentes pages et gérer les différents aspects à partir de la barre latérale à gauche.
- **En tant que client :**
  Après authentification, vous pouvez consulter votre profil, le modifier en utilisant le bouton de modification, et cliquer sur le bouton "Voir vos certifications" pour consulter les sessions auxquelles vous êtes inscrit.
- **En tant que formateur :**
  Après authentification, vous pouvez également consulter votre profil, le modifier en utilisant le bouton de modification, et voir les sessions de formation que vous enseignez.
