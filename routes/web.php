<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\bookController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\AuthorController;



// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('books', [bookController::class, 'index'])->name('books');
Route::post('books', [bookController::class, 'store']);
Route::get('/books/delete/{id}', [bookController::class, 'destroy']);
Route::get('/books/edit/{id}', [bookController::class, 'edit']);
Route::post('/books/update/{id}', [bookController::class, 'update']);
Route::get('search', [bookController::class, 'search']);

// Route::get('authors', [bookController::class, 'authors']);
Route::resource('/authors', AuthorController::class);
Route::get('authors/search', [AuthorController::class, 'search']);
Route::get('/authors/delete/{id}', [AuthorController::class, 'destroy']);

Route::get('/profile/{email}', [profileController::class, 'index']);
Route::get('/profile/edit/{id}', [profileController::class, 'edit']);
Route::post('/profile/update/{id}', [profileController::class, 'update']);

Route::get('users', [usersController::class, 'index']);

// Route::get('/login1', function () {
//     return view('authentication.login');
// });
// Route::get('/profile/{email}', function ($email) {
//     $emails = book::find($email);
//     return view('profile',['email'=>$email]);
//     // view('home',['books'=>$books]);
// });

