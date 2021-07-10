<?php

namespace App\Http\Controllers\user;


use App\Cart;
use App\Models\User;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\user\CheckoutRequest;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(CheckoutRequest $request)
    {

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        if (count($cart->items) === 0) {
            Session::flash('message', 'Your cart is empty. Add something in your cart to checkout.');
            return back();
        }

        $user_id = null;

        if ($request['password']) {
            $this->validate($request, [
                'email' => 'unique:users,email'
            ], [
                'email.unique' => 'This email is already taken. If it belongs to you 
                <a href="' . route('login') . '">click here to sign in.</a>'
            ]);
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password'])
            ]);
            $user_id = $user->id;
        }

        if (Auth::id()) {
            $user_id = Auth::id();
        }

        $params = $request->validated();
        $params['order_id'] = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 11);

        $params['user_id'] = $user_id;
        $params['sub_total'] = $cart->totalPrice;
        $params['total'] = $cart->discountedPrice;
        $params['coupon'] = $cart->coupon_text;
        $params['total_products'] = $cart->totalQty;
        // return $params;

        $products = $cart->items;

        $order = Order::create($params);

        foreach ($products as $product) {
            $order->products()->attach(
                $product['id'],
                [
                    'quantity' => $product['qty'],
                    'price' => $product['total_price'],
                ]
            );
        }

        $request->session()->forget('cart');
        if (isset($user)) {
            Auth::login($user);
        }

        return redirect()->route('thank-you',  ['order_id'=>$order->order_id]);
    }
}
