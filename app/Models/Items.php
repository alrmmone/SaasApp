<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Items extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'count',
        'price',
        'place_id',
        'category_id',
        'unit_id',
        'access',
    ];

    protected $appends = [
        'totalQty',
    ];

    public function place(): HasOne
    {
        return $this->hasOne(Place::class, 'id', 'place_id');
    }

    public function category(): HasOne
    {
        return $this->hasOne(ItemCategory::class, 'id', 'category_id');
    }

    public function unit(): HasOne
    {
        return $this->hasOne(Unit::class, 'id', 'unit_id');
    }

    public function getTotalQtyAttribute()
    {
        $orders = Order::query()
            ->with(['items' => function ($q) {
                $q->where('item_id', $this['id']);
            }])->get();

        $qty_items_in = 0;
        $qty_items_out = 0;
        foreach ($orders as $order) {
            if ($order['type'] == 1) {
                $qty_items_in += $order->items()->sum('quantity') ;
            } else {
                $qty_items_out +=  $order->items()->sum('quantity');
            }
        }
        
        return $qty_items_in + $this['count'] - $qty_items_out;


    }
}
