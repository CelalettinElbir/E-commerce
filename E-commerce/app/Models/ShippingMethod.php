<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'hint',
        "tracking_number"
    ];
    public function orders()
    {
        return $this->hasMany(ShopOrder::class, "shipping_method_id");
    }
}
