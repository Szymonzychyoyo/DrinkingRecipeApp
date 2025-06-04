<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj przepis</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('ikonaStron.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
</head>
<body>
<div class="edit-container">
    <header class="edit-header">
        <h1>Edytuj przepis</h1>
        <a href="{{ route('recipes.index') }}" class="back-button">Powrót do dashboard</a>
    </header>

    <main class="edit-main">
        <form method="POST" action="{{ route('recipes.update', $recipe) }}" enctype="multipart/form-data" class="edit-form">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name">Nazwa przepisu</label>
                <input id="name" type="text" name="name" value="{{ old('name', $recipe->name) }}" required>
            </div>

            <div class="form-group">
                <label for="ingredients">Składniki</label>
                <textarea id="ingredients" name="ingredients" required>{{ old('ingredients', $recipe->ingredients) }}</textarea>
            </div>

            <div class="form-group">
                <label for="instructions">Instrukcje</label>
                <textarea id="instructions" name="instructions" required>{{ old('instructions', $recipe->instructions) }}</textarea>
            </div>

            <div class="form-group">
                @if ($recipe->photo)
                    <div class="current-photo">
                        <p>Obecne zdjęcie:</p>
                        <img src="{{ asset('storage/' . $recipe->photo) }}" alt="Zdjęcie przepisu">
                    </div>
                    <label for="remove_photo">
                        <input type="checkbox" id="remove_photo" name="remove_photo" value="1">
                        Usuń obecne zdjęcie
                    </label>
                @endif

                <label for="photo">Dodaj nowe zdjęcie</label>
                <input id="photo" type="file" name="photo" accept="image/*">
            </div>

            <div class="form-actions">
                <button type="submit" class="submit-button">Zaktualizuj przepis</button>
                <a href="{{ route('recipes.index') }}" class="cancel-button">Anuluj</a>
            </div>
        </form>
    </main>
</div>
</body>
</html>
