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

Route::get('/assignbook', 'Student\AssignBookController@index');
Route::get('/getStudentData', 'Student\AssignBookController@getStudentData')->name('getStudentData');
Route::get('/getStudentBook', 'Student\AssignBookController@getStudentBook')->name('getStudentBook');

Route::get('/getBookData', 'Student\AssignBookController@getBookData')->name('getBookData');

Route::post('/addBooks', 'Student\AssignBookController@addBooks')->name('addBooks');

Route::get('/deleteBook', 'Student\AssignBookController@deleteBook')->name('deleteBook');



Auth::routes();

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login'); // admin login page
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit'); // admin login with backend
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout'); // admin logout

    // librarian routes
    Route::get('/librarians', 'Admin\AdminLibrariansController@index'); // librarians list page
    Route::post('/addLibrarian', 'Admin\AdminLibrariansController@save')->name('admin.addLibrarian'); // add librarian into database
    Route::get('/editLibrarian', 'Admin\AdminLibrariansController@edit')->name('admin.editLibrarian'); // get perticular librarian data from database
    Route::post('/updateLibrarian', 'Admin\AdminLibrariansController@update')->name('admin.updateLibrarian'); // update perticular librarian into database
    Route::get('/deleteLibrarian', 'Admin\AdminLibrariansController@delete')->name('admin.deleteLibrarian'); // delete perticular librarian into database
});

// Librarian Routes
Route::prefix('librarian')->group(function () {
    Route::get('/', 'LibrarianController@index')->name('librarian.dashboard');
    Route::get('/login', 'Auth\LibrarianLoginController@showLoginForm')->name('librarian.login'); // librarian login page
    Route::post('/login', 'Auth\LibrarianLoginController@login')->name('librarian.login.submit'); // librarian login with backend
    Route::get('/logout', 'Auth\LibrarianLoginController@librarian_logout')->name('librarian.logout'); // librarian logout

    // books routes
    Route::get('/books', 'Librarian\BooksController@index'); // books list page
    Route::post('/addBooks', 'Librarian\BooksController@save')->name('librarian.addBook'); // add books into database
    Route::get('/editBooks', 'Librarian\BooksController@edit')->name('librarian.editBook'); // get perticular book data from database
    Route::post('/updateBooks', 'Librarian\BooksController@update')->name('librarian.updateBook'); // update perticular book into database
    Route::get('/deleteBooks', 'Librarian\BooksController@delete')->name('librarian.deleteBook'); // delete perticular book from database
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

// book history routes
Route::get('/book-history', 'Student\BookHistoryController@index');
