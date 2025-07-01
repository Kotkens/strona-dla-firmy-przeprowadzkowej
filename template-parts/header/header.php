<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?> <!-- WordPress wstrzyknie tu style i skrypty -->
</head>
<body <?php body_class(); ?>>

<header class="site-header">
	<div class="header-container">
		<div class="logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="MOVERO logo" style="height:75px; width:auto; display:block;">
			</a>
		</div>
		
		<nav class="main-navigation">
			<?php
			wp_nav_menu( [
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'main-menu',
				'fallback_cb'    => 'mytheme_fallback_menu',
			] );
			?>
		</nav>
		
		<div class="mobile-menu-toggle">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
</header>
