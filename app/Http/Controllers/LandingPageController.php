<?php

namespace App\Http\Controllers;


use App\Models\Carousel;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    function index(){
        $carousels = Carousel::active()
            ->inRandomOrder()
            ->limit(4)
            ->get();
        return view('welcome', compact('carousels'));
    }
}
