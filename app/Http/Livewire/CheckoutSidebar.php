<?php

namespace App\Http\Livewire;

use App\Cart;
use App\Models\Coupon;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class CheckoutSidebar extends Component
{
    public $products = [];
    public $totalItems = 0;
    public $totalPrice = 0;
    public $discountedPrice = 0;
    public $coupon_text = '';
    public $percent = 0;
    public $discount = 0;
    public $totalDiscount = 0;
    protected $listeners = ['productAdded' => 'mount', 'productRemoved' => 'mount'];

    public function mount()
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        if ($oldCart) {
            $this->products = $cart->items;
        }

        $this->totalPrice = $cart->totalPrice;
        $this->discountedPrice = $cart->discountedPrice;
        $this->percent = $cart->percent;
        $this->discount = $cart->discount;
        $this->coupon_text = $cart->coupon_text;
    }

    public function applyPromoCode()
    {

        $coupon = Coupon::where('text', $this->coupon_text)->first();
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->applyPromo($coupon->text ?? '', $coupon->percent ?? 0);
        $this->discountedPrice = $cart->discountedPrice;
        $this->discount = $cart->discount;
        // $this->coupon_text = $cart->coupon_text;

        Session::put('cart', $cart);
    }

    public function render()
    {
        return view('livewire.checkout-sidebar');
    }
}
