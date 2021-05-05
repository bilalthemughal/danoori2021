<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
