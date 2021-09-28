<?php

namespace App\Http\Controllers\user;

use App\Cart;
use Carbon\Carbon;
// use Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductView;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

class PagesController extends Controller
{
    public function product($category_slug, $product_slug)
    {
        $product = Product::with('images')->where('slug', $product_slug)->firstOrFail();

        $sameProducts = Product::query()
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->limit(5)
            ->with('category:id,slug,name')
            ->get();

        Session::flash('view', true);
        return view('frontend.product', compact('product', 'sameProducts'));
    }

    public function cart()
    {
        return view('frontend.cart');
    }

    public function checkout()
    {
        return view('frontend.checkout');
    }

    public function dashboard()
    {
        $orders = Auth::user()->orders ?? [];
        return view('user.dashboard', compact('orders'));
    }

    public function category($category_slug)
    {
        $category = Category::where('slug', $category_slug)->firstOrFail();
        return view('frontend.category', compact('category'));
    }

    public function thankyou()
    {
        $order_id = Request::input('order_id');
        return view('frontend.thank-you', compact('order_id'));
    }

    public function popup()
    {
        $order = DB::table('order_product')
            ->join('products', 'products.id', '=', 'order_product.product_id')
            ->join('orders', 'orders.id', '=', 'order_product.order_id')
            ->join('categories', 'categories.id', '=' , 'products.category_id')
            ->inRandomOrder()
            ->limit(1)
            ->whereDate('order_product.created_at', '>=', Carbon::now()->subDays(2))
            ->where('orders.status', '!=', Order::IS_CANCELLED)
            ->first(['order_product.created_at', 'small_photo_path', 'products.name', 'city', 'categories.slug as category_slug', 'products.slug as product_slug']);

        return response()->json(
            [
                'city' => $order->city,
                'product_name' => $order->name,
                'time' => Carbon::parse($order->created_at)->diffForHumans(),
                'photo' => $order->small_photo_path,
                'category_slug' => $order->category_slug,
                'product_slug' => $order->product_slug
            ]
        );
    }
}
