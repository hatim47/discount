<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function forgotPassword()
    {
        return view('admin.authentication/forgotPassword');
    }

    public function signIn()
    {
        return view('admin.authentication/signIn');
    }

    public function signUp()
    {
        return view('admin.authentication/signUp');
    }
}
