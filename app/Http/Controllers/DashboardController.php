<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class DashboardController extends Controller
{
    public function index() {
        $books = Book::latest()->take(8)->get();
        return view('dashboard', compact('books'));
    }

    public function attach(Request $request, Book $book){
        $request->user()->books()->attach($book->id);

        return view('userBooks')->with('success', 'Le livre a été ajouté à votre bibliothèque.');
    }
}