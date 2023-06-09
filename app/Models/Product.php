<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasFactory;
    use HasSlug;
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'price', 'image', 'published', 'image_mime', 'image_size', 'created_by', 'updated_by'];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function productCategories(): BelongsToMany
    {
        return $this->belongsToMany(ProductCategory::class, 'product_categories', 'product_id', 'category_id')
            ->withPivot('category_id')
            ->withTimestamps();
    }

    public function productSubcategories(): BelongsToMany
    {
        return $this->belongsToMany(ProductCategory::class, 'product_categories', 'product_id', 'category_id')
            ->withPivot('subcategory_id')
            ->withTimestamps();
    }

    public function getCategories(): HasMany
    {
        return $this->hasMany(ProductCategory::class, 'product_id');
    }

    public function getSubcategories(): HasMany
    {
        return $this->hasMany(ProductCategory::class, 'product_id');
    }
}
