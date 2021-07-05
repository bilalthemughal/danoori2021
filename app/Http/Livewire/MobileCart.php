<?php

namespace App\Http\Livewire;

use App\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class MobileCart extends Component
{
    public $totalItems = 0;
    public $totalPrice = 0;

    protected $listeners = ['productAdded' => 'mount'];

    public function mount()
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $this->totalItems = $cart->totalQty;
        $this->totalPrice = $cart->totalPrice;

    }

    public function render()
    {
        return view('livewire.mobile-cart');
    }
}
