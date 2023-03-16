<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginform() {
        return view('login');
    }

    public function signupform() {
        return view('register');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        if (!\auth()->attempt($request->validated())) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }

            $request->session()->regenerate();

            return redirect()->intended(route('home'));
    }

    public function signup() {

    }
}
