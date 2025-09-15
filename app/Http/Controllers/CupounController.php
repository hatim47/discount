<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Store;
use App\Models\Coupon;


use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
       $categories = Store::all(); // fetch from DB
        return view('adminn.category.index', compact('categories'));
    }

}
