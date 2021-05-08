<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'is_active',
        'price',
        'discounted_price',
        'product_info',
        'category_id',
        'stock'
    ];

    public function getImagePathAttribute(){
        return asset($this->image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
