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
        'sub_category_id',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'product_id' => 'integer',
        'category_id' => 'integer',
        'sub_category_id' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer'
    ];
}
