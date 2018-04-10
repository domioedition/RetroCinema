<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function show()
    {
        if (auth()->check()) {
            return view('user.show');
        }

        return redirect()->home();
    }
}
