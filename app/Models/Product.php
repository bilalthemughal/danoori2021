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
        'small_photo_path',
        'large_photo_path',
        'second_photo_path',
        'is_active',
        'original_price',
        'discounted_price',
        'product_info',
        'category_id',
        'stock',
        'left_color',
        'right_color'
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
