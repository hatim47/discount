<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Region;
use App\Models\advertise;
class advertiseController extends Controller
{
    //
public function index()
    {
        $settings = advertise::with('region')->latest()->get();
        return view('adminn.advertise.index', compact('settings'));
    }

    // CREATE PAGE
    public function create()
    {   
        $region = Region::all();
        return view('adminn.advertise.add', compact('region'));
    }

    // STORE NEW
    public function store(Request $request)
    {
        $data = $request->all();
        advertise::create($data);
        return redirect()->route('advertise.index')->with('success', 'Setting created!');
    }

    // EDIT PAGE
    public function edit($id)
    {
        $event = advertise::findOrFail($id); 
        return view('adminn.advertise._form', compact('event'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $setting = advertise::findOrFail($id);
        $data = $request->all();
        // dd($request->all(), $data);
        $setting->update($data);
        return redirect()->route('advertise.index')->with('success', 'Updated!');
    }

    // DELETE
    public function destroy($id)
    {
        advertise::findOrFail($id)->delete();
        return back()->with('success', 'Deleted!');
    }

}
