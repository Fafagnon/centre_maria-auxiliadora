# CFTP-MA — Application Laravel & Panneau d'Administration Filament

Application web dynamique pour le **Centre de Formation Technique et Professionnelle Maria Auxiliadora (CFTP-MA)**, centre salésien de formation professionnelle fondé en 1989 à Akodésséwa, Lomé (Togo).

Ce projet convertit le site vitrine statique approuvé en une application **Laravel 11** moderne et dynamique, équipée d'un panneau d'administration **Filament 3.x** pour la gestion des **actualités** et de la **galerie photos**, tout en préservant fidèlement le design approuvé (typographie Oswald / Work Sans, palette Navy / Gold / Cream, composants en pilule, cartes à coins organiques et comportements Vanilla JS).

---

## 1. Stack Technique

- **Backend** : Laravel 11 (PHP 8.2+ / 8.3)
- **Base de données** : SQLite en développement (`database/database.sqlite`), compatible MySQL / PostgreSQL en production.
- **Back-Office / Administration** : Filament 3.x (`filament/filament:3.*`)
  - Authentification intégrée
  - CRUD Articles (Génération de slug, DateTimePicker, RichEditor HTML, FileUpload)
  - CRUD Galerie (Upload, catégorisation, format de tuile, réordonnancement par glisser-déposer)
- **Traitement d'images** : Intervention Image 3 (`intervention/image:^3.0`)
  - Redimensionnement automatique à l'upload (largeur max 1600px pour les articles, 1200px pour la galerie)
  - Compression de qualité ~80% pour optimiser le temps de chargement
- **Frontend Assets** : Laravel Vite (`vite`, Vanilla CSS centralisé dans `resources/css/app.css`, Vanilla JS dans `resources/js/app.js`)
- **Polices** : Google Fonts (`Oswald`, `Work Sans`) chargées via CDN

---

## 2. Prérequis

- **PHP** : version 8.2 ou supérieure (extensions requises : `pdo`, `pdo_sqlite` ou `pdo_mysql`, `curl`, `fileinfo`, `gd`, `intl`, `mbstring`, `openssl`, `zip`, `exif`)
- **Composer** : version 2.x
- **Node.js** : version 18+ & **npm**

---

## 3. Installation et Démarrage

### Étape 1 : Cloner le dépôt et installer les dépendances
```bash
composer install
npm install
```

### Étape 2 : Configuration de l'environnement
Copiez le fichier d'exemple et générez la clé de sécurité de l'application :
```bash
cp .env.example .env
php artisan key:generate
```

Définissez vos identifiants d'administrateur dans `.env` :
```env
ADMIN_NAME="Administrateur CFTP-MA"
ADMIN_EMAIL=admin@cftp-ma.tg
ADMIN_PASSWORD=AdminPassword2026!
```

### Étape 3 : Création de la base de données et lien de stockage
Pour SQLite (configuration par défaut) :
```bash
# Crée le fichier de base de données s'il n'existe pas
touch database/database.sqlite

# Génère le lien symbolique public vers storage/app/public
php artisan storage:link
```

### Étape 4 : Exécuter les migrations et le seeder
```bash
php artisan migrate:fresh --seed
```
Cette commande crée toutes les tables et exécute :
1. `AdminUserSeeder` : Crée le compte administrateur basé sur vos variables `.env`.
2. `DemoDataSeeder` : Peuple les actualités et les photos de galerie initiales pour une démonstration immédiate.

### Étape 5 : Compilation des assets frontend
```bash
npm run build
```
*(ou `npm run dev` lors des phases de développement)*

### Étape 6 : Démarrer le serveur local
```bash
php artisan serve
```
Le site public est accessible à l'adresse : [http://127.0.0.1:8000](http://127.0.0.1:8000).

---

## 4. Panneau d'Administration (Filament)

- **URL d'accès** : [http://127.0.0.1:8000/admin](http://127.0.0.1:8000/admin)
- **Identifiant par défaut** : `admin@cftp-ma.tg`
- **Mot de passe par défaut** : `AdminPassword2026!` *(ou celui configuré dans votre `.env`)*

