<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Store;
use App\Models\Coupon;
use App\Models\Event;


use Illuminate\Http\Request;

class HomeController extends Controller
{
        
    public function index()
    {
          $feature = Coupon::with('store') // eager load store
                          ->where('feature', true)
                          ->where('verified', true)
                          ->where('status', 'active')
                          ->get();
        // $categories = Category::all();
  $categories = Category::where('status', 1)
    ->with([
        'stores' => function ($q) {
            $q->limit(4); // only one store per category
        },
        'stores.coupons' => function ($q) {
            $q->where('status', 'active')
              
              ->limit(1);
        }
    ])->get();
     //dd($categories);
        $stores = Store::where('feature', true)->get();
        $events = Event::all();
       
    //    dd($feature);
        return view('website.home', compact('feature', 'categories', 'stores', 'events'));
    }

       























    public function calendar()
    {
        return view('admin.calendar');
    }
    
    public function chatMessage()
    {
        return view('admin.chatMessage');
    }
    
    public function chatempty()
    {
        return view('admin.chatempty');
    }
    
    public function veiwDetails()
    {
        return view('admin.veiwDetails');
    }

    public function email()
    {
        return view('admin.email');
    }

    public function error1()
    {
        return view('admin.error');
    }

    public function faq()
    {
        return view('admin.faq');
    }

    public function gallery()
    {
        return view('admin.gallery');
    }

    public function kanban()
    {
        return view('admin.kanban');
    }

    public function pricing()
    {
        return view('admin.pricing');
    }

    public function termsCondition()
    {
        return view('admin.termsCondition');
    }

    public function widgets()
    {
        return view('admin.widgets');
    }

    public function chatProfile()
    {
        return view('admin.chatProfile');
    }

    public function setting()
    {
        return view('admin.setting');
    }
    public function blankPage()
    {
        return view('admin.blankPage');
    } public function emp()
    {
        return view('admin.emp');
    }
public function attend()
    {
        return view('admin.attend');
    }
    public function comingSoon()
    {
        return view('admin.comingSoon');
    }

    public function starred()
    {
        return view('admin.starred');
    }
    
    public function testimonials()
    {
        return view('admin.testimonials');
    }
    
    public function maintenance()
    {
        return view('admin.maintenance');
    }

}
