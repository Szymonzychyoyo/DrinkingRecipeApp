<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RecipeController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        // Pobieranie przepisów użytkownika
        $recipes = auth()->user()->recipes()->get();

        return view('dashboard', compact('recipes'));
    }

    public function shared()
    {

        $sharedRecipes = Recipe::where('is_shared', true)->get();

        return view('shared_recipes', compact('sharedRecipes'));
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Obsługa przesłania zdjęcia
        if ($request->hasFile('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('recipes/photos', 'public');
        }

        // Tworzenie przepisu
        auth()->user()->recipes()->create($validatedData);

        return redirect()->route('recipes.index')->with('success', 'Przepis został dodany!');
    }

    public function edit(Recipe $recipe)
    {
        $this->authorize('view', $recipe);

        return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        $this->authorize('update', $recipe);

        // Walidacja danych
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_photo' => 'nullable|boolean',
        ]);

        // Obsługa usunięcia zdjęcia
        if ($request->has('remove_photo') && $request->remove_photo) {
            if ($recipe->photo) {
                \Storage::disk('public')->delete($recipe->photo);
                $recipe->photo = null;
            }
        }

        // Obsługa przesłania nowego zdjęcia
        if ($request->hasFile('photo')) {
            if ($recipe->photo) {
                \Storage::disk('public')->delete($recipe->photo);
            }
            $validatedData['photo'] = $request->file('photo')->store('recipes/photos', 'public');
        }

        // Aktualizacja przepisu
        $recipe->update($validatedData);

        return redirect()->route('recipes.index')->with('success', 'Przepis został zaktualizowany!');
    }

    public function destroy(Recipe $recipe)
    {
        $this->authorize('delete', $recipe);

        if ($recipe->photo) {
            \Storage::disk('public')->delete($recipe->photo);
        }

        $recipe->delete();

        return redirect()->route('recipes.index')->with('success', 'Przepis został usunięty!');
    }

    public function share(Recipe $recipe)
    {
        $this->authorize('update', $recipe);

        $recipe->update(['is_shared' => !$recipe->is_shared]);

        return redirect()->route('recipes.index')->with(
            'success',
            $recipe->is_shared ? 'Przepis został udostępniony!' : 'Udostępnienie przepisu zostało cofnięte!'
        );
    }
}
