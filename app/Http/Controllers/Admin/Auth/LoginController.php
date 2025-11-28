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

    if (Auth::attempt($request->only('email', 'password'))) {
        $request->session()->regenerate();
        return redirect()->route('store.index');
    }

    return back()->withErrors([
        'email' => 'Invalid email or password',
    ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
