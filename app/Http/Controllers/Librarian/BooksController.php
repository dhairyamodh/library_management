<?php

namespace App\Http\Controllers\Librarian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Books;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:librarian');
    }

    public function index()
    {
        $books = Books::all();
        return view('librarian.books')->with(['books' => $books]);
    }
}
