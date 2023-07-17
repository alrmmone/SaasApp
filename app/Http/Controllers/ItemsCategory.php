<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemCategory;
use App\Models\Place;
use Illuminate\Support\Facades\Auth;


class ItemsCategory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */

    public function index()
    {
        $place = Place::query()->where('user_id', Auth::id())->first();
        $categories = ItemCategory::all()
            ->where('place_id', $place['id']);
        $ItemsCategory = $categories;
        return view('users.itemCategory.index', ['categories' => $categories, 'ItemsCategory' => $ItemsCategory]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ItemCategory::all();
        return view('users.itemCategory.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $place = Place::query()->where('user_id', Auth::id())->first();
        $category = new ItemCategory();
        $category->name = strip_tags($request->input('name'));
        $category->place_id = $place['id'];
        $category->save();

        return redirect()->route('users.itemCategory.index')->with('category_success', 'Category has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemCategory $category)
    {
        return view('users.itemCategory.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemCategory $category)
    {
        $category->name = $request->input('name');
        $category->save();
        return redirect()->route('users.itemCategory.index')->with('update_success', 'Category Updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
