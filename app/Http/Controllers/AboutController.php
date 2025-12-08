<?php

namespace App\Http\Controllers;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function index()
   {
       $events = About::with('region')->latest()->get();
       return view('adminn.about.index', compact('events'));
   }

   public function create()
   {
        $region = Region::all();
       return view('adminn.about.add', compact('region'));
   }    

   public function store(Request $request)
   {
       About::create($request->all());
       return redirect()->route('about.index')->with('success', 'About created successfully.');
   }

    public function edit($id)
    {
         $event = About::findOrFail($id);
         return view('adminn.about._form', compact('event'));
    }   

    public function update(Request $request, $id)
    {
        $event = About::findOrFail($id);

        $event->update($request->all());
        return redirect()->route('about.index')->with('success', 'About updated successfully.');
    }

    public function destroy($id)
    {
        $event = About::findOrFail($id);
        $event->delete();
        return redirect()->route('about.index')
                         ->with('success', 'About deleted successfully.');
    }
}
