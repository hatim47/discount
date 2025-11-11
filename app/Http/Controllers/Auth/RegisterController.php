<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'lname'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'username'   => 'required|string|max:255|unique:users,username',
            'password'   => 'required|string|min:6|confirmed',
            'gender'     => 'required|in:male,female,other',
            'dob'        => 'required|date|before:today',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'lname'  => $validated['lname'],
            'email'      => $validated['email'],
            'username'   => $validated['username'],
            'gender'     => $validated['gender'],
            'dob'        => $validated['dob'],
            'role'       => '0',
            'password'   => Hash::make($validated['password']),
        ]);

        Auth::guard('web')->login($user);

        if($request->expectsJson()){
            return response()->json([
                'success' => true,
                'message' => 'Registration successful! Click the button below to log in.',
            ]);
        }

        return redirect()->route('user.portal');
    }
}
