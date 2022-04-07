<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class CategoryProducts extends Component
{
    public $totalRecords;
    public $loadAmount = 0;
    public $loadedProducts = [];
    public $products;
    public $mounted_count = 0;
    public $category;

    public function render()
    {
        return view('livewire.products');
    }

    public function mount()
    {
        $this->products = Product::query()
            ->where('category_id', $this->category->id)
            ->inRandomOrder()
            ->limit(12)
            ->with('category:id,slug')
            ->get();

        $this->totalRecords = Product::where('category_id', $this->category->id)->count();

        $this->loadAmount += $this->products->count();

        $this->mounted_count++;

        $this->loadedProducts = $this->products->pluck('id')->toArray();
    }

    public function loadMore()
    {
        $newProducts = Product::query()
            ->where('category_id', $this->category->id)
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
