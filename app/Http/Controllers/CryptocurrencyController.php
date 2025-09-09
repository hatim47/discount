<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

class CryptocurrencyController extends Controller
{
    public function marketplace()
    {
        return view('admin.cryptocurrency/marketplace');
    }

    public function marketplaceDetails()
    {
        return view('admin.cryptocurrency/marketplaceDetails');
    }
    
    public function portfolio()
    {
        return view('admin.cryptocurrency/portfolio');
    }
    
    public function wallet()
    {
        return view('admin.cryptocurrency/wallet');
    }

}
