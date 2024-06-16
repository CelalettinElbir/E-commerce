<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShipppingMethod;
use App\Models\ShopOrder;
use Illuminate\Http\Request;

class UserOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $status = ShopOrder::getStatuses();
        $orders = ShopOrder::with([
            'orderDetails.product:id,name,aspect_ratio,width,rim_diameter,price,discount_price,image',
            'address:id,first_name,last_name'
        ])->where('user_id', 1)->get();


        return view("user.order.index", compact("orders", "status"));
    }



    /**
     * Display the specified resource.
     */
    public function show(ShopOrder $shopOrder)
    {
        $status = ShopOrder::getStatuses();
        // $Shoporder = ShopOrder::where("id",  $id)->with("orderDetails", "address", "ShippingDetails")->get();
        $shopOrder->load("orderDetails", "address", "ShippingDetails", "orderDetails.product")->get();
        return view("user.order.detail", compact("shopOrder", "status"));
    }

    public function checkout()
    {
        return "deneme";
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShopOrder $shopOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShopOrder $shopOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShopOrder $shopOrder)
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
}
