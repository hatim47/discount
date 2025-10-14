<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Dynacontent;
use App\Models\StoreLike;
use App\Models\StoreRelated;
use App\Models\StoreRelatedCategory;
use App\Models\StoreTrend;
use App\Models\Store;
use App\Models\Coupon;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function index()
    {
       $stores = Store::latest()->get(); // fetch from DB
        return view('adminn.store.index', compact('stores'));
    }
    public function create()
    {
        $stores = Store::all();
        $trends = Store::where('trend', true)->get();
        $categories = Category::all(); // Fetch categories for the dropdown
        return view('adminn.store.add', compact('categories', 'stores','trends'));
    }
    public function store(Request $request)
    {

       // dd($request->all());
      try {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => 'required|string|max:255',
            'logo'        => 'nullable|string',
            'image'       => 'nullable|string',
            'heading'     => 'nullable|string',   // single heading (goes to stores table)
            'description' => 'nullable|string',   // single description
            'link'        => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',

            // toggle fields (on/off)
            'trend'       => 'nullable',
            'recom'       => 'nullable',
            'relat_store' => 'nullable',
            'relat_cate'  => 'nullable',
            'like_store'  => 'nullable',

            // dynamic content
            'dy_heading'     => 'nullable|array',
            'dy_heading.*'   => 'nullable|string',
            'dy_description' => 'nullable|array',
            'dy_description.*'=> 'nullable|string',

            // relations
            'stores'             => 'nullable|array',
            'stores.*'           => 'nullable|integer|exists:stores,id',
            'relat_cate_options' => 'nullable|array',
            'relat_cate_options.*'=> 'nullable|integer|exists:categories,id',
            'like_store_options' => 'nullable|array',
            'like_store_options.*'=> 'nullable|integer|exists:stores,id',
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        dd($e->errors()); // show validation errors directly
    }

  //  ✅ Create main store
    $store = Store::create([
        'name'        => $request->name,
        'slug'        => $request->slug,
        'logo'        => $request->logo,
        'image'       => $request->image,
        'heading'     => $request->heading,
        'description' => $request->description,
        'link'        => $request->link,
        'category_id' => $request->category_id,
        'status'      => $request->status ?? 1,

        // on/off toggles
        'trend'       => $request->has('trend'),
        'recom'       => $request->has('recom'),
        'relat_store' => $request->has('relat_store'),
        'relat_cate'  => $request->has('relat_cate'),
        'like_store'  => $request->has('like_store'),
    ]);

    // ✅ Save dynamic content into dynacontent table
    if ($request->dy_heading && is_array($request->dy_heading)) {
        foreach ($request->dy_heading as $index => $heading) {
            Dynacontent::create([
                'store_id'    => $store->id,
                'heading'     => $heading,
                'description' => $request->dy_description[$index] ?? null,
            ]);
        }
    }

    // ✅ Save related stores
    if ($request->stores && is_array($request->stores)) {
        foreach ($request->stores as $relatedStoreId) {
            StoreRelated::create([
                'store_id'         => $store->id,
                'related_store_id' => $relatedStoreId,
            ]);
        }
    }

    // ✅ Save related categories
    if ($request->relat_cate_options && is_array($request->relat_cate_options)) {
        foreach ($request->relat_cate_options as $categoryId) {
            StoreRelatedCategory::create([
                'store_id'   => $store->id,
                'category_id'=> $categoryId,
            ]);
        }
    }

    // ✅ Save liked stores
    if ($request->like_store_options && is_array($request->like_store_options)) {
        foreach ($request->like_store_options as $likeStoreId) {
            StoreLike::create([
                'store_id'      => $store->id,
                'like_store_id' => $likeStoreId,
            ]);
        }
    }
      $data = $request->all();

    // ✅ Handle logo upload
    if ($request->hasFile('logo')) {
        $data['logo'] = $request->file('logo')->store('logos', 'public');
    }

    // ✅ Handle image upload
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('images', 'public');
    } 
     $stores = Store::all();
        $trends = Store::where('trend', true)->get();
    
    $categories = Category::all(); // Fetch categories for the dropdown
        return view('adminn.store.add', compact('categories'));
    }
    public function show($id)
    {
        $store = Store::findOrFail($id);
        
        return response()->json($store);
    }
    public function edit($id)
    {

         $store = Store::with([
        'dynacontents',
        'trendingWith',      // related stores
        'categories',
        'relatedStores',        // related categories
        'likes',             // liked stores
    ])->findOrFail($id);

    // For dropdowns/multiselects
         //dd($store);
         $stores = Store::all();
        $categories = Category::all(); // Fetch categories for the dropdown
        $trends = Store::where('trend', true)->get();        
        return view('adminn.store.edit', compact('store', 'categories','trends','stores'));               
    }
    public function update(Request $request, $id)
    {
       //dd($request->all());
        $store = Store::findOrFail($id);

    // ----------------------------
    // 1) VALIDATION
    // ----------------------------
   try {
     $validated = $request->validate([
        'name'        => 'required|string|max:255',       
        'logo'        => 'nullable|string', // since LFM returns URL
        'image'       => 'nullable|string',
        'link'        => 'nullable|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'heading'     => 'nullable|string',
        'description' => 'nullable|string',
        // Dynamic content
        'dy_heading'        => 'nullable|array',
        'dy_heading.*'      => 'nullable|string|max:255',
        'dy_description' => 'nullable|array',
        'dy_description.*'=> 'nullable|string',
        ]);
} catch (\Illuminate\Validation\ValidationException $e) {
    dd($e->errors()); // 👈 see exactly what fails
}

    // ----------------------------
    // 2) UPDATE STORE CORE FIELDS
    // ----------------------------
  $store->update([
    'name'        => $request->name,
    'slug'        => $request->slug,
    'logo'        => $request->logo,
    'image'       => $request->image,
    'link'        => $request->link,
    'heading'    => $request->heading,
    'description'=> $request->description,
    'category_id' => $request->category_id,
    'status'      => $request->status ?? 0,
    'trend'       => $request->has('trend') ? 1 : 0,
    'recom'       => $request->has('recom') ? 1 : 0,
    'relat_store' => $request->has('relat_store') ? 1 : 0,
    'relat_cate'  => $request->has('relat_cate') ? 1 : 0,
    'like_store'  => $request->has('like_store') ? 1 : 0,
    'trend_store'  => $request->has('trend_store') ? 1 : 0,
]);

    // ----------------------------
    // 3) SYNC PIVOT RELATIONSHIPS
    // ----------------------------

    //Related Categories
    if ($request->has('relat_cate_options')) {
        $store->categories()->sync($request->relat_cate_options);
    } else {
        $store->categories()->sync([]);
    }

    // Related Stores
    if ($request->has('stores')) {
        $store->relatedStores()->sync($request->stores);
    } else {
        $store->relatedStores()->sync([]);
    }

    // Liked Stores
    if ($request->has('like_store_options')) {
        $store->likes()->sync($request->like_store_options);
    } else {
        $store->likes()->sync([]);
    }

    // Trending With Stores
    if ($request->has('trend_store_options')) {
        $store->trendingWith()->sync($request->trend_store_options);
    } else {
        $store->trendingWith()->sync([]);
    }

    // ----------------------------
    // 4) DYNAMIC CONTENT
    // ----------------------------
    $store->dynacontents()->delete(); // remove old

    if ($request->has('dy_heading')) {
        foreach ($request->dy_heading as $i => $heading) {
            if (!empty($heading) || !empty($request->dy_description[$i])) {
                $store->dynacontents()->create([
                    'heading'        => $heading,
                    'description' => $request->dy_description[$i] ?? null,
                ]);
            }
        }
    }
// if ($request->hasFile('logo')) {
//         $data['logo'] = $request->file('logo')->store('logos', 'public');
//     }

//     // ✅ Handle image upload
//     if ($request->hasFile('image')) {
//         $data['image'] = $request->file('image')->store('images', 'public');
//     }
       return redirect()
        ->route('store.index')
        ->with('success', 'Store updated successfully!');

    
    }


    public function destroy($id)
    {
        $store = Store::findOrFail($id);
        $store->delete();
        return redirect()->route('adminn.store.index')
                         ->with('success', 'Store deleted successfully.');
    }

    public function website($slug)
    {
       
        // $store = Store::where('slug', $slug)->firstOrFail();
         $store = Store::with([
        'dynacontents',
        'trendingWith',      
        'categories',
        'relatedStores',        
           'likes' => function ($q) {
        $q->withCount([
            'coupons as coupons_with_code_count' => function ($query) {
                $query->whereNotNull('code')
                      ->where('code', '!=', ''); // only coupons with a code
            }
        ]);
    }
              
    ])->where('slug', $slug)->firstOrFail();

    // For dropdowns/multiselects
         //dd($store);
        $stores = Store::all();
        $categories = Category::all(); // Fetch categories for the dropdown
        $trends = Store::where('trend', true)->get(); 
        // $coupons = $store->coupons;
          $coupons = Coupon::where('store_id', $store->id)
        ->latest()
        ->paginate(10);
    return view('website.store', compact('store','coupons','categories','trends','stores'));
        // return view('website.store');
    }
    
}
