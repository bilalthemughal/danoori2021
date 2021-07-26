<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.pages.order.index', ['status' => Order::IS_PENDING]);
    }

    public function completed()
    {
        return view('admin.pages.order.index', ['status' => Order::IS_SHIPPED]);
    }

    public function cancelled()
    {
        return view('admin.pages.order.index', ['status' => Order::IS_CANCELLED]);
    }

    public function show(Order $order)
    {
        $products = $order->products->load('category');

        return view('admin.pages.order.show', compact('order', 'products'));
    }

    public function dt_ajax_orders_data(Request $request)
    {
        $query = Order::query()
            ->select(['id', 'order_id', 'name', 'sub_total', 'total', 'phone_number', 'coupon', 'total_products'])
            ->where('status', $request['id']);
        return Datatables::of($query)
            ->addColumn('action', function ($orders) {
                return
                    '<a class="btn btn-success btn-xs" href=' . route('admin.order.show', $orders->id) . '><i class="fa fa-eye"></i></a>';
            })
            ->make();
    }

    public function ship($id)
    {
        $order = Order::where('id', $id)->first();

        $order->status = Order::IS_SHIPPED;
        
        $order->save();

        $products = $order->products;
        $products->each(function ($product){
            $product->decrement('stock',$product->pivot->quantity);
        });

        return response()->json(['success' => 'Changed status successfully']);
    }


    public function cancel($id)
    {
        $order = Order::where('id', $id)->first();

        $order->status = Order::IS_CANCELLED;
        $order->save();

        return response()->json(['success' => 'Changed status successfully']);
    }
}
