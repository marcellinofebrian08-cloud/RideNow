<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $user = Auth::user();
        $user->last_login_at = now();
        $user->save();
        
        return redirect('/home');
    }

    return back()->with('error', 'Wrong email or password');
}

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect('/login');
    }

    public function home()
    { 
        $users = [];
        $histories = [];

        if (Auth::user()->role == 'admin') {
            $users = User::all();
            $histories = History::with('user')->orderBy('created_at', 'desc')->get();
    }
    return view('home', compact('users', 'histories')); 
    }

    public function editProfile()
    {
        return view('auth.edit-profile');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return back()->with('success', 'Profile berhasil diupdate');
    }

    public function changePasswordPage()
    { return view('auth.change-password'); }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6'
        ]);

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with('error', 'Password sekarang salah');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password berhasil diganti');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
