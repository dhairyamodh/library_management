<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\invoiceBooks;
use Illuminate\Support\Facades\Auth;

class BookHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $books = invoiceBooks::select('invoice_id', 'assign_date', 'return_date', 'book_name', 'book_inr_no', 'book_rfid', 'book_unique_id')->join('books', 'books.book_unique_id', '=', 'invoice_books.book_id')->where('invoice_books.user_id', Auth::user()->unique_id)->get();
        // return view('student.bookhistory')->with(['books' => $books]);
        $books = invoiceBooks::where('user_id', Auth::user()->unique_id)->get();
        return view('student.bookhistory')->with(['books' => $books]);
    }
}
