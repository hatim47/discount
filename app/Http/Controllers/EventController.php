<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
class EventController extends Controller
{
   public function index()
   {
       $events = Event::all();
       return view('adminn.event.index', compact('events'));
   }

   public function create()
   {
       return view('adminn.event.add');
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
           'start_date' => 'required|date',
           'end_date' => 'required|date|after_or_equal:start',
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



}
