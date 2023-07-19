<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('Auth.Login',);
    }

    public function auth()
    {
        $login = request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        if (Auth::attempt($login)) {
            request()->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'auth' => 'Email dan Password tidak sesuai',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }

    public function registrasi()
    {;
        return view('Auth.Registrasi');
    }
    public function store()
    {

        $data = request()->validate([
            'email' => 'required|unique:users|email',
            'name' => 'required',
            'password' => 'required|min:8|confirmed',
            'image' => 'required|image|max:6000'
        ]);
        $data['password'] = bcrypt($data['password']);
        $data['jabatan'] = "Null";
        $data['image'] = Request()->file('image')->store('user');
        User::create($data);
        Auth::attempt((request()->only('email', 'password')));
        return redirect(route('dashboard'));
    }
}
