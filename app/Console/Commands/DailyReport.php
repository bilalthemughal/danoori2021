<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Notifications\DailyNotification;

class DailyReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily Sale Report';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $total_sale = Order::where('created_at', '>=', Carbon::today())->where('status', '!=', Order::IS_CANCELLED)->sum('total');
        $ad_cost = DB::table('ad_cost')->where('created_at', '>=',  Carbon::today())->first();
        if ($ad_cost) {
            $ad_cost = $ad_cost->cost;
        } else {
            $ad_cost = 0;
        }

        $products_cost = DB::table('orders')
            ->where('orders.created_at', '>=', Carbon::today())
            ->where('orders.status', '!=', Order::IS_CANCELLED)
            ->leftJoin('order_product', 'orders.id', 'order_product.order_id')
            ->rightJoin('products', 'products.id', 'order_product.product_id')
            ->sum(DB::raw('products.cost * order_product.quantity'));

        $user = User::first();
        $user->setSlackChannel('daily')
            ->notify(new DailyNotification($total_sale, $ad_cost, $products_cost));
        return 0;
    }
}
