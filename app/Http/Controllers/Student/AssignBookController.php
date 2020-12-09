<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Books;
use App\AssignBooks;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use App\invoiceBooks;


class AssignBookController extends Controller
{
    public function index()
    {
        return view('student.assignbook');
    }

    public function getStudentData(Request $request)
    {
        $response = '';
        if (!empty($request->get('user_id'))) {
            $users = User::where('unique_id', 'like', '%' . $request->get('user_id') . '%')->orWhere('name', 'like', '%' . $request->get('user_id') . '%')->orWhere('email', 'like', '%' . $request->get('user_id') . '%')->get();
            if (count($users) > 0) {
                $response .= '<ul class="results">';
                foreach ($users as $value) {
                    $response .= '
                    <li class="unique_id" id="' . $value->unique_id . '">' . $value->name . '<br /><span>' . $value->unique_id . '</span></li>
                    ';
                }
                $response .= '</ul>';
            } else {
                $response .= '<ul class="results" style="height:auto;overflow:hidden;"><li style="text-align:center;"><i>Not found!</i></li></ul>';
            }
        }
        return response()->json($response);
    }

    public function getStudentBook(Request $request)
    {
        $response = '';
        $uniqid = $request->get('uniqid');
        $assign = AssignBooks::select('assign_date', 'return_date', 'book_name', 'book_inr_no', 'book_rfid', 'book_unique_id')->join('books', 'books.book_unique_id', '=', 'assign_books.book_id')->where('assign_books.user_id', $uniqid)->get();
        $i = 0;
        if (count($assign) > 0) {
            foreach ($assign as $value) {
                $response .= '
            <tr>
                <td>' . ++$i . '</td>
                <td>' . $value->book_name . '</td>
                <td>' . $value->book_inr_no . '</td>
                <td>' . $value->book_rfid . '</td>
                <td>' . $value->assign_date . '</td>
                <td>' . $value->return_date . '</td>
                <td><button class="btn btn-red-4 btn-round pull-right delete_book" book_id="' . $value->book_unique_id . '"><i class="fa fa-times"></i></button></td>
              </tr>
            ';
            }
        } else {
            $response .= '
            <tr>
                <td colspan=7>No Book Assigned</td>
                
              </tr>
            ';
        }
        return response()->json($response);
    }

    public function getBookData(Request $request)
    {
        $response = '';
        if (!empty($request->get('book_id'))) {
            $books = Books::where('book_unique_id', 'like', '%' . $request->get('book_id') . '%')->orWhere('book_name', 'like', '%' . $request->get('book_id') . '%')->orWhere('book_inr_no', 'like', '%' . $request->get('book_id') . '%')->orWhere('book_rfid', 'like', '%' . $request->get('book_id') . '%')->get();
            if (count($books) > 0) {
                $response .= '<ul class="results">';
                foreach ($books as $value) {
                    $response .= '
                    <li class="book_id" id="' . $value->book_unique_id . '">' . $value->book_name . '<br /><span>' . $value->book_rfid . '</span></li>
                    ';
                }
                $response .= '</ul>';
            } else {
                $response .= '<ul class="results" style="height:auto;overflow:hidden;"><li style="text-align:center;"><i>Not found!</i></li></ul>';
            }
        }
        return response()->json($response);
    }

    public function addBooks(Request $request)
    {

        $checkbook = AssignBooks::where(['book_id' => $request->get('book_id')])->count();
        $invoicebook = invoiceBooks::where(['book_id' => $request->get('book_id')])->count();
        $checkuser = User::where(['unique_id' => $request->get('user_id')])->count();
        $checkbookid = Books::where(['book_unique_id' => $request->get('book_id')])->count();
        if ($checkuser <= 0) {
            $response = array(
                'status' => 'error',
                'title' =>  'Error',
                'msg'   =>  'User Not Found!'
            );
        } else if ($checkbookid <= 0) {
            $response = array(
                'status' => 'error',
                'title' =>  'Error',
                'msg'   =>  'Book Not Found!'
            );
        } else if ($checkbook > 0 || $invoicebook > 0) {
            $response = array(
                'status' => 'error',
                'title' =>  'Error',
                'msg'   =>  'Book Not Available!'
            );
        } else {

            $assignbook = new AssignBooks;
            $assignbook->user_id = $request->get('user_id');
            $assignbook->book_id = $request->get('book_id');
            $assignbook->assign_date = date('d-m-Y');
            $assignbook->return_date = $request->get('return_date');

            if ($assignbook->save()) {
                $response = array(
                    'status' => 'success',
                    'title' =>  'Success',
                    'msg'   =>  'New Book Added Successfully'
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'title' =>  'Error',
                    'msg'   =>  'Book Not Added!'
                );
            }
        }
        return response()->json($response, 200);
    }

    public function deleteBook(Request $request)
    {
        $deleteBook = AssignBooks::where(['book_id' => $request->get('book_id')]);
        if ($deleteBook->delete()) {
            $response = array(
                'status' => 'success',
                'title' =>  'Success',
                'msg'   =>  'Book Deleted Successfully'
            );
        } else {
            $response = array(
                'status' => 'error',
                'title' =>  'Error',
                'msg'   =>  'Book Not Deleted!'
            );
        }
        return response()->json($response, 200);
    }

    public function generateInvoice(Request $request)
    {
        $getUser = User::where(['unique_id' => $request->get('user_id')])->get();
        foreach ($getUser as $user) {
            $name = $user->name;
            $email = $user->email;
            $address = $user->address;
            $phone = $user->phone;
            $id = $user->unique_id;
        }
        $assigned =  AssignBooks::select('assign_date', 'return_date', 'book_name', 'book_inr_no', 'book_rfid', 'book_unique_id')->join('books', 'books.book_unique_id', '=', 'assign_books.book_id')->where('assign_books.user_id', $request->get('user_id'))->get();
        $invoice_id = rand(1000000000, 9999999999);
        foreach ($assigned as $book) {
            $books = array(
                'book_name' => $book->book_name,
                'book_inr_no' => $book->book_inr_no,
                'book_rfid' => $book->book_rfid,
                'book_unique_id' => $book->book_unique_id,
                'assign_date' => $book->assign_date,
                'return_date' => $book->return_date
            );
            $invoice = new invoiceBooks;
            $invoice->invoice_id = $invoice_id;
            $invoice->user_id = $request->get('user_id');
            $invoice->book_id = $book->book_unique_id;
            $invoice->assign_date = $book->assign_date;
            $invoice->return_date = $book->return_date;
            $invoice->save();
        }

        $data = array(
            'invoice_id' => $invoice_id,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'id' => $id,
            'books' => [$books],
        );




        view()->share('assignBook', $data);
        $pdf = PDF::loadView('student/bookInvoice', $data);
        $path = public_path('book_invoices');
        $fileName =  'invoice-' . $invoice_id . '.' . 'pdf';
        $pdf->save($path . '/' . $fileName);
        $deleteAssign = AssignBooks::where(['user_id' => $request->get('user_id')]);
        $deleteAssign->delete();
        $response = array(
            'status' => 'success',
            'title' =>  'Success',
            'msg'   =>  'Books assign to student successfully'
        );
        return response()->json($response, 200);
        // echo sizeOf($books);
        // var_dump($data);
    }
}
