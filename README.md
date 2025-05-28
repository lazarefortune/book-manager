# Lazare Fortune BookManager

Mini-application Symfony pour gérer une collection de livres via une interface web simple et fonctionnelle.

## Temps de réalisation

Le projet a été entièrement conçu et développé le 28 mai 2025, entre 11h36 et 17h00 — soit environ 5h30 de travail.
J’ai pris le temps de poser une base propre, fonctionnelle et de développer les fonctionnalités essentielles malgré le délai court.

## Stack

- Symfony 6.4
- MySQL 8 (via Docker)
- Doctrine ORM
- Twig
- Webpack Encore + TailwindCSS
- Fixtures YAML (Alice + Faker)

---

## Installation locale

### 1. Cloner le projet

```bash
git clone https://github.com/lazarefortune/book-manager.git
cd book-manager
```

### 2. Lancer MySQL via Docker

```bash
docker compose up -d
```

### 3. Copier la config et installer les dépendances

```bash
cp .env .env.local

composer install
pnpm install && pnpm run dev
```

### 4. Créer la base de données

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

### 5. Charger les fixtures
```bash
php bin/console hautelook:fixtures:load --no-interaction
```

### 6. Comptes de test
| Email                                       | Mot de passe | Rôles       |
| ------------------------------------------- | ------------ | ----------- |
| admin@example.com | admin123     | ROLE\_ADMIN |
| user@example.com  | user123      | ROLE\_USER  |


### Structure & choix techniques

Sécurité & droits :
- Seul l’auteur du livre ou un admin peut le modifier/supprimer (Voter personnalisé).
- L’ajout de catégories est réservé aux admins.
- Responsive UI : avec TailwindCSS.

## Ce que j’aurais ajouté avec plus de temps

- Organiser le projet par domaines (`Book/`, `User/`, `Category/`) pour une architecture plus lisible et évolutive.
- Utiliser des services pour mieux découper la logique métier.
- Ajouter des messages flash flottants pour améliorer le retour utilisateur.
- Implémenter des `EventListener` pour réagir à certaines actions clés (ex : lorsqu’un livre est ajouté).
- Ajouter un système d’upload d’image pour illustrer les livres, avec gestion des fichiers.
- Développer une interface d’administration dédiée avec gestion simplifiée et sécurisée.
- Créer un `CrudController` sur-mesure pour automatiser les opérations classiques.
- Intégrer un éditeur enrichi (WYSIWYG ou Markdown) pour la rédaction du résumé.
- Mettre en place une recherche avancée, éventuellement avec MeiliSearch.
- Ajouter des filtres combinés (catégorie, disponibilité, date de publication).
- Améliorer encore l’expérience mobile avec une navigation plus fluide.
- Intégrer React sur certaines parties du frontend (comme les filtres ou la pagination).
- Ajouter des tests unitaires et fonctionnels.
- Permettre l’export des livres en CSV ou JSON.
- Ajouter un tableau de bord utilisateur avec des statistiques simples.

Un exemple plus poussé encore en développement est disponible ici sur mon propre site :  
[https://gitlab.com/lazarefortune/lazarefortune.com.git](https://gitlab.com/lazarefortune/lazarefortune.com.git)
