<?php

namespace App\Http\Controllers\user;

use App\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    public function product($category_slug, $product_slug)
    {
        $product = Product::where('slug', $product_slug)->firstOrFail();
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
}
