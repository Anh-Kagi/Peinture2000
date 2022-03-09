# Peinture 2000

## Setup du serveur

### Serveur MySQL

L'application utilise une base de donnée pour stocker des informations.

Pour initialiser la base de donnée, un script est disponible dans `docker/peinture2000.sql`.

Il est possible de modifier le nom de la base de donnée, de l'utilisateur et son mot de passe.
Pour ce faire, il est possible de modifier dans le script `docker/peinture2000.sql` les lignes suivantes:

```sql
--
-- Base de données : `peinture2000`
--

CREATE USER "<user>"@"%" IDENTIFIED BY "<password>";
CREATE DATABASE IF NOT EXISTS `peinture2000`;
GRANT ALL PRIVILEGES ON `peinture2000`.* TO "<user>"@"%"; 

USE `peinture2000`;
```

Il est possible de changer le nom d'utilisateur et son mot de passe en modifiant les occurences de `<user>` et `<password>` respectivement. Pour changer le nom de la base de donnée, il faut modifier les occurences de `peinture2000`.

### Serveur PHP

L'application utilise PHP, ainsi que l'extension PDO, il faut donc faire attention à ce qu'elle soit installée et activée (elle l'est généralement par défaut).

Pour configurer le serveur php, il suffit de copier les fichiers et dossiers suivants à la racine du serveur web (généralement `/var/www/html` sur linux):

> - css/
> - inc/
> - js/
> - models/
> - services/
> - utils/
> - account.php
> - desc.php
> - index.php
> - Liste.php
> - login.php
> - logout.php
> - pageAjout.php
> - ProduitListing.php

Si, lors de l'initialisation de la base de donnée, le nom de la base de donnée, de l'utilisateur, ou de son mot de passe ont été modifiées, il faut alors transposer les changements dans le ficher `utils/database.php`, aux lignes suivantes:

```php
<?php
class Database
{
    private static $host = "mysql";
    private static $dbname = "peinture2000";
    private static $username = "user";
    private static $pwd = "password";
[...]
```

Il faut également modifier l'attribut `$host` en y assignant le nom d'hôte du serveur MySQL.

### Alternative

Un ficher `docker-compose.yml` est disponible dans le dossier `docker/`, contenant une configuration par défaut.

Il suffit d'avoir `docker` et `docker-compose` d'installé, et d'exécuter la commande suivante dans le dossier `docker/`:

```sh
docker-compose up
```

Dans ce cas, le serveur PHP est accessible à l'URL suivante: `http://localhost:9080`.
Un instance de PHPMyAdmin est également disponible à l'URL: `http://localhost:9081` pour parcourir la base de donnée.

## Utilisation

Une fois les serveurs configurés et lancés, on peut accéder à l'interface web de l'application.

A la racine du serveur, un lien nous permet d'accéder à la version client, ou à la version manager.

Dans la barre de navigation, un bouton nous envoie vers la page de connexion/enregistrement. Une fois connecté, la barre de navigation affichera alors un boutton de déconnexion.

La page `/pageAjout.php` permet d'ajouter un produit, et la page `/desc.php` permet d'afficher les produits disponible sous forme d'un carroussel.