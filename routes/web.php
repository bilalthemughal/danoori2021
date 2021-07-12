<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\PagesController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\admin\CouponController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\user\CheckoutController;
use App\Http\Controllers\admin\CarouselController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProductImageController;

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

Route::get('/', [LandingPageController::class, 'index']);

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('carousel', CarouselController::class);
    Route::get('carousel/table/data', [CarouselController::class, 'dt_ajax_carousels_data'])->name('carousel.table.data');
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::get('product/images/{id}', [ProductImageController::class, 'view'])->name('product.images');
    Route::resource('coupon', CouponController::class);
    Route::resource('order', OrderController::class);
    Route::get('product/table/data', [ProductController::class, 'dt_ajax_products_data'])->name('product.table.data');
    Route::get('order/table/data', [OrderController::class, 'dt_ajax_orders_data'])->name('order.table.data');
    Route::get('order/ship/{id}', [OrderController::class, 'ship'])->name('order.ship');
    Route::get('completed-orders', [OrderController::class, 'completed'])->name('order.completed');
    Route::get('cancelled-orders', [OrderController::class, 'cancelled'])->name('order.cancelled');
});


Route::get('cart', [PagesController::class, 'cart'])->name('cart');
Route::get('checkout', [PagesController::class, 'checkout'])->name('checkout');
Route::get('category/{category_slug}', [PagesController::class, 'category'])->name('category.page');
Route::post('checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::get('thank-you', [PagesController::class, 'thankyou'])->name('thank-you');


Route::middleware('auth')->group(function () {
    Route::get('dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
});
require __DIR__ . '/auth.php';

Route::get('/{category_slug}/{product_slug}', [PagesController::class, 'product'])->name('category.product');