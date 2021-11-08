<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\PendingOrderExport;
use App\Notifications\OfflineOrder;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Notification;
use Yajra\DataTables\Contracts\DataTable;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.pages.order.index', ['status' => Order::IS_PENDING]);
    }

    public function edit($id)
    {
        $products = Product::all();
        $order = Order::where('id', $id)->first();
        return view('admin.pages.order.edit', compact('order', 'products'));
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
        $search_query = $request->search['value'];
        $query = Order::query()
            ->select(['id', 'order_id', 'name', 'sub_total', 'source', 'total', 'created_at', 'phone_number'])
            ->with('products')
            ->where('status', $request['id']);


        return Datatables::of($query)
            ->filter(function ($query) use ($search_query) {
                if ($search_query) {
                    $query->where('name', 'like', "%" . $search_query . "%");
                    $query->orWhere('phone_number', 'like', "%" . $search_query . "%");
                    $query->orWhere('order_id', 'like', "%" . $search_query . "%");
                }
            })

            ->addColumn('action', function ($orders) {
                if ($orders->source == 0) {
                    return '<a class="btn btn-success btn-xs" href=' . route('admin.order.show', $orders->id) . '>' . $orders->name . '</a>';
                } else {
                    return '<a class="btn btn-secondary btn-xs" href=' . route('admin.order.show', $orders->id) . '>' . $orders->name . '</a>';
                }
            })
            ->addColumn('time', function ($orders) {
                return $orders->created_at->diffForHumans();
            })
            ->addColumn('products', function ($orders) {
                $products = $orders->products;
                $product_name = '<div>';
                foreach ($products as $product) {
                    $product_name .= "<img src='https://danoori.s3.ap-south-1.amazonaws.com/$product->small_photo_path' width='50px' height='50px'>";
                }
                $product_name  .= '</div>';
                return $product_name;
            })
            ->addColumn('edit', function ($orders) {
                return '<a class="btn btn-secondary btn-xs" href=' . route('admin.order.edit', $orders->id) . '> <i class="fa fa-edit"></i> </a>';
            })
            ->rawColumns(['action', 'time', 'products', 'edit'])
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
        // dd($request->all());
        $params['name'] = $request->name;
        $params['phone_number'] = $request->phone;
        $params['city'] = $request->city;
        $params['address'] = $request->address;
        $params['total'] = $request->price;
        $params['sub_total'] = $request->price;
        $params['total_products'] = 1;
        $params['order_note'] = $request->order_note;
        $params['order_id'] = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 11);
        $params['source'] = 0;
        // $products_id = $request['products_id'];

        if ($request->email) {
            $params['email'] = $request->email;
        } else {
            $email = str_replace(' ', '', $request['name']);
            $email = $email . substr($params['phone_number'], -3) . '@gmail.com';
            $params['email'] = $email;
        }
        $order = Order::create($params);

        for ($i = 0; $i < count($request['product_id']); $i++) {
            $order->products()->attach(
                $request->product_id[$i],
                [
                    'quantity' => $request->product_quantity[$i],
                    'price' => $request->product_price[$i] * $request->product_quantity[$i],
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }

        if (app()->isProduction()) {
            $user = User::first();
            $products = $order->products;
            $user->setSlackChannel('offline')
                ->notify(new OfflineOrder($order, $products));
        }

        return redirect()->back();
    }

    public function update(Request $request, Order $order)
    {
        // return $order;
        $order->update($request->all());
        return redirect()->route('admin.order.index');
    }

    public function pendingDresses()
    {
        return view('admin.pages.order.pendingdresses');
    }

    public function dt_ajax_pending_dresses()
    {
        $query = DB::table('orders')
            ->where('orders.status', Order::IS_PENDING)
            ->leftJoin('order_product', 'orders.id', 'order_product.order_id')
            ->rightJoin('products', 'products.id', 'order_product.product_id')
            ->select('products.name', 'order_product.quantity', 'products.small_photo_path');

        return DataTables::of($query)
            ->addColumn('photo', function ($products) {
                $product_name = '<div>';
                    $product_name .= "<img src='https://danoori.s3.ap-south-1.amazonaws.com/$products->small_photo_path' width='50px' height='50px'>";
                $product_name  .= '</div>';
                return $product_name;
            })
            ->rawColumns(['photo'])
            ->make();
    }
}
