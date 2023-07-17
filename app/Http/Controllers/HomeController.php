<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ItemCategory;
use App\Models\Order;
use App\Models\Place;
use App\Models\Role;
use App\Models\User;
use App\Models\Items;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $place = Place::query()->where('user_id', Auth::id())->first();
        $sum_orderin = $place ? Order::query()->where('type', '=', 1)->count('type') : 0;
        $sum_orderout = $place ? Order::query()->where('type', '=', 0)->count('type') : 0;
        $sum_item = $place ? Items::query()->where('place_id', $place['id'])->sum('count') : 0;
        $count = $place ? ItemCategory::query()->where('place_id', $place['id'])->count('id') : 0;

        return view('home', [
            'sum_item' => $sum_item,
            'count' => $count,
            'sum_orderin' => $sum_orderin,
            'sum_orderout' => $sum_orderout
        ]);
    }

    public function adminHome()
    {
        $users = User::all();
        return view('admin.users')->with('users', $users);
    }

    //________________________________________________Admin-show
    public function show(Request $request, User $user)
    {
        return view('admin.show', [
            'user' => $user
        ]);
    }

    //________________________________________________Admin-show
    public function edit(Request $request, User $user)
    {
        $roles = Role::all();
        $places = Place::all();
        return view('admin.edit', ['user' => $user, 'roles' => $roles, 'places' => $places]);
    }

    //________________________________________________Admin-show
    public function update(Request $request, User $user)
    {

        $input = $request->all();
        $user['name'] = $request->name;
        $user['email'] = $request->email;
        $user['role_id'] = $request->role_id;
        $user['place_id'] = $request->place_id;
        $user['phone'] = $request->phone;
        $user->access = (bool)$request->get('access', false);
        $user->save();
        return redirect()->route('admin.users')->with('update_success', 'User Updated !');

    }

    //________________________________________________Admin-show
    public function destroy(User $user)
    {
        //
    }


}
