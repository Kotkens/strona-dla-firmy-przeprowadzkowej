document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileToggle = document.querySelector('.mobile-menu-toggle');
    const mainMenu = document.querySelector('.main-navigation');
    
    if (mobileToggle && mainMenu) {
        mobileToggle.addEventListener('click', function() {
            mainMenu.classList.toggle('active');
            mobileToggle.classList.toggle('active');
        });
        
        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.header-container')) {
                mainMenu.classList.remove('active');
                mobileToggle.classList.remove('active');
            }
        });
        
        // Close menu when window is resized to desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth > 900) {
                mainMenu.classList.remove('active');
                mobileToggle.classList.remove('active');
            }
        });
    }
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const headerHeight = document.querySelector('.site-header').offsetHeight;
                const targetPosition = target.offsetTop - headerHeight - 20; // 20px extra offset
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
                
                // Close mobile menu if open
                if (mainMenu && mainMenu.classList.contains('active')) {
                    mainMenu.classList.remove('active');
                    mobileToggle.classList.remove('active');
                }
            }
        });
    });
    
    // Initialize interactive map with Leaflet (OpenStreetMap)
    initInteractiveMap();
    
    function initInteractiveMap() {
        // Check if we have the cities data
        const citiesDataElement = document.getElementById('cities-data');
        if (!citiesDataElement) return;
        
        const cities = JSON.parse(citiesDataElement.textContent);
        
        // Load Leaflet CSS and JS
        loadLeafletLibrary().then(() => {
            createLeafletMap(cities);
        }).catch(() => {
            showMapFallback();
        });
    }
    
    function loadLeafletLibrary() {
        return new Promise((resolve, reject) => {
            // Check if Leaflet is already loaded
            if (typeof L !== 'undefined') {
                resolve();
                return;
            }
            
            // Load Leaflet CSS
            const css = document.createElement('link');
            css.rel = 'stylesheet';
            css.href = 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css';
            css.integrity = 'sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=';
            css.crossOrigin = '';
            document.head.appendChild(css);
            
            // Load Leaflet JS
            const script = document.createElement('script');
            script.src = 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js';
            script.integrity = 'sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=';
            script.crossOrigin = '';
            script.async = true;
            
            script.onload = () => {
                setTimeout(resolve, 100); // Small delay to ensure L is fully loaded
            };
            script.onerror = reject;
            
            document.head.appendChild(script);
            
            // Timeout after 10 seconds
            setTimeout(() => {
                reject(new Error('Leaflet library failed to load'));
            }, 10000);
        });
    }
    
    function createLeafletMap(cities) {
        const mapContainer = document.getElementById('google-map');
        const loadingElement = document.getElementById('map-loading');
        
        if (!mapContainer) return;
        
        // Hide loading
        if (loadingElement) {
            loadingElement.style.display = 'none';
        }
        
        // Calculate center of Poland
        const centerLat = cities.reduce((sum, city) => sum + city.lat, 0) / cities.length;
        const centerLng = cities.reduce((sum, city) => sum + city.lng, 0) / cities.length;
        
        // Create map
        const map = L.map(mapContainer, {
            center: [centerLat, centerLng],
            zoom: 6,
            scrollWheelZoom: true,
            dragging: true,
            touchZoom: true,
            doubleClickZoom: true,
            boxZoom: true,
            keyboard: true
        });
        
        // Add OpenStreetMap tiles with custom styling
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            maxZoom: 18,
            className: 'map-tiles'
        }).addTo(map);
        
        // Custom marker icon
        const customIcon = L.divIcon({
            className: 'custom-marker',
            html: `
                <div style="
                    background: #217346;
                    width: 30px;
                    height: 30px;
                    border-radius: 50% 50% 50% 0;
                    transform: rotate(-45deg);
                    border: 3px solid #fff;
                    box-shadow: 0 2px 8px rgba(0,0,0,0.3);
                    position: relative;
                ">
                    <div style="
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%) rotate(45deg);
                        width: 8px;
                        height: 8px;
                        background: #fff;
                        border-radius: 50%;
                    "></div>
                </div>
            `,
            iconSize: [30, 30],
            iconAnchor: [15, 30],
            popupAnchor: [0, -30]
        });
        
        // Add markers for each city
        cities.forEach(city => {
            const marker = L.marker([city.lat, city.lng], {
                icon: customIcon,
                title: city.name
            }).addTo(map);
            
            // Create popup content
            const popupContent = `
                <div style="padding: 8px; max-width: 200px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">
                    <h4 style="margin: 0 0 8px 0; color: #217346; font-size: 16px; font-weight: 700;">${city.name}</h4>
                    <p style="margin: 0 0 10px 0; font-size: 14px; line-height: 1.4; color: #333;">${city.info}</p>
                    <a href="#contact" onclick="scrollToContact(); return false;" style="color: #217346; font-weight: 600; text-decoration: none; font-size: 14px;">Skontaktuj się →</a>
                </div>
            `;
            
            marker.bindPopup(popupContent, {
                maxWidth: 250,
                className: 'custom-popup'
            });
            
            // Add bounce effect on mouseover
            marker.on('mouseover', function() {
                this.getElement().style.animation = 'bounce 0.6s ease-in-out';
            });
            
            marker.on('animationend', function() {
                this.getElement().style.animation = '';
            });
        });
        
        // Fit map to show all markers
        const group = new L.featureGroup(cities.map(city => 
            L.marker([city.lat, city.lng])
        ));
        map.fitBounds(group.getBounds().pad(0.1));
    }
    
    function showMapFallback() {
        const loadingElement = document.getElementById('map-loading');
        const fallbackElement = document.getElementById('map-fallback');
        
        if (loadingElement) {
            loadingElement.style.display = 'none';
        }
        if (fallbackElement) {
            fallbackElement.style.display = 'block';
        }
    }
    
    // Global function for popup links
    window.scrollToContact = function() {
        const contactSection = document.querySelector('#contact');
        if (contactSection) {
            const headerHeight = document.querySelector('.site-header').offsetHeight;
            const targetPosition = contactSection.offsetTop - headerHeight - 20;
            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        }
    };
});
