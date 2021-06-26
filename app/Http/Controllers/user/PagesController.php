<?php

namespace App\Http\Controllers\user;

use App\Cart;
use App\Models\Order;
// use Request;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\ProductView;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    public function product($category_slug, $product_slug)
    {
        $product = Product::where('slug', $product_slug)->firstOrFail();

        ProductView::createViewLog($product->id);

        return view('frontend.product', compact('product'));
    }

    public function cart()
    {
        return view('frontend.cart');
    }

    public function checkout()
    {
        return view('frontend.checkout');
    }

    public function dashboard(){
        $orders = Auth::user()->orders ?? [];
        return view('user.dashboard', compact('orders'));
    }
}
