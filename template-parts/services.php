<section id="services" class="services-section">
  <h2 class="services-title">NASZE USŁUGI</h2>
  <p class="services-desc">Oferujemy szeroki zakres usług przeprowadzkowych dopasowanych do Twoich potrzeb.</p>
  <div class="services-list-container">
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
      <div class="service-content">
        <div class="service-label"><?php echo esc_html($service['title']); ?></div>
        <div class="service-desc"><?php echo esc_html($service['description']); ?></div>
      </div>
    </div>
    <?php endforeach; ?>
    </div>
  </div>
</section>
