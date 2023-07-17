<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'quantity',
        'order_id',
    ];

    public function item(): HasOne
    {
        return $this->hasOne(Items::class, 'id', 'item_id');
    }

    public function order(): HasOne
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }

}
