<?php

namespace App\Http\Controllers;


use App\Models\Carousel;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    function index(){
        $carousels = Carousel::active()
            ->inRandomOrder()
            ->limit(4)
            ->get();

        $categories = Category::query()
            ->inRandomOrder()
            ->limit(3)
            ->get();

        $products = Product::query()
            ->inRandomOrder()
            ->limit(12)
            ->with('category:id,slug')
            ->get();



        return view('welcome', compact('carousels', 'categories','products'));
    }
}
