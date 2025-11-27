<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DynaPage;
use App\Models\Region;
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
 public function event($region = null)
    {

         $region = $region ?? config('app.default_region', 'usa');
           
    // Fetch region model
    $regionModel = Region::where('code', $region)->firstOrFail();
    $regionId = $regionModel->id;
    $regionTitle = $regionModel->title;

        $event = DynaPage::where("event_region",$regionId)->get();
      
        $meta_description = "fdsfdsf";
        $title = "m_tiitle";
        return view('website.event', compact('event','title','meta_description'));
    }

}
