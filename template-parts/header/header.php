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
			<ul class="main-menu">
				<li><a href="#hero">Strona Główna</a></li>
				<li><a href="#services">Usługi</a></li>
				<li><a href="#oferta">Oferta</a></li>
				<li><a href="#o-nas">O Nas</a></li>
				<li><a href="#kontakt">Kontakt</a></li>
				<li class="phone-number">
					<a href="tel:+48123456789">
						<span class="phone-icon">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z" fill="currentColor"/>
							</svg>
						</span>
						+48 123 456 789
					</a>
				</li>
			</ul>
		</nav>
		
		<div class="mobile-menu-toggle">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
</header>
