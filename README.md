# CPLMonAvenir - Application de Gestion d'École

Ce projet est une application web de gestion d'école développée en utilisant le framework Laravel. Cette application permet de gérer efficacement les activités liées à la gestion d'une école, y compris la gestion des élèves, des enseignants, des cours, des emplois du temps et bien plus encore.

## Fonctionnalités

- Gestion des élèves : Ajouter, modifier et supprimer des informations sur les élèves, y compris leurs informations personnelles, leur inscription et leur statut.

- Gestion des enseignants : Suivre les informations des enseignants, leur affectation aux cours et leurs disponibilités.

- Gestion des cours : Créer, éditer et supprimer des cours, attribuer des enseignants aux cours et définir des horaires.

- Emploi du temps : Créer des emplois du temps pour les élèves et les enseignants, afficher les horaires des cours et des activités.

- Gestion des absences : Suivre les absences des élèves et générer des rapports.

- Bulletins : Générer les bulleitns des élèves après chaque trimestre.

## Installation

Pour installer le projet sur votre serveur local, suivez ces étapes :

1. Clônez le dépôt :
```bash
git clone https://github.com/samTeouri/CPLMonAvenir
```

2. Accédez au répertoire du projet :
```bash
cd CPLMonAvenir/src/
```

3. Installez les dépendances via Composer :
```bash
composer install
```

4. Copiez le fichier `.env.example` en `.env` et configurez les paramètres de la base de données et d'autres paramètres d'environnement.

5. Générez une clé d'application :
```bash
php artisan key:generate
```

6. Exécutez les migrations de base de données :
```bash
php artisan migrate
```

7. Lancez le serveur de développement :
```bash
php artisan serve
```

8. Accédez à l'application dans votre navigateur à l'adresse http://localhost:8000.

## Configuration

Vous pouvez configurer l'application en modifiant le fichier `.env`. Assurez-vous de définir les paramètres de base de données et d'autres variables d'environnement nécessaires.

## Contributeurs

- Samrou TEOURI(https://github.com/samteouri)
