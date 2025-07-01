# 📞 INSTRUKCJA SEKCJI KONTAKT I STOPKI

## Gdzie znajdziesz sekcję kontakt?

**Plik:** `template-parts/footer/footer.php`

## Sekcja kontakt vs. stopka

### 🔵 **Sekcja kontakt** (ciemne tło)
- Duża sekcja z telefonem i adresem
- Godziny pracy pod telefonem
- Ikony w kółkach

### ⚪ **Stopka** (krótka, na dole)
- Logo MOVERO po lewej stronie
- "Wykonanie: develoart.com" po prawej
- Bardzo minimalistyczna

## Jak zmienić numer telefonu?

### 1. W sekcji kontakt (footer)
```php
<a href="tel:+48123456789">+48 123 456 789</a>
```
Zmień na:
```php
<a href="tel:+48TWÓJNUMER">+48 TWÓJ NUMER</a>
```

### 2. W menu nawigacyjnym (header)
W pliku `functions.php` znajdź funkcję `mytheme_fallback_menu()`:
```php
echo '<li class="phone-number"><a href="tel:+48123456789"><i class="phone-icon">📞</i> +48 123 456 789</a></li>';
```

## Jak zmienić godziny pracy?

W pliku `template-parts/footer/footer.php` znajdź:
```php
<p style="margin: 0.5rem 0 0 0; font-size: 0.9rem; opacity: 0.8;">Pon-Pt: 8:00-18:00, Sob: 9:00-15:00</p>
```

**Przykłady godzin pracy:**
- `Pon-Pt: 8:00-18:00, Sob: 9:00-15:00` (obecne)
- `Pon-Pt: 7:00-19:00, Weekendy: 9:00-16:00`
- `Codziennie: 8:00-20:00`
- `24/7 - Całodobowo`

## Jak zmienić adres?

```php
<h4>Adres</h4>
<p>ul. Przykładowa 123<br>00-000 Warszawa</p>
```

Zmień na swój adres:
```php
<h4>Adres</h4>
<p>ul. Twoja 456<br>12-345 Twoje Miasto</p>
```

## Jak dodać drugi numer telefonu?

Możesz dodać drugi contact-item:
```php
<div class="contact-item">
    <span class="contact-icon">📱</span>
    <div>
        <h4>Telefon awaryjny</h4>
        <a href="tel:+48987654321">+48 987 654 321</a>
        <p style="margin: 0.5rem 0 0 0; font-size: 0.9rem; opacity: 0.8;">Całodobowo</p>
    </div>
</div>
```

## Jak zmienić ikony?

Obecne ikony to emoji. Możesz je zmienić na:
- 📞 → 📱 (telefon komórkowy)
- 📍 → 🏢 (biuro)
- 📍 → 🏠 (dom)
- 📍 → 📌 (pinezka)

## Jak dodać formularz kontaktowy?

Po obecnej sekcji kontakt dodaj:
```php
<div class="contact-form">
    <h3>Wyślij wiadomość</h3>
    <form action="#" method="post">
        <input type="text" name="name" placeholder="Imię i nazwisko" required>
        <input type="tel" name="phone" placeholder="Telefon" required>
        <textarea name="message" placeholder="Wiadomość" required></textarea>
        <button type="submit">Wyślij</button>
    </form>
</div>
```

## Dlaczego nie ma emaila?

**Email został usunięty zgodnie z życzeniem klienta.**

Jeśli chcesz go przywrócić:
```php
<div class="contact-item">
    <span class="contact-icon">✉️</span>
    <div>
        <h4>Email</h4>
        <a href="mailto:kontakt@movero.pl">kontakt@movero.pl</a>
    </div>
</div>
```

## Jak zmienić logo w stopce?

### 1. **Logo graficzne**
W panelu WordPress: `Dostosuj → Tożsamość witryny → Logo`

### 2. **Logo tekstowe (fallback)**
W pliku `template-parts/footer/footer.php` zmień:
```php
echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="logo-text">MOVERO</a>';
```
Na:
```php
echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="logo-text">TWOJA FIRMA</a>';
```

## Jak zmienić kredyty wykonawcy?

W pliku `template-parts/footer/footer.php` znajdź:
```php
<p>Wykonanie: <a href="https://develoart.com" target="_blank" rel="noopener">develoart.com</a></p>
```

Możesz zmienić na:
- `<p>© 2025 Twoja Firma</p>` (prawa autorskie)
- `<p>Wykonanie: <a href="https://twojastrona.pl">twojastrona.pl</a></p>` (inny wykonawca)
- `<p>Wszelkie prawa zastrzeżone</p>` (standard)

## Responsive design

Sekcja kontakt automatycznie się dostosowuje:
- **Desktop:** elementy obok siebie
- **Mobile:** elementy pod sobą
- **Touch-friendly:** duże obszary klikalne

## Stylowanie

Style znajdują się w `assets/css/main.css`:
- `.contact-section` - główna sekcja
- `.contact-info` - kontener elementów
- `.contact-item` - pojedynczy element
- `.contact-icon` - ikona w kółku

### Kolor tła stopki:
```css
.site-footer, footer {
  background: #1a3c34; /* Zmień kolor */
}
```

### Rozmiar logo:
```css
.footer-logo .logo-text {
  font-size: 1.5rem; /* Zwiększ/zmniejsz */
}
```

### Kolor linku wykonawcy:
```css
.footer-credit a:hover {
  color: #217346; /* Kolor przy hover */
}
```

**Sekcja kontakt jest gotowa do użycia!** ☎️
