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
use App\Http\Controllers\User\ReturnOrderController;

use Illuminate\Support\Facades\Route;

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

Route::get("", [HomeController::class, "index"])->name("user.index");
Route::get("about-us", [HomeController::class, "AboutUs"])->name("about-us");

Route::redirect('/whatsapp', 'https://wa.me/905377898108?')->name("whatsapp");

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

// Admin Messages Routes
Route::prefix('admin/messages')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('admin.messages.index');
    Route::get('/{message}', [ContactController::class, 'show'])->name('admin.messages.show');
    Route::delete('/{message}', [ContactController::class, 'destroy'])->name('admin.messages.destroy');
});

// Shop Routes
Route::controller(ShopController::class)->group(function () {
    Route::get('/products', 'index')->name('shop.index');
    Route::get('product/{product:slug}', 'show')->name('shop.show');
    Route::get('/products/searchNavbar', 'search')->name('shop.search');
    Route::get('/products/search', 'sliderSearch')->name('shop.sliderSearch');
    Route::get("/kategori/{category:slug}", 'showCategory')->name('shop.showCategory');
    Route::get("/firmalar/{brand:slug}", 'showBrand')->name('shop.showBrand');
});



// Authenticated User Routes
Route::middleware("auth")->group(function () {
    Route::get("/wishlist", [FavoriteController::class, "favorites"])->name("user.favorites");
    Route::delete("/favorites/{product}", [FavoriteController::class, "destroy"])->name("user.favorite.destroy");
    Route::post("/favorites/{product}", [FavoriteController::class, "store"])->name("user.favorite.store");
    Route::get("/my-account", [UserAccountController::class, "index"])->name("user.account.index");

    Route::get('/user/checkout', [paymentController::class, 'index'])->name('user.payment.index');
    Route::post('/checkout/address', [paymentController::class, 'storeAddress'])->name('user.checkout.store');
    Route::get('/checkout/payment', [paymentController::class, 'paymentForm'])->name('user.payment.checkout');
    Route::post('/checkout/payment/process', [paymentController::class, 'processPayment'])->name('user.payment.process');
    Route::post('/checkout/payment/callback', [paymentController::class, 'paytrCallback'])->name('user.payment.callback');
    Route::get('/checkout/success', [paymentController::class, 'success'])->name('user.payment.success');
    Route::get('/checkout/failure', [paymentController::class, 'failure'])->name('user.payment.failure');
    // Route::get('/deneme', [paymentController::class, 'order']);

    Route::get("/user/adresses", [AdressController::class, "index"])->name("user.address.index");
    Route::get("/user/addresses/{address}/edit", [AdressController::class, "edit"])->name("user.address.edit");
    Route::put("/user/addresses/{address}", [AdressController::class, "update"])->name("user.address.update");

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Cart Routes
Route::prefix("cart")->controller(CartController::class)->group(function () {
    Route::get('/', 'index')->name("user.cart.index");
    Route::post('/add-to-cart/{product}', 'addToCart')->name('cart.add');
    Route::delete("/delete-from-cart/{product:id}", 'deleteFromCart')->name("delete.item.cart");
    Route::post('/empty', 'emptyCart')->name('cart.empty');
});

// User Order Routes
Route::prefix("user/orders")->controller(UserOrderController::class)->group(function () {
    Route::get('/', 'index')->name("user.order.index");
    Route::get('/{shopOrder}', 'show')->name("user.order.detail");
});

// Admin Product Routes
Route::prefix('admin/products')->group(function () {
    Route::get("create", [AdminProductController::class, "create"])->name("admin.product.create");
    Route::get("/", [AdminProductController::class, "index"])->name("admin.product.index");
    Route::post("create", [AdminProductController::class, "store"])->name("admin.product.store");
    Route::delete("destroy/{id}", [AdminProductController::class, "destroy"])->name("admin.product.delete");
    Route::get("edit/{id}", [AdminProductController::class, "edit"])->name("admin.product.edit");
    Route::patch("update/{id}", [AdminProductController::class, "update"])->name("admin.product.update");
});

// Admin Routes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('banners', AdminBannerController::class);
    Route::resource('brands', AdminBrandController::class);
    Route::resource('slider', AdminSliderController::class);
    Route::resource('order', AdminOrderController::class);
    Route::prefix("orders")->group(function () {
        Route::get('{ShopOrder}/details', [AdminOrderController::class, 'details'])->name('admin.orders.details');
        Route::get('pending', [AdminOrderController::class, 'pendingOrder'])->name('admin.orders.pending');
        Route::get('shipped', [AdminOrderController::class, 'shippedOrder'])->name('admin.orders.shipped');
        Route::get('cancelled', [AdminOrderController::class, 'cancelledOrder'])->name('admin.orders.cancelled');
        Route::get('processing', [AdminOrderController::class, 'processingOrder'])->name('admin.orders.processing');
        Route::put('{ShopOrder}/update-status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
        Route::get('shipment/{ShopOrder}', [AdminOrderController::class, 'ShipmentCode'])->name('admin.orders.ShipmentCode');
        Route::post('shipment/{ShopOrder}/create', [AdminOrderController::class, 'ShipmentCreate'])->name('admin.orders.createShipmentCode');
    });
});


Route::middleware("auth")->group(function () {
    Route::get('/iade-talebi/olustur/{shopOrder}', [ReturnOrderController::class, 'create'])->name('orders.cancel');
    Route::post('/iade-talebi/{shopOrder}', [ReturnOrderController::class, 'store'])->name('returns.store');
});



require __DIR__ . '/auth.php';
