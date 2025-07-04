<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    public function submit(Request $request) {
        
        $messages = [
            'name.required' => 'Ime je obavezno polje',
            'phone.required' => 'Molimo vas, upišite vaš broj telefona',
            'phone.string' => "Broj telefona nije validnog formata",
            'phone.min:9' => 'Broj telefona mora imati najmanje 9 cifara',
            'phone.max:15' => 'Broj telefona ne sme imati više od 15 cifara',
            'email.required' => 'Molimo vas, upišite vašu email adresu',
            'email.email' => 'Email adresa nije validnog formata'
        ];
        
        try {
            $data = $request->validate([
                'name' => 'required| string',
                'phone' => 'required| string| min:9| max:15',
                'email' => 'required| email',
                'message' => 'required| string'
            ], $messages);

            return response()->json(['message: ' => 'Poruka poslata uspešno!', $request->all()]);

        } catch(ValidationException $e) {
            return response()->json(['errors: ' => `Greška prilikom slanja poruke: ` . $e->errors()], 422);
        }
        
        
        
    }
}
