# 💰 INSTRUKCJA SEKCJI PRICING

## 📋 Zarządzanie ofertami cenowymi:

### 🎯 **Aktualnie dostępne pakiety:**

1. **BASIC (299zł)** - Samochód + kierowca
2. **STANDARD (449zł)** - Samochód + kierowca + 1 tragarz ⭐
3. **PREMIUM (649zł)** - Samochód + kierowca + 2 tragarze + pakowanie

### ✏️ **Jak edytować ceny:**

W pliku `functions.php` znajdź funkcję `mytheme_get_pricing_plans()`:

```php
[
    'name' => 'BASIC',
    'price' => '299',           // ← Zmień cenę tutaj
    'period' => 'za usługę',
    'description' => 'Opis pakietu...',
    'icon' => '🚗',
    'featured' => false,        // ← true = wyróżniony pakiet
    'features' => [
        'Lista funkcji...'
    ]
]
```

### 📦 **Dodawanie nowego pakietu:**

```php
[
    'name' => 'VIP',
    'price' => '899',
    'period' => 'za usługę',
    'description' => 'Luksusowa przeprowadzka z pełną obsługą',
    'icon' => '👑',
    'featured' => false,
    'features' => [
        'Luksusowy samochód',
        'Zespół 3 osób',
        'Pakowanie premium',
        'Ubezpieczenie na 50.000zł'
    ]
]
```

## 🎨 **Dostępne ikony (emoji):**

- 🚗 (samochód)
- 💪 (siła/tragarz)  
- 📦 (pakowanie)
- 👑 (premium)
- 🏠 (dom)
- 🚛 (ciężarówka)
- ⚡ (szybkość)
- 🛡️ (bezpieczeństwo)

## 🔧 **Dodatkowe usługi:**

Funkcja `mytheme_get_additional_services()` zawiera:
- Dodatkowy kilometr: 2zł
- Dodatkowa godzina: 80zł
- Demontaż/montaż: 150zł
- Pakowanie delikatne: 50zł
- Transport fortepianu: 300zł
- Praca w weekend: +50zł

## 🎯 **Funkcjonalności sekcji:**

✅ **Responsywny design** - 3 kolumny → 1 kolumna mobile  
✅ **Pakiet wyróżniony** - "NAJPOPULARNIEJSZY" badge  
✅ **Hover effects** - animacje przy najechaniu  
✅ **CTA buttons** - linki do kontaktu  
✅ **Lista funkcji** - z checkmarkami  
✅ **Gradient tła** - nowoczesny wygląd  

## 📱 **Responsive breakpoints:**

- **Desktop:** 3 kolumny obok siebie
- **Tablet:** 2-3 kolumny  
- **Mobile:** 1 kolumna, pakiet wyróżniony bez skalowania

## 🎨 **Personalizacja stylów:**

### **Zmiana kolorów:**
```css
.pricing-button {
    background: #217346; /* ← Twój kolor */
}
```

### **Zmiana gradientu tła:**
```css
.pricing-section {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}
```

## 🔗 **Integracja z formularzem:**

Przyciski "Wybierz pakiet" prowadzą do `#contact`. Możesz dodać:
- Formularz kontaktowy
- Kalkulator cen
- System rezerwacji online

**Sekcja gotowa do działania!** 🚀
