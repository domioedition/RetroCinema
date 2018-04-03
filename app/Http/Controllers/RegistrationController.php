<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.register');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $credentials = request(['name', 'email', 'password']);

        //Bcrypt or Hash::make ???
        $credentials['password'] = Hash::make($credentials['password']);

        $user = User::create($credentials);

        auth()->login($user);

        return redirect()->home();
    }
}
