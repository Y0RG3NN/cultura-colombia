<?php
session_set_cookie_params([
    'httponly' => true,
    'samesite' => 'Strict',
    'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
]);
session_start();

if (!isset($_SESSION['culture_csrf_token'])) {
    $_SESSION['culture_csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#f8f5ec">
  <meta name="description" content="Un recorrido por la diversidad de Colombia: sus regiones, sabores, ritmos y tradiciones.">
  <meta name="csrf-token" content="<?= htmlspecialchars($_SESSION['culture_csrf_token'], ENT_QUOTES, 'UTF-8') ?>">
  <title>Colombia, en todos sus colores</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <script src="app.js" defer></script>
</head>
<body>
  <a class="skip-link" href="#contenido">Saltar al contenido</a>
  <header class="site-header">
    <a class="brand" href="#inicio" aria-label="Colombia en todos sus colores, inicio">
      <span class="brand-mark" aria-hidden="true"><i></i><i></i><i></i></span>
      <span>COLOMBIA<span class="brand-light"> EN PLURAL</span></span>
    </a>
    <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="site-nav" aria-label="Abrir menú">
      <span></span><span></span>
    </button>
    <nav class="site-nav" id="site-nav" aria-label="Navegación principal">
      <a href="#regiones">Regiones</a>
      <a href="#sabores">Sabores</a>
      <a href="#ritmos">Ritmos</a>
      <a href="#tradiciones">Tradiciones</a>
      <a href="#memorias">Memorias</a>
    </nav>
    <a class="header-cta" href="#explora">Explora <span aria-hidden="true">↗</span></a>
  </header>

  <main id="contenido">
    <section class="hero" id="inicio">
      <div class="hero-copy">
        <p class="eyebrow"><span class="eyebrow-dot"></span> UN PAÍS, MUCHOS MUNDOS</p>
        <h1>Colombia<br>se siente <em>en plural.</em></h1>
        <p class="hero-description">Entre montañas, selvas y dos océanos, vive una cultura hecha de encuentros, memoria y alegría que se comparte.</p>
        <a class="button button-dark" href="#regiones">Recorre el país <span aria-hidden="true">↓</span></a>
        <div class="hero-note"><span class="note-line"></span><span>32 departamentos<br>infinitas maneras de ser</span></div>
      </div>
      <div class="hero-art" role="img" aria-label="Palmas de cera entre las montañas del Valle de Cocora, en el Quindío">
        <img class="hero-photo" src="assets/images/colombia-hero-cocora.webp" alt="" width="1024" height="683" fetchpriority="high">
        <span class="art-label art-label-top">4° 35′ N</span>
        <div class="art-caption"><span>01 / 04</span><span>Valle de Cocora · Quindío</span></div>
        <span class="photo-credit">Foto: <a href="https://www.flickr.com/photos/56796376@N00/8806585652" target="_blank" rel="noopener noreferrer">mckaysavage</a> · <a href="https://creativecommons.org/licenses/by/2.0/" target="_blank" rel="noopener noreferrer">CC BY 2.0</a></span>
        <span class="hero-sticker"><span aria-hidden="true">✳</span><br>La diversidad<br>nos une</span>
      </div>
      <div class="hero-bottom"><span>DESLIZA PARA DESCUBRIR</span><span class="hero-bottom-rule"></span><span>01 — 04</span></div>
    </section>

    <section class="intro-band" id="explora">
      <p>Esto es Colombia:</p>
      <div class="intro-words" aria-label="diversa, viva, nuestra">
        <span>Diversa<span class="word-dot">.</span></span>
        <span>Viva<span class="word-dot">.</span></span>
        <span>Nuestra<span class="word-dot">.</span></span>
      </div>
      <p class="intro-aside">Una invitación a conocer las historias, los paisajes y las personas que hacen de cada rincón un universo propio.</p>
    </section>

    <section class="section regions-section" id="regiones">
      <div class="section-heading">
        <div><p class="eyebrow">01 — TERRITORIOS QUE CUENTAN</p><h2>Cinco regiones,<br><em>un país inmenso.</em></h2></div>
        <p class="section-intro">Cada territorio tiene su propio pulso. Explora los paisajes y las culturas que dan forma a Colombia.</p>
      </div>
      <div class="region-grid">
        <article class="region-card region-andina">
          <img class="region-photo" src="assets/images/region-andina-cocora.webp" alt="Palmas de cera y montañas del Valle de Cocora, Quindío" width="1024" height="683" loading="lazy" decoding="async">
          <div class="region-top"><span>01</span><span class="region-icon" aria-hidden="true">⌁</span></div>
          <div><p class="card-kicker">Quindío · Eje Cafetero</p><h3>Andina</h3><p>Palmas de cera, montañas y pueblos cafeteros en el corazón de los Andes.</p></div>
          <span class="region-tag">EL CORAZÓN DEL PAÍS</span>
          <span class="photo-credit">Foto: <a href="https://www.flickr.com/photos/56796376@N00/8806646168" target="_blank" rel="noopener noreferrer">mckaysavage</a> · <a href="https://creativecommons.org/licenses/by/2.0/" target="_blank" rel="noopener noreferrer">CC BY 2.0</a></span>
        </article>
        <article class="region-card region-caribe">
          <img class="region-photo" src="assets/images/region-caribe-tayrona.webp" alt="Playa de las Siete Olas en el Parque Nacional Natural Tayrona" width="1024" height="686" loading="lazy" decoding="async">
          <div class="region-top"><span>02</span><span class="region-icon" aria-hidden="true">☼</span></div>
          <div><p class="card-kicker">Mar & tambor</p><h3>Caribe</h3><p>El ritmo del mar se mezcla con historias indígenas y afrocolombianas.</p></div>
          <span class="region-tag">DONDE EL MAR CANTA</span>
          <span class="photo-credit">Foto: <a href="https://www.flickr.com/photos/23435801@N05/3212631887" target="_blank" rel="noopener noreferrer">Aztlek</a> · <a href="https://creativecommons.org/licenses/by-sa/2.0/" target="_blank" rel="noopener noreferrer">CC BY-SA 2.0</a></span>
        </article>
        <article class="region-card region-pacifica">
          <img class="region-photo" src="assets/images/region-pacifica-nuqui.webp" alt="Playa de Nuquí, Chocó, donde visitantes escribieron el nombre del lugar sobre la arena" width="768" height="1024" loading="lazy" decoding="async">
          <div class="region-top"><span>03</span><span class="region-icon" aria-hidden="true">≋</span></div>
          <div><p class="card-kicker">Nuquí · litoral chocoano</p><h3>Pacífica</h3><p>Lluvias generosas, manglares y una tradición musical que eriza la piel.</p></div>
          <span class="region-tag">EL LATIDO VERDE</span>
          <span class="photo-credit">Foto: <a href="https://www.flickr.com/photos/65092670@N00/169831147" target="_blank" rel="noopener noreferrer">luis perez</a> · <a href="https://creativecommons.org/licenses/by/2.0/" target="_blank" rel="noopener noreferrer">CC BY 2.0</a></span>
        </article>
        <article class="region-card region-orinoquia">
          <img class="region-photo" src="assets/images/region-orinoquia-cano-cristales.webp" alt="Aguas de colores de Caño Cristales, en el departamento del Meta" width="1024" height="768" loading="lazy" decoding="async">
          <div class="region-top"><span>04</span><span class="region-icon" aria-hidden="true">〰</span></div>
          <div><p class="card-kicker">Meta · Macarena</p><h3>Orinoquía</h3><p>Caño Cristales y los paisajes llaneros donde nace el joropo.</p></div>
          <span class="region-tag">TIERRA DE LLANEROS</span>
          <span class="photo-credit">Foto: <a href="https://www.flickr.com/photos/43355249@N00/24867367037" target="_blank" rel="noopener noreferrer">szeke</a> · <a href="https://creativecommons.org/licenses/by-sa/2.0/" target="_blank" rel="noopener noreferrer">CC BY-SA 2.0</a></span>
        </article>
        <article class="region-card region-amazonia">
          <img class="region-photo" src="assets/images/region-amazonia-puerto-narino.webp" alt="Dos personas recorren en canoa el río cerca de Puerto Nariño, Amazonas" width="1024" height="682" loading="lazy" decoding="async">
          <div class="region-top"><span>05</span><span class="region-icon" aria-hidden="true">✳</span></div>
          <div><p class="card-kicker">Puerto Nariño · Amazonas</p><h3>Amazonía</h3><p>Comunidades ribereñas y saberes ancestrales junto al río Amazonas.</p></div>
          <span class="region-tag">EL PULMÓN DEL MUNDO</span>
          <span class="photo-credit">Foto: <a href="https://www.flickr.com/photos/48800013@N03/14307866952" target="_blank" rel="noopener noreferrer">Carlos Eduardo Mateus</a> · <a href="https://creativecommons.org/licenses/by/2.0/" target="_blank" rel="noopener noreferrer">CC BY 2.0</a></span>
        </article>
      </div>
      <p class="source-note">Colombia también es territorio insular: San Andrés, Providencia y Santa Catalina, en el mar Caribe.</p>
    </section>
    <section class="flavor-section" id="sabores">
      <div class="flavor-art">
        <img class="flavor-photo" src="assets/images/sabores-arepa.webp" alt="Arepas colombianas servidas para compartir en la mesa" width="1024" height="678" loading="lazy" decoding="async">
        <span class="flavor-stamp">DE LA TIERRA<br>A LA MESA</span>
        <span class="flavor-art-note">MAÍZ COLOMBIANO · TRADICIÓN QUE SE COMPARTE</span>
        <span class="photo-credit">Foto: <a href="https://www.flickr.com/photos/25382620@N03/14111839213" target="_blank" rel="noopener noreferrer">Gabriel GM</a> · <a href="https://creativecommons.org/licenses/by/2.0/" target="_blank" rel="noopener noreferrer">CC BY 2.0</a></span>
      </div>
      <div class="flavor-copy">
        <p class="eyebrow">02 — SABORES CON HISTORIA</p>
        <h2>En Colombia,<br>la mesa <em>reúne.</em></h2>
        <p class="flavor-description">Una cocina que nace de la tierra y se transforma en cada región. Ingredientes locales, recetas heredadas y siempre un puesto más para quien llega.</p>
        <div class="dish-list">
          <article class="dish"><span class="dish-number">01</span><div><h3>Arepa</h3><p>Maíz, manos y muchas versiones: cada región tiene la suya.</p></div><span class="dish-emoji" aria-hidden="true">◉</span></article>
          <article class="dish"><span class="dish-number">02</span><div><h3>Ajiaco</h3><p>Sopa bogotana de papas, guascas y cocina de hogar.</p></div><span class="dish-emoji" aria-hidden="true">◌</span></article>
          <article class="dish"><span class="dish-number">03</span><div><h3>Frutas del trópico</h3><p>Maracuyá, lulo, guanábana: colores que también se comen.</p></div><span class="dish-emoji" aria-hidden="true">✳</span></article>
        </div>
      </div>
    </section>

    <section class="rhythms-section" id="ritmos">
      <div class="rhythms-header">
        <div><p class="eyebrow">03 — ESCUCHA EL PAÍS</p><h2>Ritmos que<br><em>nos mueven.</em></h2></div>
        <p>La música colombiana es conversación entre pueblos, generaciones y geografías. Dale play a la curiosidad.</p>
      </div>
      <div class="rhythm-grid">
        <article class="rhythm-card rhythm-cumbia"><div class="sound-wave" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div><div><span>CARIBE</span><h3>Cumbia</h3><p>Tambor, gaitas y un encuentro de raíces.</p></div><span class="rhythm-mark" aria-hidden="true">↗</span></article>
        <article class="rhythm-card rhythm-vallenato"><div class="sound-wave" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div><div><span>LA GUAJIRA & CESAR</span><h3>Vallenato</h3><p>El acordeón cuenta historias del Caribe.</p></div><span class="rhythm-mark" aria-hidden="true">↗</span></article>
        <article class="rhythm-card rhythm-currulao"><div class="sound-wave" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div><div><span>PACÍFICO</span><h3>Currulao</h3><p>La marimba de chonta resuena junto al mar.</p></div><span class="rhythm-mark" aria-hidden="true">↗</span></article>
        <article class="rhythm-card rhythm-joropo"><div class="sound-wave" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div><div><span>LLANOS ORIENTALES</span><h3>Joropo</h3><p>Arpa, cuatro y zapateo bajo el horizonte.</p></div><span class="rhythm-mark" aria-hidden="true">↗</span></article>
      </div>
      <p class="music-note">Una pequeña muestra de la riqueza musical del país: cada ritmo guarda muchas voces.</p>
    </section>

    <section class="traditions-section" id="tradiciones">
      <div class="traditions-copy">
        <p class="eyebrow">04 — CELEBRAR TAMBIÉN ES RECORDAR</p>
        <h2>Tradiciones<br>que <em>siguen vivas.</em></h2>
        <p>Las fiestas populares llenan las calles de música, flores, relatos y comunidad. Cada celebración es una forma de reconocernos y compartir lo que somos.</p>
        <a class="text-link" href="#cierre">Una cultura que se comparte <span aria-hidden="true">↗</span></a>
      </div>
      <div class="festival-list">
        <article class="festival"><span class="festival-date">FEB<br><b>—</b><br>MAR</span><div><p>ATLÁNTICO</p><h3>Carnaval de Barranquilla</h3><span>Patrimonio cultural inmaterial · UNESCO</span></div><span class="festival-arrow" aria-hidden="true">↗</span></article>
        <article class="festival"><span class="festival-date">AGO<br><b>—</b><br>AGO</span><div><p>ANTIOQUIA</p><h3>Feria de las Flores</h3><span>La tradición silletera florece en Medellín</span></div><span class="festival-arrow" aria-hidden="true">↗</span></article>
        <article class="festival"><span class="festival-date">DIC<br><b>—</b><br>DIC</span><div><p>VALLE DEL CAUCA</p><h3>Feria de Cali</h3><span>Salsa, encuentro y fiesta en la ciudad</span></div><span class="festival-arrow" aria-hidden="true">↗</span></article>
      </div>
    </section>

    <section class="memories-section" id="memorias">
      <div class="memories-heading">
        <div>
          <p class="eyebrow">05 — UN MURAL HECHO ENTRE TODOS</p>
          <h2>Tu historia<br>también es <em>Colombia.</em></h2>
        </div>
        <p>¿Qué tradición, celebración o sabor te recuerda a tu tierra? Comparte un recuerdo y descubre las historias de otras personas.</p>
      </div>
      <div class="memories-layout">
        <form class="memory-form" id="memory-form">
          <label for="memory-name">Tu nombre</label>
          <input id="memory-name" name="name" type="text" maxlength="60" autocomplete="name" placeholder="¿Cómo te llamas?" required>

          <label for="memory-region">Región que llevas contigo</label>
          <select id="memory-region" name="region" required>
            <option value="" selected disabled>Elige una región</option>
            <option value="Andina">Andina</option>
            <option value="Caribe">Caribe</option>
            <option value="Pacífica">Pacífica</option>
            <option value="Orinoquía">Orinoquía</option>
            <option value="Amazonía">Amazonía</option>
            <option value="Insular">Insular</option>
          </select>

          <label for="memory-text">Tu recuerdo cultural</label>
          <textarea id="memory-text" name="memory" maxlength="500" rows="4" placeholder="Una tradición, una canción, un plato o una historia..." required></textarea>
          <span class="memory-hint">Entre 10 y 500 caracteres.</span>

          <label class="memory-consent">
            <input name="consent" type="checkbox" required>
            <span>Entiendo que mi nombre y recuerdo serán visibles públicamente en esta página.</span>
          </label>
          <button class="button button-dark memory-submit" type="submit">Compartir mi recuerdo <span aria-hidden="true">↗</span></button>
          <p class="memory-status" id="memory-status" role="status" aria-live="polite"></p>
        </form>

        <div class="memories-wall">
          <div class="memories-wall-heading">
            <h3>Voces de nuestra tierra</h3>
            <span>RECUERDOS RECIENTES</span>
          </div>
          <div class="memory-list" id="memory-list" aria-live="polite">
            <p class="memory-empty">Cargando recuerdos...</p>
          </div>
        </div>
      </div>
      <p class="memories-privacy">Los recuerdos se almacenan en la base de datos del proyecto. No incluyas datos personales sensibles.</p>
    </section>

    <section class="closing-section" id="cierre">
      <div class="closing-sun"></div>
      <p class="eyebrow">UN PAÍS QUE SE CUENTA ENTRE TODOS</p>
      <h2>La cultura vive<br>en <em>quien la comparte.</em></h2>
      <p>Escuchar, aprender, cuidar y celebrar. El viaje por Colombia apenas comienza.</p>
      <a class="button button-light" href="#inicio">Volver al inicio <span aria-hidden="true">↑</span></a>
      <span class="closing-coordinates">4° 35′ 56″ N&nbsp; · &nbsp;74° 04′ 51″ O</span>
    </section>
  </main>

  <footer class="site-footer">
    <a class="brand" href="#inicio"><span class="brand-mark" aria-hidden="true"><i></i><i></i><i></i></span><span>COLOMBIA<span class="brand-light"> EN PLURAL</span></span></a>
    <p>Un recorrido cultural por la diversidad colombiana.</p>
    <span>Hecho con cariño y curiosidad <span class="footer-heart" aria-hidden="true">♥</span></span>
    <small>Contenido educativo. Las tradiciones y cocinas varían entre comunidades y territorios.</small>
  </footer>
</body>
</html>
