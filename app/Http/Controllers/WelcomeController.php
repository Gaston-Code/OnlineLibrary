<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $books = Book::get();
        return view('welcome', compact('books'));
    }
}
