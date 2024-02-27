<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authLogin(Request $request) : RedirectResponse
    {
        $username_user = $request->username_user;
        $password = $request->password;
        if (Auth::attempt(['username_user' => $username_user, 'password' => $password, 'flagaktif_user' => 1])) {
            return redirect()->route('applicationIndex');
        }
        return redirect()->route('loginIndex');
    }

    public function authLogout(Request $request) : RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('loginIndex');
    }
}
