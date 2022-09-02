<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Authenticate;

class Auth extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (Authenticate::attempt($credentials)) {
            return redirect()->intended('inventory')
                ->withSuccess('Signed in');
        }

        return redirect()->route('inventory');
    }

    public function logout(Request $request)
    {
        session()->flush();
        Authenticate::logout();
        return redirect()->route('login');
    }
}
