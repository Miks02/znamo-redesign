<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function register(Request $request)
    {
        $messages = [
            'firstName.required' => 'Ime je obavezno polje',
            'lastName.required' => 'Prezime je obavezno polje',
            'email.required' => 'Molimo vas, upišite vašu email adresu',
            'email.email' => 'Email adresa nije validnog formata',
            'username.required' => 'Korisničko ime je obavezno polje',
            'password.required' => 'Lozinka je obavezno polje',
            'phone.required' => 'Molimo vas, upišite vaš broj telefona',
            'phone.string' => "Broj telefona nije validnog formata",
            'phone.min:9' => 'Broj telefona mora imati najmanje 9 cifara',
            'phone.max:15' => 'Broj telefona ne sme imati više od 15 cifara',

        ];

        try {
            $data = $request->validate([
                'firstName' => ['required', 'string'],
                'lastName' => ['required', 'string'],
                'email' => ['required', 'email'],
                'username' => ['required', 'string'],
                'password' => ['required', 'string'],
                'phoneNumber' => ['required', 'string', 'min:9', 'max:15'],
                'is_admin' => ['required', 'boolean']
            ], $messages);

            $user = User::create([
                'first_name' => $data['firstName'],
                'last_name' => $data['lastName'],
                'email' => $data['email'],
                'username' => $data['username'],
                'password' => Hash::make($data['password']),
                'phone_number' => $data['phoneNumber'],
                'is_admin' => $data['is_admin']
            ]);

            return response()->json(['message', "Korisnik je uspesno dodat ", 'Korisnik: ' => $user]);

        } catch (ValidationException $e) {
            return response()->json(['errors', 'Greška prilikom dodavanja korisnika: ', 'errors' => $e->errors()], 422);
        }

    }

    public function getAllUsers()
    {
        $user = User::withCount('projects')->get();

        return response()->json($user);

    }

    public function getUserById($id)
    {
        $user = User::find($id);

        if (!$user)
            return response()->json()(["errors", "Korisnik nije pronadjen"]);

        return response()->json($user);

    }

    public function deleteUser($id)
    {
        $user = User::find($id);


        if ($user) {
            $isAuth = $user == Auth::user() ? true : false;
            $user->delete();
            if ($isAuth)
                return response()->json($isAuth = true);
        } else
            return response()->json()(['errors', "Greska prilikom brisanja korisnika"]);

    }

    public function updatePatchUser($id, Request $request)
    {
        $user = User::find($id);

        if (!$user)
            return response()->json()(['errors', "Korisnik nije pronadjen"]);

        $data = $request->validate([
            'firstName' => ['nullable', 'string'],
            'lastName' => ['nullable', 'string'],
            'email' => ['nullable', 'email'],
            'username' => ['nullable', 'string', 'min:4'],
            'password' => ['nullable', 'string', 'min:6'],
            'phoneNumber' => ['nullable', 'string', 'min:9', 'max:15'],
            'is_admin' => ['nullable', 'boolean']
        ]);

        if (count(array_filter($data, fn($v) => !is_null($v) && $v !== '')) === 0) {
            return response()->json(['message', "Niste napravili nikakve izmene"]);
        }

        $user->first_name = $data['firstName'];
        $user->last_name = $data['lastName'];
        $user->email = $data['email'];
        $user->username = $data['username'];
        $user->phone_number = $data['phoneNumber'];
        $user->is_admin = $data['is_admin'];



        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        $user->save();

        return response()->json(['message', "Korisnik je uspesno azuriran ", 'user' => $user]);


    }

    public function isAuthAdmin()
    {
        $isAdmin = Auth::user()->is_admin ? true : false;

        return response()->json($isAdmin);

    }

    public function getAuthUserId()
    {
        if(!Auth::check()) {
            return response()->json(0);
        }
        return response()->json(Auth::user()->id);
    }

}
