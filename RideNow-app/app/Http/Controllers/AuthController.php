<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage()
    { return view('auth.login'); }

    public function registerPage()
    { return view('auth.register'); }

    public function login(Request $request)
    {
    $data = [
        'email' => $request->email,
        'password' => $request->password
    ];

    if (Auth::attempt($data)) {
        return redirect('/home');
    }

    return back()->with('error', 'Wrong email or password');
    }
}
