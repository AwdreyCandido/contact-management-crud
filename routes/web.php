<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Models\Contact;
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
    $contacts = Contact::all();
    if (auth()->check()) {
        $contacts = auth()->user()->userContacts()->get();
    }

    return view('home', ['contacts' => $contacts]);
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
// edit contact route
Route::get('/edit-contact/{contact}', [ContactController::class, 'showEditScreen']);
Route::put('/edit-contact/{contact}', [ContactController::class, 'updateContact']);
Route::delete('/delete-contact/{contact}', [ContactController::class, 'deleteContact']);

// see contact details
Route::get('/contact-details/{contact}', [ContactController::class, 'showDetailsScreen']);
