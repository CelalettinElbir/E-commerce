<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_order_id',
        'reason',
        'status'
    ];


    public function shopOrder()
    {
        return $this->belongsTo(ShopOrder::class);
    }
}
