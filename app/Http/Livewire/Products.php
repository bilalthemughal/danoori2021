<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $totalRecords;
    public $loadAmount = 0;
    public $loadedProducts = [];
    public $products;
    public $mounted_count = 0;

    public function render()
    {
        return view('livewire.products');
    }

    public function mount()
    {
        $this->products = Product::query()
            ->inRandomOrder()
            ->limit(12)
            ->with('category:id,slug')
            ->get();

        $this->totalRecords = Product::count();

        $this->loadAmount += $this->products->count();

        $this->mounted_count++;

        $this->loadedProducts = $this->products->pluck('id')->toArray();
    }

    public function loadMore()
    {
        $newProducts = Product::query()
            ->whereNotIn('id', $this->loadedProducts)
            ->inRandomOrder()
            ->limit(12)
            ->with('category:id,slug')
            ->get();

        $this->products = $this->products->merge($newProducts);
        $this->loadedProducts = $this->products->pluck('id')->toArray();
        $this->loadAmount += $newProducts->count();

        $this->emit('productsAppended');
    }
}
