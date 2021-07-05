<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderDetailModal extends Component
{
    protected $listeners = ['modalOpened' => 'openModal'];
    public $order = null;
    public $products = [];
    public $order_id;
    public function render()
    {
        return view('livewire.order-detail-modal');
    }

    public function openModal($value)
    {
        $this->order = Order::where('order_id', $value)->with('products.category')->first();

        $this->products = $this->order->products;

        $this->emit('openModal');
    }
}
