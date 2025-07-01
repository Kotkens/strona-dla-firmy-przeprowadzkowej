# 🖼️ INSTRUKCJA IMAGE SECTION

## 📋 Dodawanie obrazów do galerii:

### 1. **Umieść obrazy w folderze:**
```
/assets/images/gallery/
├── apartment-move.jpg
├── furniture-transport.jpg
├── office-move.jpg
├── packing-service.jpg
├── long-distance.jpg
└── storage.jpg
```

### 2. **Dodaj nowy element w functions.php:**
```php
[
    'title' => 'Nazwa usługi',
    'description' => 'Opis realizacji',
    'image' => get_template_directory_uri() . '/assets/images/gallery/nazwa-pliku.jpg'
]
```

### 3. **Zalecane rozmiary obrazów:**
- **Szerokość:** 400-600px
- **Wysokość:** 250-350px  
- **Format:** JPG lub PNG
- **Rozmiar pliku:** max 200KB

## 🎨 Funkcjonalności Image Section:

✅ **Responsywna siatka** - automatyczne dopasowanie  
✅ **Hover effects** - animacje przy najechaniu  
✅ **Overlay z opisem** - tytuł i opis po hover  
✅ **Fallback images** - placeholder gdy brak obrazu  
✅ **Lazy loading** - optymalizacja ładowania  
✅ **CTA button** - link do większej galerii  

## 🔧 Personalizacja:

### **Zmiana kolorów:**
```css
.gallery-overlay {
    background: linear-gradient(transparent, rgba(26, 60, 52, 0.9));
}
```

### **Zmiana układu siatki:**
```css
.image-gallery {
    grid-template-columns: repeat(3, 1fr); /* 3 kolumny */
}
```

### **Dodanie nowych elementów przez filtr:**
```php
add_filter('mytheme_gallery_items', 'dodaj_moje_obrazy');
function dodaj_moje_obrazy($gallery) {
    $gallery[] = [
        'title' => 'Nowa realizacja',
        'description' => 'Opis nowej realizacji',
        'image' => get_template_directory_uri() . '/assets/images/gallery/nowy-obraz.jpg'
    ];
    return $gallery;
}
```

## 📱 Responsywność:

- **Desktop:** Siatka 3-4 kolumny
- **Tablet:** Siatka 2 kolumny  
- **Mobile:** 1 kolumna, overlay zawsze widoczny

**Sekcja gotowa do użycia!** 🚀
