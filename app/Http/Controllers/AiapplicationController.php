<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AiapplicationController extends Controller
{
    public function codeGenerator()
    {
        return view('admin.aiapplication/codeGenerator');
    }

    public function codeGeneratorNew()
    {
        return view('admin.aiapplication/codeGeneratorNew');
    }
    
    public function imageGenerator()
    {
        return view('admin.aiapplication/imageGenerator');
    }

    public function textGenerator()
    {
        return view('admin.aiapplication/textGenerator');
    }

    public function textGeneratorNew()
    {
        return view('admin.aiapplication/textGeneratorNew');
    }

    public function videoGenerator()
    {
        return view('admin.aiapplication/videoGenerator');
    }

    public function voiceGenerator()
    {
        return view('admin.aiapplication/voiceGenerator');
    }

}
