<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function username() {
        return 'username';
    }

    public function show()
    {
        return view('login');
    }

    public function login()
    {
        //dd(request('username'), request('password'));
        $success = Auth::attempt([
            'username' => request('username'),
            'password' => request('password'),
        ], request()->has('remember'));

        if($success) {
            return redirect()->to(RouteServiceProvider::HOME);
        }

        return back()->withErrors([
            'login_error' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
