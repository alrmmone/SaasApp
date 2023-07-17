<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Place;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;


class OrderController extends Controller
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

        $query = Order::query()
            ->where('place_id', $place['id']);

        if ($start_date = $request->get('start_date')) {
            $query->where('created_at', '>=', $start_date);
        }

        if ($end_quantity = $request->get('end_date')) {
            $query->where('created_at', '<=', $end_quantity);
        }

        if ($request->filled('type')) {
            $query->where('type', '=', boolval($request->get('type')));
        }
        $orders = Order::all();
        $order_items = OrderItems::all();
        $orders = $query->paginate(25);

        return view('users.orders.order', [
            'orders' => $orders,
            'order_items' => $order_items,
        ]);
    }

//    public function exportPdf(Request $request, Order $order)
//    {
//        $items = Items::all()->where('id', OrderItems::all('id'));
//        $order_items = OrderItems::all()->where('order_id', $order['id']);
//
//        $sum_qty =  OrderItems::all()->where('order_id', $order['id'])->sum('quantity');
//
//
//
//        return view('invoice', [
//            'order' => $order,
//            'items' => $items,
//            'order_items' => $order_items,
//            'sum_qty' => $sum_qty
//        ]);
//    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $place = Place::query()->where('user_id', Auth::id())->first();
        $items = $place ? Items::query()->where('place_id', $place['id'])->get() : [];
        return view('users.orders.order_in', ['items' => $items]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        foreach ($request->get('items') as $item) {
            $savedItem = Items::query()->find($item['id']);
            $order['type'] = (bool)$request->get('order_in', false);
            if ($order['type'] == false) {
                if ($item['quantity'] > $savedItem['count']) {
                    return redirect()->route('home')->with('error', 'The ' . $savedItem['name'] . 'quantity is greater than the available quantity');
                }
            }
        }

        $item = $request->get('items', 'id');
        $place = Place::query()->where('user_id', Auth::id())->firstOrFail();


        $order = new Order();

        $order['status'] = 'completed'; //pending,processing,completed,cancelled
        $order['order_amount'] = $request->input('order_amount');
        $order['note'] = $request->input('note');
        $order['place_id'] = $place['id'];
        $order['user_id'] = Auth::id();
        $order['type'] = (bool)$request->get('order_in', false);

        $order->save();


        foreach ($request->get('items') as $item) {

            $order_item = new OrderItems();
            $order_item['item_id'] = $item['id'];
            $order_item['quantity'] = $item['quantity'];
            $order_item['order_id'] = $order['id'];

            $order_item->save();
        }


        return redirect()->route('home')->with('success', 'Product Added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Order $order)
    {
        $items = Items::all();
        $order_items = OrderItems::all()->where('order_id', $order['id']);
        return view('users.orders.view', [
            'order' => $order,
            'order_items' => $order_items,
            'items' => $items
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Order $order)
    {
        $items = Items::all()->where('id', OrderItems::all('id'));
        $order_items = OrderItems::all()->where('order_id', $order['id']);

        $sum_qty = OrderItems::all()->where('order_id', $order['id'])->sum('quantity');


        return view('invoice', [
            'order' => $order,
            'items' => $items,
            'order_items' => $order_items,
            'sum_qty' => $sum_qty
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
