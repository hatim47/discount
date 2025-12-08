<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Store;
use App\Models\Coupon;
use App\Models\Event;
use App\Models\DynaPage;
use App\Models\Region;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
       $coupon = Coupon::all(); 
    //    $coupon = Coupon::limit(5)->get();
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
         $dynapage = DynaPage::all();
        return view('adminn.coupon.add', compact('stores','event','dynapage'));
    }
    public function store(Request $request)
    {     
            // dd($request->all());

        $request->validate([
            'title' => 'required',
            'code' => 'required|string|max:255|unique:coupons,code',
            'link' => 'required|string|max:255',
            'trems' => 'nullable|string',
            'store_id' => 'required|exists:stores,id',   
        ]);


$data = $request->all();

$data['event_id'] = $request->event_id == 0 ? null : $request->event_id;      
$data['dyna_id'] = $request->dyna_id == 0 ? null : $request->dyna_id;
$data['view'] = rand(500, 9999);
       Coupon::create($data);
        return redirect()->route('coupon.create')->with('success', 'Coupon created successfully.');
    }

    public function edit($id){
        $coupon = Coupon::findOrFail($id);
        $stores = Store::all(); // fetch from DB
        $event = Event::all();
         $dynapage = DynaPage::all();
        return view('adminn.coupon._form', compact('coupon','stores','event','dynapage'));
    }


 public function update(Request $request, $id)
{

    $coupon = Coupon::findOrFail($id);

    $request->validate([
        'title'      => 'required',
        'code'      => 'required',
        'discount'  => 'required',
        'store_id'  => 'required|exists:stores,id',
    ]);

    // Handle checkboxes
    $checkboxFields = ['trend','feature','recom','deals','verified','exclusive'];
    foreach ($checkboxFields as $field) {
        // If checkbox is checked, set 1, otherwise 0
        $request[$field] = $request->has($field) ? 1 : 0;
    }

    // Update coupon
    $coupon->update($request->all());

    return redirect()->route('coupon.index')
                     ->with('success', 'Coupon updated successfully.');
}
    public function destroy($id) {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        return redirect()->route('coupon.index')
                         ->with('success', 'Coupon deleted successfully.');
    }   

 public function featureds ($region = null)
{
  $region = $region ?? config('app.default_region', 'usa');
           
    // Fetch region model
    $regionModel = Region::where('code', $region)->firstOrFail();
    $regionId = $regionModel->id;
    $regionTitle = $regionModel->title;

    //   dd($regionId);
    $coupons = Coupon::with('store')
    ->whereHas('store', function ($q) use ($regionId) {
        $q->where('store_region', $regionId);
    })
   ->where('feature', 1)
    ->latest()
    ->paginate(10);


$title = '$store->m_tiitle';
    $meta_description = '$store->m_descrip';
    return view('website.feature', compact('coupons', 'title', 'meta_description'));
    }



}
