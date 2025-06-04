<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj nowy przepis</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('ikonaStron.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body>
<h1>Dodaj nowy przepis</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('recipes.store') }}" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">Nazwa przepisu</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required>
    </div>
    <div>
        <label for="ingredients">Składniki</label>
        <textarea id="ingredients" name="ingredients" required>{{ old('ingredients') }}</textarea>
    </div>
    <div>
        <label for="instructions">Instrukcje</label>
        <textarea id="instructions" name="instructions" required>{{ old('instructions') }}</textarea>
    </div>
    <div>
        <label for="photo">Zdjęcie</label>
        <input id="photo" type="file" name="photo" accept="image/*">
    </div>
    <button type="submit">Dodaj przepis</button>

    <a href="{{ route('recipes.index') }}">Anuluj</a>
</form>
</body>
</html>
