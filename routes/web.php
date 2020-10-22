<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('welcome');
});

Auth::routes();

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login'); // admin login page
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit'); // admin login with backend
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout'); // admin logout

    // librarian routes
    Route::get('/librarians', 'Admin\AdminLibrariansController@index');
});

// Librarian Routes
Route::prefix('librarian')->group(function () {
    Route::get('/', 'LibrarianController@index')->name('librarian.dashboard');
    Route::get('/login', 'Auth\LibrarianLoginController@showLoginForm')->name('librarian.login'); // librarian login page
    Route::post('/login', 'Auth\LibrarianLoginController@login')->name('librarian.login.submit'); // librarian login with backend
    Route::get('/logout', 'Auth\LibrarianLoginController@librarian_logout')->name('librarian.logout'); // librarian logout
});


// User Routes
Route::get('/logout', 'Auth\LoginController@userLogout')->name('user.logout'); // user logout

//profile routes
Route::get('/profile', 'ProfileContoller@index')->name('profile'); // profile page link
Route::put('/save-profile/{id}', 'ProfileContoller@save'); // save profile
Route::post('/change-avatar/{id}', 'ProfileContoller@changeAvatar'); // change profile picture

//social login route
Route::get('login/{provider}', 'SocialController@redirect');
Route::get('login/{provider}/callback', 'SocialController@Callback');
Route::get('login/twitter/callback', 'SocialController@TwitterCallback');
