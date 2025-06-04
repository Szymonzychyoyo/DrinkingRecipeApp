<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Witamy w aplikacji Przepisy na Drink</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('ikonaStron.ico') }}">
</head>
<body>
<div class="welcome-container">
    <header>
        <h1>Przepisy na Drink</h1>
    </header>

    <main>
        <h2>Witamy!</h2>
        <p>Twórz i przeglądaj przepisy na drinki w jednym miejscu. Zaloguj się lub zarejestruj, aby zacząć.</p>
        <div class="welcome-actions">
            <a href="{{ route('login') }}" class="primary-button">Zaloguj się</a>
            <a href="{{ route('register') }}" class="secondary-button">Zarejestruj się</a>
        </div>
    </main>
</div>
</body>
</html>
