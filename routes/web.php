<?php

use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Notifications\OrderReceived;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Notification;
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
use Illuminate\Notifications\Messages\SlackMessage;
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
    Route::get('completed-orders', [OrderController::class, 'completed'])->name('order.completed');
    Route::get('cancelled-orders', [OrderController::class, 'cancelled'])->name('order.cancelled');
    Route::get('budget/index/{product}', [BudgetController::class, 'index'])->name('budget.show');
    Route::get('budget/create/{product}', [BudgetController::class, 'create'])->name('budget.create');
    Route::post('budget/store/{product}', [BudgetController::class, 'store'])->name('budget.store');
    Route::get('budget/{product}', [BudgetController::class, 'tableData'])->name('budget.table.data');
    Route::get('export/orders', [OrderController::class, 'export'])->name('order.export');
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

Route::get('/test', function(){
        return Order::where('status', Order::IS_PENDING)->select(['name','address','phone_number','email','city',DB::raw('"1" as Pieces') , DB::raw('"0.6" as Weight'),'total',DB::raw('"DON-123" as CustomerReferenceNumber'),DB::raw('"No" as SpecialHandling'),DB::raw('"Overnight" as ServiceType'),DB::raw('"clothes" as ProductDetails')])->get();
});