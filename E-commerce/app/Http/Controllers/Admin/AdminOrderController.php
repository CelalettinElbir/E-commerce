<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShopOrder;
use Illuminate\Http\Request;
use App\Models\ShippingMethod;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $shopOrders = ShopOrder::with("orderDetails", "user", "orderDetails.product", "address")->get();
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
            'status' => 'required|in:beklemede,işleniyor,tamamlandı,gönderildi,iptal edildi',
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
        $request->validate([
            'name' => 'required|string|max:255',
            "tracking_number" => "required",
            'price' => 'required',
            'hint' => 'nullable',
        ]);


        // Yeni kargo yöntemini oluştur ve kaydet
        $shipping = ShippingMethod::create($request->all());

        // ShopOrder modeline kargo yöntemi ekleniyor

        $ShopOrder->shipping_method_id = $shipping->id;
        $ShopOrder->status = "gönderildi";
        $ShopOrder->save();

        // Başarı durumunda bir mesaj döndür
        $notification = [
            "message" => "Kargo Kodu başarıyla oluşturuldu.",
            "alert-type" => "success"
        ];

        // Yönlendirme yaparak mesajı göster
        return redirect()->route("order.index")->with($notification);
    }
}
