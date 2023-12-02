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
        $fields = $request->validate([
            'name' => ['required', 'min:5', 'max:20', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:20']
        ]);

        $fields['password'] = bcrypt($fields['password']);

        $user = User::create($fields);

        auth()->login($user);

        return redirect('/');
    }


    public function login(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

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
