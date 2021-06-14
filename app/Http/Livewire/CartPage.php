<?php

namespace App\Http\Livewire;

use App\Cart;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class CartPage extends Component
{
    public $products = [];
    public $totalItems = 0;
    public $totalPrice = 0;
    public $quantity = 1;

    protected $listeners = ['productAdded' => 'mount'];

    public function mount(){
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        if($oldCart){
            $this->products = $cart->items;
        }

        // $this->totalItems = $cart->totalQty;
        $this->totalPrice = $cart->totalPrice;
    }

    public function addToCart($product_id){

        $product = Product::findOrFail($product_id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id, $this->quantity);
        // $cart->applyPromo($cart->percent);


        Session::put('cart', $cart);

        $this->emit('productAdded');

    }

    public function remove($id){
        $product = Product::findOrFail($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->delete($product, $product->id);
        // $cart->applyPromo($cart->percent);


        Session::put('cart', $cart);

        $this->emit('productAdded');

    }
    
    public function render()
    {
        return view('livewire.cart-page');
    }
}
