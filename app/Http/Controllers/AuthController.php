<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
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

    public function signup(RegisterRequest $request): RedirectResponse {
       $user = User::query()->create([
           'name' => $request->get('name'),
           'email' => $request->get('email'),
           'password' => bcrypt($request->get('password')),
       ]);

       event(new Registered($user));

       \auth()->login($user);

        return redirect()->intended(route('home'));
    }

    public function logout(): RedirectResponse  {
        \auth()->logout();

        \request()->session()->invalidate();

        \request()->session()->regenerateToken();

        return redirect()->intended(route('home'));
    }
}
