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
    ];

    public function shippingMethod()
    {
        return $this->belongsTo(ShipppingMethod::class);
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
            'pending' => 'onaylanmamış',
            'processing' => 'İşleniyor',
            'completed' => 'Tamamlandı',
            'cancelled' => 'İptal Edildi',
            'shipped' => 'Kargolandı',
            'delivered' => 'Teslim Edildi',
        ];
    }
}
