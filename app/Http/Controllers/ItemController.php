<?php

namespace App\Http\Controllers;

use App\Models\ItemCategory;
use App\Models\Items;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Place;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $place = Place::query()->where('user_id', Auth::id())->first();

        if (!$place) {
            session()->flash('error', 'you don\'t have an active place');
            return redirect()->back();
        }

        $query = Items::query()
            ->where('place_id', $place['id']);

        if ($name = $request->get('name')) {
            $query->where('name', '=', $name);
        }
        if ($start_quantity = $request->get('start_quantity')) {
            $query->where('count', '>=', $start_quantity);
        }

        if ($end_quantity = $request->get('end_quantity')) {
            $query->where('count', '<=', $end_quantity);
        }

        if ($start_date = $request->get('start_date')) {
            $query->where('created_at', '>=', $start_date);
        }

        if ($end_quantity = $request->get('end_date')) {
            $query->where('created_at', '<=', $end_quantity);
        }
        if ($status = $request->get('unit')) {
            $query->where('unit_id', '=', $status);
        }
        if ($categories = $request->get('category_id')) {
            $query->where('category_id', '=', $categories);
        }
        if ($request->filled('access')) {
            $query->where('access', '=', boolval($request->get('access')));
        }

        $units = Unit::all();
        $category = ItemCategory::all()
            ->where('place_id', $place['id']);
        $items = $query->paginate(25);

        return view('users.items', [
            'items' => $items,
            'units' => $units,
            'category' => $category,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $units = Unit::all();
        $categories = ItemCategory::all();
        $places = Place::all();
        return view('users.create', ['categories' => $categories, 'units' => $units, 'places' => $places]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2028  '
        ]);


        $place = Place::query()->where('user_id', Auth::id())->firstOrFail();
        $item = new Items;

        $file_name = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('image'), $file_name);

        $item['name'] = $request['name'];
        $item['description'] = $request['description'];
        $item['image'] = $file_name;
        $item['count'] = $request['count'];
        $item['unit_id'] = $request['unit'];
        $item['price'] = $request['price'];
        $item['category_id'] = $request['category_id'];
        $item['access'] = (bool)$request->get('access', false);
        $item['place_id'] = $place['id'];
        $item->save();
        return redirect()->route('users.items')->with('success', 'Product Added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Items $item)
    {
        return view('users.show', [
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Items $item)
    {
        $units = Unit::all();
        $categories = ItemCategory::all();
        $places = Place::all();
        return view('users.edit', [
            'item' => $item,
            'categories' => $categories,
            'units' => $units,
            'places' => $places,
        ])->with('item', $item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Items $item)
    {

        $file_name = $request->hidden_product_image;
        $place = Place::query()->where('user_id', Auth::id())->firstOrFail();

        if ($request->image != '') {
            $file_name = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('image'), $file_name);
        }
        $item->name = $request->name;
        $item->description = $request->description;
        $item->image = $file_name;
        $item->count = $request->count;
        $item->price = $request->price;
        $item->category_id = $request->category_id;
        $item->access = (bool)$request->get('access', false);
        $item->place_id = $place['id'];
        $item->save();
        return redirect()->route('users.items')->with('success', 'Items Updated !');
    }

    //__________________________________________________________________Filter


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
