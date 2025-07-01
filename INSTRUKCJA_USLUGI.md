# 🛠️ INSTRUKCJA DODAWANIA NOWYCH USŁUG

## 📋 Elastyczny system usług - jak dodać nową usługę:

### Metoda 1: Przez functions.php (proste)

W pliku `functions.php` znajdź funkcję `mytheme_get_services()` i dodaj nowy element do tablicy:

```php
[
    'title' => 'NAZWA NOWEJ USŁUGI',
    'description' => 'Opis nowej usługi',
    'icon' => 'nazwa_ikony'
]
```

### Metoda 2: Przez filtr WordPress (zaawansowane)

W functions.php lub w pliku wtyczki:

```php
add_filter('mytheme_services_list', 'dodaj_moje_uslugi');
function dodaj_moje_uslugi($services) {
    $services[] = [
        'title' => 'TRANSPORT FORTEPIANÓW',
        'description' => 'Specjalistyczny transport instrumentów',
        'icon' => 'users'
    ];
    return $services;
}
```

## 🎨 Dostępne ikony SVG:

- `home` - Dom/mieszkanie
- `truck` - Ciężarówka/transport
- `box` - Pudełko/pakowanie
- `warehouse` - Magazyn/przechowywanie
- `clock` - Zegar/czas
- `shield` - Tarcza/bezpieczeństwo
- `users` - Ludzie/zespół

## ➕ Dodawanie nowych ikon SVG:

W funkcji `mytheme_get_service_icon()` dodaj nową ikonę:

```php
'nazwa_ikony' => '<svg width="48" height="48" viewBox="0 0 24 24" fill="none">
    <!-- Twoja ikona SVG -->
</svg>'
```

## 🎯 Zalety tego systemu:

✅ **Elastyczność** - dowolna ilość usług
✅ **SVG ikony** - skalowalne, przyjmują kolor motywu
✅ **Łatwe zarządzanie** - centralne miejsce
✅ **Extensible** - można dodać ACF/Custom Fields
✅ **Performance** - brak zewnętrznych zasobów

## 🔧 Możliwe rozszerzenia:

1. **Advanced Custom Fields** - dodawanie przez panel admin
2. **Custom Post Type** "Usługi"
3. **Shortcode** do wyświetlania usług
4. **Widget** z wybranymi usługami
