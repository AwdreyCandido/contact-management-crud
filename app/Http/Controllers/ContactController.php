<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function createContact(Request $request)
    {

        $fields = $request->validate([
            'name' => 'required',
            'contact' => 'required',
            'email' => 'required'
        ]);

        $fields['user_id'] = auth()->id();

        print_r($fields);

        Contact::create($fields);

        return redirect('/');
    }
}
