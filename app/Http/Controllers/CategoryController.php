<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::latest()->get();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }
    public function store(Request $request)
    {
        Category::create([
           'category_name'=>$request->category_name, 
        ]);
        return redirect()->route('categories.index');
    }
    public function show(Category $category)
    {
        return view('admin.categories.show',[
            'category'=>$category
        ]);
    }
    public function edit(Category $category)
    {
        return view('admin.categories.edit',[
            'category'=>$category
        ]);
    }
    public function update(Request $request, Category $category)//
    {
        $category->update([
            'category_name'=>$request->category_name, 
        ]);
        return redirect()->route('categories.index');
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
