<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moje Przepisy</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('ikonaStron.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
<div class="dashboard-container">
    <header class="dashboard-header">
        <h1>Moje Przepisy</h1>
        <div class="dashboard-nav-links">
            <a href="{{ route('profile.edit') }}" class="dashboard-nav-link">Mój profil</a>
            <a href="{{ route('book-order.create') }}" class="dashboard-nav-link">Zamów książkę</a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="dashboard-logout-button">Wyloguj</button>
            </form>
            <a href="{{ route('recipes.shared') }}" class="dashboard-nav-link">Udostępnione przepisy</a>
        </div>

    </header>

    <main class="dashboard-main">
        <h2 class="dashboard-title">Lista Przepisów</h2>
        <ul class="recipe-list">
            @forelse ($recipes as $recipe)
                <li class="recipe-item">
                    @if ($recipe->photo)
                        <img src="{{ asset('storage/' . $recipe->photo) }}" alt="Zdjęcie przepisu" class="recipe-photo">
                    @endif
                    <div class="recipe-details">
                        <h3 class="recipe-name">{{ $recipe->name }}</h3>
                        <p class="recipe-ingredients"><strong>Składniki:</strong> {{ $recipe->ingredients }}</p>
                        <p class="recipe-instructions"><strong>Instrukcje:</strong> {{ $recipe->instructions }}</p>
                    </div>
                    <div class="recipe-actions">
                        <form method="POST" action="{{ route('recipes.share', $recipe) }}">
                            @csrf
                            <button type="submit">
                                {{ $recipe->is_shared ? 'Cofnij udostępnienie' : 'Udostępnij' }}
                            </button>
                        </form>
                        <a href="{{ route('recipes.edit', $recipe) }}">Edytuj</a>
                        <form method="POST" action="{{ route('recipes.destroy', $recipe) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Usuń</button>
                        </form>
                    </div>
                </li>
            @empty
                <p>Brak przepisów do wyświetlenia.</p>
            @endforelse
        </ul>
        <a href="{{ route('recipes.create') }}" class="add-recipe-button">Dodaj nowy przepis</a>
    </main>
</div>
</body>
</html>
