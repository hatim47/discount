<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Region;
use App\Models\featuer;
class featuerController extends Controller
{
    //
    public function index()
    {
        $settings = featuer::with('region')->latest()->get();
        return view('adminn.featuer.index', compact('settings'));
    }

    // CREATE PAGE
    public function create()
    { $region = Region::all();
        return view('adminn.featuer.add', compact('region'));
    }

    // STORE NEW
    public function store(Request $request)
    {

  $data = $request->all();
featuer::create($data);
        return redirect()->route('featuer.index')->with('success', 'Setting created!');
    }

    // EDIT PAGE
    public function edit($id)
    {
        $event = featuer::findOrFail($id); 
        return view('adminn.featuer._form', compact('event'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $setting = featuer::findOrFail($id);
        $data = $request->all();
        // dd($request->all(), $data);
        $setting->update($data);
         return redirect()->route('featuer.index')->with('success', 'Updated!');
    }

    // DELETE
    public function destroy($id)
    {
        featuer::findOrFail($id)->delete();
        return back()->with('success', 'Deleted!');
    }
}
