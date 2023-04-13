<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public static $wrap = false;

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     * @throws \Exception
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'image_url' => $this->image ?: null,
            'price' => $this->price,
            'published' => (bool)$this->published,
            'product_categories' => $this->getCategories->map(fn($item) => [
                'id' => $item->id,
                'name' => $item->id,
                'category_id' => $item->category_id,
                'created_at' => (new \DateTime($item->created_at))->format('Y-m-d H:i:s'),
                'updated_at' => (new \DateTime($item->updated_at))->format('Y-m-d H:i:s'),
            ]),
            'product_subcategories' => $this->getSubcategories->map(fn($item) => [
                'id' => $item->id,
                'name' => $item->id,
                'category_id' => $item->category_id,
                'subcategory_id' => $item->subcategory_id,
                'created_at' => (new \DateTime($item->created_at))->format('Y-m-d H:i:s'),
                'updated_at' => (new \DateTime($item->updated_at))->format('Y-m-d H:i:s'),
            ]),
            'created_at' => (new \DateTime($this->created_at))->format('Y-m-d H:i:s'),
            'updated_at' => (new \DateTime($this->updated_at))->format('Y-m-d H:i:s'),
        ];
    }
}
