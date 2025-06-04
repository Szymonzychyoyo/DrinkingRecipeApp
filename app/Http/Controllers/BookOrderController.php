<?php

namespace App\Http\Controllers;

use App\Models\BookOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookOrderController extends Controller
{
    public function create()
    {
        return view('order_book');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:500',
            'phone' => [
                'required',
                'digits:9', // Numer telefonu musi mieć dokładnie 9 cyfr
                'regex:/^\d{9}$/', // Sprawdza, czy składa się wyłącznie z cyfr
            ],
        ], [
            'full_name.required' => 'Imię i nazwisko są wymagane.',
            'phone.digits' => 'Numer telefonu musi mieć dokładnie 9 cyfr.',
            'phone.regex' => 'Numer telefonu może zawierać wyłącznie cyfry.',
        ]);

        BookOrder::create([
            'user_id' => Auth::id(),
            'full_name' => $validatedData['full_name'],
            'email' => $validatedData['email'],
            'address' => $validatedData['address'],
            'phone' => $validatedData['phone'],
            'status' => 'Oczekujące',
        ]);

        return redirect()->route('dashboard')->with('success', 'Zamówienie zostało złożone!');
    }

}
