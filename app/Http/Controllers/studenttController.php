<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Region;
use App\Models\studentt;
class studenttController extends Controller
{
    //
    public function index()
    {
       $settings = studentt::get();
        return view('adminn.studentt.index', compact('settings'));
    }

    // CREATE PAGE
    public function create()
    { $region = Region::all();
        return view('adminn.studentt.add', compact('region'));
    }

    // STORE NEW
    public function store(Request $request)
    {
$data = $request->all();
studentt::create($data);
        return redirect()->route('studentt.index')->with('success', 'Setting created!');
    }

    // EDIT PAGE
    public function edit($id)
    {
        $event = studentt::findOrFail($id); 
        return view('adminn.studentt._form', compact('event'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $setting = studentt::findOrFail($id);
        $data = $request->all();
        $setting->update($data);
    return redirect()->route('studentt.index')->with('success', 'Updated!');
    }

    // DELETE
    public function destroy($id)
    {
        studentt::findOrFail($id)->delete();
        return back()->with('success', 'Deleted!');
    }

}
