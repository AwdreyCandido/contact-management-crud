<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// USER ROUTES

// create register route
// create access new contact form route
Route::get('/register', function () {
    return view('register');
});
Route::post('/register', [UserController::class, 'register']);

// create login route
Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [UserController::class, 'login']);

// create logout route

Route::post('/logout', [UserController::class, 'logout']);

// CONTACT ROUTES

// create access new contact form route
Route::get('/new-contact', function () {
    return view('new-contact');
});
// create new contact route
Route::post('/new-contact', [ContactController::class, 'createContact']);
