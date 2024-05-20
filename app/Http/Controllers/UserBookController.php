<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;

class UserBookController extends Controller
{
    public function attach(Request $request, Book $book)
    {
        $request->user()->books()->attach($book->id, ['created_at' => now()]);

        return redirect()->route('user.books.index')->with('success', 'Le livre a été ajouté à votre bibliothèque.');
    }

    public function detach(Request $request, Book $book)
{
    // Vérifiez que la méthode de la requête est DELETE
    if ($request->method() === 'DELETE') {
        $request->user()->books()->detach($book->id);

        return redirect()->route('user.books.index')->with('success', 'Le livre a été retiré de votre bibliothèque.');
    }

    // Si la méthode de la requête n'est pas DELETE, renvoyez une réponse d'erreur
    abort(405, 'Méthode non autorisée');
}


    public function index()
    {
        return view('userBooks');
    }

}
