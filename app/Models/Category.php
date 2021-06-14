<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'image',
        'slug',
        'is_active'
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function getImage()
    {
        return Cloudinary::getImage($this->image);
    }
}
