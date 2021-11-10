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
            $today_ad_cost = 0;
        }
       
        // YESTERDAY STAT
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
            ->rightJoin('products', 'products.id', 'order_product.product_id')
            ->sum(DB::raw('products.cost * order_product.quantity'));
        
        $yesterday_profit = $yesterday_total_sale - ($yesterday_ad_cost + $yesterday_products_cost);

        // YESTERDAY STATS END

        //MONTHLY STATS
        $monthly_total_sale = Order::whereMonth('created_at', Carbon::now()->month)
        ->where('status', '!=', Order::IS_CANCELLED)
        ->sum('total');

        $monthly_ad_cost = DB::table('ad_cost')
        ->whereMonth('created_at',   Carbon::now()->month)
        ->sum('cost');

        if ($monthly_ad_cost) {
            $monthly_ad_cost = $monthly_ad_cost->cost;
        } else {
            $monthly_ad_cost = 0;
        }

        $monthly_product_cost = DB::table('orders')
            ->whereMonth('orders.created_at', Carbon::now()->month)
            ->where('orders.status', '!=', Order::IS_CANCELLED)
            ->leftJoin('order_product', 'orders.id', 'order_product.order_id')
            ->rightJoin('products', 'products.id', 'order_product.product_id')
            ->sum(DB::raw('products.cost * order_product.quantity'));
        
        $monthly_profit = $monthly_total_sale - ($monthly_ad_cost + $monthly_product_cost);
        //MONTHLY STATS END

        $todays_dresses_sold = DB::table('orders')
            ->where('orders.created_at', '>=', Carbon::today())
            ->where('orders.status', '!=', Order::IS_CANCELLED)
            ->leftJoin('order_product', 'orders.id', 'order_product.order_id')
            ->sum('order_product.quantity');
        
        $pending_dresses = DB::table('orders')
            ->where('orders.status', Order::IS_PENDING)
            ->join('order_product', 'orders.id', 'order_product.order_id')
            ->sum('order_product.quantity');

            if($yesterday_ad_cost){
                $yesterday_ad_cost = $yesterday_ad_cost->cost;
            }
            else {
                $yesterday_ad_cost = 0;
            }
            
        
        return view('admin.pages.dashboard', compact(
            'newOrdersCount', 
            'today_ad_cost', 
            'yesterday_profit', 
            'todays_dresses_sold',
            'yesterday_total_sale',
            'yesterday_ad_cost',
            'yesterday_products_cost',
            'pending_dresses',
            'monthly_profit',
            'monthly_product_cost',
            'monthly_ad_cost',
            'monthly_total_sale',

        ));
    }
}
