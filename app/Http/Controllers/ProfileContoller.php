<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;

class ProfileContoller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile');
    }

    public function save(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'secondary_email' => 'nullable|email',
            'phone' => 'nullable|regex:/^(\+\d{1,3}[- ]?)?\d{10}$/',
        ];

        $messages = [
            'name.required' => 'Name is required.',
            'email.required' => 'Email address is required.',
            'phone.regex' => "Please enter valid mobile number",
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('/profile')
                ->withErrors($validator)
                ->withInput();
        }
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->secondary_email = $request->input('secondary_email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');

        if ($user->update()) {
            return redirect('/profile')->withSuccess('Profile Updated Successfully');
        }
        return redirect('/profile')->widthError('Profile Not Updated');
    }

    public function changeAvatar(Request $request, $id)
    {
        $user = User::find($id);

        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/profile/avatar/', $filename);
            $user->avatar = 'uploads/profile/avatar/' . $filename;
        }

        if ($user->update()) {
            return response()->json(['status' => 'success', 'message' => 'Profile image updated successfully']);
        }
        return response()->json(['status' => 'error', 'message' => 'Profile image not updated']);
    }
}
