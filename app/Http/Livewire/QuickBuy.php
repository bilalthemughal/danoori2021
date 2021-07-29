<?php

namespace App\Http\Livewire;

use App\Cart;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class QuickBuy extends Component
{
    public $product_id;
    public function quickBuy($product_id)
    {
        $product = Product::where('id', $this->product_id)->firstOrFail();

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id, 1);

        Session::put('cart', $cart);

        return redirect()->route('checkout');
    }

    public function render()
    {
        return view('livewire.quick-buy');
    }
}
