<?php

namespace App\Http\Livewire;

use App\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class NavCart extends Component
{

    public $products = [];
    public $totalItems = 0;
    public $totalPrice = 0;

    protected $listeners = ['productAdded' => 'mount', 'productRemoved' => 'mount'];

    public function mount()
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        if ($oldCart) {
            $this->products = $cart->items;
        }

        $this->totalItems = $cart->totalQty;
        $this->totalPrice = $cart->totalPrice;

    }
    

    public function remove($id)
    {
        if ($this->totalItems > 0) {
            $product = Product::findOrFail($id);
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->delete($product, $product->id);

            Session::put('cart', $cart);

            $this->emit('productRemoved');
        }
    }

    public function render()
    {
        return view('livewire.nav-cart');
    }
}
