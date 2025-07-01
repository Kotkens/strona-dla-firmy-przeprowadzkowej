# Instrukcja obsługi sekcji "O nas" z interaktywną mapą

## Gdzie znajdziesz pliki?

### 1. Główny plik sekcji
- `template-parts/about.php` - główny szablon sekcji "O nas"

### 2. Style CSS 
- W pliku `assets/css/main.css` szukaj sekcji `/* About section with map */`

### 3. Funkcjonalność JavaScript
- W pliku `assets/js/main.js` szukaj komentarza `// Initialize interactive map with Leaflet`

## ℹ️ Typ mapy

**Używamy Leaflet + OpenStreetMap** zamiast Google Maps:
- ✅ **Bezpłatne** - bez konieczności klucza API
- ✅ **Szybkie** - ładuje się automatycznie 
- ✅ **Responsive** - działa na wszystkich urządzeniach
- ✅ **Interaktywne** - zoom, przeciąganie, klikalne pinezki
- ✅ **Stylowane** - dopasowane do kolorów motywu

## Jak dodać nowe miasto?

### 1. Edytuj plik `template-parts/about.php`
Znajdź tablicę `$cities` i dodaj nowe miasto:

```php
$cities = array(
    // ...istniejące miasta...
    array(
        'name' => 'Kraków',           // Nazwa miasta
        'lat' => 50.0647,             // Szerokość geograficzna  
        'lng' => 19.9450,             // Długość geograficzna
        'info' => 'Opis usług przeprowadzkowych w Krakowie...'
    )
);
```

### 2. Jak znaleźć współrzędne miasta?
1. Wejdź na https://www.latlong.net/
2. Wpisz nazwę miasta
3. Skopiuj współrzędne (Latitude = lat, Longitude = lng)

**Przykładowe współrzędne polskich miast:**
- Kraków: 50.0647, 19.9450
- Poznań: 52.4064, 16.9252
- Łódź: 51.7592, 19.4560
- Katowice: 50.2649, 19.0238
- Lublin: 51.2465, 22.5684

## Jak zmienić tekst sekcji?

### 1. Nagłówek i opis
W pliku `template-parts/about.php` znajdź:
```php
<h2>O firmie MOVERO</h2>
<p class="about-description">
    Twój nowy tekst opisu firmy...
</p>
```

### 2. Statystyki
Zmień liczby w sekcji `about-stats`:
```php
<div class="stat-item">
    <span class="stat-number">500+</span>
    <span class="stat-label">Przeprowadzek rocznie</span>
</div>
```

### 3. Informacje o miastach w popupach
W tablicy `$cities` zmień pole `info`:
```php
'info' => 'Nowy opis usług w tym mieście...'
```

## Jak zmienić wygląd mapy?

### 1. Kolory pinezek
W pliku `assets/js/main.js` znajdź `customIcon` i zmień:
```javascript
background: #217346;  // Kolor główny pinezki
border: 3px solid #fff;  // Kolor obramowania
```

### 2. Styl mapy
Możesz zmienić provider map w `L.tileLayer()`:
```javascript
// Standardowa OpenStreetMap
'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'

// Alternatywnie - CartoDB (jaśniejsza)
'https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png'

// Lub CartoDB (ciemniejsza)  
'https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png'
```

### 3. Filtry mapy
W CSS możesz dodać filtry:
```css
.map-tiles {
  filter: grayscale(20%) brightness(1.1) sepia(10%);
}
```

## Funkcje interaktywne

### 1. **Klikalne pinezki**
- Kliknięcie pokazuje popup z informacjami
- Link "Skontaktuj się" przewija do sekcji kontakt

### 2. **Hover effects**
- Najechanie myszką animuje pinezkę (bounce)
- Automatyczna animacja CSS

### 3. **Responsywność**
- Na mobile mapa ma mniejszą wysokość
- Touch-friendly kontrolki zoom
- Płynne przeciąganie

### 4. **Fallback**
- Jeśli mapa się nie załaduje, pokazuje się lista miast
- Graceful degradation

## Rozwiązywanie problemów

### 1. Mapa się nie ładuje
- Sprawdź połączenie internetowe
- Leaflet ładuje się z CDN - może być zablokowany przez adblocker
- Fallback automatycznie się pokaże

### 2. Pinezki w złych miejscach
- Sprawdź współrzędne geograficzne
- Upewnij się, że używasz formatu: `lat: 52.2297, lng: 21.0122`

### 3. Mapa za wolno się ładuje
- Leaflet jest lekki, ale może być opóźnienie na wolnym internecie
- Loading spinner automatycznie się pokazuje

## Filtrowanie miast (dla programistów)

Możesz filtrować miasta przez WordPress hook:
```php
add_filter('movero_map_cities', function($cities) {
    // Dodaj lub usuń miasta programowo
    return $cities;
});
```

## Mobile optimalizacja

- **Wysokość mapy**: 400px desktop → 300px tablet → 250px mobile
- **Touch controls**: zoom, pan, popup
- **Fallback**: lista miast gdy mapa nie działa

**Mapa jest w pełni responsywna i gotowa do użycia!** 🗺️
