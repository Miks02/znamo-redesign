<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLogin() {
        
        if(Auth::check())
            return view('navbar.administracija-dashboard');
        
        return view('navbar.administracija-login');
    }
    public function authenticate(Request $request) {
        
        $messages = [
            'email.required' => 'Unesite email adresu',
            'email.email' => 'Nevalidna email adresa',
            'password.required' => 'Unesite lozinku',
            'password.string' => 'Nevalidan format lozinke',
            
        ];
        
        try {
            $credentials = $request->validate([
                'email' => ['required','email'],
                'password' => ['required','string'],
            ], $messages);
            
            
            if(Auth::attempt($credentials, $request->boolean('remember'))) {
                $request->session()->regenerate();
               
                return response()->json(['message' => "Login uspešan", 'redirect_url' => route('dashboard')]);
                
            }
            return response()->json(['message' => 'Neispravni podaci', $request->all()], 401);
            
        } catch(ValidationException $e) {
            return response()->json(['errors: ' => $e->errors()]);
        }
   
    }
    
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if($request->ajax() || $request->wantsJson())
            return response()->json(['message', "Korisnik je izlogovan"]);

        return redirect()->route('login');
    }
}
