<?php

use App\Http\Controllers\Admin\AdminBrandController;
use App\Http\Controllers\admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\FavoriteController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ShopController;
use App\Http\Controllers\User\UserAccountController;
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

// Route::get('/', function () {
//     return view('user.index');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get("", [HomeController::class, "index"])->name("user.index");

//shop page

Route::get("/products", [ShopController::class, "index"])->name("shop.index");
Route::get("product/{product:slug}", [ShopController::class, "show"])->name("shop.show");


Route::middleware("auth")->group(function () {
    Route::get("/wishlist", [FavoriteController::class, "favorites"])->name("user.favorites");
    Route::delete("/favorites/{product}", [FavoriteController::class, "destroy"])->name("user.favorite.destroy");
    Route::Post("/favorites/{product}", [FavoriteController::class, "store"])->name("user.favorite.store");


    Route::post("/my-account", [UserAccountController::class, "index"])->name("user.account.index");
});



Route::prefix('admin/products')->group(function () {
    // Route::resource('products', AdminProductController::class);
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
