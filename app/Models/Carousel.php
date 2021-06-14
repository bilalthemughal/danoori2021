<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class Carousel extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'background_color',
        'link',
        'h3_tag',
        'h2_tag',
        'p_tag',
        'image',
        'is_active'
    ];

    public function getImagePathAttribute(){
        return asset($this->image);
    }


    public function scopeActive($query){
        return $query->where('is_active', 1);
    }

    public function getImage()
    {
        return Cloudinary::getImage($this->image);
    }
}
