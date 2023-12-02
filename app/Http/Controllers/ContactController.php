<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function createContact(Request $request){
        $fields = $request->validate([
            'name' => 'required',
            'contact' => 'required',
            'email' => 'required'
        ]);

        print_r($fields);
    }
}