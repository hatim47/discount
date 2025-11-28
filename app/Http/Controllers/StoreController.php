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
use App\Models\Region;
use Illuminate\Support\Str;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
// $region = config('app.current_region');
// $regionCode = session('region');

    public function index()
    {
       $query = Store::with(['category','region'])->withCount('coupons'); // count coupons per store

    $stores = $query->latest()->get();
        return view('adminn.store.index', compact('stores'));
    }    

public function index_cat($categoryId = null)
{
    $query = Store::query();
    if ($categoryId) {$query->where('category_id', $categoryId);}
    $stores = $query->latest()->get();
    return view('adminn.store.index_cat', compact('stores'));
}

    public function create()
    {
        $stores = Store::all();
        $trends = Store::where('trend', true)->get();
        $categories = Category::all(); // Fetch categories for the dropdown
         $region = Region::all();
        // dd($region[0]->code);
        return view('adminn.store.add', compact('categories', 'stores','trends','region'));
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
            'store_region' => 'required|exists:regions,id',
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
            'm_tiitle' => $request->m_tiitle,
    'm_descrip' => $request->m_descrip,
    'store_region' => $request->store_region,
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
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('images', 'public');
    } 

     $region = Region::all();
        // dd($region[0]->code);
     $stores = Store::all();
     $trends = Store::where('trend', true)->get();    
    $categories = Category::all(); // Fetch categories for the dropdown
        return view('adminn.store.add', compact('categories', 'stores','trends','region'));
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
    'm_tiitle' => $request->m_tiitle,
    'm_descrip' => $request->m_descrip,
    'status'      => $request->status ?? 0,
    'trend'       => $request->has('trend') ? 1 : 0,
    'recom'       => $request->has('recom') ? 1 : 0,
    'ismenu'      => $request->has('ismenu') ? 1 : 0,
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
        return redirect()->route('store.index')
                         ->with('success', 'Store deleted successfully.');
    }

 public function website($regionOrSlug, $slug = null)
{
  if ($slug === null) {
            // URL: /store/abc (no region prefix)
            $slug = $regionOrSlug;
            $region = Region::where('code', config('app.default_region', 'usa'))->firstOrFail();
        } else {
            // URL: /au/store/abc (has region prefix)
            $regionCode = $regionOrSlug;
            $region = Region::where('code', $regionCode)->firstOrFail();
        }
    
 
    
   
    $regionId = $region->id;
    $regionTitle = $region->title;
       $store = Store::with([
        'dynacontents',
        'trendingWith',
        'categories',
        'relatedStores',
        'likes' => function ($q) {
            $q->withCount([
                'coupons as coupons_with_code_count' => function ($query) {
                    $query->whereNotNull('code')
                          ->where('code', '!=', '');
                }
            ]);
        },
        'ratings' // Include ratings relation
    ])->where('store_region', $regionId)->where('slug', $slug)->first();
//  dd($store->id, $regionId, $slug);
if (!$store) {
    $isDefaultRegion = $region->code === config('app.default_region', 'usa');
    
    if ($isDefaultRegion) {
        return redirect()->route('home')
            ->with('error', 'Store not found in this region.');
    }
    
    return redirect()->route('region.home', ['region' => $region->code])
        ->with('error', 'Store not found in this region.');
}
    // $titel=$store->name . " Coupons & Deals - " . config('app.name');
$title = $store->m_tiitle;
    $meta_description = $store->m_descrip;

    // Get all stores, categories, and trending stores
    $stores = Store::all();
    $categories = Category::all();
    $trends = Store::where('trend', true)->get();

    // Get coupons for this store
    $coupons = Coupon::with('store')->where('store_id', $store->id)
        ->latest()
        ->paginate(10);
  


    // --- Ratings Section ---
    $average = round($store->ratings->avg('rating'), 1);
    $count = $store->ratings->count();

    // Check if logged-in user or guest already rated
    $user = Auth::user();
    $existingRating = null;

    if ($user) {
        $existingRating = Rating::where('store_id', $store->id)
            ->where('user_id', $user->id)
            ->first();
    } else {
        $existingRating = Rating::where('store_id', $store->id)
            ->where('ip_address', \request()->ip())
            ->first();
    }
    // Pass everything to the view
    return view('website.store', compact(
        'store',
        'coupons',
        'categories',
        'trends',
        'stores',
        'average',
        'count',
        'existingRating',
        'title',
        'meta_description'
    ));
}
   public function store_menu($region = null)
{

    $region = $region ?? config('app.default_region', 'usa');
    $regionModel = Region::where('code', $region)->firstOrFail();
    $regionId = $regionModel->id;
    $regionTitle = $regionModel->title;
   
       $categories = Store::where('store_region', $regionId)
               ->orderBy('name', 'asc')
               ->get();
               $title = "All Stores in " . $regionTitle;
    $meta_description = "Browse all stores available in " . $regionTitle . " on " . config('app.name') . ". Find the best deals and discounts from your favorite brands.";
             return view('website.all_store', compact('categories','title','meta_description'));   
         }

    
        public function menu($regionOrSlug, $slug = null)
{
 if ($slug === null) {
            // URL: /store/abc (no region prefix)
            $slug = $regionOrSlug;
            $region = Region::where('code', config('app.default_region', 'usa'))->firstOrFail();
        } else {
            // URL: /au/store/abc (has region prefix)
            $regionCode = $regionOrSlug;
            $region = Region::where('code', $regionCode)->firstOrFail();
        }
    
 
    
   
    $regionId = $region->id;
    $regionTitle = $region->title;
    //  dd($slug,$regionId);
       $categories = Store::where('name', 'like', $slug . '%')->where('store_region', $regionId)->get();
         $title = "All Stores in " . $regionTitle;
    $meta_description = "Browse all stores available in " . $regionTitle . " on " . config('app.name') . ". Find the best deals and discounts from your favorite brands.";
             return view('website.store_menu', compact('categories','slug','title','meta_description'));   
         }

      public function rate(Request $request, $storeId)
    {
               $request->validate(['rating' => 'required|integer|min:1|max:5']);

       $user = $request->user();
$ip = $request->ip();

if ($user) {
    $existing = Rating::where('user_id', $user->id)
        ->where('store_id', $storeId)
        ->first();
} else {
    $existing = Rating::where('ip_address', $ip)
        ->where('store_id', $storeId)
        ->first();
}

if ($existing) {
    // User/guest already rated, do not allow updating
    return response()->json([
        'success' => false,
        'message' => 'You have already rated this store.',
        'average' => round(Rating::where('store_id', $storeId)->avg('rating'), 1),
        'count' => Rating::where('store_id', $storeId)->count()
    ]);
}

// Otherwise, create the rating
$rating = Rating::create([
    'user_id' => $user?->id,
    'ip_address' => $user ? null : $ip,
    'store_id' => $storeId,
    'rating' => $request->rating
]);

$average = Rating::where('store_id', $storeId)->avg('rating');
$count = Rating::where('store_id', $storeId)->count();

return response()->json([
    'success' => true,
    'message' => 'Thank you for rating!',
    'average' => round($average, 1),
    'count' => $count
]);
    }      


