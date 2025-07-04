<?php
/**
 *  Plik funkcji motywu – ładuje się przy KAŻDYM żądaniu front-endu i zaplecza.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;               // zabezpieczenie przed bezpośrednim wywołaniem pliku
}

/**
 *  after_setup_theme  → WordPress wywołuje ten hook bardzo wcześnie,
 *  gdy tylko załaduje pliki motywu. Tu rejestrujemy wsparcie dla funkcji.
 */
add_action( 'after_setup_theme', 'mytheme_setup' );
function mytheme_setup() {

	// ① Automatyczny <title> w <head>
	add_theme_support( 'title-tag' );

	// ② Obrazki wyróżniające dla wpisów i stron
	add_theme_support( 'post-thumbnails' );

	// ③ Logo konfigurowane w „Dostosuj → Tożsamość witryny”
	add_theme_support( 'custom-logo', [
		'height'      => 80,
		'width'       => 200,
		'flex-width'  => true,
		'flex-height' => true,
	] );

	// ④ Dwie lokalizacje menu, które zobaczysz w panelu
	register_nav_menus( [
		'primary' => __( 'Menu główne',  'mytheme' ),
		'footer'  => __( 'Menu w stopce', 'mytheme' ),
	] );
	
	// ⑤ Wsparcie dla ikon witryny (favicon)
	add_theme_support( 'site-icon' );
}

/**
 *  wp_enqueue_scripts  → tu kolejkujemy CSS/JS.
 *  filemtime() doda numer wersji = koniec problemów z cache podczas pracy lokalnej.
 */
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue' );
function mytheme_enqueue() {
	wp_enqueue_style(
		'mytheme-main',
		get_template_directory_uri() . '/assets/css/main.css',
		[],
		filemtime( get_template_directory() . '/assets/css/main.css' )
	);
	
	wp_enqueue_script(
		'mytheme-main',
		get_template_directory_uri() . '/assets/js/main.js',
		[],
		filemtime( get_template_directory() . '/assets/js/main.js' ),
		true
	);
}

/**
 * Fallback menu gdy nie ma utworzonego menu w panelu administracyjnym
 */
function mytheme_fallback_menu() {
	echo '<ul class="main-menu">';
	echo '<li><a href="#home">STRONA GŁÓWNA</a></li>';
	echo '<li><a href="#services">USŁUGI</a></li>';
	echo '<li><a href="#pricing">CENNIK</a></li>';
	echo '<li><a href="#about">O NAS</a></li>';
	echo '<li><a href="#contact">KONTAKT</a></li>';
	echo '<li class="phone-number"><a href="tel:+48123456789"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z"/></svg> +48 123 456 789</a></li>';
	echo '</ul>';
}

/**
 * Generuje ikony SVG dla usług w stylu cennika - białe ikony w zielonych kółkach
 */
