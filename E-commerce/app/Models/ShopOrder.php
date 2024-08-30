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
        'status',
        "shipping_method_id"
    ];

    public function ShippingMethod()
    {
        return $this->belongsTo(ShippingMethod::class, "shipping_method_id");
    }

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

    public static function getStatuses()
    {
        return [
            'pending' => 'Beklemede',
            'processing' => 'İşleniyor',
            'completed' => 'Tamamlandı',
            'cancelled' => 'İptal Edildi',
            'Shipped' => 'Kargolandı',
            'delivered' => 'Teslim Edildi',
        ];
    }
}
