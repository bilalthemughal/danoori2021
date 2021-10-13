<?php

namespace App\Http\Controllers\Admin;

use App\Models\AD;
use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $newOrdersCount = Order::where('status', Order::IS_PENDING)->count();

        $today_ad_cost = AD::where('created_at', '>=', Carbon::today())->first();
        if ($today_ad_cost) {
            $today_ad_cost = $today_ad_cost->cost;
        } else {
            $today_ad_cost = 'N/A';
        }
        
        $yesterday_total_sale = Order::whereDate('created_at', Carbon::yesterday())
        ->where('status', '!=', Order::IS_CANCELLED)
        ->sum('total');

        $yesterday_ad_cost = DB::table('ad_cost')
        ->whereDate('created_at',   Carbon::yesterday())
        ->first();

        if ($yesterday_ad_cost) {
            $yesterady_ad_cost = $yesterday_ad_cost->cost;
        } else {
            $yesterday_ad_cost = 0;
        }

        $yesterday_products_cost = DB::table('orders')
            ->whereDate('orders.created_at', Carbon::yesterday())
            ->where('orders.status', '!=', Order::IS_CANCELLED)
            ->leftJoin('order_product', 'orders.id', 'order_product.order_id')
            ->leftJoin('products', 'products.id', 'order_product.product_id')
            ->sum('products.cost');

        $yesterday_profit = $yesterday_total_sale - ($yesterday_ad_cost + $yesterday_products_cost);
        
        return view('admin.pages.dashboard', compact('newOrdersCount', 'today_ad_cost', 'yesterday_profit'));
    }
}
