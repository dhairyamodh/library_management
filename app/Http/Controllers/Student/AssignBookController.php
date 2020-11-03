<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Books;
use App\AssignBooks;

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
            $users = User::where('unique_id', 'like', '%' . $request->get('user_id') . '%')->get();
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
            $books = Books::where('book_unique_id', 'like', '%' . $request->get('book_id') . '%')->get();
            if (count($books) > 0) {
                $response .= '<ul class="results">';
                foreach ($books as $value) {
                    $response .= '
                    <li class="book_id" id="' . $value->id . '">' . $value->book_name . '<br /><span>' . $value->book_unique_id . '</span></li>
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
        } else if ($checkbook > 0) {
            $response = array(
                'status' => 'error',
                'title' =>  'Error',
                'msg'   =>  'Book Already Added!'
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
                'msg'   =>  'New Book Added Successfully'
            );
        } else {
            $response = array(
                'status' => 'error',
                'title' =>  'Error',
                'msg'   =>  'Book Not Added!'
            );
        }
        return response()->json($response, 200);
    }
}
