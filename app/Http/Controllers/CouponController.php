<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Store;
use App\Models\Coupon;
use App\Models\Event;


use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
       $coupon = Coupon::all(); 
        return view('adminn.coupon.index', compact('coupon'));
    }


public function index_cat($categoryId = null)
{
    $query = Coupon::query();

    if ($categoryId) {
        $query->whereHas('store', function ($q) use ($categoryId) {
            $q->where('category_id', $categoryId);
        });
    }
    $coupon = $query->latest()->get();

    return view('adminn.coupon.index_cat', compact('coupon'));
}

public function index_Store($categoryId = null)
{
    $coupon = Coupon::where("store_id" ,$categoryId )->latest()->get();

    return view('adminn.coupon.index_cat', compact('coupon'));
}

public function create()
    {
        $stores = Store::all(); 
        $event = Event::all();
        return view('adminn.coupon.add', compact('stores','event'));
    }
    public function store(Request $request)
    {     
        $request->validate([
            'title' => 'required',
            'code' => 'required|string|max:255|unique:coupons,code',
            'link' => 'required|numeric',
            'description' => 'nullable|string',
            'trems' => 'nullable|string',
            'store_id' => 'required|exists:stores,id',   
        ]);
        Coupon::create($request->all());
        return redirect()->route('coupon.create')->with('success', 'Coupon created successfully.');
    }
    public function edit($id){
        $coupon = Coupon::findOrFail($id);
        $stores = Store::all(); // fetch from DB
        return view('adminn.coupon._form', compact('coupon','stores'));
    }
    public function update(Request $request, $id){
        $coupon = Coupon::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'code' => 'required|string|max:255|unique:coupons,code,'.$coupon->id,
            'discount' => 'required|numeric',
            'description' => 'nullable|string',
            'store_id' => 'required|exists:stores,id',   
        ]);
        $coupon->update($request->all());
        return redirect()->route('coupon.index')
                         ->with('success', 'Coupon updated successfully.');
    }
    public function destroy($id){
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        return redirect()->route('coupon.index')
                         ->with('success', 'Coupon deleted successfully.');
    }


    


}
