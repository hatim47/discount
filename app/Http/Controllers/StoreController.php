<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Store;
class StoreController extends Controller
{
    public function index()
    {
       $stores = Store::latest()->get(); // fetch from DB
        return view('adminn.store.index', compact('stores'));
    }
    public function create()
    {
        $categories = Category::all(); // Fetch categories for the dropdown
        return view('adminn.store.add', compact('categories'));
    }
    public function store(Request $request)
    {

    //    dd($request->all());
    try {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:stores,slug',
            'logo.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',           
            'heading' => 'required',
            'description' => 'nullable|string',
            'link' => 'nullable|string|max:255',           
            'category_id' => 'required|exists:categories,id',
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        dd($e->errors()); // show validation errors directly
    }
      $data = $request->all();

    // ✅ Handle logo upload
    if ($request->hasFile('logo')) {
        $data['logo'] = $request->file('logo')->store('logos', 'public');
    }

    // ✅ Handle image upload
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('images', 'public');
    }

    Store::create($data);

    // dd('Validation passed ✅', $validated);

      $categories = Category::all(); // Fetch categories for the dropdown
        return view('adminn.store.add', compact('categories'));
    }
    public function show($id)
    {
        $store = Store::findOrFail($id);
        return response()->json($store);
    }
    public function edit($id)
    {
        $store = Store::findOrFail($id);
        $categories = Category::all(); // Fetch categories for the dropdown
        return view('adminn.store._form', compact('store', 'categories'));               
    }
    public function update(Request $request, $id)
    {
    $store = Store::findOrFail($id);
try {
        $validated = $request->validate([
        
           'name' => 'required|string|max:255',
            'slug' => 'required',
            'logo.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',           
            // 'heading' => 'required',
            // 'description' => 'nullable|string',
            // 'link' => 'nullable|string|max:255',           
            // 'category_id' => 'required|exists:categories,id',
        ]);
 } catch (\Illuminate\Validation\ValidationException $e) {
        dd($e->errors()); // show validation errors directly
    }


if ($request->hasFile('logo')) {
        $data['logo'] = $request->file('logo')->store('logos', 'public');
    }

    // ✅ Handle image upload
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('images', 'public');
    }
        $store->update($request->all());

        return redirect()->route('store.index')
                         ->with('success', 'Store updated successfully.');
    }


    public function destroy($id)
    {
        $store = Store::findOrFail($id);
        $store->delete();

        return redirect()->route('store.index')
                         ->with('success', 'Store deleted successfully.');
    }


}
