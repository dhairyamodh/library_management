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

    public function save(Request $request)
    {
        $books = new Books;

        $books->book_unique_id = rand(1000000000, 9999999999);
        $books->book_name = $request->get('name');
        $books->book_inr_no = $request->get('inr_no');
        $books->book_rfid = $request->get('rfid_no');
        $books->book_status = $request->get('status');

        if ($books->save()) {
            $response = array(
                'status' => 'success',
                'title' =>  'Success',
                'msg'   =>  'New Book Added Successfully'
            );
        } else {
            $response = array(
                'status' => 'error',
                'title' =>  'Error',
                'msg'   =>  'Book Not Added'
            );
        }
        return response()->json($response, 200);
    }

    public function edit(Request $request)
    {
        $books = Books::where(['id' => $request->get('id')])->get();

        foreach ($books as $value) {
            $data = [
                'id' => $value->id,
                'name' => $value->book_name,
                'inr_no' => $value->book_inr_no,
                'rfid_no' => $value->book_rfid,
                'status' => $value->book_status
            ];
        }
        return response()->json($data, 200);
    }

    public function update(Request $request)
    {
        $books = Books::find($request->id);

        $books->book_name = $request->get('name');
        $books->book_inr_no = $request->get('inr_no');
        $books->book_rfid = $request->get('rfid_no');
        $books->book_status = $request->get('status');

        if ($books->update()) {
            $response = array(
                'status' => 'success',
                'title' =>  'Success',
                'msg'   =>  'Book Updated Successfully'
            );
        } else {
            $response = array(
                'status' => 'error',
                'title' =>  'Error',
                'msg'   =>  'Book Not Updated'
            );
        }
        return response()->json($response, 200);
    }
    public function delete(Request $request)
    {
        $books = Books::find($request->get('id'));

        if ($books->delete()) {
            $response = array(
                'status' => 'success',
                'title' =>  'Success',
                'msg'   =>  'Book Deleted Successfully'
            );
        } else {
            $response = array(
                'status' => 'error',
                'title' =>  'Error',
                'msg'   =>  'Book Not Deleted'
            );
        }
        return response()->json($response, 200);
    }
}
