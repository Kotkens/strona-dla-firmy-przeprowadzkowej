<?php
/**
 * Image Section - Galeria obrazów/portfolio
 * @package krystian_k
 */
?>

<style>
.image-section {
  background: #f8f9fa;
  padding: 4rem 0;
  position: relative;
}

.image-section-container {
  max-width: 1400px;
  margin: 0 auto;
  padding: 0 2rem;
  text-align: center;
}

.image-section-title {
  font-size: 2.5rem;
  font-weight: 900;
  color: #1a3c34;
  margin: 0 0 1rem 0;
  text-transform: uppercase;
  letter-spacing: 1px;
}

.image-section-desc {
  font-size: 1.1rem;
  color: #666;
  margin: 0 auto 3rem auto;
  max-width: 600px;
  line-height: 1.6;
}

.image-gallery {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 2rem;
  margin-bottom: 3rem;
}

.gallery-item {
  position: relative;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  background: #fff;
}

.gallery-item:hover {
  transform: translateY(-10px);
  box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
}

.gallery-item img {
  width: 100%;
  height: 250px;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.gallery-item:hover img {
  transform: scale(1.05);
}

.gallery-overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background: linear-gradient(transparent, rgba(26, 60, 52, 0.9));
  color: #fff;
  padding: 2rem 1.5rem 1.5rem;
  transform: translateY(100%);
  transition: transform 0.3s ease;
}

.gallery-item:hover .gallery-overlay {
  transform: translateY(0);
}

.gallery-overlay h4 {
  margin: 0 0 0.5rem 0;
  font-size: 1.2rem;
  font-weight: 700;
}

.gallery-overlay p {
  margin: 0;
  font-size: 0.9rem;
  opacity: 0.9;
  line-height: 1.4;
}

.image-section-cta {
  background: #217346;
  color: #fff;
  padding: 1rem 2rem;
  border: none;
  border-radius: 50px;
  font-size: 1rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  cursor: pointer;
  transition: all 0.3s ease;
  text-decoration: none;
  display: inline-block;
}

.image-section-cta:hover {
  background: #145233;
  transform: translateY(-2px);
  box-shadow: 0 4px 15px rgba(33, 115, 70, 0.3);
  color: #fff;
}

/* Responsive */
@media (max-width: 768px) {
  .image-gallery {
    grid-template-columns: 1fr;
    gap: 1.5rem;
  }
  
  .gallery-overlay {
    transform: translateY(0);
    background: rgba(26, 60, 52, 0.8);
  }
  
  .image-section-title {
    font-size: 2rem;
  }
}
</style>

<section class="image-section">
  <div class="image-section-container">
    <h2 class="image-section-title">NASZE REALIZACJE</h2>
    <p class="image-section-desc">Zobacz, jak profesjonalnie przeprowadzamy nasze usługi. Każda przeprowadzka to dla nas wyzwanie, które wykonujemy z najwyższą starannością.</p>
    
    <div class="image-gallery">
      <?php
      // Elastyczna galeria obrazów
      $gallery_items = mytheme_get_gallery_items();
      
      foreach ($gallery_items as $item) :
      ?>
      <div class="gallery-item">
        <img src="<?php echo esc_url(mytheme_get_gallery_image($item['image'])); ?>" alt="<?php echo esc_attr($item['title']); ?>">
        <div class="gallery-overlay">
          <h4><?php echo esc_html($item['title']); ?></h4>
          <p><?php echo esc_html($item['description']); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    
    <a href="#contact" class="image-section-cta">Zobacz więcej realizacji</a>
  </div>
</section>
