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
        return view('adminn.store.edit', compact('store', 'categories'));               
    }
    public function update(Request $request, $id)
    {
    $store = Store::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:stores,slug,'.$store->id,
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'promo_text' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
            'trend' => 'nullable|boolean',
            'feature' => 'nullable|boolean',
            'recom' => 'nullable|boolean',
            'heading' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'link' => 'nullable|url|max:255',
            'relat_store' => 'nullable|string|max:255',
            'relat_cate' => 'nullable|string|max:255',
            'like_store' => 'nullable|integer|min:0',
            'view' => 'nullable|integer|min:0',
            'store_region' => 'nullable|integer|exists:regions,id',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

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
