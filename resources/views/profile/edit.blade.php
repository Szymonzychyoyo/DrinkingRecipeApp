<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mój Profil</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('ikonaStron.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body>
<div class="profile-container">
    <header>
        <h1>Mój Profil</h1>
    </header>

    <main>
        <div class="profile-sections">
            <!--  Aktualizacja informacji o profilu -->
            <section class="profile-section">
                <h2>Aktualizacja danych profilu</h2>
                <div class="form-container">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </section>

            <!--  Zmiana hasła -->
            <section class="profile-section">
                <h2>Zmiana hasła</h2>
                <div class="form-container">
                    @include('profile.partials.update-password-form')
                </div>
            </section>

            <!-- Usunięcie konta -->
            <section class="profile-section">
                <h2>Usuń konto</h2>
                <div class="form-container delete-account">
                    @include('profile.partials.delete-user-form')
                </div>
            </section>
        </div>

        <!-- Przyciski nawigacyjne -->
        <div class="navigation-buttons">
            <a href="{{ route('dashboard') }}" class="primary-button">Powrót do Dashboard</a>
        </div>
    </main>
</div>
</body>
</html>
