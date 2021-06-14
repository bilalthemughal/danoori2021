<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){
        return view('admin.pages.order.index');
    }

    public function show(Order $order){
        $products = $order->products->load('category');
        
        
        return view('admin.pages.order.show', compact('order', 'products'));
    }

    public function dt_ajax_orders_data()
    {
        $query = Order::select(['id', 'name', 'email', 'sub_total', 'total', 'phone_number', 'coupon', 'address', 'city', 'total_products']);
        return Datatables::of($query)
            ->addColumn('action', function ($orders) {
                return
                    '<a class="btn btn-success btn-xs" href=' . route('admin.order.show', $orders->id) . '><i class="fa fa-eye"></i></a>';
            })
            ->make();
    }
}