function mytheme_get_service_icon($icon_name) {
    $icons = [
        'home' => '<svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient id="grad-home" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#217346;stop-opacity:1" />
                            <stop offset="100%" style="stop-color:#145233;stop-opacity:1" />
                        </linearGradient>
                    </defs>
                    <circle cx="40" cy="40" r="40" fill="url(#grad-home)"/>
                    <g transform="translate(40, 40) scale(1.5) translate(-12, -12)">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        <polyline points="9,22 9,12 15,12 15,22" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                  </svg>',
        'truck' => '<svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <defs>
                        <linearGradient id="grad-truck" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#217346;stop-opacity:1" />
                            <stop offset="100%" style="stop-color:#145233;stop-opacity:1" />
                        </linearGradient>
                     </defs>
                     <circle cx="40" cy="40" r="40" fill="url(#grad-truck)"/>
                     <g transform="translate(40, 40) scale(1.5) translate(-12, -12)">
                        <rect x="1" y="3" width="15" height="13" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        <polygon points="16,8 20,8 23,11 23,16 16,16" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="5.5" cy="18.5" r="2.5" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="18.5" cy="18.5" r="2.5" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                     </g>
                   </svg>',
        'box' => '<svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                   <defs>
                      <linearGradient id="grad-box" x1="0%" y1="0%" x2="100%" y2="100%">
                          <stop offset="0%" style="stop-color:#217346;stop-opacity:1" />
                          <stop offset="100%" style="stop-color:#145233;stop-opacity:1" />
                      </linearGradient>
                   </defs>
                   <circle cx="40" cy="40" r="40" fill="url(#grad-box)"/>
                   <g transform="translate(40, 40) scale(1.5) translate(-12, -12)">
                      <path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8z" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="m3.3 7 8.7 5 8.7-5" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M12 22V12" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                   </g>
                 </svg>',
        'warehouse' => '<svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <defs>
                            <linearGradient id="grad-warehouse" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#217346;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#145233;stop-opacity:1" />
                            </linearGradient>
                         </defs>
                         <circle cx="40" cy="40" r="40" fill="url(#grad-warehouse)"/>
                         <g transform="translate(40, 40) scale(1.5) translate(-12, -12)">
                            <path d="M2 20h20" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4 20V10l8-6 8 6v10" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <rect x="8" y="14" width="8" height="6" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                         </g>
                       </svg>',
        'clock' => '<svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <defs>
                        <linearGradient id="grad-clock" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#217346;stop-opacity:1" />
                            <stop offset="100%" style="stop-color:#145233;stop-opacity:1" />
                        </linearGradient>
                     </defs>
                     <circle cx="40" cy="40" r="40" fill="url(#grad-clock)"/>
                     <g transform="translate(40, 40) scale(1.5) translate(-12, -12)">
                        <circle cx="12" cy="12" r="10" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        <polyline points="12,6 12,12 16,14" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                     </g>
                   </svg>',
        'tools' => '<svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <defs>
                        <linearGradient id="grad-tools" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#217346;stop-opacity:1" />
                            <stop offset="100%" style="stop-color:#145233;stop-opacity:1" />
                        </linearGradient>
                     </defs>
                     <circle cx="40" cy="40" r="40" fill="url(#grad-tools)"/>
                     <g transform="translate(40, 40) scale(1.5) translate(-12, -12)">
                        <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                     </g>
                   </svg>',
        'users' => '<svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <defs>
                        <linearGradient id="grad-users" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#217346;stop-opacity:1" />
                            <stop offset="100%" style="stop-color:#145233;stop-opacity:1" />
                        </linearGradient>
                     </defs>
                     <circle cx="40" cy="40" r="40" fill="url(#grad-users)"/>
                     <g transform="translate(40, 40) scale(1.5) translate(-12, -12)">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="9" cy="7" r="4" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                     </g>
                   </svg>',
        'shield' => '<svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <defs>
                         <linearGradient id="grad-shield" x1="0%" y1="0%" x2="100%" y2="100%">
                             <stop offset="0%" style="stop-color:#217346;stop-opacity:1" />
                             <stop offset="100%" style="stop-color:#145233;stop-opacity:1" />
                         </linearGradient>
                      </defs>
                      <circle cx="40" cy="40" r="40" fill="url(#grad-shield)"/>
                      <g transform="translate(40, 40) scale(1.5) translate(-12, -12)">
                         <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                      </g>
                    </svg>'
    ];
    
    return isset($icons[$icon_name]) ? $icons[$icon_name] : $icons['box']; // fallback to box icon
}

/**
 * Funkcja pomocnicza do dodawania nowych usług
 * Można użyć w panelu administracyjnym lub Custom Fields
 */
function mytheme_get_services() {
    // Domyślne usługi - można łatwo dodawać nowe przez filtr 'mytheme_services_list'
    $default_services = [
        [
            'title' => 'PRZEPROWADZKI LOKALNE',
            'description' => 'Przeprowadzki lokalne i mieszkaniowe w obrębie miasta',
            'icon' => 'home'
        ],
        [
            'title' => 'TRANSPORT DALEKI', 
            'description' => 'Przeprowadzki do innego miasta lub województwa',
            'icon' => 'truck'
        ],
        [
            'title' => 'USŁUGI PAKOWANIA',
            'description' => 'Profesjonalne pakowanie Twoich rzeczy w materiały ochronne',
            'icon' => 'box'
        ],
        [
            'title' => 'PRZECHOWYWANIE',
            'description' => 'Bezpieczne i elastyczne opcje przechowywania w magazynach',
            'icon' => 'warehouse'
        ],
        [
            'title' => 'MONTAŻ MEBLI',
            'description' => 'Demontaż i montaż mebli podczas przeprowadzki',
            'icon' => 'tools'
        ],
        [
            'title' => 'EXPRESS 24H',
            'description' => 'Pilne przeprowadzki w trybie express do 24 godzin',
            'icon' => 'clock'
        ]
    ];
    
    // Umożliwia dodawanie/modyfikowanie usług przez wtyczki lub funkcje motywu
    return apply_filters('mytheme_services_list', $default_services);
}

