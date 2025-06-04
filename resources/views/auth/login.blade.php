<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaloguj się</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('ikonaStron.ico') }}">
</head>
<body>
<div class="login-container">
    <header>
        <h1>Przepisy na Drink</h1>
    </header>

    <main>
        <div class="form-container">
            <h2>Zaloguj się</h2>
            <!-- Session Status -->
            @if (session('status'))
                <div class="alert success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Hasło</label>
                    <input id="password" type="password" name="password" required>
                    @error('password')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="form-group remember-me">
                    <label for="remember_me">
                        <input id="remember_me" type="checkbox" name="remember">
                        Zapamiętaj mnie
                    </label>
                </div>

                <!-- Submit and Forgot Password -->
                <div class="form-actions">
                    @if (Route::has('password.request'))
                        <a class="forgot-password" href="{{ route('password.request') }}">
                            Zapomniałeś hasła?
                        </a>
                    @endif
                    <button type="submit" class="primary-button">
                        Zaloguj się
                    </button>
                </div>
            </form>

            <!-- Link do rejestracji -->
            <div class="register-link">
                <p>Nie masz konta?
                    <a href="{{ route('register') }}">Zarejestruj się</a>
                </p>
            </div>
        </div>
    </main>
</div>
</body>
</html>
