<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
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
                    <li class="unique_id" id="' . $value->id . '">' . $value->name . '<br /><span>' . $value->unique_id . '</span></li>
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
        $assign = AssignBooks::select('assign_date', 'return_date', 'book_name', 'book_inr_no', 'book_rfid')->join('books', 'books.id', '=', 'assign_books.book_id')->get();
        $i = 0;
        foreach ($assign as $value) {
            $response .= '
            <tr>
                <td>' . ++$i . '</td>
                <td>' . $value->book_name . '</td>
                <td>' . $value->book_inr_no . '</td>
                <td>' . $value->book_rfid . '</td>
                <td>' . $value->book_assign_date . '</td>
                <td>' . $value->return_date . '</td>
                <td><button class="btn btn-red-4 btn-round pull-right" href="#"><i class="fa fa-times"></i></button></td>
              </tr>
            ';
        }
        return response()->json($response);
    }
}
