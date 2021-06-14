<?php

namespace App\Http\Controllers\admin;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::get();
        return view('admin.pages.coupon.index', compact('coupons'));
    }

    public function create()
    {
        return view('admin.pages.coupon.create');
    }

    public function store(Request $request)
    {
        $params = $request->validate([
            'text' => 'required|unique:coupons',
            'percent' => 'required|numeric|min:1|max:50'
        ]);

        Coupon::create($params);
        return redirect()->route('admin.coupon.index');
    }

    public function edit(Coupon $coupon)
    {
        return view('admin.pages.coupon.edit', compact('coupon'));
    }

    public function update(Request $request, Coupon $coupon)
    {
        $params = $request->validate([
            'text' => [
                'required',
                Rule::unique('coupons')->ignore($coupon),
            ],
            'percent' => 'required|numeric|min:1|max:50',
        ]);

        $coupon->update($params);

        return redirect()->route('admin.coupon.index');
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('admin.coupon.index');
    }
}
