<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DynaPage;
use App\Models\Region;
use App\Models\Store;
use App\Models\Coupon;
class DynapageController extends Controller
{
    //

      public function index()
   {
       $events = DynaPage::with('region')->latest()->get();
       return view('adminn.dynapage.index', compact('events'));
   }

   public function create()
   {
       $region = Region::all();

       return view('adminn.dynapage.add', compact('region'));
   } 
   
   public function store(Request $request)
   {
       try {
        $request->validate([
           'name' => 'required',
            'heading' => 'required',
            'slug' => 'required|unique:dyna_pages,slug',
            'banner.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
} catch (\Illuminate\Validation\ValidationException $e) {
        dd($e->errors()); // show validation errors directly
    }
       DynaPage::create($request->all());
       return redirect()->route('dynapage.index')
                        ->with('success', 'Event created successfully.');
   }

    public function edit($id)
    {
         $event = DynaPage::findOrFail($id);
         return view('adminn.dynapage._form', compact('event'));
    }   

    public function update(Request $request, $id)
    {
        $event = DynaPage::findOrFail($id);
        $request->validate([
           'name' => 'required',
           'slug' => 'required',
           'banner.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $event->update($request->all());
        return redirect()->route('dynapage.index')->with('success', 'Event updated successfully.');
    }

    public function destroy($id)
    {
        $event = DynaPage::findOrFail($id);
        $event->delete();
        return redirect()->route('dynapage.index')
                         ->with('success', 'Event deleted successfully.');
    }
 public function dynamic($regionOrSlug, $slug = null)
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
        $event = DynaPage::where("dyna_region",$regionId)->where('slug', $slug)->firstOrFail();
        $trends = Store::where('trend', true)->where("store_region",$regionId)->get();
 
    $coupons = Coupon::with('store')->where('dyna_id', $event->id)
        ->latest()
        ->paginate(10);
        $meta_description = $event->m_descrip;  
        $title = $event->m_tiitle;       
        return view('website.dynacpage', compact('event','trends','coupons','title','meta_description'));
    }

}
