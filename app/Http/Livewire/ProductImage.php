<?php

namespace App\Http\Livewire;

use App\Models\Image;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProductImage extends Component
{
    use WithFileUploads;

    public $readyToLoad = false;
    public $product_id;
    public $product;
    public $images;
    public $photo;

    protected $listeners = ['refreshComponent' => 'mount'];


    public function mount(){
        $this->product = Product::where('id',$this->product_id)->firstOrFail();

        $this->photo = null;
        
        $this->images = $this->product->images;
    }

    public function loadImages()
    {
        
        $this->product = Product::where('id',$this->product_id)->firstOrFail();
        
        $this->images = $this->product->images;
    
        $this->readyToLoad = true;
    }

    public function deleteImage($image_id){
        Cloudinary::destroy($image_id);

        Image::where('path', $image_id)->delete();

        $this->emit('refreshComponent');


    }

    public function save()
    {

        $result = $this->photo->storeOnCloudinary('Products');

        $this->product->images()->create([
            'path' => $result->getPublicId()
        ]);

        $this->emit('refreshComponent');
    }

    public function render()
    {
        return view('livewire.product-image', [
            'photos' => $this->readyToLoad
                ? $this->images
                : []
        ]);
    }
}
