<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle a login request for the application.
     */
public function login(Request $request)
{
    $credentials = $request->only('email', 'password');
    $remember = $request->has('remember'); // optional checkbox

    if (Auth::guard('web')->attempt($credentials, $remember)) {
        $request->session()->regenerate();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'redirect' => route('user.portal')
            ]);
        }
        return redirect()->intended(route('user.portal'));
    }
    if ($request->expectsJson()) {
        return response()->json([
            'success' => false,
            'message' => 'Invalid credentials'
        ], 422);
    }
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
