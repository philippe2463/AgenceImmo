<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function doLogin(LoginRequest $request)
    {
        $credential = $request->validated();
        if(Auth::attempt($credential))
        {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.property.index'));
        }
        return back()->withErrors([
            'email' => 'Identifiant incorrects'
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return to_route('login')->with('success', 'Vous êtes maintenant déconnecté');
    }
}
