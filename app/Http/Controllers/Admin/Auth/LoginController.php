<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
   public function showLoginForm()
    {
        return view('adminn.signin');
    }

    public function login(Request $request)
    {
        $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    if (Auth::guard('web')->attempt($request->only('email', 'password'))) {
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
            'message' => 'Invalid credentials',
        ], 422);
    }

    return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
