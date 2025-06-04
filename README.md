# 🍹 Drink Recipes App

**Aplikacja webowa do tworzenia, edytowania i udostępniania przepisów na drinki.**  
Pozwala użytkownikom dodawać własne przepisy ze zdjęciem, komentować przepisy innych oraz zamawiać książkę z drinkami.

---

## ⚙️ Tech Stack

- **PHP 8+**
- **Laravel 10**
- **SQLite** – domyślna baza danych
- **Blade** – silnik szablonów Laravel
- **CSS (custom)** – responsywny design z tłem
- **Laravel Breeze** – system autoryzacji
- **Git/GitHub** – wersjonowanie

---

## 🚀 Jak uruchomić projekt lokalnie

```bash
# 1. Klonuj repozytorium
git clone https://github.com/twoj-user/drink-recipes-app.git
cd drink-recipes-app

# 2. Zainstaluj zależności
composer install
npm install && npm run build

# 3. Skonfiguruj środowisko
cp .env.example .env
php artisan key:generate

# 4. Migracje i linki
php artisan migrate
php artisan storage:link

# 5. Uruchom lokalny serwer
php artisan serve


    Otwórz w przeglądarce http://localhost:8000

    ✅ Rejestracja i logowanie użytkowników, zmiana danych oraz usunięcie konta

    📸 Dodawanie i edytowanie przepisów z opcjonalnym zdjęciem

    📤 Udostępnianie przepisów innym

    💬 System komentarzy

    📚 Formularz zamówienia książki o drinkach

Zrzuty ekranu aplikacji:

![img_alt](https://github.com/Szymonzychyoyo/DrinkingRecipeApp/blob/9540a8aa84a173d969de54a0034e2a3bfaa0db0a/public/sceenshots/Dashboard.png)

![img_alt](https://github.com/Szymonzychyoyo/DrinkingRecipeApp/blob/bde650b08cfabb2c7055e0bb6a8f663f0fb9622f/public/sceenshots/Przepisy%20spo%C5%82eczno%C5%9Bci.png)

![img_alt](https://github.com/Szymonzychyoyo/DrinkingRecipeApp/blob/c7afbad9c51073d5c00e4a4eda3234323e1a9643/public/sceenshots/Dane.png)
