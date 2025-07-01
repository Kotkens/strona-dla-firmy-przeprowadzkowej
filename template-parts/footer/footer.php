<section id="contact" class="contact-section">
	<div class="contact-container">
		<h2>SKONTAKTUJ SIĘ Z NAMI</h2>
		<div class="contact-info">
			<div class="contact-item">
				<span class="contact-icon">📞</span>
				<div>
					<h4>Telefon</h4>
					<a href="tel:+48123456789">+48 123 456 789</a>
					<p style="margin: 0.5rem 0 0 0; font-size: 0.9rem; opacity: 0.8;">Pon-Pt: 8:00-18:00, Sob: 9:00-15:00</p>
				</div>
			</div>
			<div class="contact-item">
				<span class="contact-icon">📍</span>
				<div>
					<h4>Adres</h4>
					<p>ul. Przykładowa 123<br>00-000 Warszawa</p>
				</div>
			</div>
		</div>
	</div>
</section>

<footer class="site-footer">
	<div class="footer-container">
		<div class="footer-logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="MOVERO logo" style="height:60px; width:auto; display:block;">
			</a>
		</div>
		<div class="footer-credit">
			<p>Wykonanie: <a href="https://develoart.com" target="_blank" rel="noopener">develoart.com</a></p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>  <!-- skrypty z kolejki + wtyczki -->
</body>
</html>
