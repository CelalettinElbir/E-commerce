<?php

use App\Http\Controllers\Admin\AdminBannerController;
use App\Http\Controllers\Admin\AdminBrandController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\AdressController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\FavoriteController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\paymentController;
use App\Http\Controllers\User\ShopController;
use App\Http\Controllers\User\UserAccountController;
use App\Http\Controllers\User\UserOrderController;
use App\Mail\OrderCreated;
use App\Models\ShopOrder;
use App\Models\Category;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('user.index');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get("", [HomeController::class, "index"])->name("user.index");
Route::get("about-us", [HomeController::class, "AboutUs"])->name("about-us");

// Route::get('/whatsapp', function () {
//     // İşletme WhatsApp numaranızı buraya yazın
//     $phone = '905377898108';
//     // WhatsApp web linkini oluşturun
//     $url = 'https://wa.me/' . $phone;

//     // Kullanıcıyı WhatsApp'a yönlendirin
//     return redirect()->away($url);
// })->name('whatsapp');

Route::redirect('/whatsapp', 'https://wa.me/905377898108?')->name("whatsapp");
//shop page


Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

Route::get('/admin/messages', [ContactController::class, 'index'])->name('admin.messages.index');
Route::get('/admin/messages/{message}', [ContactController::class, 'show'])->name('admin.messages.show');
Route::delete('/admin/messages/{message}', [ContactController::class, 'destroy'])->name('admin.messages.destroy');



Route::get("/products", [ShopController::class, "index"])->name("shop.index");
Route::get("product/{product:slug}", [ShopController::class, "show"])->name("shop.show");
Route::get('/products/searchNavbar', [ShopController::class, "search"])->name('shop.search');
Route::get('/products/search', [ShopController::class, "sliderSearch"])->name('shop.sliderSearch');
Route::get("/{category:slug}", [ShopController::class, 'showCategory'])->name('shop.showCategory');





Route::middleware("auth")->group(function () {
    Route::get("/wishlist", [FavoriteController::class, "favorites"])->name("user.favorites");
    Route::delete("/favorites/{product}", [FavoriteController::class, "destroy"])->name("user.favorite.destroy");
    Route::Post("/favorites/{product}", [FavoriteController::class, "store"])->name("user.favorite.store");
    Route::get("/my-account", [UserAccountController::class, "index"])->name("user.account.index");

    // route::get("/checkout", "checkout")->name("checkout");

    // Route::get("/user/checkout", [paymentController::class, "index"])->name("user.payment.index");


    // Route::post('/checkout/payment', [paymentController::class, 'handleFakePayment'])->name('user.payment');
    // Route::get('/checkout/success', [paymentController::class, 'success'])->name('checkout.success');


    Route::get('/user/checkout', [paymentController::class, 'index'])->name('user.payment.index');
    Route::post('/checkout/address', [paymentController::class, 'storeAddress'])->name('user.checkout.store');
    Route::get('/checkout/payment', [paymentController::class, 'paymentForm'])->name('user.payment.checkout');
    Route::post('/checkout/payment/process', [paymentController::class, 'processPayment'])->name('user.payment.process');
    Route::post('/checkout/payment/callback', [paymentController::class, 'paytrCallback'])->name('user.payment.callback');
    Route::get('/checkout/success', [paymentController::class, 'success'])->name('user.payment.success');
    Route::get('/checkout/failure', [paymentController::class, 'failure'])->name('user.payment.failure');
    Route::get('/deneme', [paymentController::class, 'order']);


    Route::get("/user/adresses", [AdressController::class, "index"])->name("user.address.index");
    Route::get("/user/addresses/{address}/edit", [AdressController::class, "edit"])->name("user.address.edit");
    Route::put("/user/addresses/{address}", [AdressController::class, "update"])->name("user.address.update");
});


Route::controller(CartController::class)->prefix("cart")->group(function () {
    Route::get('/', 'index')->name("user.cart.index");
    Route::post('/add-to-cart/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::delete("/delete-from-cart/{product:id}", [CartController::class, 'deleteFromCart'])->name("delete.item.cart");
    Route::post('/empty', [CartController::class, 'emptyCart'])->name('cart.empty');
});

Route::controller(UserOrderController::class)->prefix("user/orders/")->group(function () {
    Route::get('', 'index')->name("user.order.index");
    Route::get('/{shopOrder}', "show")->name("user.order.detail");
});



Route::prefix('admin/products')->group(function () {
    Route::get("create", [AdminProductController::class, "create"])->name("admin.product.create");
    Route::get("", [AdminProductController::class, "index"])->name("admin.product.index");
    Route::post("create", [AdminProductController::class, "store"])->name("admin.product.store");
    Route::delete("destroy/{id}", [AdminProductController::class, "destroy"])->name("admin.product.delete");
    Route::get("edit/{id}", [AdminProductController::class, "edit"])->name("admin.product.edit");
    Route::patch("update/{id}", [AdminProductController::class, "update"])->name("admin.product.update");
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::prefix('admin')->group(function () {
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('banners', AdminBannerController::class);
    Route::resource('brands', AdminBrandController::class);
    route::resource('slider', AdminSliderController::class);
    route::resource('order', AdminOrderController::class);
    route::prefix("orders/")->group(function () {
        Route::get('{ShopOrder}/details', [AdminOrderController::class, 'details'])->name('admin.orders.details');
        Route::get('pending', [AdminOrderController::class, 'pendingOrder'])->name('admin.orders.pending');
        Route::get('shipped', [AdminOrderController::class, 'shippedOrder'])->name('admin.orders.shipped');
        Route::get('cancelled', [AdminOrderController::class, 'cancelledOrder'])->name('admin.orders.cancelled');
        Route::get('processing', [AdminOrderController::class, 'processingOrder'])->name('admin.orders.processing');
        Route::put('{ShopOrder}/update-status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
        Route::get('shipment/{ShopOrder}', [AdminOrderController::class, 'ShipmentCode'])->name('admin.orders.ShipmentCode');
        Route::post('/shipment/{ShopOrder}/create', [AdminOrderController::class, 'ShipmentCreate'])->name('admin.orders.createShipmentCode');
    });
});



require __DIR__ . '/auth.php';
