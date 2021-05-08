<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function product($category_slug,$product_slug){
        $product = Product::where('slug',$product_slug)->firstOrFail();
        return view('frontend.product', compact('product'));
    }
}
