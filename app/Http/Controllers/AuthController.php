<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use RegistersUsers, AuthenticatesUsers, ThrottlesLogins, VerifiesEmails;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    // Fungsi untuk menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Fungsi untuk menghandle proses login
    public function login()
    {
        // Logika autentikasi disini

        // Contoh: cek apakah email dan password valid
        $credentials = request(['email', 'password']);

        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil
            return redirect()->intended($this->redirectPath());
        }

        // Jika autentikasi gagal
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Fungsi untuk menampilkan form register
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Fungsi untuk proses logout
    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
