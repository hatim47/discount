<?php

namespace App\Http\Controllers\AdminController;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function calendar()
    {
        return view('calendar');
    }
    
    public function chatMessage()
    {
        return view('chatMessage');
    }
    
    public function chatempty()
    {
        return view('chatempty');
    }
    
    public function veiwDetails()
    {
        return view('veiwDetails');
    }

    public function email()
    {
        return view('email');
    }

    public function error1()
    {
        return view('error');
    }

    public function faq()
    {
        return view('faq');
    }

    public function gallery()
    {
        return view('gallery');
    }

    public function kanban()
    {
        return view('kanban');
    }

    public function pricing()
    {
        return view('pricing');
    }

    public function termsCondition()
    {
        return view('termsCondition');
    }

    public function widgets()
    {
        return view('widgets');
    }

    public function chatProfile()
    {
        return view('chatProfile');
    }

    public function setting()
    {
        return view('setting');
    }
    public function blankPage()
    {
        return view('blankPage');
    } public function emp()
    {
        return view('emp');
    }
public function attend()
    {
        return view('attend');
    }
    public function comingSoon()
    {
        return view('comingSoon');
    }

    public function starred()
    {
        return view('starred');
    }
    
    public function testimonials()
    {
        return view('testimonials');
    }
    
    public function maintenance()
    {
        return view('maintenance');
    }

}
