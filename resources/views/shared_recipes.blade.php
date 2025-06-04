<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Udostępnione przepisy</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('ikonaStron.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/shared-recipes.css') }}">
</head>
<body>
<div class="shared-recipes-container">
    <header>
        <h1>Udostępnione przepisy</h1>
        <a href="{{ route('recipes.index') }}" class="back-button">Powrót do moich przepisów</a>
    </header>

    <main>
        <ul class="shared-recipes">
            @forelse ($sharedRecipes as $recipe)
                <li class="recipe-item">
                    <h3>{{ $recipe->name }}</h3>
                    <p><strong>Składniki:</strong> {{ $recipe->ingredients }}</p>
                    <p><strong>Instrukcje:</strong> {{ $recipe->instructions }}</p>
                    <p><strong>Autor:</strong> {{ $recipe->user->name }}</p>
                    @if ($recipe->photo)
                        <img src="{{ asset('storage/' . $recipe->photo) }}" alt="Zdjęcie przepisu" style="max-width: 150px; border-radius: 8px;">
                    @endif

                    <h4>Komentarze:</h4>
                    <ul class="comments">
                        @forelse ($recipe->comments as $comment)
                            <li class="comment-item">
                                <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}</p>
                                <p class="comment-date">{{ $comment->created_at->format('d.m.Y H:i') }}</p>
                                <!-- Przycisk usunięcia komentarza -->
                                @if ($comment->user_id === auth()->id())
                                    <form method="POST" action="{{ route('comments.destroy', $comment) }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-button">Usuń</button>
                                    </form>
                                @endif
                            </li>
                        @empty
                            <p>Brak komentarzy do tego przepisu.</p>
                        @endforelse
                    </ul>

                    <!-- Formularz dodawania komentarza -->
                    <form method="POST" action="{{ route('comments.store', $recipe) }}">
                        @csrf
                        <div class="form-group">
                            <textarea name="content" placeholder="Dodaj komentarz..." required></textarea>
                        </div>
                        <button type="submit" class="primary-button">Dodaj komentarz</button>
                    </form>
                </li>
            @empty
                <p>Brak udostępnionych przepisów.</p>
            @endforelse
        </ul>
    </main>
</div>
</body>
</html>
