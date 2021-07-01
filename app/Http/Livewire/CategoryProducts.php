<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class CategoryProducts extends Component
{
    public $totalRecords;
    public $loadAmount = 12;
    public $loadedProducts = [];
    public $products;
    public $mounted_count = 0;
    public $category;


    public function render()
    {
        return view('livewire.category-products');
    }

    public function mount()
    {
        $this->products = Product::query()
            ->inRandomOrder()
            ->where('category_id', $this->category->id)
            ->limit(12)
            ->with('category:id,slug')
            ->get();

        $this->totalRecords = Product::count();

        $this->mounted_count++;

        $this->loadedProducts = $this->products->pluck('id')->toArray();
    }

    public function loadMore()
    {
        $newProducts = Product::query()
            ->whereNotIn('id', $this->loadedProducts)
            ->where('category_id', $this->category->id)
            ->inRandomOrder()
            ->limit(12)
            ->with('category:id,slug')
            ->get();

        $this->products = $this->products->merge($newProducts);
        $this->loadedProducts = $this->products->pluck('id')->toArray();
        $this->loadAmount += 12;

        $this->emit('productsAppended');
    }


}
