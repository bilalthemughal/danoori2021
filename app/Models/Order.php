<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public const IS_PENDING = 0;
    public const IS_SHIPPED = 1;
    public const IS_DELIVERED = 2;
    public const IS_CANCELLED = -1;

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
        'source'
        
    ];

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'price');
    }
}
