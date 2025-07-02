<?php
/**
 * Template part for displaying about section with Poland map
 */

// Cities data with real coordinates for Google Maps
$cities = array(
    array(
        'name' => 'Gdańsk',
        'lat' => 54.3520,
        'lng' => 18.6466,
        'info' => 'Obsługujemy Gdańsk i okolice. Kompleksowe przeprowadzki mieszkaniowe i biurowe.'
    ),
    array(
        'name' => 'Gdynia',
        'lat' => 54.5189,
        'lng' => 18.5305,
        'info' => 'Przeprowadzki w Gdyni - szybko, bezpiecznie i profesjonalnie.'
    ),
    array(
        'name' => 'Sopot',
        'lat' => 54.4418,
        'lng' => 18.5601,
        'info' => 'Ekskluzywne przeprowadzki w Sopocie z pełną ochroną mienia.'
    ),
    array(
        'name' => 'Warszawa',
        'lat' => 52.2297,
        'lng' => 21.0122,
        'info' => 'Stolica - największy obszar naszej działalności. Przeprowadzki 7 dni w tygodniu.'
    ),
    array(
        'name' => 'Wrocław',
        'lat' => 51.1079,
        'lng' => 17.0385,
        'info' => 'Przeprowadzki we Wrocławiu i na Dolnym Śląsku.'
    )
);

// Allow filtering of cities
$cities = apply_filters('movero_map_cities', $cities);
?>

<section id="o-nas" class="about-section">
    <div class="about-container">
        <div class="about-content">
            <div class="about-text">
                <h2>O firmie MOVERO</h2>
                <p class="about-description">
                    Działamy od ponad 10 lat na rynku przeprowadzkowym, budując zaufanie klientów 
                    dzięki rzetelności i terminowości. Nasz zespół składa się z doświadczonych 
                    specjalistów, którzy zadbają o bezpieczeństwo Twojego mienia podczas każdej przeprowadzki.
                </p>
                <div class="about-stats">
                    <div class="stat-item">
                        <span class="stat-number">500+</span>
                        <span class="stat-label">Przeprowadzek rocznie</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">5</span>
                        <span class="stat-label">Miast obsługi</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">10+</span>
                        <span class="stat-label">Lat doświadczenia</span>
                    </div>
                </div>
            </div>
            
            <div class="about-map">
                <h3>Obszar naszej działalności</h3>
                <div class="map-container">
                    <!-- Google Maps Container -->
                    <div id="google-map" class="google-map"></div>
                    
                    <!-- Loading placeholder -->
                    <div id="map-loading" class="map-loading">
                        <div class="loading-spinner"></div>
                        <p>Ładowanie mapy...</p>
                    </div>
                    
                    <!-- Map fallback for when maps don't load -->
                    <div id="map-fallback" class="map-fallback" style="display: none;">
                        <h4>Obsługujemy następujące miasta:</h4>
                        <div class="cities-grid">
                            <?php foreach ($cities as $city): ?>
                                <div class="city-card">
                                    <h5><?php echo esc_html($city['name']); ?></h5>
                                    <p><?php echo esc_html($city['info']); ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <!-- Cities data for JavaScript -->
                    <script type="application/json" id="cities-data">
                        <?php echo wp_json_encode($cities); ?>
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Clearfix i separator między sekcjami -->
<div class="section-separator" style="clear: both; height: 0; overflow: hidden; width: 100%; margin: 0; padding: 0; border: none; line-height: 0;"></div>
