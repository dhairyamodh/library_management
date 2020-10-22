<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminLibrariansController extends Controller
{
    public function index()
    {
        return view('admin.addlibrarian');
    }
}
