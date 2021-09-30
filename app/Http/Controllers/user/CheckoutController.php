<?php

namespace App\Http\Controllers\user;


use App\Cart;
use App\Models\User;
use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Notifications\OrderReceived;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\user\CheckoutRequest;
use Illuminate\Support\Facades\Notification;

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

        if (Auth::id()) {
            $user_id = Auth::id();
        }

        $params = $request->validated();

        $email = str_replace(' ', '', $request['name']);
        $email = $email . substr($request['phone_number'], -3) . '@gmail.com';
        $params['email'] = $email;
        
        $params['order_id'] = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 11);
        $params['user_id'] = $user_id;
        $params['sub_total'] = $cart->totalPrice;
        $params['total'] = $cart->discountedPrice;
        $params['coupon'] = $cart->coupon_text;
        $params['total_products'] = $cart->totalQty;

        $products = $cart->items;

        $order = Order::create($params);

        foreach ($products as $product) {
            $order->products()->attach(
                $product['id'],
                [
                    'quantity' => $product['qty'],
                    'price' => $product['total_price'],
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }

        $request->session()->forget('cart');
        if (isset($user)) {
            Auth::login($user);
        }

        if (app()->isProduction()) {
            $user = User::first();
            Notification::send($user, new OrderReceived($order, $products));
        }

        $total = round($params['total']/150,2); 
        Session::flash('total', $total);
        return redirect()->route('thank-you',  ['order_id' => $order->order_id]);
    }
}