/**
 * Funkcja pomocnicza do dodawania nowych usług programowo
 * Przykład użycia: mytheme_add_service('NOWA USŁUGA', 'Opis usługi', 'shield');
 */
function mytheme_add_service($title, $description, $icon = 'box') {
    add_filter('mytheme_services_list', function($services) use ($title, $description, $icon) {
        $services[] = [
            'title' => $title,
            'description' => $description,
            'icon' => $icon
        ];
        return $services;
    });
}

/**
 * Zarządzanie elementami galerii w image section
 */
function mytheme_get_gallery_items() {
    $gallery_items = [
        [
            'title' => 'Przeprowadzka mieszkania',
            'description' => 'Kompleksowa przeprowadzka rodziny z 3-pokojowego mieszkania',
            'image' => 'przeprowadzka mieszkaniowa.jpg'
        ],
        [
            'title' => 'Transport mebli',
            'description' => 'Bezpieczny transport dużych mebli i sprzętu AGD',
            'image' => 'transport mebli.jpg'
        ],
        [
            'title' => 'Przeprowadzka biura',
            'description' => 'Profesjonalna przeprowadzka biura z minimalnymi przestojami',
            'image' => 'przeprowadzka biura.png'
        ],
        [
            'title' => 'Pakowanie rzeczy',
            'description' => 'Staranne pakowanie cennych przedmiotów i dokumentów',
            'image' => 'pakowanie rzeczy.png'
        ],
        [
            'title' => 'Magazynowanie',
            'description' => 'Tymczasowe przechowywanie rzeczy w bezpiecznym magazynie',
            'image' => 'Magazynowanie.png'
        ],
        [
            'title' => 'Przeprowadzka domu',
            'description' => 'Kompleksowa przeprowadzka całego domu jednorodzinnego',
            'image' => 'przeprowadzka domu.png'
        ]
    ];
    
    return apply_filters('mytheme_gallery_items', $gallery_items);
}

/**
 * Fallback dla brakujących obrazów galerii
 */
function mytheme_gallery_fallback_image() {
    // Używamy istniejący obraz moving_out.png jako fallback
    return get_template_directory_uri() . '/assets/images/moving_out.png';
}

/**
 * Sprawdza czy obraz istnieje, jeśli nie - zwraca fallback
 */
function mytheme_get_gallery_image($image_path) {
    // Jeśli to już pełny URL, zwróć go
    if (strpos($image_path, 'http') === 0) {
        return $image_path;
    }
    
    // W przeciwnym razie, po prostu zwróć URL do lokalnego pliku
    // WordPress automatycznie obsłuży 404 dla nieistniejących plików
    return get_template_directory_uri() . '/assets/images/image_section/' . $image_path;
}

/**
 * Zarządzanie planami cenowymi
 */
function mytheme_get_pricing_plans() {
    $pricing_plans = [
        [
            'name' => 'BASIC',
            'price' => '299',
            'period' => 'za usługę',
            'description' => 'Wynajem samochodu z kierowcą. Idealne gdy sam pakujesz swoje rzeczy.',
            'icon' => '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16,8 20,8 23,11 23,16 16,16"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>',
            'featured' => false,
            'features' => [
                'Samochód dostawczy do 3,5t',
                'Profesjonalny kierowca',
                'Ubezpieczenie transportu',
                'Do 50km w obrębie miasta',
                'Czas pracy do 4 godzin',
                'Paliwo wliczone w cenę'
            ]
        ],
        [
            'name' => 'STANDARD',
            'price' => '449', 
            'period' => 'za usługę',
            'description' => 'Wynajem samochodu z tragarzem. Gdy potrzebujesz pomocy przy noszeniu.',
            'icon' => '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8z"></path><path d="m3.3 7 8.7 5 8.7-5"></path><path d="M12 22V12"></path><path d="M12 12L3.3 7"></path><path d="M20.7 7L12 12"></path></svg>',
            'featured' => true,
            'features' => [
                'Samochód dostawczy do 3,5t',
                'Kierowca + 1 tragarz',
                'Pomoc przy załadunku/wyładunku',
                'Ubezpieczenie transportu',
                'Do 50km w obrębie miasta',
                'Czas pracy do 6 godzin',
                'Podstawowe materiały opakowaniowe'
            ]
        ],
        [
            'name' => 'PREMIUM',
            'price' => '649',
            'period' => 'za usługę', 
            'description' => 'Pełna obsługa z dwoma tragarzami. My zapakujemy Twoje rzeczy.',
            'icon' => '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12,2 15.09,8.26 22,9.27 17,14.14 18.18,21.02 12,17.77 5.82,21.02 7,14.14 2,9.27 8.91,8.26"></polygon></svg>',
            'featured' => false,
            'features' => [
                'Samochód dostawczy do 3,5t',
                'Kierowca + 2 tragarze',
                'Pakowanie wszystkich rzeczy',
                'Demontaż/montaż mebli',
                'Profesjonalne materiały opakowaniowe',
                'Ubezpieczenie na pełną wartość',
                'Do 100km zasięg',
                'Czas pracy do 8 godzin'
            ]
        ]
    ];
    
    return apply_filters('mytheme_pricing_plans', $pricing_plans);
}

