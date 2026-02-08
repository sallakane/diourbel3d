<?php
$success = isset($_GET['success']) && $_GET['success'] === '1';
$error = isset($_GET['error']) && $_GET['error'] === '1';
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Diourbel Développement Durable (3D) | Contact</title>
    <meta
      name="description"
      content="Contactez l'association Diourbel Développement Durable (3D) pour soutenir ou rejoindre nos actions citoyennes."
    />
    <meta property="og:title" content="Contact - Diourbel Développement Durable (3D)" />
    <meta
      property="og:description"
      content="Écrivez-nous pour rejoindre ou soutenir les actions de l'association 3D."
    />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://diourbel3d.com/contact" />
    <meta property="og:image" content="https://diourbel3d.com/assets/img/hero-illustration.svg" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="/assets/css/styles.css" />
  </head>
  <body>
    <a class="skip-link" href="#contenu">Aller au contenu principal</a>
    <header class="header">
      <div class="container navbar">
        <a class="brand" href="/">
          <span class="brand-mark">3D</span>
          <span>Diourbel Développement Durable</span>
        </a>
        <nav class="nav-links" aria-label="Navigation principale">
          <a href="/">Accueil</a>
          <a href="/apropos/">À propos</a>
          <a href="/contact/">Contact</a>
        </nav>
        <a class="button button-primary" href="/contact/">Nous contacter</a>
      </div>
    </header>

    <main id="contenu">
      <section class="section">
        <div class="container">
          <span class="tag">Contact</span>
          <h1 class="section-title">Discutons de vos projets et besoins</h1>
          <p class="section-subtitle">
            Vous souhaitez devenir partenaire, bénévole ou soutenir nos actions ? Contactez-nous
            via le formulaire ci-dessous ou par email.
          </p>
          <?php if ($success): ?>
          <p class="section-subtitle" style="color: #265738; font-weight: 600;">
            Merci, votre message a bien été envoyé.
          </p>
          <?php elseif ($error): ?>
          <p class="section-subtitle" style="color: #b42318; font-weight: 600;">
            Une erreur est survenue lors de l'envoi. Merci de réessayer plus tard.
          </p>
          <?php endif; ?>
          <div class="card-grid" style="margin-top: 32px;">
            <div class="card">
              <h3>Coordonnées</h3>
              <p>Quartier Médina, Diourbel, Sénégal</p>
              <p>
                Email :
                <a href="mailto:ndiageze@gmail.com,m.kane@atlantis-geotechnique.fr">
                  ndiageze@gmail.com
                </a>
                &amp;
                <a href="mailto:m.kane@atlantis-geotechnique.fr">m.kane@atlantis-geotechnique.fr</a>
              </p>
              <p>Téléphone : +221 33 000 00 00</p>
              <p>Horaires : Lundi - Vendredi, 9h à 18h</p>
            </div>
            <div class="card">
              <h3>Formulaire de contact</h3>
              <form
                class="form"
                data-contact-form
                action="/contact/submit.php"
                method="post"
                novalidate
              >
                <div class="form-group">
                  <label for="name">Nom complet</label>
                  <input id="name" name="name" type="text" required />
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input id="email" name="email" type="email" required />
                </div>
                <div class="form-group">
                  <label for="subject">Sujet</label>
                  <input id="subject" name="subject" type="text" required />
                </div>
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea id="message" name="message" rows="4" required></textarea>
                </div>
                <button class="button button-primary" type="submit">Envoyer</button>
                <p data-form-message aria-live="polite"></p>
                <small>
                  Vous pouvez aussi nous écrire directement à
                  <a href="mailto:ndiageze@gmail.com,m.kane@atlantis-geotechnique.fr">
                    ndiageze@gmail.com
                  </a>
                  ou
                  <a href="mailto:m.kane@atlantis-geotechnique.fr">
                    m.kane@atlantis-geotechnique.fr
                  </a>
                  .
                </small>
              </form>
            </div>
          </div>
        </div>
      </section>
    </main>

    <footer class="footer">
      <div class="container footer-grid">
        <div>
          <h3>Diourbel Développement Durable (3D)</h3>
          <p>Ensemble pour un développement local, inclusif et durable.</p>
        </div>
        <div>
          <h4>Contact</h4>
          <p>Quartier Médina, Diourbel, Sénégal</p>
          <p>Email : ndiageze@gmail.com / m.kane@atlantis-geotechnique.fr</p>
          <p>Téléphone : +221 33 000 00 00</p>
        </div>
        <div>
          <h4>Réseaux</h4>
          <p><a href="#">Facebook</a></p>
          <p><a href="#">Instagram</a></p>
          <p><a href="#">LinkedIn</a></p>
        </div>
      </div>
      <div class="container" style="margin-top: 28px;">
        <small>© 2024 Diourbel Développement Durable (3D). Tous droits réservés.</small>
      </div>
    </footer>

    <script src="/assets/js/main.js"></script>
  </body>
</html>
