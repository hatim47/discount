<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Region;
use App\Models\Store;
use App\Models\Coupon;
use App\Models\Setting;
class EventController extends Controller
{
   public function index()
   {
       $events = Event::with('region')->latest()->get();
       return view('adminn.event.index', compact('events'));
   }

   public function create()
   
   {
        $region = Region::all();
       return view('adminn.event.add', compact('region'));
   }    

   public function store(Request $request)
   {
       try {
        $request->validate([
           'title' => 'required',
            'heading' => 'required',
            'description' => 'required',
            'slug' => 'required|unique:events,slug',
            'banner.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

       ]);
} catch (\Illuminate\Validation\ValidationException $e) {
        dd($e->errors()); // show validation errors directly
    }
       Event::create($request->all());
       return redirect()->route('event.index')
                        ->with('success', 'Event created successfully.');
   }

    public function edit($id)
    {
         $event = Event::findOrFail($id);
         return view('adminn.event._form', compact('event'));
    }   

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $request->validate([
           'title' => 'required',
           'slug' => 'required',
           'banner.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $event->update($request->all());
        return redirect()->route('event.index')->with('success', 'Event updated successfully.');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('event.index')
                         ->with('success', 'Event deleted successfully.');
    }
 public function event($region = null)
    {

         $region = $region ?? config('app.default_region', 'usa');
           
    // Fetch region model
    $regionModel = Region::where('code', $region)->firstOrFail();
    $regionId = $regionModel->id;
    $regionTitle = $regionModel->title;

        $event = Event::where("event_region",$regionId)->where('status', 1)->get();
      $setting = Setting::where('setting_region', $regionId)->first();
$title = $setting->event_m_tiitle ;
$meta_description = $setting->event_m_descrip ;
      
        
        return view('website.event', compact('event','title','meta_description'));
    }
 public function subevent($regionOrSlug, $slug = null)
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

        $event = Event::where("event_region",$regionId)->where('slug', $slug)->firstOrFail();

        $allevent = Event::where("event_region",$regionId)->where('status', 1)->get();
$trends = Store::where('trend', true)->where('status', 1)->get();

    // Get coupons for this store
    $coupons = Coupon::with('store')->where('event_id', $event->id)->where('status', 'active')
        ->latest()
        ->paginate(10);
        $meta_description = $event->m_descrip ?? null;  
        $title = $event->m_tiitle ?? null;       
        return view('website.eventsub', compact('event','trends','coupons','allevent','title','meta_description'));
    }

}
