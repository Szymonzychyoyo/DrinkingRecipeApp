<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zamów książkę</title>
    <link rel="stylesheet" href="{{ asset('css/order_book.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('ikonaStron.ico') }}">
</head>
<body>
<div class="order-container">
    <header>
        <h1>Zamów książkę o drinkach</h1>
    </header>

    <main>
        <form method="POST" action="{{ route('book-order.store') }}">
            @csrf
            <div class="form-group">
                <label for="full_name">Imię i nazwisko</label>
                <input id="full_name" type="text" name="full_name" value="{{ old('full_name') }}" required maxlength="255">
            </div>

            <div class="form-group">
                <label for="email">Adres email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required maxlength="255">
            </div>

            <div class="form-group">
                <label for="address">Adres dostawy</label>
                <textarea id="address" name="address" required maxlength="500">{{ old('address') }}</textarea>
            </div>

            <div class="form-group">
                <label for="phone">Numer telefonu</label>
                <input id="phone" type="text" name="phone" value="{{ old('phone') }}" required pattern="\d{9}" title="Numer telefonu musi składać się z 9 cyfr.">
            </div>

            <button type="submit" class="primary-button">Zamów</button>
            <a href="{{ route('dashboard') }}" class="secondary-button">Anuluj</a>
        </form>

    </main>
</div>
</body>
</html>