/**
 * Dodatkowe opcje cenowe - można rozszerzyć
 */
function mytheme_get_additional_services() {
    return [
        'Dodatkowy kilometr' => '2zł',
        'Dodatkowa godzina pracy' => '80zł', 
        'Demontaż/montaż mebli' => '150zł',
        'Pakowanie delikatnych przedmiotów' => '50zł',
        'Transport fortepianu' => '300zł',
        'Praca w weekend' => '+50zł'
    ];
}

/**
 * PRZYKŁAD UŻYCIA ELASTYCZNEJ SEKCJI USŁUG:
 * 
 * 1. Dodanie nowej usługi programowo:
 *    mytheme_add_service('UBEZPIECZENIE PREMIUM', 'Dodatkowa ochrona mienia podczas transportu', 'shield');
 * 
 * 2. Dodanie usług przez filtr (w functions.php lub wtyczce):
 *    add_filter('mytheme_services_list', function($services) {
 *        $services[] = [
 *            'title' => 'CZYSZCZENIE PO PRZEPROWADZCE',
 *            'description' => 'Sprzątanie mieszkania po przeprowadzce',
 *            'icon' => 'shield'
 *        ];
 *        return $services;
 *    });
 * 
 * 3. Dostępne ikony SVG:
 *    - 'home' (dom)
 *    - 'truck' (ciężarówka)
 *    - 'box' (pudełko)
 *    - 'warehouse' (magazyn)
 *    - 'clock' (zegar)
 *    - 'shield' (tarcza)
 *    - 'users' (ludzie)
 * 
 * Sekcja automatycznie dostosuje się do dowolnej liczby usług!
 */

/**
 * Dodaje kompletny zestaw favicon do HEAD - obsługuje wszystkie urządzenia
 */
add_action( 'wp_head', 'mytheme_add_favicon', 5 );
function mytheme_add_favicon() {
    // Jeśli nie ma ustawionej ikony witryny w panelu administracyjnym
    if ( ! has_site_icon() ) {
        $favicon_path = get_template_directory_uri() . '/assets/images/';
        
        // Nowoczesny SVG favicon (najlepsza jakość)
        echo '<link rel="icon" type="image/svg+xml" href="' . esc_url( $favicon_path . 'favicon-new.svg' ) . '">' . "\n";
        
        // Fallback PNG dla starszych przeglądarek
        echo '<link rel="icon" type="image/png" sizes="32x32" href="' . esc_url( $favicon_path . 'favicon-32x32.png' ) . '">' . "\n";
        echo '<link rel="icon" type="image/png" sizes="16x16" href="' . esc_url( $favicon_path . 'favicon-16x16.png' ) . '">' . "\n";
        
        // Favicon ICO dla najstarszych przeglądarek
        echo '<link rel="icon" type="image/x-icon" href="' . esc_url( $favicon_path . 'favicon.ico' ) . '">' . "\n";
        
        // Apple Touch Icon
        echo '<link rel="apple-touch-icon" sizes="180x180" href="' . esc_url( $favicon_path . 'apple-touch-icon.png' ) . '">' . "\n";
        
        // Android Chrome Icons
        echo '<link rel="icon" type="image/png" sizes="192x192" href="' . esc_url( $favicon_path . 'android-chrome-192x192.png' ) . '">' . "\n";
        echo '<link rel="icon" type="image/png" sizes="512x512" href="' . esc_url( $favicon_path . 'android-chrome-512x512.png' ) . '">' . "\n";
        
        // Web App Manifest
        echo '<link rel="manifest" href="' . esc_url( $favicon_path . 'site.webmanifest' ) . '">' . "\n";
        
        // Meta tagi dla różnych urządzeń
        echo '<meta name="theme-color" content="#217346">' . "\n";
        echo '<meta name="msapplication-TileColor" content="#217346">' . "\n";
    }
}
