<?php

namespace App\Http\Controllers\user;


use App\Cart;
use App\Models\User;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\user\CheckoutRequest;

class CheckoutController extends Controller
{
    public function checkout(CheckoutRequest $request)
    {

        $params = $request->validated();


        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        if ($oldCart) {
            $this->products = $cart->items;
        }

        // $this->totalItems = $cart->totalQty;
        $this->totalPrice = $cart->totalPrice;
        $params['sub_total'] = $cart->totalPrice;
        $params['total'] = $cart->discountedPrice;
        $params['coupon'] = $cart->coupon_text;
        $params['total_products'] = $cart->totalQty;
        // return $params;

        // if($request['password']){
        //     $this->validate($request,[
        //         'email' => 'unique:users,email'
        //     ], [
        //         'email.unique' => 'This email is already taken. If it belongs to you 
        //         <a href="' . route('login') . '">click here to sign in.</a>'
        //     ]);
        //     User::create([
        //         'name' => $request['name'],
        //         'email' => $request['email'],
        //         'password' => bcrypt($request['password'])
        //     ]);
        // }

        $products = $cart->items;


        $order = Order::create($params);

        foreach ($products as $product) {
            $order->products()->attach(
                $product['id'],
                [
                    'quantity' => $product['qty'],
                ]
            );
        }

        return 'Successfull';
    }
}