public function popupsearch($region = null)
    {

            $region = $region ?? config('app.default_region', 'usa');
            $regionModel = Region::where('code', $region)->firstOrFail();
            $regionId = $regionModel->id;
            $regionTitle = $regionModel->title;

        // $searchQuery = $request->input('query', '');
      $topStores = Store::withCount('coupons')
    ->orderBy('coupons_count', 'desc')
    ->where('store_region', $regionId)
    ->latest()
    ->take(5)
    ->get();

// 2. Get latest 5 coupons from these top 5 stores
$trendingCoupons = Coupon::with('store')
    ->whereIn('store_id', $topStores->pluck('id'))
    ->latest()
    ->take(5)
    ->get();

         return response()->json([
        'offers' => $trendingCoupons,
        'brands' => $topStores,
    ]);
    }


    public function search(Request $request, $region = null)
{
    // Use region from URL or fallback to session/default
    $region = $region ?? session('region', config('app.default_region', 'usa'));
   $regionModel = Region::where('code', $region)->firstOrFail();
            $regionId = $regionModel->id;
            $regionTitle = $regionModel->title;
    $query = $request->input('query', '');

    // Fetch stores filtered by region (optional: if your Store model has region_id)
    $stores = Store::when($regionId, function($q) use ($regionId) {
        $q->where('store_region', $regionId);
    })
    ->when($query, function($q) use ($query) {
        $q->where('name', 'like', "%{$query}%");
    })
    ->latest()
    ->take(10) // limit results
    ->get(['id', 'name', 'slug', 'logo']); // select fields you need

    return response()->json([
        'stores' => $stores
    ]);
}
}
