# Diourbel Développement Durable (3D)

Site vitrine statique pour l'association **Diourbel Développement Durable (3D)**. Le projet
est entièrement en HTML/CSS/JS et prêt pour un déploiement simple sur GitHub Pages ou un
serveur web classique.

## Structure du projet

```
.
├── index.html
├── apropos/
│   └── index.html
├── contact/
│   ├── index.php
│   └── submit.php
├── assets/
│   ├── css/
│   │   └── styles.css
│   ├── js/
│   │   ├── main.js
│   │   └── slider.js
│   └── img/
│       ├── hero-illustration.svg
│       ├── gallery-1.svg ... gallery-6.svg
│       └── logo-1.svg ... logo-4.svg
├── 404.html
├── .htaccess
└── nginx-snippet.conf
```

## Démarrage local

Aucun build n'est nécessaire. Vous pouvez ouvrir `index.html` directement dans votre
navigateur ou lancer un serveur statique :

```bash
python3 -m http.server 8080
```

Puis rendez-vous sur `http://localhost:8080`.

## Démarrage local avec PHP

Pour tester le formulaire en PHP, lancez le serveur intégré :

```bash
php -S localhost:8000 -t .
```

Puis ouvrez `http://localhost:8000/contact/`. Le script `contact/submit.php` traite les
soumissions via `mail()`. Assurez-vous que votre environnement local autorise l'envoi
d'emails (configuration SMTP ou sendmail selon votre système).

## Stack Docker (local)

Pour tester le site dans un conteneur Nginx :

```bash
docker compose up --build
```

Puis ouvrez `http://localhost:8080`. Le fichier `nginx.conf` gère les URLs propres et le
fallback `404.html`.

## Déploiement

### GitHub Pages
1. Poussez le contenu sur votre dépôt GitHub.
2. Activez GitHub Pages (branche `codex` ou `main`).
3. Les URLs seront disponibles aux emplacements :
   - `/` (Accueil)
   - `/apropos/`
   - `/contact/`

### Serveur Apache
Le fichier `.htaccess` est fourni pour activer les URLs propres et le fallback `404.html`.

### Serveur Nginx
Le fichier `nginx-snippet.conf` contient un exemple de configuration `try_files` et une
redirection vers `/404.html`.

## Comment modifier les images du slider

1. Remplacez les fichiers `assets/img/gallery-1.svg` à `gallery-6.svg` par vos images.
2. Gardez le même nom de fichier ou mettez à jour les sources dans `index.html`.
3. Si vous ajoutez plus d'images, dupliquez une ligne `<div class="slide">` dans la section
   "Galerie & réalisations".

## Accessibilité & SEO
- Balises sémantiques (`header`, `nav`, `main`, `section`, `footer`).
- Meta title/description et OpenGraph par page.
- Slider accessible (contrôles, navigation clavier).
- Support de `prefers-reduced-motion`.
