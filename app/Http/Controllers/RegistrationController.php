<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends MainController
{
    function register()
    {
        $this->validate(request(), [
            'username' => 'required|max:20',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $user = User::create(request(['username', 'first_name', 'last_name', 'email', 'password']));

        Auth::login($user);
        return redirect()->home();
    }
}
