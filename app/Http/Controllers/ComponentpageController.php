<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

class ComponentpageController extends Controller
{
    public function alert()
    {
        return view('admin.componentspage/alert');
    }
    
    public function avatar()
    {
        return view('admin.componentspage/avatar');
    }
    
    public function badges()
    {
        return view('admin.componentspage/badges');
    }
    
    public function button()
    {
        return view('admin.componentspage/button');
    }
    
    public function calendar()
    {
        return view('admin.calendar');
    }
    
    public function card()
    {
        return view('admin.componentspage/card');
    }
    
    public function carousel()
    {
        return view('admin.componentspage/carousel');
    }
    
    public function colors()
    {
        return view('admin.componentspage/colors');
    }
    
    public function dropdown()
    {
        return view('admin.componentspage/dropdown');
    }
    
    public function imageUpload()
    {
        return view('admin.componentspage/imageUpload');
    }
    
    public function list()
    {
        return view('admin.componentspage/list');
    }
    
    public function pagination()
    {
        return view('admin.componentspage/pagination');
    }
    
    public function progress()
    {
        return view('admin.componentspage/progress');
    }
    
    public function radio()
    {
        return view('admin.componentspage/radio');
    }
    
    public function starRating()
    {
        return view('admin.componentspage/starRating');
    }
    
    public function switch()
    {
        return view('admin.componentspage/switch');
    }
    
    public function tabs()
    {
        return view('admin.componentspage/tabs');
    }
    
    public function tags()
    {
        return view('admin.componentspage/tags');
    }
    
    public function tooltip()
    {
        return view('admin.componentspage/tooltip');
    }
    
    public function typography()
    {
        return view('admin.componentspage/typography');
    }
    
    public function videos()
    {
        return view('admin.componentspage/videos');
    }
    
}
