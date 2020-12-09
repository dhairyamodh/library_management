<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\invoiceBooks;
use Illuminate\Support\Facades\Mail;

class InvoiceBooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $books = invoiceBooks::select('invoice_id', 'assign_date', 'return_date', 'book_name', 'book_inr_no', 'book_rfid', 'book_unique_id')->join('books', 'books.book_unique_id', '=', 'invoice_books.book_id')->where('invoice_id', $id)->get();
        return view('student.invoicebooks')->with(['books' => $books]);
    }
    public function share_invoice(Request $request)
    {

        $data = array('email' => $request->get('email'), 'invoice_id' => $request->get('invoice_id'), 'url' => 'http://' . request()->getHttpHost());
        Mail::send('mail.share-invoice', $data, function ($message) use ($data) {
            $message->to($data['email'], $data['email'])->subject('Invoice #' . $data['invoice_id'] . ' - Library Self Checkout');
            $message->attach('book_invoices/invoice-' . $data['invoice_id'] . '.pdf');
            $message->from(env('MAIL_USERNAME'), 'Library Self Checkout');
        });
        $response = array(
            'status' => 'success',
            'title' =>  'Success',
            'msg'   =>  'Invoice Send Successfully'
        );
        return response()->json($response, 200);
    }
}
