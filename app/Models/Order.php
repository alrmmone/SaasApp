<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';


    protected $fillable = [
        'status',
        'order_amount',
        'note',
        'user_id',
        'place_id',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function place(): HasOne
    {
        return $this->hasOne(Place::class, 'id', 'place_id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItems::class, 'order_id', 'id');
    }
}
