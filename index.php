<?php get_header(); ?>

<main class="site-main">

	<?php
		// Sekcje hero, services, image section, pricing, about na stronie głównej
		if ( is_front_page() ) {
			get_template_part( 'template-parts/hero' );
			get_template_part( 'template-parts/services' );
			get_template_part( 'template-parts/image-section' );
			get_template_part( 'template-parts/pricing' );
			get_template_part( 'template-parts/about' );
		} else {
			// domyślna pętla (fallback dla wpisów/stron - tylko gdy NIE jesteśmy na stronie głównej)
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content/content' );
				endwhile;
			else :
				echo '<p>Brak treści do wyświetlenia.</p>';
			endif;
		}
	?>

</main>

<?php get_footer(); ?>
