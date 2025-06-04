<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Recipe;

class CommentController extends Controller
{
    public function store(Request $request, Recipe $recipe)
    {
        $validatedData = $request->validate([
            'content' => 'required|string|max:500', // Walidacja treści komentarza
        ]);

        // Tworzenie komentarza
        $recipe->comments()->create([
            'user_id' => auth()->id(),
            'content' => $validatedData['content'],
        ]);

        return redirect()->route('recipes.shared')->with('success', 'Komentarz został dodany!');
    }
    public function destroy(Comment $comment)
    {
        // Sprawdzenie, czy użytkownik jest właścicielem komentarza
        if ($comment->user_id !== auth()->id()) {
            abort(403, 'Nie masz uprawnień do usunięcia tego komentarza.');
        }

        // Usunięcie komentarza
        $comment->delete();

        return redirect()->route('recipes.shared')->with('success', 'Komentarz został usunięty!');
    }

}
