<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function formLayout()
    {
        return view('admin.forms/formLayout');
    }
    
    public function formValidation()
    {
        return view('admin.forms/formValidation');
    }
    
    public function form()
    {
        return view('admin.forms/form');
    }
    
    public function wizard()
    {
        return view('admin.forms/wizard');
    }
    
}
