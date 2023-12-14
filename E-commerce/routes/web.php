<?php

use App\Http\Controllers\admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminProductController;
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





// Route::prefix("admin/product")->resource("", AdminProductController::class);

// Route::get("admin/product", [AdminProductController::class,"index"])->name("admin.product");


Route::prefix('admin/products')->group(function () {
    // Route::resource('products', AdminProductController::class);
    Route::get("create", [AdminProductController::class, "create"])->name("admin.product.create");
    Route::get("", [AdminProductController::class, "index"])->name("admin.product.index");
    Route::post("create", [AdminProductController::class, "store"])->name("admin.product.store");
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('admin')->group(function () {
    Route::resource('categories', AdminCategoryController::class);
});

require __DIR__ . '/auth.php';
