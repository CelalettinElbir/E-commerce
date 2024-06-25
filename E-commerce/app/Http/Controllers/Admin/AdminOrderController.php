<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShipppingMethod;
use App\Models\ShopOrder;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $shopOrders = ShopOrder::latest()->get();
        $status = ShopOrder::getStatuses();
        return view("admin.order.index", compact("shopOrders", "status"));
    }

    public function details(ShopOrder $ShopOrder)
    {
        return view("admin.order.orderDetails", compact("ShopOrder"));
    }



    public function pendingOrder()
    {
        $pendingOrders = ShopOrder::where("status", "pending")->get();
        $status = ShopOrder::getStatuses();
        return view("admin.order.pendingOrder", compact("pendingOrders", "status"));
    }


    public function shippedOrder()
    {
        $shippedOrders = ShopOrder::where("status", "shipped")->get();
        $status = ShopOrder::getStatuses();
        return view("admin.order.shippedOrder", compact("shippedOrders", "status"));
    }

    public function cancelledOrder()
    {
        $cancelledOrders = ShopOrder::where("status", "cancelled")->get();
        $status = ShopOrder::getStatuses();
        return view("admin.order.cancelledOrder", compact("cancelledOrders"));
    }


    public function processingOrder()
    {
        $processingOrders = ShopOrder::where("status", "processing")->get();
        $status = ShopOrder::getStatuses();

        return view("admin.order.processingOrder", compact("processingOrders", "status"));
    }


    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);
        $order = ShopOrder::findOrFail($id);

        // Yeni durumu alın
        $newStatus = $request->status;

        // Durumu güncelle
        $order->status = $newStatus;
        $order->save();

        // Başarılı bir yanıt döndürün
        return redirect()->back()->with('success', 'Sipariş durumu güncellendi.');
    }


    public function ShipmentCode(ShopOrder $ShopOrder)
    {
        return view("admin.order.shipmentCode", compact("ShopOrder"));
    }


    public function ShipmentCreate(Request $request, ShopOrder $ShopOrder)
    {

        // Doğrulama kurallarını tanımla
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'hint' => ['required', 'numeric', 'min:0'],
        ]);

        try {
            // Yeni kargo yöntemini oluştur ve kaydet
            $shipping = ShipppingMethod::create($validatedData);

            // ShopOrder modeline kargo yöntemi ekleniyor
            $ShopOrder->shippingMethod = $shipping->id;
            $ShopOrder->save();

            // Başarı durumunda bir mesaj döndür
            $notification = [
                "message" => "Kargo Kodu başarıyla oluşturuldu.",
                "alert-type" => "success"
            ];
        } catch (\Exception $e) {
            // Hata durumunda bir mesaj döndür
            $notification = [
                "message" => "Kargo Kodu oluşturulurken bir hata oluştu: " . $e->getMessage(),
                "alert-type" => "error"
            ];
        }

        // Yönlendirme yaparak mesajı göster
        return redirect()->route("order.index")->with($notification);
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
