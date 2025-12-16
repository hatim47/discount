<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Region;
class SettingController extends Controller
{
  public function index()
    {
        $settings = Setting::with('region')->latest()->get();
        return view('adminn.settings.index', compact('settings'));
    }

    // CREATE PAGE
    public function create()
    { $region = Region::all();
        return view('adminn.settings.add', compact('region'));
    }

    // STORE NEW
    public function store(Request $request)
    {

  $data = $request->all();

$socials = [
    'youtube' => $request->youtube == "" ? null : $request->youtube,
    'tiktok'      => $request->tiktok == "" ? null : $request->tiktok,
    'snapchat'    => $request->snapchat == "" ? null : $request->snapchat,
    'instagram'   => $request->instagram == "" ? null : $request->instagram,
    'pinterest'   => $request->pinterest == "" ? null : $request->pinterest,
    'twitter'     => $request->twitter == "" ? null : $request->twitter,
    'facebook'    => $request->facebook == "" ? null : $request->facebook,
    'lnikedin'   => $request->lnikedin == "" ? null : $request->lnikedin,
];

$data['socails'] = json_encode($socials);

Setting::create($data);
        return redirect()->route('settings.index')->with('success', 'Setting created!');
    }

    // EDIT PAGE
    public function edit($id)
    {
        $settingsa = Setting::findOrFail($id); 
        return view('adminn.settings._form', compact('settingsa'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $setting = Setting::findOrFail($id);
        $data = $request->all();
        $socials = [
            'youtube' => $request->youtube == "" ? null : $request->youtube,
            'tiktok'  => $request->tiktok == "" ? null : $request->tiktok,
            'snapchat'  => $request->snapchat == "" ? null : $request->snapchat,
            'instagram'  => $request->instagram == "" ? null : $request->instagram,
            'pinterest'  => $request->pinterest == "" ? null : $request->pinterest,
            'twitter'   => $request->twitter == "" ? null : $request->twitter,
            'facebook'   => $request->facebook == "" ? null : $request->facebook,
            'lnikedin'  => $request->lnikedin == "" ? null : $request->lnikedin,
        ];
        $data['socails'] = json_encode($socials);
        // dd($request->all(), $data);
        $setting->update($data);
    return redirect()->route('settings.index')->with('success', 'Updated!');
    }

    // DELETE
    public function destroy($id)
    {
        Setting::findOrFail($id)->delete();
        return back()->with('success', 'Deleted!');
    }

}
