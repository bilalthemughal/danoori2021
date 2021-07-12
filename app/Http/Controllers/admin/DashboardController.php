<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $newOrdersCount = Order::where('status', Order::IS_PENDING)->count();
        return view('admin.pages.dashboard', compact('newOrdersCount'));
    }
}
