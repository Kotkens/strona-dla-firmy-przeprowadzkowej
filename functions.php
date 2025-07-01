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
	echo '<li><a href="#home">HOME</a></li>';
	echo '<li><a href="#about">ABOUT</a></li>';
	echo '<li><a href="#services">SERVICES</a></li>';
	echo '<li><a href="#pricing">PRICING</a></li>';
	echo '<li><a href="#contact">CONTACT</a></li>';
	echo '<li class="phone-number"><a href="tel:+48123456789"><i class="phone-icon">📞</i> +48 123 456 789</a></li>';
	echo '</ul>';
}

/**
 * Generuje ikony SVG dla usług
 */
function mytheme_get_service_icon($icon_name) {
    $color = '#217346'; // Główny kolor motywu
    
    $icons = [
        'home' => '<svg width="48" height="48" viewBox="0 0 24 24" fill="none">
            <path d="M3 12L5 10M5 10L12 3L19 10M5 10V20C5 20.5523 5.44772 21 6 21H9M19 10L21 12M19 10V20C19 20.5523 18.5523 21 18 21H15M9 21C9.55228 21 10 20.5523 10 20V16C10 15.4477 10.4477 15 11 15H13C13.5523 15 14 15.4477 14 16V20C14 20.5523 14.4477 21 15 21M9 21H15" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>',
        
        'truck' => '<svg width="48" height="48" viewBox="0 0 24 24" fill="none">
            <path d="M1 6H15V16H1V6Z" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M16 10H20L23 13V16H16V10Z" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <circle cx="5.5" cy="18.5" r="2.5" stroke="' . $color . '" stroke-width="2"/>
            <circle cx="18.5" cy="18.5" r="2.5" stroke="' . $color . '" stroke-width="2"/>
        </svg>',
        
        'box' => '<svg width="48" height="48" viewBox="0 0 24 24" fill="none">
            <path d="M21 8C21 8 19 5 12 5C5 5 3 8 3 8V19C3 20.1046 3.89543 21 5 21H19C20.1046 21 21 20.1046 21 19V8Z" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M3 8L12 13L21 8" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M12 13V21" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>',
        
        'warehouse' => '<svg width="48" height="48" viewBox="0 0 24 24" fill="none">
            <path d="M3 21H21M3 10H21M5 6L12 3L19 6V21H5V6Z" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M9 21V15H15V21" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>',
        
        'clock' => '<svg width="48" height="48" viewBox="0 0 24 24" fill="none">
            <circle cx="12" cy="12" r="10" stroke="' . $color . '" stroke-width="2"/>
            <polyline points="12,6 12,12 16,14" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>',
        
        'shield' => '<svg width="48" height="48" viewBox="0 0 24 24" fill="none">
            <path d="M12 22S8 18 8 12V7L12 5L16 7V12C16 18 12 22 12 22Z" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>',
        
        'users' => '<svg width="48" height="48" viewBox="0 0 24 24" fill="none">
            <path d="M17 21V19C17 17.9391 16.5786 16.9217 15.8284 16.1716C15.0783 15.4214 14.0609 15 13 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <circle cx="9" cy="7" r="4" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M23 21V19C23 18.1332 22.7155 17.3155 22.2094 16.658C21.7033 16.0006 20.9943 15.5383 20.2 15.341" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M16 3.341C16.7943 3.53834 17.5033 4.00061 18.0094 4.65802C18.5155 5.31543 18.8 6.13316 18.8 7C18.8 7.86684 18.5155 8.68457 18.0094 9.34198C17.5033 9.99939 16.7943 10.4617 16 10.659" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>'
    ];
    
    return isset($icons[$icon_name]) ? $icons[$icon_name] : $icons['box']; // fallback to box icon
}

/**
 * Funkcja pomocnicza do dodawania nowych usług
 * Można użyć w panelu administracyjnym lub Custom Fields
 */
function mytheme_get_services() {
    // Można rozszerzyć o ACF/Meta Fields
    return apply_filters('mytheme_services_list', [
        [
            'title' => 'PRZEPROWADZKI LOKALNE',
            'description' => 'Przeprowadzki lokalne i mieszkaniowe',
            'icon' => 'home'
        ],
        [
            'title' => 'PRZEPROWADZKI MIĘDZYMIASTOWE', 
            'description' => 'Przeprowadzki do innego miasta lub województwa',
            'icon' => 'truck'
        ],
        [
            'title' => 'USŁUGI PAKOWANIA',
            'description' => 'Profesjonalne pakowanie Twoich rzeczy',
            'icon' => 'box'
        ],
        [
            'title' => 'MAGAZYNOWANIE',
            'description' => 'Bezpieczne i elastyczne opcje przechowywania',
            'icon' => 'warehouse'
        ]
    ]);
}

/**
 * Zarządzanie elementami galerii w image section
 */
function mytheme_get_gallery_items() {
    $gallery_items = [
        [
            'title' => 'Przeprowadzka mieszkania',
            'description' => 'Kompleksowa przeprowadzka rodziny z 3-pokojowego mieszkania',
            'image' => get_template_directory_uri() . '/assets/images/gallery/apartment-move.jpg'
        ],
        [
            'title' => 'Transport mebli',
            'description' => 'Bezpieczny transport dużych mebli i sprzętu AGD',
            'image' => get_template_directory_uri() . '/assets/images/gallery/furniture-transport.jpg'
        ],
        [
            'title' => 'Przeprowadzka biura',
            'description' => 'Profesjonalna przeprowadzka biura z minimalnymi przestojami',
            'image' => get_template_directory_uri() . '/assets/images/gallery/office-move.jpg'
        ],
        [
            'title' => 'Pakowanie rzeczy',
            'description' => 'Staranne pakowanie cennych przedmiotów i dokumentów',
            'image' => get_template_directory_uri() . '/assets/images/gallery/packing-service.jpg'
        ],
        [
            'title' => 'Transport długodystansowy',
            'description' => 'Międzymiastowe przeprowadzki na terenie całego kraju',
            'image' => get_template_directory_uri() . '/assets/images/gallery/long-distance.jpg'
        ],
        [
            'title' => 'Magazynowanie',
            'description' => 'Tymczasowe przechowywanie rzeczy w bezpiecznym magazynie',
            'image' => get_template_directory_uri() . '/assets/images/gallery/storage.jpg'
        ]
    ];
    
    return apply_filters('mytheme_gallery_items', $gallery_items);
}

/**
 * Fallback dla brakujących obrazów galerii
 */
function mytheme_gallery_fallback_image() {
    // Używamy placeholder service dla demonstracji
    return 'https://via.placeholder.com/400x250/217346/ffffff?text=MOVERO';
}

/**
 * Sprawdza czy obraz istnieje, jeśli nie - zwraca fallback
 */
function mytheme_get_gallery_image($image_path) {
    $full_path = get_template_directory() . str_replace(get_template_directory_uri(), '', $image_path);
    
    if (file_exists($full_path)) {
        return $image_path;
    }
    
    return mytheme_gallery_fallback_image();
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
            'icon' => '🚗',
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
            'icon' => '💪',
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
            'icon' => '📦',
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
