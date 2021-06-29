<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    //
    public function view($id){
        return view('admin.pages.product.images', compact('id'));
    }
}
