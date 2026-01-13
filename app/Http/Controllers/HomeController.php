<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Store;
use App\Models\Coupon;
use App\Models\Event;
use App\Models\Region;
use App\Models\Setting;

use Illuminate\Http\Request;

class HomeController extends Controller
{ 
   public function index($region = null)
    {
   $region = $region ?? config('app.default_region', 'usa');
           
    // Fetch region model
    $regionModel = Region::where('code', $region)->firstOrFail();
    $regionId = $regionModel->id;
    $regionTitle = $regionModel->title;

    // Featured coupons (with store eager-loaded)
    $feature = Coupon::with('store')
        ->where('feature', true)
        ->where('verified', true)
        ->where('status', 'active')
         ->whereHas('store', function ($q) use ($regionId) {
        $q->where('store_region', $regionId);
    })
        ->get();

    // Categories with up to 4 stores, each store has 1 coupon for that region
    $categories = Category::where('status', 1)->where('cate_region', $regionId)
        ->with([
            'stores' => function ($q) use ($regionId){
                $q->where('store_region', $regionId)
                ->limit(4);
            },
            'stores.coupons' => function ($q)  {
                $q->where('status', 'active')
                  ->limit(1);
            }
        ])
        ->get();

    // Featured stores for this region
    $stores = Store::where('feature', true)
        ->where('store_region', $regionId)
        ->get();

 $requirement = Coupon::with('store')
        ->where('recom', true)
        ->where('verified', true)
        ->where('status', 'active')
         ->whereHas('store', function ($q) use ($regionId) {
        $q->where('store_region', $regionId);
    })
        ->get();
 
$setting = Setting::where('setting_region', $regionId)->first();
$title = $setting->home_m_tiitle;
$meta_description = $setting->home_m_descrip;

    // All events
    $events = Event::all();
    return view('website.home', compact(
        'feature',
        'categories',
        'stores',
        'events',
        'requirement',
        'title',
        'meta_description'
    ));
}
public function students($region = null)
{
    $region = $region ?? config('app.default_region', 'usa');           
    $regionModel = Region::where('code', $region)->firstOrFail();
    $regionId = $regionModel->id;
    $regionTitle = $regionModel->title;
$setting = Setting::where('setting_region', $regionId)->first();
       $categories = Category::where('status', 1)->where('cate_region', $regionId)
        ->with([
            'stores' => function ($q) use ($regionId) {
                $q->where('store_region', $regionId)
                ->limit(4);
            },
            'stores.coupons' => function ($q)  {
                $q->where('status', 'active')
                ->where('status', 'active')
                  ->limit(1);
            }
        ])->get();
          $title = $setting->studentt_m_tiitle ;
    $meta_description = $setting->studentt_m_descrip;
    $heading = $setting->studentt_heading;
    $subheading = $setting->studentt_subheading;


  return view('website.studen_discont', compact('categories','heading','subheading','title','meta_description' ));
}



public function contact()
    {   
          $region = $region ?? config('app.default_region', 'usa');
           
    // Fetch region model
    $regionModel = Region::where('code', $region)->firstOrFail();
    $regionId = $regionModel->id;
    $regionTitle = $regionModel->title;
$setting = Setting::where('setting_region', $regionId)->first();
$title = $setting->contact_m_tiitle ;
$meta_description = $setting->contact_m_descrip ;

        return view('website.contact', compact('title','meta_description'));
    }


 public function Inspired( $region = null) {

     $region = $region ?? config('app.default_region', 'usa');           
    $regionModel = Region::where('code', $region)->firstOrFail();
    $regionId = $regionModel->id;
    $regionTitle = $regionModel->title;
    $setting = Setting::where('setting_region', $regionId)->first();
    $title = $setting->inspired_m_tiitle ;
    $meta_description = $setting->inspired_m_descrip;
    $heading = $setting->inspired_heading;
    $subheading = $setting->inspired_subheading;
    $categories = Category::whereIn('id', [12, 13, 20, 21])
    ->with(['stores' => function ($query) {
        $query->limit(20);
    }])
    ->get();

    $feature = Coupon::with('store')
        ->where('feature', true)
        ->where('verified', true)
        ->where('status', 'active')
         ->whereHas('store', function ($q) use ($regionId) {
        $q->where('store_region', $regionId);
    })
        ->get();
    $setting = Setting::where('setting_region', $regionId)->first();
    $title = $setting->advertise_m_tiitle;
    $meta_description = $setting->advertise_m_descrip;

        return view('website.inspired', compact('categories','heading','subheading', 'feature','title','meta_description'));

 }
 public function Inspiredpost($gender , $age)
{
    $region = null;
$region = $region ?? config('app.default_region', 'usa');           
    $regionModel = Region::where('code', $region)->firstOrFail();
    $regionId = $regionModel->id;
    $regionTitle = $regionModel->title;

     $genderMap = ['male'=>0,'female'=>1];
    $ageMap    = ['18-24'=>1,'25-34'=>2,'35-44'=>3,'45+'=>4];

    $genderValue = $genderMap[$gender] ?? null;
    $ageValue    = $ageMap[$age] ?? null;


    if (is_null($genderValue) || is_null($ageValue)) abort(404);

       $feature = Coupon::with('store')
            ->where('gender', $genderValue)
            ->where('age', $ageValue)
            ->where('status', 'active')
               ->whereHas('store', function ($q) use ($regionId) {
        $q->where('store_region', $regionId);
    })
            ->get();

            // dd($genderValue,$ageValue, $feature);
               $categories = Category::whereIn('id', [12, 13, 20, 21])
    ->with(['stores' => function ($query) {
        $query->limit(20);
    }])
    ->get();
          
      $setting = Setting::where('setting_region', $regionId)->first();
   $title = $setting->inspired_m_tiitle ;
    $meta_description = $setting->inspired_m_descrip;
    $heading = $setting->inspired_heading;
    $subheading = $setting->inspired_subheading;

 return view('website.inspiredpost', compact('categories','heading','subheading','feature','title','meta_description'));
 }

      public function advertise($region = null)
    {
          $region = $region ?? config('app.default_region', 'usa');
           
    // Fetch region model
    $regionModel = Region::where('code', $region)->firstOrFail();
    $regionId = $regionModel->id;
    $regionTitle = $regionModel->title;
$setting = Setting::where('setting_region', $regionId)->first();
$title = $setting->advertise_m_tiitle ;
$meta_description = $setting->advertise_m_descrip ;
            

        return view('website.advers', compact('title','meta_description'));
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
