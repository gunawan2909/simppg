<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

    public function verifyEmail()
    {
        return view('Auth.VerifyEmail', ['panel' => ""]);
    }

    public function verifyEmailSend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }
    public function verificationEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect()->intended('/');
    }

    public function forgetPassword()
    {
        return view('Auth.ForgetPassword');
    }
    public function forgetPasswordStore(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword(string $token)
    {
        return view('Auth.ResetPassword', ['token' => $token]);
    }

    public function resetPasswordStore(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
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
            'image' => 'image|max:6000'
        ]);
        $data['password'] = bcrypt($data['password']);
        $data['jabatan'] = "Null";
        if (Request()->file('image')) {
            $data['image'] = Request()->file('image')->store('user');
        }
        User::create($data);
        Auth::attempt((request()->only('email', 'password')));
        return redirect(route('dashboard'));
    }
    public function setting()
    {
        return view('Auth.Setting', [
            'panel' => '',
            'user' => Auth::user()
        ]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2000',

        ]);

        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('user');
        }
        User::where('id', Auth::user()->id)->update($data);
        return back();
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }


        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
    }
}
