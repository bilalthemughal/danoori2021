<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductView extends Model
{
    use HasFactory;

    public static function createViewLog($product_id) {
        $productView = new ProductView();
        $productView->product_id = $product_id;
        $productView->save();
}
}
