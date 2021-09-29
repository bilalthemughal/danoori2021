<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Exports\PendingOrderExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
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
            ->select(['id', 'order_id', 'name', 'sub_total', 'total', 'coupon', 'created_at'])
            ->where('status', $request['id']);


        return Datatables::of($query)
            ->addColumn('action', function ($orders) {
                return
                    '<a class="btn btn-secondary btn-xs" href=' . route('admin.order.show', $orders->id) . '>' . $orders->name . '</a>';
            })
            ->addColumn('time', function ($orders) {
                return $orders->created_at->diffForHumans();
            })
            ->rawColumns(['action', 'time'])
            ->make();
    }

    public function ship($id)
    {
        $order = Order::where('id', $id)->first();

        $order->status = Order::IS_SHIPPED;

        $order->save();

        $products = $order->products;
        $products->each(function ($product) {
            $product->decrement('stock', $product->pivot->quantity);
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

    public function export()
    {
        return Excel::download(new PendingOrderExport, 'pendingorders.xlsx');
    }

    public function newOrder()
    {
        $products = Product::all();
        return view('admin.pages.order.create', compact('products'));
    }

    public function store(Request $request)
    {
        $params['name'] = $request->name;
        $params['phone_number'] = $request->phone;
        $params['city'] = $request->city;
        $params['address'] = $request->address;
        $params['total'] = $request->price;
        $params['sub_total'] = $request->price;
        $params['total_products'] = 1;
        $params['order_id'] = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 11);

        if ($request->email) {
            $params['email'] = $request->email;
        } else {
            $email = str_replace(' ', '', $request['name']);
            $email = $email . substr($params['phone_number'], -3) . '@gmail.com';
            $params['email'] = $email;
        }
        $order = Order::create($params);

        $order->products()->attach(
            $request->product_id,
            [
                'quantity' => 1,
                'price' => $params['total'],
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        return redirect()->back();
    }
}
