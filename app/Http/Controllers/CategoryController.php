<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Store;
use App\Models\Coupon;
use App\Models\Region;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
     public function add()
    {
    $region = Region::all();
        return view('adminn.category.add', compact('region'));
    }


    public function index()
    {
    //    $categories = Category::latest()->get(); // fetch from DB
$categories = Category::withCount('stores')
    ->addSelect([
        'coupons_count' => DB::table('coupons')
            ->join('stores', 'coupons.store_id', '=', 'stores.id')
            ->whereColumn('stores.category_id', 'categories.id')
            ->selectRaw('count(coupons.id)')
    ])
    ->latest()
    ->get();
    
    return view('adminn.category.index', compact('categories'));

    }

     public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|string|max:255|unique:categories,slug',
            // 'logo.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:110',
            'shrt_content' => 'nullable',
            'long_content' => 'nullable',
            'status' => 'required|boolean',
            'is_menu' => 'required|boolean',
            'm_title' => 'nullable|string',
            'cate_region' => 'required',
            'm_descrip' => 'nullable|string', 
            'url' => 'nullable|string',   
        ]);

        Category::create($request->all());
    if($request->hasFile('images')){
        foreach($request->file('images') as $file){
            $store->addMedia($file)->toMediaCollection('images');
        }
    }
        return redirect()->route('cate.add')
                         ->with('success', 'Category created successfully.');
    }
//     @foreach($store->getMedia('images') as $media)
//     <img src="{{ $media->getUrl() }}" width="120">
// @endforeach
 public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }
   public function edit($id)
    {
    $category = Category::findOrFail($id); 
    return view('adminn.category._form', compact('category'));
    }
    public function update(Request $request, $id)
    {
       
        $category = Category::findOrFail($id);
        $request->validate([
            'name' => 'required|string',
            'slug' => 'nullable|string',

        ]);
        //  dd($id,$request->all());
        $category->update($request->all());

        return redirect()->route('categories.index')
                         ->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        // $category->delete();
        return redirect()->route('categories.index')
                         ->with('success', 'Category deleted successfully.');
    }

   public function categmenu($region = null)
{
    $region = $region ?? config('app.default_region', 'usa');
        $regionModel = Region::where('code', $region)->firstOrFail();
    $regionId = $regionModel->id;
    $regionTitle = $regionModel->title;

$setting = Setting::where('setting_region', $regionId)->first();
$title = $setting->cate_m_tiitle ;
$meta_description = $setting->cate_m_descrip ;

  
 $categories = Category::with('stores')->where('cate_region', $regionId)->where('status', 1)->get();
        return view('website.categ_menu', compact('categories','title', 'meta_description'));
}


    public function page($regionOrSlug, $slug = null)
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




        // $store = Store::where('slug', $slug)->firstOrFail();
         $store = Category::with([
    'stores' => function ($q) {
        $q->with('coupons');
    },
])->where('slug', $slug)->firstOrFail();

         //dd($store);
        $stores = Store::where('category_id', $store->id)->get();
        $categories = Category::where('cate_region', $regionId)->get(); 
      $relatedStores = Store::where('category_id', $store->id)->where('recom', true)->where('store_region', $regionId)->get();
$likes = Store::where('category_id', $store->id)->where('feature', true)->where('store_region', $regionId)->get();
$trendingWith = Store::where('category_id', $store->id)->where('trend', true)->where('store_region', $regionId)->get(); 
$title = $store->m_title ?? null;
    $meta_description = $store->m_descrip ?? null;

  $feature = Coupon::with('store') // eager load store
                          ->where('feature', true)
                          ->where('verified', true)
                          ->where('status', 'active')
                           ->whereHas('store', function ($query) use ($regionId) {
        $query->where('store_region', $regionId);
    })
                          ->get();
                          
 $coupons = Coupon::with('store')-> whereIn('store_id', function ($query) use ($store,$regionId) {
     $query->select('id')->from('stores')->where('category_id', $store->id)->where('store_region', $regionId);
    })->orderByDesc('view')
     ->latest()
      ->paginate(10);

    
    return view('website.categ', compact('store','coupons','feature','categories','trendingWith','stores','likes','relatedStores','title','meta_description'));
    }


}
