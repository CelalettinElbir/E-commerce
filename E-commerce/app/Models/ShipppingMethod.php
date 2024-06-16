<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipppingMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'hint',
    ];
    public function orders()
    {
        return $this->hasMany(ShopOrder::class);
    }
}
