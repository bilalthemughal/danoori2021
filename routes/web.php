<?php

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ADController;
use App\Http\Controllers\user\PagesController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\admin\BudgetController;
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
    Route::get('order/cancel/{id}', [OrderController::class, 'cancel'])->name('order.ship');
    Route::get('order/return/{id}', [OrderController::class, 'return'])->name('order.return');
    Route::get('completed-orders', [OrderController::class, 'completed'])->name('order.completed');
    Route::get('cancelled-orders', [OrderController::class, 'cancelled'])->name('order.cancelled');
    Route::get('returned-orders', [OrderController::class, 'returned'])->name('order.returned');
    Route::get('budget/index/{product}', [BudgetController::class, 'index'])->name('budget.show');
    Route::get('budget/create/{product}', [BudgetController::class, 'create'])->name('budget.create');
    Route::post('budget/store/{product}', [BudgetController::class, 'store'])->name('budget.store');
    Route::get('budget/{product}', [BudgetController::class, 'tableData'])->name('budget.table.data');
    Route::get('export/orders', [OrderController::class, 'export'])->name('order.export');
    Route::get('new-order', [OrderController::class, 'newOrder'])->name('new-order');
    Route::post('store-order', [OrderController::class, 'store'])->name('order.store');
    Route::get('ad', [ADController::class, 'create'])->name('ad.create');
    Route::get('ad/edit/{ad_cost}', [ADController::class, 'edit'])->name('ad.edit');
    Route::put('ad/update/{id}', [ADController::class, 'update'])->name('ad.update');
    Route::post('ad', [ADController::class, 'store'])->name('ad.store');
    Route::get('ads', [ADController::class, 'index'])->name('ad.index');
    Route::get('ads/table', [ADController::class, 'dt_ajax_ad_budget_data'])->name('ad.budget.table');
    Route::get('pendingdresses', [OrderController::class, 'pendingDresses'])->name('pendingdresses');
    Route::get('pendingdressestable', [OrderController::class, 'dt_ajax_pending_dresses'])->name('pendingdressestable');
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

Route::get('/pop-up', [PagesController::class, 'popup'])->name('pop-up');

Route::get('/test', function(){
    return DB::table('order_product')->selectRaw('product_id, SUM(quantity)')->groupBy('product_id');
});