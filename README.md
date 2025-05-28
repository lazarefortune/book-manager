# Lazare Fortune BookManager

Mini-application Symfony pour gérer une collection de livres via une interface web simple et fonctionnelle.

## Stack

- Symfony 6.4
- MySQL 8 (via Docker)
- Doctrine ORM
- Twig
- Webpack Encore + TailwindCSS
- Fixtures YAML (Alice + Faker)

---

## ⚙️ Installation locale

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


