<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'category_id',
        'subcategory_id',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'product_id' => 'integer',
        'category_id' => 'integer',
        'subcategory_id' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer'
    ];
}
