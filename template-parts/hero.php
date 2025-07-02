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

.hero__badge {
  background: var(--clr-accent);
  color: #fff;
  padding: 0.5rem 1rem;
  border-radius: 20px;
  font-size: 0.9rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  display: inline-block;
  width: fit-content;
  margin-bottom: 0.5rem;
}

.hero__title {
  margin: 0;
  font-size: clamp(1.8rem, 4vw, 2.6rem);
  font-weight: 900;
  line-height: 1.15;
  /* Dodane właściwości zapobiegające ucięciu tekstu */
  word-wrap: break-word;
  overflow-wrap: break-word;
  hyphens: auto;
  width: 100%;
}

.hero__highlight {
  color: var(--clr-accent);
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
  padding: 0.9em 1.8em;
  border-radius: 8px;
  font-weight: 600;
  font-size: 0.95rem;
  text-decoration: none;
  box-shadow: 0 3px 12px rgba(33, 115, 70, 0.25);
  display: inline-block;
  transition: all 0.3s ease;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  width: fit-content;
}
.btn:hover {
  background: #145233;
  color: #fff;
  transform: translateY(-2px);
  box-shadow: 0 5px 16px rgba(33, 115, 70, 0.35);
}

/* Ukryj łamanie linii dla większych ekranów */
.mobile-break {
  display: none;
}

/* responsywność: obraz nad tekstem poniżej 1200px */
@media (max-width: 1200px) {
  .hero {
    flex-direction: column;
    text-align: center;
  }
  .hero__img {
    min-width: auto;
    height: 300px;
  }
  .hero__img::after {
    display: none; /* Usuń gradient przy layout kolumnowym */
  }
  .hero__content {
    max-width: none;
    padding: 2rem;
    align-items: center;
    text-align: center;
  }
  .hero__badge,
  .hero__title,
  .hero__desc,
  .btn {
    margin-left: auto;
    margin-right: auto;
  }
}

@media (max-width: 768px) {
  .hero__img {
    height: 260px;
  }
  .hero__content {
    padding: 1.5rem;
  }
  .hero__title {
    font-size: clamp(1.5rem, 3vw, 2rem);
  }
}

/* Dodatkowe media query dla najmniejszych ekranów */
@media (max-width: 480px) {
  .hero__title {
    font-size: 1.4rem;
    line-height: 1.3;
  }
  .hero__desc {
    font-size: 0.95rem;
  }
  .hero__content {
    padding: 1.2rem 1rem;
  }
  .btn {
    padding: 0.7em 1.4em;
    font-size: 0.85rem;
  }
  /* Pokaż łamanie linii na małych ekranach */
  .mobile-break {
    display: inline;
  }
}
</style>

<section id="hero" class="hero">
  <div class="hero__img">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/moving_out.png' ); ?>"
         alt="moving out family">
  </div>

  <div class="hero__content">
    <div class="hero__badge">#1 FIRMA PRZEPROWADZKOWA</div>
    
    <h1 class="hero__title">
      <span class="hero__highlight">MOVERO</span><br>
      TWOJA ZAUFANA<br class="mobile-break"> FIRMA PRZEPROWADZKOWA
    </h1>

    <p class="hero__desc">
      Szybkie, bezpieczne i profesjonalne przeprowadzki w całej Polsce. 
      Ponad 500 zadowolonych klientów rocznie. 
      Zadzwoń na <strong>+48 123 456 789</strong>
    </p>

    <a href="#kontakt" class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg> SKONTAKTUJ SIĘ</a>
  </div>
</section>
