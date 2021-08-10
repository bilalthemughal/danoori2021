<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdBudget extends Model
{
    use HasFactory;

    protected $fillable = ['budget', 'sold'];
}
