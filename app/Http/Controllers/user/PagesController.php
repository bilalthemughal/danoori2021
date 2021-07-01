<?php

namespace App\Http\Controllers\user;

use App\Cart;
use App\Models\Order;
// use Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductView;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    public function product($category_slug, $product_slug)
    {
        $product = Product::with('images')->where('slug', $product_slug)->firstOrFail();

        ProductView::createViewLog($product->id);

        $sameProducts = Product::query()
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->limit(5)
            ->with('category:id,slug,name')
            ->get();



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
}
