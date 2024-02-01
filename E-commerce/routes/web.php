<?php

use App\Http\Controllers\Admin\AdminBrandController;
use App\Http\Controllers\admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');







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
});



require __DIR__ . '/auth.php';
