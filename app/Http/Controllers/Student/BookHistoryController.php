<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AssignBooks;
use Illuminate\Support\Facades\Auth;

class BookHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $books = AssignBooks::select('assign_date', 'return_date', 'book_name', 'book_inr_no', 'book_rfid', 'book_unique_id')->join('books', 'books.book_unique_id', '=', 'assign_books.book_id')->where('assign_books.user_id', Auth::user()->unique_id)->get();
        return view('student.bookhistory')->with(['books' => $books]);
    }
}
