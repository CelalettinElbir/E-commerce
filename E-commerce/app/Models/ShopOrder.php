<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopOrder extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'shipping_address',
        'order_total',
        'order_status',
    ];

    public function orderDetails()
    {
        return $this->hasMany(ShopOrderItem::class, 'order_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
