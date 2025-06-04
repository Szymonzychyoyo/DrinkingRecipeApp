<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('ikonaStron.ico') }}">
</head>
<body>
<div class="register-container">
    <header>
        <h1>Rejestracja</h1>
    </header>

    <main>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name">Imię</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                @error('name')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Adres email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                @error('email')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Hasło</label>
                <input id="password" type="password" name="password" required autocomplete="new-password">
                @error('password')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">Potwierdź hasło</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                @error('password_confirmation')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Actions -->
            <div class="form-actions">
                <a href="{{ route('login') }}" class="secondary-link">
                    Masz już konto? Zaloguj się
                </a>
                <button type="submit" class="primary-button">Zarejestruj się</button>
            </div>
        </form>
    </main>
</div>
</body>
</html>
