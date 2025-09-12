<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     public function add()
    {
        return view('adminn.category.add');
    }


    public function index()
    {
       $categories = Category::latest()->get(); // fetch from DB
        return view('adminn.category.index', compact('categories'));
    }
  

    public function store(Request $request)
    {
     
        $request->validate([
            'name' => 'required',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'logo.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:110',
            'shrt_content' => 'nullable',
            'long_content' => 'nullable',
            'm_title' => 'nullable|string',
            'm_descrip' => 'nullable|string', 
            'url' => 'nullable|string|max:255|unique:categories,url',   
        ]);

        Category::create($request->all());
    if($request->hasFile('images')){
        foreach($request->file('images') as $file){
            $store->addMedia($file)->toMediaCollection('images');
        }
    }
        return redirect()->route('cate.add')
                         ->with('success', 'Category created successfully.');
    }



//     @foreach($store->getMedia('images') as $media)
//     <img src="{{ $media->getUrl() }}" width="120">
// @endforeach
 public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }
   public function edit($id)
{
    $category = Category::findOrFail($id);
 
        return view('adminn.category._form', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')
                         ->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')
                         ->with('success', 'Category deleted successfully.');
    }
}
