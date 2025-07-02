<section id="kontakt" class="contact-section">
	<div class="contact-container">
		<h2>SKONTAKTUJ SIĘ Z NAMI</h2>
		<div class="contact-info">
			<div class="contact-item">
				<span class="contact-icon">
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<path d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z"/>
					</svg>
				</span>
				<div class="contact-details">
					<h4>Telefon</h4>
					<a href="tel:+48123456789">+48 123 456 789</a>
					<p style="margin: 0.5rem 0 0 0; font-size: 0.9rem; opacity: 0.8;">Pon-Pt: 8:00-18:00, Sob: 9:00-15:00</p>
				</div>
			</div>
			<div class="contact-item">
				<span class="contact-icon">
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22S19,14.25 19,9A7,7 0 0,0 12,2Z"/>
					</svg>
				</span>
				<div class="contact-details">
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
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="MOVERO logo">
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
