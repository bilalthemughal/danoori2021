<?php

namespace App\Http\Livewire;

use App\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class AddToCart extends Component
{

    public $product_id;

    public function addToCart($product_id){

        $product = Product::findOrFail($product_id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        Session::put('cart', $cart);

        $this->emit('productAdded');

    }





    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
