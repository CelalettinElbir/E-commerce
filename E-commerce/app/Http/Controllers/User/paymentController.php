<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\OrderCreated;
use App\Models\Address;
use App\Models\ShopOrder;
use App\Models\ShopOrderItem;
use BeyondCode\QueryDetector\Outputs\Json;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class paymentController extends Controller
{
    public function index()
    {



        if (auth()->check()) {

            $addresses = auth()->user()->address;
            // User is logged in
            return view("user.payment.index", compact("addresses")); // Customize this as needed
        } else {
            // dd($addresses);

            // User is not logged in
            return view("user.payment.index", compact("cities")); // Customize this as needed
        }
    }






    // public function processPayment(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'address_id' => 'required',
    //         'first_name' => 'sometimes|required|string|max:255',
    //         'last_name' => 'sometimes|required|string|max:255',
    //         'address' => 'sometimes|required|string|max:255',
    //         'city' => 'sometimes|required|string|max:255',
    //         'postal_code' => 'sometimes|required|string|max:20',
    //         'tel_no' => 'sometimes|required|string|max:20',
    //         'address_name' => 'sometimes|required|string|max:255',
    //     ]);

    //     $user = Auth::user();

    //     if ($request->address_id == 'new') {
    //         // Save the new address
    //         $address = new Address();
    //         $address->user_id = $user->id;
    //         $address->first_name = $request->first_name;
    //         $address->last_name = $request->last_name;
    //         $address->address_line_1 = $request->address;
    //         $address->city = $request->city;
    //         $address->postal_code = $request->postal_code;
    //         $address->tel_no = $request->tel_no;
    //         $address->address_name = $request->address_name;
    //         $address->save();
    //     } else {
    //         // Use existing address
    //         $address = Address::find($request->address_id);
    //         if (!$address || $address->user_id != $user->id) {
    //             // return back()->withErrors(['address_id' => 'Invalid address selected.'])

    //             return "deneme";
    //         }
    //     }

    //     // Pass the address ID or new address details to the payment processing view
    //     // return view('user.payment.process', compact('address'));

    //     return view('user.payment.process', compact('address'));
    // }







    // public function handleFakePayment(Request $request)
    // {
    //     // Simulate payment process
    //     // For now, we simulate the payment and clear the cart
    //     Cart::destroy();

    //     // Create the order
    //     $order = new ShopOrder();
    //     $order->user_id = Auth::id();
    //     $order->address_id = $request->address_id;
    //     $order->order_total = Cart::total();
    //     $order->status = 'pending'; // Set initial status as pending
    //     $order->save();

    //     // Create order items
    //     foreach (Cart::content() as $cartItem) {
    //         $orderItem = new ShopOrderItem();
    //         $orderItem->order_id = $order->id;
    //         $orderItem->product_id = $cartItem->id;
    //         $orderItem->quantity = $cartItem->qty;
    //         $orderItem->price = $cartItem->price;
    //         $orderItem->save();
    //     }

    //     // Redirect to a success page
    //     return redirect()->route('user.payment.success');
    // }


    // public function paytrCallback(Request $request)
    // {
    //     // Handle PayTR callback here
    //     // Verify payment status and update order status accordingly

    //     // Example:
    //     $status = $request->input('status');
    //     $merchantId = $request->input('merchant_oid'); // Adjust based on your PayTR setup

    //     // Example of handling payment status
    //     if ($status == 'success') {
    //         // Payment successful, update order status to 'completed' or similar
    //         $order = ShopOrder::where('id', $merchantId)->first();
    //         if ($order) {
    //             $order->status = 'completed';
    //             $order->save();
    //         }
    //     } else {
    //         // Payment failed or canceled, handle accordingly
    //         // Update order status or log the issue
    //     }

    //     // Redirect to success or failure page based on payment status
    //     return redirect()->route('checkout.success');
    // }





    // public function success()
    // {
    //     return view('checkout_success');
    // }






    // public function handleFakePayment(Request $request)
    // {
    //     $user = Auth::user();

    //     // Handle address
    //     if ($request->address_id == 'new') {
    //         // Validate the new address data
    //         // dd(request()->all());

    //         $request->validate([
    //             'first_name' => 'required|string|max:255',
    //             'last_name' => 'required|string|max:255',
    //             'address' => 'required|string|max:255',
    //             'city' => 'required|string|max:255',
    //             'postal_code' => 'required|string|max:20',
    //             'tel_no' => 'required|string|max:20',
    //             'address_name' => 'required|string|max:255',
    //         ]);

    //         // Save the new address
    //         $address = new Address();
    //         $address->user_id = $user->id;
    //         $address->first_name = $request->first_name;
    //         $address->last_name = $request->last_name;
    //         $address->address_line_1 = $request->address;
    //         $address->address_line_2 = $request->address2;
    //         $address->city = $request->city;
    //         $address->state = $request->state;
    //         $address->postal_code = $request->postal_code;
    //         $address->tel_no = $request->tel_no;
    //         $address->addres_name = $request->address_name;
    //         $address->tc = $request->tc;
    //         $address->save();
    //     } else {

    //         // Use existing address
    //         $address = Address::find($request->address_id);
    //         if (!$address || $address->user_id != $user->id) {
    //             return back()->withErrors(['address_id' => 'Invalid address selected.']);
    //         }
    //     }

    //     // Here you can handle the payment process

    //     // Create the order
    //     $order = new ShopOrder();
    //     $order->user_id = $user->id;
    //     $order->address_id = 1;
    //     $order->total_amount = Cart::total();
    //     $order->status = 'pending'; // or whatever status you want to set
    //     $order->save();

    //     // Create order items
    //     foreach (Cart::content() as $cartItem) {
    //         $orderItem = new ShopOrderItem();
    //         $orderItem->order_id = $order->id;
    //         $orderItem->product_id = $cartItem->id;
    //         $orderItem->quantity = $cartItem->qty;
    //         $orderItem->price = $cartItem->price;
    //         $orderItem->save();
    //     }



    //     // For now, we simulate the payment and clear the cart

    //     // Clear the cart
    //     Cart::destroy();

    //     // Redirect to a success page
    //     return redirect()->route('checkout.success');
    // }







    public function addressForm()
    {
        return view('user.payment.index');
    }

    // Store address
    // public function storeAddress(Request $request)
    // {
    //     $user = Auth::user();

    //     // Handle address
    //     if ($request->address_id == 'new') {
    //         // Validate the new address data
    //         // dd(request()->all());

    //         $request->validate([
    //             'first_name' => 'required|string|max:255',
    //             'last_name' => 'required|string|max:255',
    //             'address' => 'required|string|max:255',
    //             'city' => 'required|string|max:255',
    //             'postal_code' => 'required|string|max:20',
    //             'tel_no' => 'required|string|max:20',
    //             'address_name' => 'required|string|max:255',
    //         ]);

    //         // Save the new address
    //         $address = new Address();
    //         $address->user_id = $user->id;
    //         $address->first_name = $request->first_name;
    //         $address->last_name = $request->last_name;
    //         $address->address_line_1 = $request->address;
    //         $address->address_line_2 = $request->address2;
    //         $address->city = $request->city;
    //         $address->state = $request->state;
    //         $address->postal_code = $request->postal_code;
    //         $address->tel_no = $request->tel_no;
    //         $address->addres_name = $request->address_name;
    //         $address->tc = $request->tc;
    //         $address->save();
    //     } else {

    //         // Use existing address
    //         $address = Address::find($request->address_id);
    //         if (!$address || $address->user_id != $user->id) {
    //             return back()->withErrors(['address_id' => 'Invalid address selected.']);
    //         }
    //     }

    //     // Redirect to payment page
    //     return redirect()->route('user.payment.checkout');
    // }


    public function storeAddress(Request $request)
    {
        $user = Auth::user();
        // Handle address
        if ($request->address_id == 'new') {
            // Validate the new address data
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'postal_code' => 'required|string|max:20',
                'tel_no' => 'required|string|max:20',
                'address_name' => 'required|string|max:255',
            ]);

            try {
                // Save the new address
                $address = new Address();
                $address->user_id = $user->id;
                $address->first_name = $request->first_name;
                $address->last_name = $request->last_name;
                $address->address_line_1 = $request->address;
                $address->address_line_2 = $request->address2;
                $address->city = $request->city;
                $address->state = $request->state;
                $address->postal_code = $request->postal_code;
                $address->tel_no = $request->tel_no;
                $address->addres_name = $request->address_name;
                $address->tc = $request->tc;
                $address->save();

                $notification = array(
                    "message" => "Adres başarıyla kaydedildi.",
                    "alert-type" => "success"
                );
                return redirect()->route('user.payment.checkout')->with($notification);
            } catch (\Exception $e) {
                $notification = array(
                    "message" => "Adres kaydedilirken bir hata oluştu. Lütfen tekrar deneyin.",
                    "alert-type" => "error"
                );
                return $e;
            }
        } else {
            try {
                // Use existing address
                $address = Address::find($request->address_id);
                if (!$address || $address->user_id != $user->id) {
                    $notification = array(
                        "message" => "Geçersiz adres seçildi.",
                        "alert-type" => "error"
                    );
                    return back()->with($notification);
                }

                $notification = array(
                    "message" => "Adres başarıyla seçildi.",
                    "alert-type" => "success"
                );
                return redirect()->route('user.payment.checkout')->with($notification);
            } catch (\Exception $e) {
                $notification = array(
                    "message" => "Adres getirilirken bir hata oluştu. Lütfen tekrar deneyin.",
                    "alert-type" => "error"
                );
                return back()->with($notification);
            }
        }
    }



    // Show payment form
    public function paymentForm()
    {
        return view('user.payment.checkout');
    }

    // Process payment (to PayTR)
    public function processPayment(Request $request)
    {
        // Validate payment form data
        $request->validate([
            'card_number' => 'required|string',
            'expiry_month' => 'required|string',
            'expiry_year' => 'required|string',
            'cvv' => 'required|string',
            // Add more validation rules as needed
        ]);

        // Example: Call PayTR API to process payment
        // Replace with actual PayTR integration logic
        // $paymentResponse = PayTR::processPayment($request->all());

        // For demonstration, assume payment is successful
        $paymentSuccessful = true;

        if ($paymentSuccessful) {
            // Create the order
            $order = new ShopOrder();
            $order->user_id = Auth::id();
            $order->address_id = Address::where('user_id', Auth::id())->latest()->first()->id; // Get latest address ID
            $order->order_total = Cart::total();
            $order->status = 'pending'; // Set initial status as pending
            $order->save();

            // Create order items
            foreach (Cart::content() as $cartItem) {
                $orderItem = new ShopOrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $cartItem->id;
                $orderItem->quantity = $cartItem->qty;
                $orderItem->price = $cartItem->price;
                $orderItem->save();
            }
            // Clear the cart
            Cart::destroy();

            // Redirect to success page
            return redirect()->route('user.payment.success');
        } else {
            // Redirect to failure page if payment fails
            return redirect()->route('user.payment.failure');
        }
    }

    // Handle PayTR callback (not implemented here)
    public function paytrCallback(Request $request)
    {
        // Handle PayTR callback here
        // Verify payment status and update order status accordingly

        // Redirect to appropriate success or failure page based on PayTR callback
        // Example:
        if ($request->input('status') == 'success') {
            return redirect()->route('user.payment.success');
        } else {
            return redirect()->route('user.payment.failure');
        }
    }

    // Checkout success page
    public function success()
    {
        return view('user.payment.success');
    }

    // Checkout failure page
    public function failure()
    {
        return view('user.payment.failure');
    }


    public function order()
    {


        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
        ];


        return new OrderCreated($data, ShopOrder::find(4));
    }
}
