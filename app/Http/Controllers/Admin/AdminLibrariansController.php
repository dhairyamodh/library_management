<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Librarian;
use Illuminate\Support\Facades\Validator;

class AdminLibrariansController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $librarian = Librarian::orderBy('id', 'DESC')->get();
        return view('admin.addlibrarian')->with(['librarian' => $librarian]);
    }

    public function save(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string',
                'email' => 'required|email',
                'password' => 'required'
            ]
        );
        if ($validator->fails()) {
            $response = $validator->messages();
        }
        $librarian = new Librarian;
        $librarian->name = $request->get('name');
        $librarian->email = $request->get('email');
        $librarian->password = Hash::make($request->get('password'));
        $librarian->librarian_status = $request->get('status');

        if ($librarian->save()) {
            $response = array(
                'status' => 'success',
                'title' =>  'Success',
                'msg'   =>  'New Librarian Added Successfully'
            );
        } else {
            $response = array(
                'status' => 'error',
                'title' =>  'Error',
                'msg'   =>  'Librarian Not Added'
            );
        }
        return response()->json($response, 200);
    }

    public function edit(Request $request)
    {
        $id = $request->get('id');
        $librarian = Librarian::where(['id' => $id])->get();
        foreach ($librarian as $value) {
            $data = [
                'id' => $value->id,
                'name' => $value->name,
                'email' => $value->email,
                'status' => $value->librarian_status,
            ];
        }
        return response()->json($data, 200);
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $librarian = Librarian::find($id);
        $librarian->name = $request->get('name');
        $librarian->email = $request->get('email');
        $librarian->librarian_status = $request->get('status');

        if ($librarian->update()) {
            $response = array(
                'status' => 'success',
                'title' =>  'Success',
                'msg'   =>  'Librarian Updated Successfully'
            );
        } else {
            $response = array(
                'status' => 'error',
                'title' =>  'Error',
                'msg'   =>  'Librarian Not Updated'
            );
        }
        return response()->json($response, 200);
    }

    public function delete(Request $request)
    {
        $id = $request->get('id');
        $librarian = Librarian::find($id);
        if ($librarian->delete()) {
            $response = array(
                'status' => 'success',
                'title' =>  'Success',
                'msg'   =>  'Librarian Deleted Successfully'
            );
        } else {
            $response = array(
                'status' => 'error',
                'title' =>  'Error',
                'msg'   =>  'Librarian Not Deleted'
            );
        }
        return response()->json($response, 200);
    }
}
