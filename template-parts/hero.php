<?php
/**
 *  template-parts/hero.php
 *  Hero z pełnym obrazem zaokrąglonym do kontenera
 *  @package twoj-motyw
 */
?>

<style>
:root {
  --bg-hero: #f4f5f7;
  --clr-primary: #184634;
  --clr-accent: #217346;
}
.hero {
  display: flex;
  align-items: stretch;
  background: var(--bg-hero);
  border-radius: 0 0 24px 24px;
  overflow: hidden;
  min-height: 500px;
  margin: 0 auto 2rem;
  max-width: 1600px;
  /* usuń padding, obrazek ma dotykać krawędzi */
  padding: 0;
}

.hero__img {
  flex: 1;
  /* to pozwala schować nadmiar, bez zbędnej bieli */
  min-width: 0;
  position: relative;
}

.hero__img::after {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  width: 150px;
  height: 100%;
  background: linear-gradient(to right, transparent, var(--bg-hero));
  pointer-events: none;
}

.hero__img img {
  display: block;       /* usuwa domyślny inline-gap */
  width: 100%;
  height: 100%;
  object-fit: cover;
  /* zaokrąglamy lewy dolny róg zgodnie z hero */
  border-radius: 0 0 0 24px;
}

/* kolumna tekstowa bez zmian */
.hero__content {
  flex: 1;
  max-width: 600px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 3rem 2rem;
  gap: 1.2rem;
  color: var(--clr-primary);
}
.hero__title {
  margin: 0;
  font-size: clamp(1.8rem, 4vw, 2.6rem);
  font-weight: 900;
  line-height: 1.15;
}
.hero__desc {
  margin: 0;
  font-size: 1.1rem;
  color: #333;
  max-width: 420px;
}
.btn {
  background: var(--clr-accent);
  color: #fff;
  padding: 1em 2.4em;
  border-radius: 6px;
  font-weight: 700;
  text-decoration: none;
  box-shadow: 0 2px 8px rgba(0, 0, 0, .07);
  display: inline-block;
  transition: opacity .2s;
}
.btn:hover {
  opacity: .9;
}

/* responsywność: obraz nad tekstem poniżej 768px */
@media (max-width: 768px) {
  .hero {
    flex-direction: column;
  }
  .hero__img {
    min-width: auto;
    height: 260px;
  }
  .hero__content {
    max-width: none;
    padding: 2rem;
  }
}
</style>

<section id="home" class="hero">
  <div class="hero__img">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/moving_out.png' ); ?>"
         alt="moving out family">
  </div>

  <div class="hero__content">
    <h1 class="hero__title">
      TWOJA ZAUFANA<br>
      FIRMA&nbsp;PRZEPROWADZKOWA
    </h1>

    <p class="hero__desc">
      Oferujemy niezawodne i sprawne usługi przeprowadzkowe dla domu i&nbsp;firmy.
    </p>

    <a href="#contact" class="btn">UZYSKAJ&nbsp;WYCENĘ</a>
  </div>
</section>
