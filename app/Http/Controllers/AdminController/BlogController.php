<?php

namespace App\Http\Controllers\AdminController;


use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function addBlog()
    {
        return view('blog/addBlog');
    }
    
    public function blog()
    {
        return view('blog/blog');
    }
    
    public function blogDetails()
    {
        return view('blog/blogDetails');
    }

}
