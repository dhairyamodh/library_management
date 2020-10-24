<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LibrarianLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:librarian', ['except' => ['librarian_logout']]);
    }
    public function showLoginForm()
    {
        return view('auth.librarian-login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('librarian')->attempt(['email' => $request->email, 'password' => $request->password, 'librarian_status' => 'active'], $request->remember)) {
            return redirect()->intended(route('librarian.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'))->withError('Email or password is incorrect');
    }

    public function librarian_logout()
    {
        Auth::guard('librarian')->logout();

        return redirect('/librarian');
    }
}
