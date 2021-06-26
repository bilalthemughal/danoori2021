<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'main_image',
        'nav_image',
        'canvas_thumbnail',
        'canvas_image',
        'cart_image',
        'is_active',
        'original_price',
        'discounted_price',
        'product_info',
        'category_id',
        'stock'
    ];

    public function getImagePathAttribute()
    {
        return asset($this->image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }
}
