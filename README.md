Drink Recipes App

Aplikacja webowa do tworzenia, edytowania i udostępniania przepisów na drinki. Pozwala użytkownikom dodawać własne przepisy ze zdjęciem, komentować udostępnione przepisy innych użytkowników oraz zamawiać książkę z drinkami.

## ⚙️ Tech Stack

-   **PHP 8+**
-   **Laravel 10**
-   **SQLite** – domyślna baza danych
-   **Blade** – silnik szablonów Laravel
-   **CSS (custom)** – responsywny design z tłem
-   **Laravel Breeze** – system autoryzacji
-   **Git/GitHub** – wersjonowanie

## 🚀 Jak uruchomić projekt lokalnie

1. **Klonuj repozytorium:**

    git clone https://github.com/twoj-user/drink-recipes-app.git
    cd drink-recipes-app
    composer install
    npm install && npm run build
    cp .env.example .env
    php artisan key:generate
    php artisan migrate
    php artisan storage:link
    php artisan serve

    Otwórz w przeglądarce http://localhost:8000

    ✅ Rejestracja i logowanie użytkowników, zmiana danych oraz usunięcie konta

    📸 Dodawanie i edytowanie przepisów z opcjonalnym zdjęciem

    📤 Udostępnianie przepisów innym

    💬 System komentarzy

    📚 Formularz zamówienia książki o drinkach

Zrzuty ekranu aplikacji:


