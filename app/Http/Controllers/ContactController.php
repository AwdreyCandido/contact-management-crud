<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{

    public function updateContact(Contact $contact, Request $request)
    {

        if (auth()->user()->id !== $contact['user_id']) {
            return redirect('/');
        }

        $incomingFields = $request->validate(
            [
                'name' => ["required", "min:6"],
                'contact' => ["required", "digits:9", Rule::unique('contacts', 'contact')],
                'email' => ["required", "email", Rule::unique('contacts', 'email')]
            ]
        );

        $contact->update($incomingFields);

        return redirect('/');
    }

    public function showEditScreen(Contact $contact)
    {
        if (auth()->user()->id !== $contact['user_id']) {
            return redirect('/');
        }
        return view('edit-contact', ['contact' => $contact]);
    }

    public function showDetailsScreen(Contact $contact)
    {
        return view('contact-details', ['contact' => $contact]);
    }

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

    public function deleteContact(Contact $contact)
    {
        if (auth()->user()->id === $contact['user_id']) {
            $contact->delete();
        }
        return redirect('/');
    }
}
