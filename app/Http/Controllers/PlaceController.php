<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Place;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Place::all();
        return view('admin.places.places')->with('places', $places);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $categories = Category::all();
        return view('admin.places.create',['users'=>$users,'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $place =  new Place();
        $place->name = strip_tags($request->input('name'));
        $place->country = strip_tags($request->input('country'));
        $place->category_id = strip_tags($request->input('category_id'));
        $place->user_id = strip_tags($request->input('user_id'));
        $place->statue = (bool) $request->get('access', false);
        $place->save();
        return redirect()->route('admin.places.places')->with('place_success','Company has been created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Place $place)
    {
        $users = User::all();
        $category = Category::all();
        return view('admin.places.show', [
            'place' => $place,
            'users' => $users,
            'category' => $category,

        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Place $place)
    {
        $users = User::all();
        $categories = Category::all();
        return view('admin.places.edit',['place'=>$place, 'categories'=>$categories, 'users'=>$users]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Place $place)
    {
        $input = $request->all();
        $place['name'] = $request->get('name');
        $place['category_id'] = $request->get('category_id');
        $place['country'] = $request->get('country');
        $place['user_id'] = $request->get('user_id');
        $place->statue = (bool) $request->get('access', false);
        $place->save();
        return redirect()->route('admin.places.places')->with('update_success', 'User Updated !');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        //
    }
}
