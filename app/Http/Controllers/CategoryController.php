<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    //___________________________________________________->Index
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.home')->with('categories', $categories);
    }

    //___________________________________________________->Create
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create')->with('categories', $categories);
    }

    //___________________________________________-_-_-_-_->Store
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = strip_tags($request->input('name'));
        $category->save();

        return redirect()->route('admin.categories.home')->with('category_success', 'Category has been created successfully.');
    }

    //___________________________________________________->Show
    public function show(string $id)
    {
        //__________________________________________________________________Without Show
    }

    //___________________________________________________->Edit
    public function edit(Request $request, Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    //___________________________________________________->Update
    public function update(Request $request, Category $category)
    {
        $category->name = $request->input('name');
        $category->save();
        return redirect()->route('admin.categories.home')->with('update_success', 'Category Updated !');
    }

    //___________________________________________________->Delete
    public function destroy(string $id)
    {
        //
    }
}
