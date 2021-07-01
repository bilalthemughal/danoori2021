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
        
        $this->totalPrice = $cart->totalPrice;
    }

    public function addToCart($product_id){

        $product = Product::where('id', $product_id)->firstOrFail();
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id, $this->quantity);
        
        Session::put('cart', $cart);

        $this->emit('productAdded');

    }

    public function remove($id){
        $product = Product::where('id', $id)->firstOrFail();
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->delete($product, $product->id);

        $this->emit('productAdded');
    }
    
    public function render()
    {
        return view('livewire.cart-page');
    }
}
