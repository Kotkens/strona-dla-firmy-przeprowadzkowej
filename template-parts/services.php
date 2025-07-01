<style>
.services-section {
  max-width: 1600px;
  margin: 0 auto;
  padding: 4rem 0;
  background: #fff;
  text-align: center;
}

.services-title {
  font-size: clamp(1.8rem, 4vw, 2.5rem);
  font-weight: 900;
  color: #184634;
  margin: 0 0 1rem 0;
  text-transform: uppercase;
  letter-spacing: 1px;
}

.services-desc {
  font-size: 1.1rem;
  color: #666;
  margin: 0 auto 3rem auto;
  max-width: 600px;
  line-height: 1.6;
}

.services-list {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 2rem;
  max-width: 1600px;
  margin: 0 auto;
  padding: 0 2rem;
}

.service-item {
  background: #f8f9fa;
  border-radius: 12px;
  padding: 2rem 1.5rem;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  border: 1px solid #e9ecef;
}

.service-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.service-icon {
  margin-bottom: 1rem;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 80px;
}

.service-icon svg {
  width: 48px;
  height: 48px;
  transition: transform 0.3s ease;
}

.service-item:hover .service-icon svg {
  transform: scale(1.1);
}

.service-label {
  font-size: 1.1rem;
  font-weight: 700;
  color: #184634;
  margin-bottom: 0.5rem;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.service-desc {
  font-size: 0.95rem;
  color: #666;
  line-height: 1.5;
  margin: 0;
}

@media (max-width: 768px) {
  .services-section {
    padding: 3rem 0;
  }
  
  .services-list {
    grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem;
    padding: 0 1rem;
  }
  
  .service-item {
    padding: 1.5rem 1rem;
  }
}

@media (max-width: 480px) {
  .services-list {
    grid-template-columns: 1fr;
    gap: 1rem;
    padding: 0 1rem;
  }
}
</style>

<section id="services" class="services-section">
  <h2 class="services-title">NASZE USŁUGI</h2>
  <p class="services-desc">Oferujemy szeroki zakres usług przeprowadzkowych dopasowanych do Twoich potrzeb.</p>
  <div class="services-list">
    <?php
    // Pobieranie usług z funkcji - łatwe dodawanie przez filtry
    $services = mytheme_get_services();

    foreach ($services as $service) :
    ?>
    <div class="service-item">
      <div class="service-icon">
        <?php echo mytheme_get_service_icon($service['icon']); ?>
      </div>
      <div class="service-label"><?php echo esc_html($service['title']); ?></div>
      <div class="service-desc"><?php echo esc_html($service['description']); ?></div>
    </div>
    <?php endforeach; ?>
  </div>
</section>