### Fonctionnalités d'administration disponibles :
1. **Actualités (`ArticleResource`)** :
   - Création / modification / suppression d'articles
   - Génération automatique du slug avec modification manuelle possible
   - Résumé court (`excerpt`) pour l'affichage en carte
   - Éditeur riche complet (`RichEditor`) pour le corps de l'article
   - Upload d'image de couverture avec redimensionnement automatique (1600px max, q80)
   - Statut (Brouillon / Publié) et date de publication (`published_at`)
   - Filtre par statut et tri par date dans la table
2. **Galerie Photos (`GalleryPhotoResource`)** :
   - Upload d'image avec redimensionnement automatique (1200px max, q80)
   - Catégorie (`ateliers`, `filieres`, `vie`, `evenements`)
   - Format d'affichage dans la grille (`normal`, `wide`, `tall`)
   - Légende optionnelle (`caption`)
   - **Tri manuel par glisser-déposer** (`reorderable`) directement dans la liste Filament

---

## 5. Architecture des Pages Publiques

| Route | Contrôleur | Vue Blade | Description |
|---|---|---|---|
| `/` | `HomeController@index` | `pages/home.blade.php` | Accueil avec slider filières, statistiques, histoire et **les 3 derniers articles publiés dynamiques**. |
| `/admissions` | `PageController@admissions` | `pages/admissions.blade.php` | Conditions, étapes, pièces à fournir et accordéon FAQ interactif. |
| `/a-propos` | `PageController@about` | `pages/about.blade.php` | Histoire du centre salésien, timeline, valeurs, équipe et ateliers. |
| `/galerie` | `GalleryController@index` | `pages/gallery.blade.php` | Grille **dynamique** avec onglets de filtrage par catégorie et visionneuse **lightbox** (navigation flèches, fermeture ESC/clic). |
| `/actualites` | `ArticleController@index` | `pages/articles/index.blade.php` | Liste paginée de tous les articles publiés (`published_at <= now()`) avec pagination personnalisée. |
| `/actualites/{slug}` | `ArticleController@show` | `pages/articles/show.blade.php` | Détail d'un article avec hero, date en français, image de couverture, corps riche et bouton retour. Renvoie 404 si non publié ou inexistant. |
| `/contact` | `PageController@contact` | `pages/contact.blade.php` | Page minimale d'attente reprenant le layout avec les coordonnées réelles (téléphone, WhatsApp, localisation). |

### Pattern Placeholder d'Image (`.img-frame`)
Tant qu'aucune image n'est uploadée pour un article ou une photo de galerie, le site affiche le cadre hachuré pointillé `.img-frame` d'origine avec le label `Photo à ajouter` et le chemin attendu. Les balises `<img>` disposent toutes de l'attribut `onerror="this.style.display='none'"` pour garantir qu'aucune image brisée ne s'affiche.

---

## 6. Tests Automatisés

Le projet comprend une suite complète de tests de fonctionnalités vérifiant toutes les routes publiques, les statuts d'articles (brouillon vs publié), la pagination, la sécurité du panneau Filament et les cas 404 :

```bash
php artisan test
```

Résultat : **12 tests passés, 34 assertions, 0 échec**.

---

## 7. Hors Scope et Évolutions Futures

Conformément au cahier des charges :
1. **Page Contact** : N'ayant pas fait l'objet d'une maquette statique préalable, une page sobre en construction réutilisant le layout commun avec les coordonnées directes (téléphone, WhatsApp, horaires) a été mise en place afin d'éviter tout lien 404. Aucun formulaire d'envoi de mail n'a été introduit.
2. **Partenaires** : La section partenaires de la page d'accueil conserve les 6 cadres logos placeholders prévus par la maquette d'origine.
3. **Badge de rentrée dynamique** : L'emplacement réservé dans la navigation / hero (`<!-- TODO (v2 / admin) -->`) est préservé pour un développement futur.
