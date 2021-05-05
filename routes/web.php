<?php

use App\Http\Controllers\admin\CarouselController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware'=> 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::view('/dashboard', 'admin.pages.dashboard')->name('dashboard');
    Route::resource('/carousel', CarouselController::class);
    Route::get('/carousel/table/data', [CarouselController::class, 'dt_ajax_carousels_data'])->name('carousel.table.data');
    Route::resource('/category', CategoryController::class);
});

Route::view('product', 'frontend.product');

require __DIR__.'/auth.php';
