<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    public function index()
    {
        $query = Product::query()
            ->where('published', '=', 1)
            ->orderBy('updated_at', 'desc');

        if (request()->has('category')) {
            $productIds= ProductCategory::query()
                ->where('category_id', request()->get('category'))
                ->pluck('product_id')->toArray();

            $query->whereIn('id', $productIds);
        }

        if (request()->has('subcategory')) {
            $productIds= ProductCategory::query()
                ->where('subcategory_id', request()->get('subcategory'))
                ->pluck('product_id')->toArray();

            $query->whereIn('id', $productIds);
        }

        $products = $query->paginate(5);

        return view('product.index', [
            'products' => $products
        ]);
    }

    public function view(Product $product)
    {
        return view('product.view', ['product' => $product]);
    }
}
