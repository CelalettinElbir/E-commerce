<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ReturnOrder;
use App\Models\ShopOrder;
use Illuminate\Http\Request;

class ReturnOrderController extends Controller
{

    public function create(ShopOrder $shopOrder)
    {
        return view('user.returnOrder.create', compact('shopOrder'));
    }


    public function store(Request $request, ShopOrder $shopOrder)
    {
        $request->validate([
            'shop_order_id' => 'required|exists:shop_orders,id',
            'reason' => 'required|string',
        ]);

        try {
            ReturnOrder::create([
                'shop_order_id' => $request->shop_order_id,
                'reason' => $request->reason,
                'durum' => 'beklemede',
            ]);

            return redirect()->route('user.order.index', $request->shop_order_id);
        } catch (\Exception $e) {

            return $e;
            return redirect()->back()->with('error', 'Geri iade talebi oluşturulurken bir hata oluştu: ' . $e->getMessage());
        }
    }
}
