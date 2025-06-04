<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resetowanie hasła</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('ikonaStron.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<div class="forgot-password-container">
    <header>
        <h1>Resetowanie hasła</h1>
    </header>

    <main>
        <p class="instruction">
            Zapomniałeś hasła? Bez obaw. Wprowadź swój adres email, a wyślemy Ci link do zresetowania hasła.
        </p>

        <!-- Session Status -->
        @if (session('status'))
            <div class="alert success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Adres email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit -->
            <div class="form-actions">
                <button type="submit" class="primary-button">Wyślij link resetujący hasło</button>
            </div>
        </form>
    </main>
</div>
</body>
</html>
