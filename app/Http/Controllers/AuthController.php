<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Place;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    //________________________________________________Add User
    public function adduser()
    {
        $roles = Role::all();
        $places = Place::all();
        return view('admin.adduser', [ 'roles' =>  $roles , 'places' => $places]);
    }

    public function adduserPost(Request $request)
    {
        $user = new User();
        $user['name'] = $request->name;
        $user['email'] = $request->email;
        $user['role_id'] = $request->role;
        $user['phone'] = $request->phone;
        $user['place_id'] = $request->place_id;
        $user['password'] = Hash::make($request->password);
        $user['access'] = (bool) $request->get('access', false);
        $user->save();

        return back()->with('added_success', 'Added User Successfully');
    }

    //________________________________________________Login
    public function login()
    {
            return view('login');
    }

    public function loginPost(Request $request)
    {

            $credetials = [
                'email' => $request->email,
                'password' => $request->password,
            ];


                if (Auth::attempt($credetials)) {
                    return redirect('/home')->with('success', 'Login berhasil');
            }
            return back()->with('error', 'Error Email or Password');

    }

//    public function show(Request $request, Order $order)
//    {
//        $items = Items::all();
//        $order_items = OrderItems::all();
//
//        return view('invoice', [
//            'order' => $order,
//            'items' => $items,
//            'order_items' => $order_items
//        ]);
//    }

    //________________________________________________Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
