<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Take the values from the form
        $fields = $request->validate([
            'name' => ['required', 'min:5', 'max:20', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:20']
        ]);

        // Hashing password to store in database
        $fields['password'] = bcrypt($fields['password']);
        // Capitalizing the name
        $fields['name'] =  ucwords($fields['name']);
        
        // Create a new instance with the User model with the incoming data
        $user = User::create($fields);

        // Login the user
        auth()->login($user);

        return redirect('/');
    }


    public function login(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        // Check in the database if there is a user with this name and password
        if (
            auth()->attempt(['name' => $fields['name'], 'password' => $fields['password']])
        ) {
            $request->session()->regenerate();
        }

        return redirect('/');
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
