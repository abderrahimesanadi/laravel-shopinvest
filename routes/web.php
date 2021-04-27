<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// admin product
Route::resource('admin/products', AdminProductController::class)->middleware(['auth']);
Route::post('/mark/save', [AdminProductController::class, 'saveMark'])->middleware(['auth'])->name('mark.save');

// front + cart
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('cart/loadCart', [ProductController::class, 'loadCart'])->name('load.cart');
Route::post('product/addCart', [ProductController::class, 'addCart'])->name('add.cart');
Route::post('product/removeCart', [ProductController::class, 'removeCart'])->name('remove.cart');


require __DIR__.'/auth.php';
