<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Region;
use App\Models\inspired;

class inspiredController extends Controller
{   

    //
    public function index()
    {
        $settings = inspired::with('region')->latest()->get();
        return view('adminn.inspired.index', compact('settings'));
    }

    // CREATE PAGE
    public function create()
    { $region = Region::all();
        return view('adminn.inspired.add', compact('region'));
    }

    // STORE NEW
    public function store(Request $request)
    {

  $data = $request->all();
inspired::create($data);
        return redirect()->route('inspired.index')->with('success', 'Setting created!');
    }

    // EDIT PAGE
    public function edit($id)
    {
        $event = inspired::findOrFail($id); 
        return view('adminn.inspired._form', compact('event'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $setting = inspired::findOrFail($id);
        $data = $request->all();
        // dd($request->all(), $data);
        $setting->update($data);
    return redirect()->route('inspired.index')->with('success', 'Updated!');
    }

    // DELETE
    public function destroy($id)
    {
        inspired::findOrFail($id)->delete();
        return back()->with('success', 'Deleted!');
    }
}
