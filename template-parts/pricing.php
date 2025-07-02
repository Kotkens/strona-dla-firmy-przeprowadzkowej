<?php
/**
 * Pricing Section - Sekcja z ofertami cenowymi
 * @package krystian_k
 */
?>

<style>
.pricing-section {
  background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
  padding: 5rem 0;
  position: relative;
}

.pricing-container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 2rem;
  text-align: center;
}

.pricing-title {
  font-size: 2.5rem;
  font-weight: 900;
  color: #1a3c34;
  margin: 0 0 1rem 0;
  text-transform: uppercase;
  letter-spacing: 1px;
}

.pricing-subtitle {
  font-size: 1.1rem;
  color: #666;
  margin: 0 auto 4rem auto;
  max-width: 600px;
  line-height: 1.6;
}

.pricing-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
  gap: 2rem;
  margin-bottom: 3rem;
}

.pricing-card {
  background: #fff;
  border-radius: 16px;
  padding: 2.5rem 2rem 2rem 2rem;
  box-shadow: 0 4px 25px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
  position: relative;
  border: 3px solid transparent;
  display: flex;
  flex-direction: column;
}

.pricing-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 8px 40px rgba(0, 0, 0, 0.15);
}

.pricing-card.featured {
  border-color: #217346;
  transform: scale(1.05);
}

.pricing-card.featured::before {
  content: "NAJPOPULARNIEJSZY";
  position: absolute;
  top: -15px;
  left: 50%;
  transform: translateX(-50%);
  background: #217346;
  color: #fff;
  padding: 8px 20px;
  border-radius: 20px;
  font-size: 12px;
  font-weight: 700;
  letter-spacing: 1px;
}

.pricing-icon {
  width: 80px;
  height: 80px;
  margin: 0 auto 1.5rem;
  background: linear-gradient(135deg, #217346, #145233);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2rem;
}

.pricing-name {
  font-size: 1.4rem;
  font-weight: 700;
  color: #1a3c34;
  margin: 0 0 1rem 0;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.pricing-price {
  font-size: 3rem;
  font-weight: 900;
  color: #217346;
  margin: 0 0 0.5rem 0;
  line-height: 1;
}

.pricing-period {
  font-size: 1rem;
  color: #666;
  margin: 0 0 2rem 0;
}

.pricing-description {
  font-size: 1rem;
  color: #666;
  margin: 0 0 2rem 0;
  line-height: 1.6;
  min-height: 60px;
}

.pricing-features {
  list-style: none;
  padding: 0;
  margin: 0 0 2rem 0;
  flex-grow: 1;
}

.pricing-features li {
  padding: 0.75rem 0;
  border-bottom: 1px solid #f0f0f0;
  display: flex;
  align-items: center;
  font-size: 0.95rem;
  color: #555;
}

.pricing-features li:last-child {
  border-bottom: none;
}

.pricing-features li::before {
  content: "✓";
  color: #217346;
  font-weight: bold;
  margin-right: 12px;
  font-size: 1.1rem;
}

.pricing-button {
  background: #217346;
  color: #fff;
  padding: 1rem 1.5rem;
  border: none;
  border-radius: 50px;
  font-size: 1rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  cursor: pointer;
  transition: all 0.3s ease;
  text-decoration: none;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  margin-top: auto;
  box-sizing: border-box;
}

.pricing-button:hover {
  background: #145233;
  transform: translateY(-2px);
  box-shadow: 0 4px 15px rgba(33, 115, 70, 0.3);
  color: #fff;
}

.pricing-card.featured .pricing-button {
  background: linear-gradient(135deg, #217346, #145233);
  box-shadow: 0 4px 15px rgba(33, 115, 70, 0.2);
}

/* Responsive */
@media (max-width: 768px) {
  .pricing-grid {
    grid-template-columns: 1fr;
    gap: 1.5rem;
  }
  
  .pricing-card.featured {
    transform: none;
  }
  
  .pricing-title {
    font-size: 2rem;
  }
  
  .pricing-price {
    font-size: 2.5rem;
  }
}
</style>

<section id="oferta" class="pricing-section">
  <div class="pricing-container">
    <h2 class="pricing-title">NASZE OFERTY</h2>
    <p class="pricing-subtitle">Wybierz pakiet dostosowany do Twoich potrzeb. Wszystkie ceny są orientacyjne i mogą się różnić w zależności od odległości i ilości rzeczy.</p>
    
    <div class="pricing-grid">
      <?php
      $pricing_plans = mytheme_get_pricing_plans();
      
      foreach ($pricing_plans as $plan) :
      ?>
      <div class="pricing-card <?php echo $plan['featured'] ? 'featured' : ''; ?>">
        <div class="pricing-icon">
          <?php echo $plan['icon']; ?>
        </div>
        <h3 class="pricing-name"><?php echo esc_html($plan['name']); ?></h3>
        <div class="pricing-price"><?php echo esc_html($plan['price']); ?>zł</div>
        <div class="pricing-period"><?php echo esc_html($plan['period']); ?></div>
        <p class="pricing-description"><?php echo esc_html($plan['description']); ?></p>
        
        <ul class="pricing-features">
          <?php foreach ($plan['features'] as $feature) : ?>
            <li><?php echo esc_html($feature); ?></li>
          <?php endforeach; ?>
        </ul>
        
        <a href="#kontakt" class="pricing-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 8px; vertical-align: middle;">
            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
          </svg>
          Skontaktuj się
        </a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
