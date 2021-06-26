<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address',
        'city',
        'sub_total',
        'total',
        'coupon',
        'order_note',
        'total_products',
        'order_id',
        'user_id',
        
    ];

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'price');
    }
}
