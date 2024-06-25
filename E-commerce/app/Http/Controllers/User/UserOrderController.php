<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\ShipppingMethod;
use App\Models\ShopOrder;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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










    public function store(Request $request)
    {
        $addressData = $request->validate([
            'address_line_1' => 'required',
            'address_line_2' => 'nullable',
            'city' => 'required',
            'state' => 'nullable',
            'postal_code' => 'required',
            'tel_no' => 'nullable',
            'addres_name' => 'nullable',
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'tc' => 'nullable',
            // Add other address fields as needed
        ]);

        $address = Address::create($addressData);

        
        // Validate the request data for order
        $orderData = $request->validate([
            'order_total' => 'required|numeric|min:0',
            // Add other order fields as needed
        ]);

        // Add user_id and shipping_address_id to order data
        $orderData['user_id'] = Auth::id();
        $orderData['shipping_address_id'] = $address->id;

        // Create the order
        $order = ShopOrder::create($orderData);

        // Optionally, you may want to return a response or redirect
        return response()->json(['order' => $order, 'address' => $address], 201);
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

}
